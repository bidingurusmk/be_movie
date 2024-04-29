<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'cors'], function () {
    Route::get('/getmovie',[MovieController::class,'getMovie']);
    Route::post('/insertmovie',[MovieController::class,'insertMovie']);
    Route::post('/updatemovie/{id}',[MovieController::class,'insertMovie']);
    Route::delete('/hapusmovie/{id}',[MovieController::class,'hapusMovie']);
    Route::post('/auth/login',[AuthController::class,'login']);
    Route::post('/auth/register',[AuthController::class,'register']);
});

