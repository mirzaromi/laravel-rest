<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\TransactionController;
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
Route::post('transaction/test/{requestId}', [TransactionController::class, 'createTransaction']);
Route::apiResource('transaction', TransactionController::class);

Route::controller(AuthController::class)->group(function (){
    Route::post('auth/register/', 'register');
    Route::post('auth/login/', 'login');
    Route::middleware(['auth'])->group(function (){
        Route::post('auth/logout/', 'logout');
        Route::get('auth/user/', 'getUser');
    });
});
