<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

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
Route::get('/getmovie',['middleware' => 'cors'],[MovieController::class,'getMovie']);
Route::post('/insertmovie',['middleware' => 'cors'],[MovieController::class,'insertMovie']);
Route::post('/updatemovie/{id}',['middleware' => 'cors'],[MovieController::class,'insertMovie']);
