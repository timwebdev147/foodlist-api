<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\ChefController;

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

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::resource('foods', FoodController::class);
Route::resource('chefs', ChefController::class);


Route::group(['middleware' => 'auth:api'], function(){
    Route::post('user-details', [UserController::class, 'userDetails']);
   });
