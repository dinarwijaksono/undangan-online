<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagementController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

// AuthController
Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);

// ManagementController
Route::get('/main', [ManagementController::class, 'index']);
Route::get('/main/my-invitation', [ManagementController::class, 'myInvitation']);
