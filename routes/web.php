<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConfirmAttendanceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\InvitationTemplateController;
use App\Http\Controllers\ManagementController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

// AuthController
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::get('/register', [AuthController::class, 'register'])->middleware('guest');

// ManagementController
Route::get('/main', [ManagementController::class, 'index'])->middleware('auth');

// InvitationController
Route::get('/invitation/my-invitation', [InvitationController::class, 'myInvitation']);
Route::get('/invitation/select-a-theme', [InvitationController::class, 'selectATheme']);
Route::get('/invitation/create-invitation', [InvitationController::class, 'createInvitation']);
Route::get('/invitation/edit-invitation', [InvitationController::class, 'editInvitation']);

// InvitationTemplateController
Route::get('/invitation-template', [InvitationTemplateController::class, 'listTemplate']);
Route::get('/invitation-template/set-variabel', [InvitationTemplateController::class, 'setVariabel']);

// ConfirmAttendanceController
Route::get('/confirm-attendance', [ConfirmAttendanceController::class, 'index']);
