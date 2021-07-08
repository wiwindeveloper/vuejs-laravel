<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [AuthController::class, 'index']);
Route::post('/users', [AuthController::class, 'store']);
Route::get('/users/{id}', [AuthController::class, 'show']);
Route::delete('/users/{id}', [AuthController::class, 'destroy']);
Route::put('/users/{id}', [AuthController::class, 'update']);

Route::post('/users/photo/{id}', [UserController::class, 'upload']);

//TODO LIST
Route::get('/items', [ItemController::class, 'index']);
Route::prefix('/item')->group( function () {
    Route::post('/store', [ItemController::class, 'store']);
    Route::put('/{id}', [ItemController::class, 'update']);
    Route::delete('/{id}', [ItemController::class, 'destroy']);
});