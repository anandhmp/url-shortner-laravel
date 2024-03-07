<?php

use App\Http\Controllers\UrlsController;
use Illuminate\Support\Facades\Route; 
use Illuminate\Support\Facades\Auth; 
use App\Http\Controllers\HomeController;


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


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function (){

        Route::get('/create',[UrlsController::class,'Getlink'])->name('create');
        Route::post('create',[UrlsController::class,'store']) -> name('create.post');
        Route::get('create/{id}/edit',[UrlsController::class,'edit'])->name('update');
        Route::put('create/{id}/updated',[UrlsController::class,'update'])->name('update.post');
        Route::get('create/{id}/delete',[UrlsController::class,'destroy'])->name('delete.post');
        Route::get('{code}',[UrlsController::class,'shortenlink']) -> name('stores');

});
?>