<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CreditCardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventDetailController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\TicketController;
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
<<<<<<< HEAD

=======
>>>>>>> fa1f02d7f5eed7cd883b4611ac6c301458584a9b
    Route::prefix('/events')->group(function () {
        Route::post('/', [EventController::class, 'store']);
        Route::get('/getEvent', [EventController::class, 'getAllEvents']);
        // Route::get('/{eventId}', [EventController::class, 'getEventId']);

        Route::prefix('/edits')->group(function () {
            Route::get('/infor/{eventId}', [EventController::class, 'getEditInfor']);
        });

        Route::put('/update', [EventController::class, 'update']);

        Route::prefix('/previews')->group(function () {
            Route::get('/', [EventController::class, 'getOrganizerEvents']);
            Route::put('/{id}/{is_public}', [EventController::class, 'postPreviewEvent']);
        });
    });
<<<<<<< HEAD
    Route::get('/tickets', [TicketController::class, 'getAllTicket']);
    Route::get('/tickets/search/{name}', [TicketController::class, 'searchTicket']);

    Route::get('/notifications', [NotificationController::class, 'notifications']);
=======


    // ---- ticket with token-----
    Route::prefix('/tickets')->group(function () {
        Route::get('/', [TicketController::class, 'getAllTicket']);
        Route::get('/search/{name}', [TicketController::class, 'searchTicket']);
        Route::get('/scan/{eventId}', [TicketController::class, 'getTicketByEventId']);
    });
>>>>>>> fa1f02d7f5eed7cd883b4611ac6c301458584a9b
});

// ----- authentication group----
Route::prefix('auth')->group(function () {
    Route::post('/google',  [GoogleAuthController::class, 'googleLogin']);
    Route::post('/registers', ([AuthController::class, 'register']));
    Route::post('/login', ([AuthController::class, 'login']));
});
// Route::get('/tickets', 'TicketController@getAllTicket')->middleware('auth:api');

Route::prefix('/booking')->group(function () {
    Route::post('/creditCard', [CreditCardController::class, 'store']);
});

// Route::get('/tickets', [TicketController::class, 'getAllTicket']);

//-------search for events------------
Route::prefix('/events')->group(function () {
    Route::get('/{id}', [EventController::class, 'getEventById']);
    Route::get('/organizer/{organizerId}', [EventController::class, 'getOrganizerId']);
    Route::get('/', ([EventController::class, 'getEvents']));
    Route::get('/category/{categoryId}/{eventId}', [EventController::class, 'getEventsByCategory']);
    Route::get('/agenda/{eventId}', [AgendaController::class, 'getAgendaByEventId']);

    Route::prefix('/booking')->group(function () {
        Route::get('/{eventId}', [EventController::class, 'booking']);
    });
    Route::prefix('/recommend')->group(function () {
        Route::get('/{lat}/{lng}/{km}', [EventController::class, 'getEventsWithinRadius']);
    });
});
Route::prefix('/search')->group(function () {
    Route::prefix('/customer')->group(function () {
        Route::get('/events', [EventController::class, 'searchEventsNotDeadline']);
    });
});
Route::prefix('/eventDetail')->group(function () {
    Route::get('/{eventId}', [EventDetailController::class, 'getEventDetail']);
});

// Route::get('/customer/paginate', ([EventController::class, 'getEventsPaginate']));
Route::get('/categories', [CategoryController::class, 'getAllCategory']);
<<<<<<< HEAD
Route::get('/eventDetail/{eventId}', [EventDetailController::class, 'getEventDetail']);
=======
>>>>>>> fa1f02d7f5eed7cd883b4611ac6c301458584a9b
