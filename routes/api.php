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

Route::post('/', '\App\Http\Controllers\IndexController@index');
Route::get('/get_all_records', '\App\Http\Controllers\IndexController@getAll');
Route::get('/{key}', '\App\Http\Controllers\IndexController@getValue');


