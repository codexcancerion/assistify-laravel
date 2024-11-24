<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Fetch all tasks
    public function index()
    {
        return Task::with(['assignedTo', 'assignedBy'])->get(); // Eager load relationships
    }

    // Fetch a specific task by ID
    public function show($id)
    {
        $task = Task::with(['assignedTo', 'assignedBy'])->find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        return $task;
    }

    // Create a new task
    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|string',
            'deadline' => 'required|date',
            'priority' => 'required|string',
            'status' => 'required|string',
            'assigned_to' => 'required|exists:students,id',
            'assigned_by' => 'required|exists:supervisors,id',
        ]);

        $task = Task::create($validated);

        return response()->json($task, 201);
    }

    // Update an existing task
    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $validated = $request->validate([
            'description' => 'sometimes|required|string',
            'deadline' => 'sometimes|required|date',
            'priority' => 'sometimes|required|string',
            'status' => 'sometimes|required|string',
            'assigned_to' => 'sometimes|required|exists:students,id',
            'assigned_by' => 'sometimes|required|exists:supervisors,id',
        ]);

        $task->update($validated);

        return $task;
    }

    // Delete a task
    public function destroy($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->delete();

        return response()->json(['message' => 'Task deleted successfully'], 200);
    }
}
