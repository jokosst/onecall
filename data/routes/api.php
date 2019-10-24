<?php

use Illuminate\Http\Request;

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

Route::get('/oc_fcc','ApiController@oc_fcc');
Route::get('/sales','ApiController@sales');
Route::get('/order','ApiController@order');
Route::get('/all','ApiController@all');
Route::post('/tambah_follow','ApiController@tambah_follow');

