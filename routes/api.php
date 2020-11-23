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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/account', function (Request $request) {
    return $request->user()->account;
});

Route::middleware('auth:api')->get('/billing', function (Request $request) {
    return $request->user()->billingInformation;
});

Route::middleware('auth:api')->get('/mailing', function (Request $request) {
    return $request->user()->mailing;
});

Route::post('accountInformation', [App\Http\Controllers\AccountController::class, 'update']);

Route::post('mailingUpdate', [App\Http\Controllers\MailingController::class, 'update']);

Route::post('billingInfoUpdate', [App\Http\Controllers\BillingInformationController::class, 'update']);

/*Route::group([
    'middleware' => 'api'
], function ($router){
    Route::post('register', [App\Http\Controllers\Auth\LoginController::class,'register']);
});*/


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('register', [App\Http\Controllers\AuthController::class, 'register']);
    Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);
    Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('refresh', [App\Http\Controllers\AuthController::class, 'refresh']);

    //Route::patch('accountInformation', [App\Http\Controllers\AccountController::class, 'update']);

    /*Route::group([
        'prefix' => 'billing'
        ], function($router){
        Route::post('BillingInfoIndex', 'BillingInformationController@BillingInfoIndex');
    });*/
});


