<?php

use App\Http\Controllers\Api\AuthControllerApi;
use App\Http\Controllers\Api\TemplateControllerApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// AuthControllerApi
Route::post('/register', [AuthControllerApi::class, 'register'])->middleware('guest:sanctum');
Route::post('/login', [AuthControllerApi::class, 'login'])->name('login')->middleware('guest:sanctum');
Route::delete('/logout', [AuthControllerApi::class, 'logout'])->middleware('auth:sanctum');

// TemplateControllerApi
Route::post('/template', [TemplateControllerApi::class, 'create'])->middleware('auth:sanctum');
Route::get("/template", [TemplateControllerApi::class, 'getAll'])->middleware('auth:sanctum');
Route::delete("/template", [TemplateControllerApi::class, 'delete'])->middleware('auth:sanctum');
Route::get("/template/{code}", [TemplateControllerApi::class, 'findByCode'])->middleware('auth:sanctum');
