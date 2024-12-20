<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\OSASController;
use App\Http\Controllers\TimeLogController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('students', StudentController::class);
Route::apiResource('supervisors', SupervisorController::class);
Route::apiResource('osas', OSASController::class);
Route::apiResource('tasks', TaskController::class);
Route::apiResource('time-logs', TimeLogController::class);

// STUDENT
Route::get('/students/no-time-logs', [StudentController::class, 'studentsWithoutTimeLogs']);
Route::post('/students/login', [StudentController::class, 'login']);
Route::put('/students/{id}/assign-supervisor', [StudentController::class, 'assignSupervisor']);
Route::put('/students/{id}/remove-supervisor', [StudentController::class, 'removeSupervisor']);

Route::get('/supervisors/{id}', [SupervisorController::class, 'getSupervisorById']);
Route::post('/supervisors/login', [SupervisorController::class, 'login']);
Route::post('/supervisor/students', [SupervisorController::class, 'getStudents']);


Route::post('/osas/login', [OSASController::class, 'login']);



Route::post('/time-logs/login', [TimeLogController::class, 'login']);
Route::post('/time-logs/logout', [TimeLogController::class, 'logout']);


Route::patch('/tasks/{id}/complete', [TaskController::class, 'markAsCompleted']);


// Route::get('/students', [StudentController::class, 'index']);
// Route::post('students', [StudentController::class, 'store']);
// Route::get('/students/{student_id}', [StudentController::class, 'show']);
// Route::put('/students/{id}', [StudentController::class, 'update']);
// Route::delete('/students/{id}', [StudentController::class, 'destroy']);

// Route::get('/osas', [OSASController::class, 'index']);
// Route::post('/osas', [OSASController::class, 'store']);
// Route::get('/osas/{id}', [OSASController::class, 'show']);
// Route::put('/osas/{id}', [OSASController::class, 'update']);
// Route::delete('/osas/{id}', [OSASController::class, 'destroy']);


// Route::get('/supervisors', [SupervisorController::class, 'index']);
// Route::post('/supervisors', [SupervisorController::class, 'store']);
// Route::get('/supervisors/{id}', [SupervisorController::class, 'show']);
// Route::put('/supervisors/{id}', [SupervisorController::class, 'update']);
// Route::delete('/supervisors/{id}', [SupervisorController::class, 'destroy']);


// Route::get('/tasks', [TaskController::class, 'index']);
// Route::get('/tasks/{id}', [TaskController::class, 'show']);
// Route::post('/tasks', [TaskController::class, 'store']);
// Route::put('/tasks/{id}', [TaskController::class, 'update']);
// Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
