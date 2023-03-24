<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('create-tariff', [\App\Http\Controllers\TariffController::class, 'createTariff']);
Route::get('tariffs/all', [\App\Http\Controllers\TariffController::class, 'getAllTariffs']);

Route::get('credit-accounts', [\App\Http\Controllers\CreditController::class, 'creditAccounts']);
Route::get('credit-accounts/{id}', [\App\Http\Controllers\CreditController::class, 'detailsCreditAccount'])->where('id', '[0-9]+');
Route::post('create-credit-account', [\App\Http\Controllers\CreditController::class, 'createCreditAccount']);
Route::post('withdrawal-credit-account', [\App\Http\Controllers\CreditController::class, 'withdrawalCreditAccount']);
Route::post('fill-credit-account', [\App\Http\Controllers\CreditController::class, 'fillCreditAccount']);
