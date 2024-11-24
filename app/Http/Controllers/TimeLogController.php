<?php

namespace App\Http\Controllers;

use App\Models\TimeLog;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TimeLogController extends Controller
{
    // List all time logs
    public function index()
    {
        $timeLogs = TimeLog::with('student')->get();
        return response()->json($timeLogs, 200);
    }

    // Show a specific time log
    public function show($id)
    {
        $timeLog = TimeLog::with('student')->find($id);

        if (!$timeLog) {
            return response()->json(['message' => 'Time log not found'], 404);
        }

        return response()->json($timeLog, 200);
    }

    // Create a new time log
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'check_in' => 'nullable|date',
            'check_out' => 'nullable|date|after:check_in',
        ]);

        $timeLog = TimeLog::create($validated);

        return response()->json($timeLog, 201);
    }

    // Update a time log
    public function update(Request $request, $id)
    {
        $timeLog = TimeLog::find($id);

        if (!$timeLog) {
            return response()->json(['message' => 'Time log not found'], 404);
        }

        $validated = $request->validate([
            'check_in' => 'nullable|date',
            'check_out' => 'nullable|date|after:check_in',
        ]);

        $timeLog->update($validated);

        // Calculate total hours worked if check-in and check-out are set
        if ($timeLog->check_in && $timeLog->check_out) {
            $checkIn = Carbon::parse($timeLog->check_in);
            $checkOut = Carbon::parse($timeLog->check_out);
            $timeLog->total_hours_worked = $checkIn->diffInHours($checkOut);
            $timeLog->save();
        }

        return response()->json($timeLog, 200);
    }

    // Delete a time log
    public function destroy($id)
    {
        $timeLog = TimeLog::find($id);

        if (!$timeLog) {
            return response()->json(['message' => 'Time log not found'], 404);
        }

        $timeLog->delete();
        return response()->json(['message' => 'Time log deleted successfully'], 200);
    }
}
