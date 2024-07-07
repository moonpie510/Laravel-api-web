<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'App\Http\Controllers\Auth', 'prefix' => 'auth'], function () {
    Route::post('/register', 'AuthController@register');
    Route::post('/login', 'AuthController@login');
    Route::get('/logout', 'AuthController@logout');
});

Route::group(['namespace' => 'App\Http\Controllers\Event', 'prefix' => 'events', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', 'EventController@index');
    Route::post('/', 'EventController@store');
    Route::patch('/{event}/update', 'EventController@update');
    Route::delete('/{event}', 'EventController@destroy');
});
