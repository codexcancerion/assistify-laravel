<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students', function () {
    return view('students');
});

Route::get('/auth/wsregister', function () {
    return view('auth/wsregister');
});
