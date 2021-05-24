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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Test
Route::get('data', 'apitest@apitest');

// Api register
Route::post('register', 'UsershopController@register');
// Login 
Route::post('login', 'UsershopController@login_user');
// Logout 
Route::get('logout', 'UsershopController@logout_user');