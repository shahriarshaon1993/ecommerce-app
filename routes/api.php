<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthenticatedApiController;

Route::middleware('auth:api')->group(function () {
    Route::get('/auth/me', [AuthenticatedApiController::class, 'getUser']);
});
