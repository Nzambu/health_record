<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|-----------------------------------------------------------------------------------------------------------------------------
| API Routes
|-----------------------------------------------------------------------------------------------------------------------------
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
    |-----------------------------------------------------------------------------------------------------------------------------
    | Authentication Routes - login, forgot password && change password
    |-----------------------------------------------------------------------------------------------------------------------------
    | The routes address login, forgot and change password
    |
    */
    Route::post('login', ['App\Http\Controllers\Auth\JWTController', 'login']); 
    Route::post('forgot_password', ['App\Http\Controllers\Auth\JWTController','forgotPassword']);    

     /*
    |-----------------------------------------------------------------------------------------------------------------------------
    | Authentication Routes - refresh, logout
    |-----------------------------------------------------------------------------------------------------------------------------
    | The routes address refreshing access token and user log out
    |
    */
    Route::post('verify_reset_password_token', ['App\Http\Controllers\ResetPasswordController', 'verifyResetPasswordToken']);
    Route::post('change_password', ['App\Http\Controllers\ResetPasswordController','changePassword']);
    
});

Route::group(['middleware' => 'auth:api', 'as' => 'auth'], function ()
{ 
    /*
    |-----------------------------------------------------------------------------------------------------------------------------
    | Authentication Routes - refresh, logout, profile change password
    |-----------------------------------------------------------------------------------------------------------------------------
    | The routes address refreshing access token, user log out, change password while logged in
    |
    */
    Route::get('refresh', ['App\Http\Controllers\Auth\JWTController', 'refreshToken']); 
    Route::get('logout', ['App\Http\Controllers\Auth\JWTController', 'logout']); 
    Route::post('profile_change_password', ['App\Http\Controllers\ResetPasswordController', 'profileChangePassword']);

    /*
    |-----------------------------------------------------------------------------------------------------------------------------
    | User Routes - profile, registration, update
    |-----------------------------------------------------------------------------------------------------------------------------
    | The routes address membership
    |
    */
    Route::get('profile', ['App\Http\Controllers\UserController', 'profile']);
    Route::post('update_profile', ['App\Http\Controllers\UserController', 'updateProfile']);

    /*
    |-----------------------------------------------------------------------------------------------------------------------------
    | User Email Routes - CRUD
    |-----------------------------------------------------------------------------------------------------------------------------
    | The routes controll email records
    |
    */
    Route::post('switch_primary_email', ['App\Http\Controllers\EmailController', 'switchPrimaryEmail']);
    Route::apiResource('email', 'App\Http\Controllers\EmailController');

    /*
    |-----------------------------------------------------------------------------------------------------------------------------
    | User Phone Routes - CRUD, switch primary phone
    |-----------------------------------------------------------------------------------------------------------------------------
    | The routes controll phone records
    |
    */
    Route::post('switch_primary_phone', ['App\Http\Controllers\PhoneController', 'switchPrimaryPhone']);
    Route::apiResource('phone', 'App\Http\Controllers\PhoneController');

    /*
    |-----------------------------------------------------------------------------------------------------------------------------
    | Service Routes - get services
    |-----------------------------------------------------------------------------------------------------------------------------
    | The route address get all services
    |
    */
    Route::get('service', ['App\Http\Controllers\ServiceController', 'index']);

    /*
    |-----------------------------------------------------------------------------------------------------------------------------
    | Gender Routes - get services
    |-----------------------------------------------------------------------------------------------------------------------------
    | The route address get all genders
    |
    */
    Route::get('gender', ['App\Http\Controllers\GenderController', 'index']);

    /*
    |-----------------------------------------------------------------------------------------------------------------------------
    | Patient Routes - get services
    |-----------------------------------------------------------------------------------------------------------------------------
    | The route address get all genders
    |
    */
    Route::apiResource('patient', 'App\Http\Controllers\PatientController');
});
