<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\SettingController;
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
    Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login');
    Route::delete('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::post('auth/register', [AuthController::class, 'register'])->name('auth.register');
    Route::get('auth/@me', [AuthController::class, 'profile'])->name('auth.me');
    Route::post('auth/refresh', [AuthController::class, 'refresh'])->name('auth.refresh');

    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::get('settings/{key}', [SettingController::class, 'show'])->name('settings.show');
    Route::patch('settings/{key}', [SettingController::class, 'edit'])->name('settings.edit');
});
