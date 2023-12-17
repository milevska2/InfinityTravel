<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OfferController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RequestController;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('offers', OfferController::class);

// In routes/web.php


Route::get('/register', [RegistrationController::class, 'create'])->name('register.create');
Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');
Route::post('/users/create', [UserController::class, 'create'])->middleware('auth:sanctum');


Route::resource('destinations', DestinationController::class);
Route::resource('accommodations', AccommodationController::class);

Route::resource('requests', RequestController::class);

