<?php

use App\Http\Controllers\ApiUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::middleware('auth:sanctum')->group(function (){
    Route::get('user/{id}',[ApiUserController::class,'index']);
    Route::get('list/{id}',[ApiUserController::class,'List']); 
    Route::post('upload',[ApiUserController::class,'Upload']);
});
Route::post('/auth/register', [ApiUserController::class, 'createUser']);
Route::post('/auth/login', [ApiUserController::class, 'loginUser']);