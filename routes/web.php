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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/discover_intro/{username}', 'ProfileController@returnDiscover');

Route::get('/profile/{username}/about','ProfileController@profile')->name('profile');

Route::get('/profile/{username}/about','ProfileController@about');

Route::get('/profile/settings/{username}','ProfileController@edit');

Route::put('user/settings/{id}','ProfileController@update');

Route::post('/discover/{username}', 'DiscoverController@index');

Route::get('/profile/follow/{username}', 'ProfileController@followUser');

Route::resource('genre', 'GenreController',['except'=>['create']]);