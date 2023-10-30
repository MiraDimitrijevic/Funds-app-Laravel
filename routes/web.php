<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FundController;
use App\Http\Controllers\FundAllDataController;
use App\Http\Controllers\FavoriteFundsController;

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
    return view('fundData');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/favorites', function () {
    return view('favorites');
});
 
Route::get('guestfunds', [FundController::class, 'index'])->name('guestfunds.index');
Route::get('userfunds', [FundAllDataController::class, 'index'])->name('userfunds.index');
Route::get('favfund', [FavoriteFundsController::class, 'index'])->name('favfund.index');
Route::post('favfund', [FavoriteFundsController::class,'store'])->name('favfund.store');
Route::delete('favfund/destroy/{id}/', [FavoriteFundsController::class,'destroy']);


require __DIR__.'/auth.php';
