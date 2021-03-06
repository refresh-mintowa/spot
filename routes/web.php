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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'PostController@index');
Route::post('/search', 'PostController@search')->name('search');


Route::middleware('auth')->group(function(){
    Route::get('/create', 'PostController@create');
    Route::get('/like', function(){
        
         $search_result = \Session::get('search_results');
         $category = \Session::get('category');
         $pref = \Session::get('pref');
         $word = \Session::get('word');
         
         return view('results')->with(['search_results'=>$search_result,'category'=>$category,'pref'=>$pref,'word'=>$word]);
    });
   
    Route::get('/{post}/edit', 'PostController@edit');
    Route::put('/{post}', 'PostController@update');
    Route::post('/save', 'PostController@save');
    Route::post('/{post}/favorites', 'FavoriteController@store')->name('favorites');
    Route::post('/{post}/unfavorites', 'FavoriteController@destroy')->name('unfavorites');
});

Route::get('/{post}', 'PostController@show');
Route::get('/pref/{id}', 'PostController@pref');