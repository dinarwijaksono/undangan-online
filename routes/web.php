<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\InvitationTemplateController;
use App\Http\Controllers\ManagementController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

// AuthController
Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);

// ManagementController
Route::get('/main', [ManagementController::class, 'index']);

// InvitationController
Route::get('/invitation/my-invitation', [InvitationController::class, 'myInvitation']);
Route::get('/invitation/select-a-theme', [InvitationController::class, 'selectATheme']);
Route::get('/invitation/create-invitation', [InvitationController::class, 'createInvitation']);

// InvitationTemplateController
Route::get('/invitation-template', [InvitationTemplateController::class, 'listTemplate']);
Route::get('/invitation-template/set-variabel', [InvitationTemplateController::class, 'setVariabel']);
