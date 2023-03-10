<?php

use App\Http\Controllers\Api\ApiHomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TestController;

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

Route::post('/login', [AuthController::class,'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/test', [TestController::class,'test']);
    Route::get('/home', [ApiHomeController::class,'index']);
});
 