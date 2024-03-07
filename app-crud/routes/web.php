<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',[ProductController::class,'index'])-> name('Product');
Route::get('/create',[ProductController::class,'create'])-> name('Create');
Route::post('/post',[ProductController::class,'store']) -> name('store');
