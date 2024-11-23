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


// Route::get('/tasks', [TaskController::class, 'index']);
// Route::post('/tasks', [TaskController::class, 'store']);
// Route::put('/tasks/{id}', [TaskController::class, 'update']);
// Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);


Route::apiResource('students', StudentController::class);
Route::apiResource('supervisors', SupervisorController::class);
Route::apiResource('osas', OSASController::class);
Route::apiResource('tasks', TaskController::class);
Route::apiResource('time-logs', TimeLogController::class);

Route::get('/students', [StudentController::class, 'index']);
Route::post('/students', [StudentController::class, 'store']);
Route::get('/students/{student_id}', [StudentController::class, 'show']);
Route::put('/students/{id}', [StudentController::class, 'update']);
Route::delete('/students/{id}', [StudentController::class, 'destroy']);

Route::get('/osas', [OSASController::class, 'index']);
Route::post('/osas', [OSASController::class, 'store']);
Route::get('/osas/{id}', [OSASController::class, 'show']);
Route::put('/osas/{id}', [OSASController::class, 'update']);
Route::delete('/osas/{id}', [OSASController::class, 'destroy']);


Route::get('/supervisors', [SupervisorController::class, 'index']);
Route::post('/supervisors', [SupervisorController::class, 'store']);
Route::get('/supervisors/{id}', [SupervisorController::class, 'show']);
Route::put('/supervisors/{id}', [SupervisorController::class, 'update']);
Route::delete('/supervisors/{id}', [SupervisorController::class, 'destroy']);