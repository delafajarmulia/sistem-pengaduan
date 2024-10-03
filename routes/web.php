<?php

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'actionLogin'])->name('login.action');

Route::get('/registration', [RegistrationController::class, 'index'])->name('registration');
Route::post('/registration', [RegistrationController::class, 'store'])->name('registrati');

Route::get('/complaint', [ComplaintController::class, 'index'])->name('complaint')->middleware('auth');
Route::post('/complaint', [ComplaintController::class, 'store'])->name('complaint.post');