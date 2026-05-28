<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// --- Authentication Views ---
Route::get('/', function () {
    return view('auth.login'); 
})->name('home');

Route::get('/login', function () {
    return view('auth.login'); 
})->name('login');

// --- Authentication Actions (Keep as is for logic) ---
Route::post('/login', [AuthController::class, 'handleLogin']);
Route::post('/signup', [AuthController::class, 'handleRegister']);

// --- Dashboard (Keep Controller for dynamic data) ---
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
});

// --- Components / Management ---
Route::get('/employees', function () {
    return view('components.employees');
})->name('employees.index');

Route::get('/departments', function () {
    return view('components.departments');
})->name('departments.index');

Route::get('/attendance', function () {
    return view('components.attendance');
})->name('attendance.index');