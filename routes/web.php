<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    
    if(Auth::check()){
    	$tweets = App\Tweet::orderBy('created_at','desc')->paginate(5);
    } else {
    	$tweets = App\Tweet::where('approved',1)->orderBy('created_at','desc')->take(5)->get();
    }

    return view('welcome',['tweets'=> $tweets]);
});

Auth::routes();

Route::get('/home', function(){
	if(Auth::check()){
    	$tweets = App\Tweet::orderBy('created_at','desc')->paginate(5);
    } else {
    	$tweets = App\Tweet::where('approved',1)->orderBy('created_at','desc')->take(5)->get();
    }

    return view('home',['tweets'=> $tweets]);
})->name('home');

Route::get('/delete-tweets/{id}', 'Controller@delete');

Route::post('/store' , 'Controller@insert');
