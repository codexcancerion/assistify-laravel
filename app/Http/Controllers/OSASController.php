<?php

namespace App\Http\Controllers;

use App\Models\OSAS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class OSASController extends Controller
{
    public function index()
    {
        return OSAS::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:osas,email',
            'password' => 'required|string',
            'role' => 'required|string',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $osas = OSAS::create($validated);

        return response()->json([
            'message' => 'OSAS created successfully',
            'data' => $osas,
        ], 201);
    }

    public function show($id)
    {
        $osas = OSAS::find($id);

        if (!$osas) {
            return response()->json([
                'message' => 'OSAS not found',
            ], 404);
        }

        return response()->json($osas, 200);
    }

    public function update(Request $request, $id)
    {
        $osas = OSAS::findOrFail($id);
        $osas->update($request->all());
        return response()->json(['message' => 'OSAS updated', 'data' => $osas], 200);
    }

    public function destroy($id)
    {
        $osas = OSAS::findOrFail($id);
        $osas->delete();
        return response()->json(['message' => 'OSAS deleted'], 200);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 422);
        }

        $osas = OSAS::where('email', $credentials['email'])->first();

        if (!$osas || !Hash::check($credentials['password'], $osas->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        return response()->json([
            'message' => 'Login successful',
            'data' => $osas,
        ], 200);
    }
}
