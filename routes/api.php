<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AddressController;

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

// Clients' routes

Route::get('/clients', [ClientController::class, 'getClients']);
Route::get('/client/{id}', [ClientController::class, 'getClient']);

Route::post('/client/store', [ClientController::class, 'store']);
Route::put('/client/update/{client}', [ClientController::class, 'update']);
Route::delete('/client/delete/{client}', [ClientController::class, 'destroy']);

// Addresses' routes

Route::get('/addresses', [AddressController::class, 'getAddresses']);
Route::get('/address/{id}', [AddressController::class, 'getAddress']);
Route::get('/address/client/{id}', [AddressController::class, 'getAddressesPerClient']);

Route::post('/address/store', [AddressController::class, 'store']);
Route::put('/address/update/{address}', [AddressController::class, 'update']);
Route::delete('/address/delete/{address}', [AddressController::class, 'destroy']);
