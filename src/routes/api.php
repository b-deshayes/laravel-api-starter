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

Route::prefix('v1')->namespace('Api\V1')->name('api.v1.')->group(static function () {
   Route::post('auth/login', 'AuthController@login')->name('auth.login');
   Route::post('auth/register', 'AuthController@register')->name('auth.register');
   Route::get('auth/@me', 'AuthController@me')->name('auth.me');
});
