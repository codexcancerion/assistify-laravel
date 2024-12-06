<?php

namespace App\Http\Controllers;

use App\Models\TimeLog;
use App\Models\Student;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TimeLogController extends Controller
{
    // List all time logs, or time logs for a specific student
    public function index(Request $request)
    {
        // If a student_id is provided, filter by it
        $query = TimeLog::with('student');
        
        if ($request->has('student_id')) {
            $query->where('student_id', $request->student_id);
        }
        
        // Sort by check_in in descending order (latest to oldest)
        $timeLogs = $query->orderBy('check_in', 'desc')->get();
        
        return response()->json($timeLogs, 200);
    }

    // Show a specific time log
    public function show($id)
    {
        $timeLog = TimeLog::with('student')->find($id);

        if (!$timeLog) {
            return $this->responseNotFound('Time log not found');
        }

        return response()->json($timeLog, 200);
    }

    // Create a new time log (Login)
    public function login(Request $request)
    {
        // Validate the student_id
        $request->validate([
            'student_id' => 'required|exists:students,id'
        ]);

        // Get the current time and create a new time log with check_in
        $timeLog = TimeLog::create([
            'student_id' => $request->student_id,
            'check_in' => Carbon::now(),
        ]);

        return response()->json([
            'message' => 'Logged in successfully',
            'time_log' => $timeLog
        ], 201);
    }

    // Update a time log (Logout)
    public function logout(Request $request)
    {
        // Validate the student_id
        $request->validate([
            'student_id' => 'required|exists:students,id'
        ]);

        // Find the most recent time log for the student that doesn't have a check_out
        $timeLog = TimeLog::where('student_id', $request->student_id)
                          ->whereNull('check_out')
                          ->orderBy('check_in', 'desc')
                          ->first();

        if (!$timeLog) {
            return response()->json([
                'message' => 'No active login found for this student.'
            ], 400);
        }

        // Set the check_out time to the current time
        $timeLog->check_out = Carbon::now();

        // Calculate the total hours worked
        $checkIn = Carbon::parse($timeLog->check_in);
        $checkOut = Carbon::parse($timeLog->check_out);
        $timeLog->total_hours_worked = $checkIn->diffInHours($checkOut);

        $timeLog->save();

        return response()->json([
            'message' => 'Logged out successfully',
            'time_log' => $timeLog
        ], 200);
    }

    // Delete a time log
    public function destroy($id)
    {
        $timeLog = TimeLog::find($id);

        if (!$timeLog) {
            return $this->responseNotFound('Time log not found');
        }

        $timeLog->delete();
        return response()->json(['message' => 'Time log deleted successfully'], 200);
    }

    // Helper method to handle 404 responses
    private function responseNotFound($message)
    {
        return response()->json(['message' => $message], 404);
    }
}
