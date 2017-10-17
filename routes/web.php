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
    return view('welcome');
});

/*
| Post routes
*/
Route::get('/posts', 'PostController@index');
Route::get('/{slug}/posts', 'PostController@postChannel')->name('postChannel');

Route::group(['middleware' => 'auth'], function(){
  Route::get('/posts/create', 'PostController@create')->name('post.create');
  Route::post('/posts', 'PostController@store')->name('post.store');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
