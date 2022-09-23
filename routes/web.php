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


Route::group(['middleware' => 'auth'], function(){
    //ホーム画面
    Route::get('/', 'PostController@index');
    
    //投稿詳細画面
    Route::get('/posts/{post}', 'PostController@show')->where('post', '[0-9]+');
    
    //投稿作成画面
    Route::get('/posts/create', 'PostController@create');
    //データ保存
    Route::post('/posts', 'PostController@store');
    
    //各カテゴリー画面
    Route::get('/categories/{category}', 'CategoryController@index')->where('category', '[0-9]+');
    
    //各都道府県の画面
    Route::get('/places/{place}', 'PlaceController@index')->where('place', '[0-9]+');
    
    //各月の画面
    Route::get('/months/{month}', 'MonthController@index')->where('month', '[0-9]+');
    
    //各ユーザーの画面
    Route::get('/users/{user}', 'UserController@index')->where('user', '[0-9]+');
    
    //投稿詳細編集画面
    Route::get('/posts/{post}/edit', 'PostController@edit')->where('post', '[0-9]+');
    //編集データ保存
    Route::put('/posts/{post}', 'PostController@update');
    
    //投稿削除
    Route::delete('/posts/{post}', 'PostController@delete');
    
    //検索画面
    Route::get('/searches', 'PostController@searchIndex');
    Route::get('/searches/search', 'PostController@search');
    
});
    


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
