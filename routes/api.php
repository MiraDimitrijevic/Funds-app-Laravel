<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FundController;
use App\Http\Controllers\FundAllDataController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriteFundsController;


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
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::resource('guestfunds', FundController::class)->only('index');
 
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });


    Route::resource('userfunds', FundAllDataController::class)->only('index');
    Route::resource('favfund', FavoriteFundsController::class)->only(['store','destroy','index']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

