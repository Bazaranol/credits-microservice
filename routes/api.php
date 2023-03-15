<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('create-tariff', [\App\Http\Controllers\TariffController::class, 'createTariff']);
Route::get('getTariffs', [\App\Http\Controllers\TariffController::class, 'getAllTariffs']);

Route::post('create-credit-account', [\App\Http\Controllers\CreditController::class, 'createCreditAccount']);
Route::get('details-credit-account', [\App\Http\Controllers\CreditController::class, 'detailsCreditAccount']);
Route::post('withdrawal-credit-account', [\App\Http\Controllers\CreditController::class, 'withdrawalCreditAccount']);
Route::post('fill-credit-account', [\App\Http\Controllers\CreditController::class, 'fillCreditAccount']);

