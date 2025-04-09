<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['guest'])->group(function (){
    Route::get('/registration', [RegistrationController::class, 'index'])->name('registration.index');

    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
});
