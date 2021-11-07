<?php

use App\Http\Controllers\Api\EnderecoController;
use App\Http\Controllers\CityController;
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

Route::get('/cities', [CityController::class, 'getAllCities']);
Route::post('/import', [CityController::class, 'importCities']);
Route::post('/cities', [CityController::class, 'store']);

Route::resource('endereco', EnderecoController::class)->except(['update']);
Route::post('/endereco/{id}', [EnderecoController::class, 'update']);
