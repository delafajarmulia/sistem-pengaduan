<?php

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ComplaintDetailController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SpotController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('main');
Route::get('/spot', [SpotController::class, 'index'])->name('spots');  // '/spots'
Route::get('/spot/{id}', [SpotController::class, 'spotDetail'])->name('spot.detail');

Route::middleware(['guest'])->group(
    function(){
        Route::get('/login', [LoginController::class, 'index'])->name('login');
        Route::post('/login', [LoginController::class, 'actionLogin'])->name('login.action');
        Route::get('/registration', [RegistrationController::class, 'index'])->name('registration');
        Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.post');
        // Route::get('/forgot-password')
    }
);

Route::middleware(['auth'])->group(
    function(){
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/user/{id}', [UserController::class, 'userDetail'])->name('profile');
        Route::put('/user/{id}/update', [UserController::class, 'edit'])->name('profile.update');
        Route::get('/complaint/{id}/detail', [ComplaintDetailController::class, 'index'])->name('complaint.detail');
        Route::post('/complaint/{id}/response', [ComplaintDetailController::class, 'addResponse'])->name('response.post');
    }
);

Route::middleware(['auth', 'user-access:admin'])->group(
    function(){
        Route::get('/complaint/{id}', [DashboardController::class, 'editStatus'])->name('complaint.update');
        Route::get('/spot-form-add', [SpotController::class, 'spotForm'])->name('spot.form.add');
        Route::post('/spot-form-add', [SpotController::class, 'createSpot'])->name('spot.post');
        Route::get('/spot-form-edit/{id}', [SpotController::class, 'spotDetailForEdit'])->name('spot.form.edit');
        Route::put('/spot-form-edit/{id}', [SpotController::class, 'spotUpdate'])->name('spot.edit');
        Route::get('/users', [UserController::class, 'index'])->name('users');
    }
);

Route::middleware(['auth', 'user-access:user'])->group(
    function(){
        Route::get('/complaint', [ComplaintController::class, 'index'])->name('complaint');
        Route::post('/complaint', [ComplaintController::class, 'store'])->name('complaint.post');
    }
);