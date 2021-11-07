<?php

use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\CityController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/cities', [CityController::class, 'getAllCitiesFromApi']);
Route::post('/import', [CityController::class, 'importCities']);
Route::post('/cities', [CityController::class, 'store']);
Route::get('/listcities', [CityController::class, 'getAllCitiesFromIbge']);

Route::resource('address', AddressController::class)->except(['update']);
Route::post('/address/{id}', [AddressController::class, 'update']);
