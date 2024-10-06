<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'actionLogin'])->name('login.action');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/registration', [RegistrationController::class, 'index'])->name('registration');
Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.post');

Route::get('/complaint', [ComplaintController::class, 'index'])->name('complaint');
Route::post('/complaint', [ComplaintController::class, 'store'])->name('complaint.post');

Route::middleware(['auth', 'user-access:admin'])->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
});
