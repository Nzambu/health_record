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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'middleware' => 'api'
], function($router){
    /*
    |--------------------------------------------------------------------------
    | Authentication Routes - login, forgot password && change password
    |--------------------------------------------------------------------------
    | The routes address login, forgot and change password
    |
    */
    Route::post('login', ['App\Http\Controllers\Auth\JWTController', 'login']); 
    Route::post('forgot_password', ['App\Http\Controllers\Auth\JWTController','forgotPassword']);
    Route::post('change_password/{$link}', ['App\Http\Controllers\Auth\JWTController','changePassword']);
});

Route::group(['middleware' => 'auth:api', 'as' => 'auth'], function ()
{
    /*
    |--------------------------------------------------------------------------
    | Authentication Routes - refresh, logout
    |--------------------------------------------------------------------------
    | The routes address refreshing access token and user log out
    |
    */
    // Route::get('refresh', ['App\Http\Controllers\Auth\JWTController', 'refreshToken']); 
    // Route::get('logout', ['App\Http\Controllers\Auth\JWTController', 'logout']); 

    /*
    |--------------------------------------------------------------------------
    | User Routes - profile, registration, update
    |--------------------------------------------------------------------------
    | The routes address membership
    |
    */
    Route::get('profile', ['App\Http\Controllers\UserController', 'profile']);
    Route::post('update_profile', ['App\Http\Controllers\UserController', 'updateProfile']);

    /*
    |--------------------------------------------------------------------------
    | Service Routes - get services
    |--------------------------------------------------------------------------
    | The route address get all services
    |
    */
    Route::get('service', ['App\Http\Controllers\ServiceController', 'index']);

    /*
    |--------------------------------------------------------------------------
    | Gender Routes - get services
    |--------------------------------------------------------------------------
    | The route address get all genders
    |
    */
    Route::get('gender', ['App\Http\Controllers\GenderController', 'index']);

    /*
    |--------------------------------------------------------------------------
    | Patient Routes - get services
    |--------------------------------------------------------------------------
    | The route address get all genders
    |
    */
    Route::apiResource('patient', 'App\Http\Controllers\PatientController');
});
