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
// Routes for the account
Route::middleware('auth:api')->get('/account', function (Request $request) {
    return $request->user()->account;
});
Route::post('accountInformation', [App\Http\Controllers\AccountController::class, 'update']);

//Routes for the billing information
Route::middleware('auth:api')->get('/billing', function (Request $request) {
    return $request->user()->billingInformation;
});
Route::post('billingInfoUpdate', [App\Http\Controllers\BillingInformationController::class, 'update']);

//Routes for the mailing information
Route::middleware('auth:api')->get('/mailing', function (Request $request) {
    return $request->user()->mailing;
});
Route::post('mailingUpdate', [App\Http\Controllers\MailingController::class, 'update']);

// Routes for the devices
Route::middleware('auth:api')->get('/devices', function (Request $request) {
    return $request->user()->devices;
});
Route::post('update-devices', [App\Http\Controllers\DeviceController::class, 'update']);
Route::post('store-devices', [App\Http\Controllers\DeviceController::class, 'store']);
Route::post('delete-devices', [App\Http\Controllers\DeviceController::class, 'delete']);

//routes for client creating and updating tickets
Route::middleware('auth:api')->get('/tickets', function (Request $request) {
    return $request->user()->tickets;
});
Route::post('create-ticket', [App\Http\Controllers\TicketController::class, 'store']);
Route::post('update-ticket', [App\Http\Controllers\TicketController::class, 'update']);

//Routes for intake to see unassigned, assigned, and completed tickets
Route::post('unassigned', [App\Http\Controllers\TicketController::class, 'unassignedTickets']);
Route::post('assigned', [App\Http\Controllers\TicketController::class, 'assignedTickets']);
Route::post('completed', [App\Http\Controllers\TicketController::class, 'completedTickets']);

//Routes for intake to assign tickets
Route::post('/assign', [App\Http\Controllers\TicketController::class, 'assign']);

//Routes for developer to help client and close tickets
Route::post('/completeTicket', [App\Http\Controllers\TicketController::class, 'completeTicket']);


//Route group for authentication.
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('register', [App\Http\Controllers\AuthController::class, 'register']);
    Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);
    Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('refresh', [App\Http\Controllers\AuthController::class, 'refresh']);
    Route::post('changePassword', [App\Http\Controllers\AuthController::class, 'changePassword']);
});


