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
    Route::delete('auth/logout', 'AuthController@logout')->name('auth.logout');
    Route::post('auth/register', 'AuthController@register')->name('auth.register');
    Route::get('auth/@me', 'AuthController@profile')->name('auth.me');
    Route::post('auth/refresh', 'AuthController@refresh')->name('auth.refresh');

    Route::get('settings', 'SettingController@index')->name('settings.index');
    Route::get('settings/{key}', 'SettingController@show')->name('settings.show');
    Route::patch('settings/{key}', 'SettingController@edit')->name('settings.edit');
});
