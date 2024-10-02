<?php

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/loginAction', [LoginController::class, 'actionLogin'])->name('login.action');

Route::get('/registration', [RegistrationController::class, 'index'])->name('registration');
Route::post('/registrationPost', [RegistrationController::class, 'store'])->name('registration.post');

Route::get('/complaint', [ComplaintController::class, 'index'])->name('complaint')->middleware('auth');
Route::post('/complaintPost', [ComplaintController::class, 'store'])->name('complaint.post');