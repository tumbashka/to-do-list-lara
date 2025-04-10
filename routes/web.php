<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::permanentRedirect('/', '/tasks')->name('home');

    Route::resource('tasks', TaskController::class);
    Route::get('/tasks/{task}/change-status', [TaskController::class, 'change_status'])->name('tasks.change-status');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/registration', [RegistrationController::class, 'index'])->name('registration.index');
    Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.store');

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});
