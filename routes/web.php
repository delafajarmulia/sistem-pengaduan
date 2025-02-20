<?php

use App\Http\Controllers\ChangeNIKController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ComplaintDetailController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PrintReportController;
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
        Route::get('/user/{id}', [UserController::class, 'userDetail'])->middleware('user-access-self')->name('profile');
        Route::put('/user/{id}', [UserController::class, 'edit'])->name('profile.update');
        Route::get('/complaint/{id}/detail', [ComplaintDetailController::class, 'index'])->name('complaint.detail');
        Route::post('/complaint/{id}/detail', [ComplaintDetailController::class, 'addResponse'])->name('response.post');
        Route::get('/notifications/{id}', [NotificationController::class, 'index'])->middleware('user-access-self')->name('notifications');
    }
);

Route::middleware(['auth', 'user-access:admin'])->group(
    function(){
        Route::put('/complaint/{id}', [DashboardController::class, 'editStatus'])->name('complaint.update');
        Route::get('/spot-form-add', [SpotController::class, 'spotForm'])->name('spot.form.add');
        Route::post('/spot-form-add', [SpotController::class, 'createSpot'])->name('spot.post');
        Route::get('/spot-form-edit/{id}', [SpotController::class, 'spotDetailForEdit'])->name('spot.form.edit');
        Route::put('/spot-form-edit/{id}', [SpotController::class, 'spotUpdate'])->name('spot.edit');
        Route::delete('/spot-delete/{id}', [SpotController::class, 'spotDelete'])->name('spot.delete');
        Route::get('/users', [UserController::class, 'index'])->name('users');
        Route::put('/user/is-active/{id}', [UserController::class, 'isActiveUpdate'])->name('user.activated.update');
        Route::get('/change-nik/{id}', [ChangeNIKController::class, 'changeNIKForm'])->name('change.nik.form');
        Route::put('/change-nik/{id}', [ChangeNIKController::class, 'editNIK'])->name('change.nik.action');
        Route::get('/user-form-add', [UserController::class, 'showUserAdd'])->name('user.form.add');
        Route::post('/user-form-add', [UserController::class, 'addUser'])->name('user.add.post');
        Route::get('/print-report', [PrintReportController::class, 'index'])->name('print.report');
        Route::post('/print-report', [PrintReportController::class, 'filterReport'])->name('filter.report');
    }
);

Route::middleware(['auth', 'user-access:user'])->group(
    function(){
        Route::get('/complaint', [ComplaintController::class, 'index'])->name('complaint');
        Route::post('/complaint', [ComplaintController::class, 'store'])->name('complaint.post');
        Route::get('/request-change-nik/{id}', [ChangeNIKController::class, 'requestChangeNIK'])->middleware('user-access-self')->name('request.change.nik');
        Route::post('/request-change-nik/{id}', [ChangeNIKController::class, 'changeNIK'])->name('request.change.nik.post');
    }
);