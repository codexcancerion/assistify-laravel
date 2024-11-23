<?php

namespace App\Http\Controllers;

use App\Models\OSAS;
use Illuminate\Http\Request;

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
            'role' => 'required|string',            
        ]);
    
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
        return $osas;
    }

    public function destroy($id)
    {
        $osas = OSAS::findOrFail($id);
        $osas->delete();
        return response()->json(['message' => 'OSAS deleted']);
    }
}
