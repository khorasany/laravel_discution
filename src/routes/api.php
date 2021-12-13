<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V01\Auth\AuthController;
use App\Http\Controllers\Api\V01\Channel\ChannelsController;

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

Route::prefix("v1/")->group(function () {

    // Authentication Routes
    Route::prefix('/auth')->group(function () {
        Route::post("/register", [AuthController::class, "register"])->name("auth.register");
        Route::post("/login", [AuthController::class, "login"])->name("auth.login");
        Route::post("/logout", [AuthController::class, 'logout'])->name("auth.logout");
        Route::get('/user', [AuthController::class, 'user'])->name('auth.user');
    });

    // Channels Routes
    Route::prefix('/channel')->group(function () {
        Route::get('/all', [ChannelsController::class, 'getAllChannelsList'])->name('channel.all');
        Route::post('/create', [ChannelsController::class, 'createNewChannel'])->name('channel.create');
        Route::post('/update', [ChannelsController::class, 'editChannel'])->name('channel.update');
    });
});
