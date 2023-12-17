<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\Api\OfferController;
use App\Http\Controllers\Api\AccommodationController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\PlaneTicketController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('api/subscription', [SubscriptionController::class, 'subscribe'])->name('subscription.subscribe');

Route::get('offer/{id}', [OfferController::class, 'getOfferDetails']);
Route::get('/current-offers', [OfferController::class, 'getCurrentOffers']);

Route::get('accommodations/{destination}', [AccommodationController::class, 'getAllAccommodationsByDestination']);
Route::get('accommodations/category/{type}', [AccommodationController::class, 'getAllAccommodationsByType']);
Route::get('accommodations/{id}', [AccommodationController::class, 'getAccommodationDetails']);

Route::post('/subscription', [SubscriberController::class, 'subscribe'])->name('subscribe');

Route::post('/submit-plane-ticket', [PlaneTicketController::class, 'submitPlaneTicket']);


