<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::get('/posts/{id}',function($id){
    return response('post'.$id);
})->where('id','[0-9]+');


Route::get('/search',function(Request $request){
    {dd($request);}
});



Route::get('/functions',function(){
    return view('New_file',[
        'header' => 'Lists',
        'listing' =>[
           [ 'id' => '1',
            'title' => 'header 1',
            'description' => 'lorem is a default text used for dummy paragraph this is very useful for every coder that there is no need for typing everything.',
        ],
        [ 'id' => '1',
        'title' => 'header 1',
        'description' => 'lorem is a default text used for dummy paragraph this is very useful for every coder that there is no need for typing everything.',
]  

        ]
    ]);
});