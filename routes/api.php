<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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
Route::get('logout',function(){
    $data=[
        'status'=>false,
        'message'=>'Anda telah keluar dari Aplikasi'
    ];
    return response()->json($data);
})->name('logout');

Route::group(['middleware' => 'cors'], function () {
    Route::post('/auth/login',[AuthController::class,'login']);
    Route::post('/auth/register',[AuthController::class,'register']);
    Route::group(['prefix'=>'admin',"middleware"=>"role:admin"], function(){
        Route::get('/getuser',[UserController::class,'GetUser']);
        
        Route::get('/getmovie',[MovieController::class,'getMovie']);
        Route::post('/insertmovie',[MovieController::class,'insertMovie']);
        Route::post('/updatemovie/{id}',[MovieController::class,'insertMovie']);
        Route::delete('/hapusmovie/{id}',[MovieController::class,'hapusMovie']);
    });
});

