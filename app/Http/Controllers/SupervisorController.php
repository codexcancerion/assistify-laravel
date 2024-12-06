<?php

namespace App\Http\Controllers;

use App\Models\Supervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SupervisorController extends Controller
{
    public function index()
    {
        return Supervisor::all();
    }

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
    
    public function show($id)
    {
        $supervisor = Supervisor::find($id);

        if (!$supervisor) {
            return response()->json([
                'message' => 'Supervisor not found',
            ], 404);
        }

        return response()->json($supervisor, 200);
    }

    public function update(Request $request, $id)
    {
        $supervisor = Supervisor::findOrFail($id);
        $supervisor->update($request->all());
        return $supervisor;
    }

    public function destroy($id)
    {
        $supervisor = Supervisor::findOrFail($id);
        $supervisor->delete();
        return response()->json(['message' => 'Supervisor deleted']);
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
            return response()->json([
                'message' => 'Invalid email or password',
            ], 401);
        }


        return response()->json([
            'message' => 'Login successful',
            'data' => $supervisor
        ], 200);
    }
}
