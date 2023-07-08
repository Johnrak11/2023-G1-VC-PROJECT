<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GoogleAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', ([AuthController::class, 'logout']));
});

// ----- authentication group----
Route::prefix('auth')->group(function () {
    Route::post('/google',  [GoogleAuthController::class, 'googleLogin']);
});
Route::get('/event/{id}',[EventController::class, 'getEventById']);

Route::post('/registers', ([AuthController::class, 'register']));
Route::post('/login', ([AuthController::class, 'login']));
    