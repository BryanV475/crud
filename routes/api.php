<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/books', 'App\Http\Controllers\ApiController@index');
Route::post('/books', 'App\Http\Controllers\ApiController@store');
Route::get('/books/{id}', 'App\Http\Controllers\ApiController@show');
Route::put('/books/{id}', 'App\Http\Controllers\ApiController@update');
Route::delete('/books/{id}', 'App\Http\Controllers\ApiController@destroy');
