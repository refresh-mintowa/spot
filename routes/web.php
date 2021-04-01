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

Auth::routes();

Route::middleware('auth')->group(function(){
    
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'PostController@index');
    Route::get('/list', 'PostController@list');
    Route::get('/create', 'PostController@create');
    Route::get('/{post}', 'PostController@show');
    Route::get('/{post}/edit', 'PostController@edit');
    Route::put('/{post}', 'PostController@update');
    
    Route::post('/save', 'PostController@save');
    
    Route::post('/search', 'PostController@search');
    Route::get('/results', 'PostController@results');
});

