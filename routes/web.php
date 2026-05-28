<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => view('auth.login'))->name('home');
Route::get('/login', fn() => view('auth.login'))->name('login');
Route::post('/login', [AuthController::class, 'handleLogin']);
Route::post('/signup', [AuthController::class, 'handleRegister']);

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    })->name('logout');

    /*
    |--------------------------------------------------------------------------
    | Management Routes
    |--------------------------------------------------------------------------
    */

    Route::get('/employees', fn() => view('components.employees'))->name('employees.index');
    Route::get('/departments', fn() => view('components.departments'))->name('departments.index');
    Route::get('/attendance', fn() => view('components.attendance'))->name('attendance.index');

});