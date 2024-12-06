<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Fetch tasks for a specific student
    public function index(Request $request)
    {
        $studentId = $request->query('student_id');

        if ($studentId) {
            // Fetch tasks assigned to the specified student
            $tasks = Task::with(['assignedTo', 'assignedBy'])
                         ->where('assigned_to', $studentId)  // Filter tasks by the student
                         ->get();
        } else {
            // Fetch all tasks if no student_id is provided
            $tasks = Task::with(['assignedTo', 'assignedBy'])->get();
        }

        return response()->json($tasks, 200);  // Return tasks as a JSON response
    }

    // Fetch a specific task by ID
    public function show($id)
    {
        $task = Task::with(['assignedTo', 'assignedBy'])->find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        return response()->json($task, 200);
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

        return response()->json($task, 200);
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

    // Set the task status to Completed
    public function markAsCompleted($id)
    {
        // Find the task by its ID
        $task = Task::find($id);

        // Check if the task exists
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        // Update the task's status to 'Completed'
        $task->status = 'Completed';
        $task->save();

        return response()->json(['message' => 'Task marked as completed', 'task' => $task], 200);
    }
}
