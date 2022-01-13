<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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



Route::prefix('api')->group(function () {
    Route::prefix('v1')->group(function () {
        Route::middleware(['authorize'])->group(function () {
            Route::prefix('admin')->group(function () {
                Route::post('/send-invitation', [AdminController::class, 'sendInvitation']);
            });
        });
    });
});

Route::get('/register', [UserController::class, 'register']);