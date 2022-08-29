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


Route::group(['middleware' => ['auth']], function(){
    
    Route::get('/', 'PostController@index');
    
    Route::get('/posts/{show}', 'PostController@show')->where('show', '[0-9]+');
    
    Route::get('/posts/create', 'PostController@create');
    
    Route::post('/posts', 'PostController@store');
    
    Route::get('/categories/{category}', 'CategoryController@index')->where('category', '[0-9]+');
    
    Route::get('/places/{place}', 'PlaceController@index')->where('place', '[0-9]+');
    
    Route::get('/posts/{post}/edit', 'PostController@edit')->where('post', '[0-9]+');
    
    Route::put('/posts/{post}', 'PostController@update');
    
    Route::delete('/posts/{post}', 'PostController@delete');
});
    


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
