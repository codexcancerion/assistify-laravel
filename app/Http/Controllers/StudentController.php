<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class StudentController extends Controller
{
    
    public function index()
    {
        $student = Student::all();
        return response()->json([
            'data' => $student,
        ], 201);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'student_id' => 'required|string',
            'department' => 'required|string',
            'email' => 'required|email|unique:students,email',
            'password' => 'required|string',
            'role' => 'required|string',
        ]);
    
        $validated['password'] = bcrypt($validated['password']);
    
        $student = Student::create($validated);
    
        return response()->json([
            'message' => 'Student created successfully',
            'data' => $student,
        ], 201);
    }
    
    public function show($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json([
                'message' => 'Student not found',
            ], 404);
        }

        return response()->json($student, 200);
    }


    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->update($request->all());
        return $student;
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return response()->json(['message' => 'Student deleted']);
    }

    public function login(Request $request) {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
    
        $student = Student::where('email', $validated['email'])->first();
    
        if (!$student || !Hash::check($validated['password'], $student->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    
        return response()->json([
            'message' => 'Login successful',
            'data' => ['id' => $student->id]
        ]);
    }

    public function assignSupervisor(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'supervisor_id' => 'required|exists:supervisors,id', // Ensure the supervisor exists
        ]);

        // Find the student
        $student = Student::findOrFail($id);

        // Update the supervisor_id
        $student->supervisor_id = $request->input('supervisor_id');
        $student->save();

        return response()->json([
            'message' => 'Supervisor assigned successfully',
            'student' => $student,
        ], 200);
    }

    public function studentsWithoutTimeLogs()
    {
        $studentsWithoutTimeLogs = Student::whereDoesntHave('timeLogs')
            ->select('id', 'first_name', 'last_name', 'email') // Limit fields
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $studentsWithoutTimeLogs,
        ]);
    }
}
