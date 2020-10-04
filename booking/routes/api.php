<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\HealthCheckController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', HealthCheckController::class);
Route::middleware('auth:api')->get('/user', UserProfileController::class);

Route::post('register', RegisterController::class);

Route::apiResource('bookings', BookingController::class)->middleware('auth:api');
