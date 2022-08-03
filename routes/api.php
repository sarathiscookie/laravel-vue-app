<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BookableAvailabilityController;
use App\Http\Controllers\API\BookableController;
use App\Http\Controllers\API\BookableReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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

// Route for register and login.
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/login', [AuthController::class, 'login'])->name('login');

// Route groups 
Route::middleware(['auth:sanctum'])->group(function () {

    Route::resource('/users', UserController::class);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// apiResource automatically exclude create and edit.
Route::apiResource('bookables', BookableController::class)->only(['index', 'show']);

Route::get('/bookables/{bookable}/availability', BookableAvailabilityController::class)->name('bookables.availability.show');

Route::get('bookables/{bookable}/reviews', BookableReviewController::class)->name('bookables.reviews.index');