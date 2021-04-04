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
    Route::get('/list', 'PostController@list')->name('list');
    Route::get('/create', 'PostController@create');
    Route::get('/like', function(){
        
         $search_result = \Session::get('search_results');
         $search_result_count = \Session::get('search_results_count');
         $category = \Session::get('category');
         $pref = \Session::get('pref');
         $word = \Session::get('word');
         $post = \Session::get('post');
         
         return view('results')->with(['search_results'=>$search_result,'search_result_count'=>$search_result_count,'category'=>$category,'pref'=>$pref,'word'=>$word,'post'=>$post]);
    });
    Route::get('/{post}', 'PostController@show');
    Route::get('/{post}/edit', 'PostController@edit');
    Route::put('/{post}', 'PostController@update');
    
    Route::post('/save', 'PostController@save');
    
    Route::post('/search', 'PostController@search')->name('search');
     
    // Route::get('/results', 'PostController@results')->name('results');
    
    Route::post('/{post}/favorites', 'FavoriteController@store')->name('favorites');
    Route::post('/{post}/unfavorites', 'FavoriteController@destroy')->name('unfavorites');
});

