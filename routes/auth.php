<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ClientController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [ClientController::class, 'redirectTo'])
        ->name('login');

    Route::get('client/callback', [ClientController::class, 'handleCallback'])
        ->name('client.callback');

    // Route::get('login', [AuthenticatedSessionController::class, 'create'])
    //     ->name('login');

    // Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::post('client/logout', [ClientController::class, 'destroyWithRedirect'])
        ->name('client.logout');
});
