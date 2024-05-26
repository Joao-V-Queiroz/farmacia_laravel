<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;

Route::post('/login', [AuthController::class, 'auth']);

Route::middleware(['auth:sanctum'])->prefix('v1')->name('api.')->group(function () {
	Route::apiResource('users', UserController::class)->names('users');
});

Route::prefix('v1')->name('api.')->group(function () {
	Route::post('/logchanel', function () {
		// api para notificacoes via webhook
	})->name('logchanel');
});
