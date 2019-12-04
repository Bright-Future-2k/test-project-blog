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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('profiles')->group(function (){
    Route::get('/','ProfileController@index')->name('profiles.list');
    Route::get('/create','ProfileController@create')->name('profiles.create');
    Route::post('/store','ProfileController@store')->name('profiles.store');
    Route::get('/edit/{id}','ProfileController@edit')->name('profiles.edit');
    Route::post('/update/{id}','ProfileController@update')->name('profiles.update');
    Route::get('/destroy/{id}','ProfileController@destroy')->name('profiles.destroy');
});
Route::group(['prefix' => 'posts'], function (){
   Route::get('/','PostController@index')->name('posts.list');
   Route::get('/create', 'PostController@create')->name('posts.create');
   Route::post('/create','PostController@store')->name('posts.store');
   Route::get('/{id}/edit', 'PostController@edit')->name('posts.edit');
   Route::post('/{id}/update', 'PostController@update')->name('posts.update');
   Route::get('/{id}/destroy', 'PostController@destroy')->name('posts.destroy');
});
