<?php

namespace App\Http\Controllers;

use App\Models\Supervisor;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SupervisorController extends Controller
{
    /**
     * Fetch all supervisors.
     */
    public function index()
    {
        $supervisors = Supervisor::all();
        return response()->json($supervisors, 200);
    }

    /**
     * Store a new supervisor.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:supervisors,email',
            'password' => 'required|string',
            'role' => 'required|string',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $supervisor = Supervisor::create($validated);

        return response()->json([
            'message' => 'Supervisor created successfully',
            'data' => $supervisor,
        ], 201);
    }

    /**
     * Get a specific supervisor by ID.
     */
    public function show($id)
    {
        $supervisor = Supervisor::find($id);

        if (!$supervisor) {
            return response()->json(['message' => 'Supervisor not found'], 404);
        }

        return response()->json($supervisor, 200);
    }

    /**
     * Update a specific supervisor.
     */
    public function update(Request $request, $id)
    {
        $supervisor = Supervisor::find($id);

        if (!$supervisor) {
            return response()->json(['message' => 'Supervisor not found'], 404);
        }

        $supervisor->update($request->all());

        return response()->json([
            'message' => 'Supervisor updated successfully',
            'data' => $supervisor,
        ], 200);
    }

    /**
     * Delete a specific supervisor.
     */
    public function destroy($id)
    {
        $supervisor = Supervisor::find($id);

        if (!$supervisor) {
            return response()->json(['message' => 'Supervisor not found'], 404);
        }

        $supervisor->delete();

        return response()->json(['message' => 'Supervisor deleted'], 200);
    }

    /**
     * Handle supervisor login.
     */
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $supervisor = Supervisor::where('email', $validated['email'])->first();

        if (!$supervisor || !Hash::check($validated['password'], $supervisor->password)) {
            return response()->json(['message' => 'Invalid email or password'], 401);
        }

        return response()->json([
            'message' => 'Login successful',
            'data' => $supervisor,
        ], 200);
    }

    public function getSupervisorById($id)
    {
        // Attempt to find the supervisor
        $supervisor = Supervisor::find($id);

        // Return a 404 response if the supervisor doesn't exist
        if (!$supervisor) {
            return response()->json([
                'message' => 'Supervisor not found',
            ], 404);
        }

        // Return the supervisor with a 200 response
        return response()->json([
            'message' => 'Supervisor retrieved successfully',
            'data' => $supervisor,
        ], 200);
    }

    public function getStudents(Request $request)
    {
        $validated = $request->validate([
            'supervisor_id' => 'required|integer|exists:supervisors,id',
        ]);
    
        $supervisorId = $validated['supervisor_id'];
    
        $students = Student::where('supervisor_id', $supervisorId)->get();
    
        if ($students->isEmpty()) {
            return response()->json([
                'message' => 'No students found for the given supervisor.',
            ], 404);
        }
    
        return response()->json([
            'message' => 'Students retrieved successfully.',
            'data' => $students,
        ], 200);
    }
    


}
