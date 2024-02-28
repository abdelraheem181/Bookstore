<?php

use App\Http\Controllers\PurchaseController;
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

/*---------------- PayPal Payment ---------------------------------*/
Route::post('/paypal/create-payment' , [PurchaseController::class , 'createPayment'])->name('create.paypal.pay');
Route::post('/paypal/execute-payment' , [PurchaseController::class , 'executePayment'])->name('exceute.paypal.pay');
