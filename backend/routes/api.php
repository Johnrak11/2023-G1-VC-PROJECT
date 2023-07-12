<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\UserController;
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
    Route::prefix('/auth')->group(function () {
        //logout
        Route::post('/logout', function (Request $request) {
            if (!$request->bearerToken()) {
                return response()->json(['success' => false, 'error' => 'Unauthorized'], 401);
            }
            return (new AuthController())->logout($request);
        });
        Route::get('/user', function (Request $request) {
            if (!$request->bearerToken()) {
                return response()->json(['success' => false, 'error' => 'Unauthorized'], 401);
            }
            return (new AuthController())->getUserInfo($request);
        });
    });
});

// ----- authentication group----
Route::prefix('auth')->group(function () {
    Route::post('/google',  [GoogleAuthController::class, 'googleLogin']);
    Route::post('/registers', ([AuthController::class, 'register']));
    Route::post('/login', ([AuthController::class, 'login']));
});
Route::get('/eventsNotDeadline', [EventController::class, 'getEventsNotDeadline']);

Route::get('/agenda/{eventId}', [AgendaController::class, 'getAgendaByEventId']);



//-------search for events------------
Route::prefix('/events')->group(function () {
    Route::get('/{id}', [EventController::class, 'getEventById']);
    Route::get('/search', ([EventController::class, 'searchEvent'])); 
    Route::get('/organizer/{organizerId}', [EventController::class, 'getOrganizerId']);   
}); 
