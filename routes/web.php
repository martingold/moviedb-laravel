<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomepageController@overview')->name('homepage_overview');

Route::get('uzivatele', 'UserController@list')->name('user_list');

Route::get('filmy', 'MovieController@list')->name('movie_list');
Route::get('film/{slug}/ohodnotit', 'MovieController@rate')->name('movie_comment');
Route::post('film/{slug}/ohodnotit', 'MovieController@handleRate')->name('movie_comment');
Route::get('film/{slug}', 'MovieController@detail')->name('movie_detail');
Route::get('pridate-film', 'MovieController@add')->name('movie_add');

Route::get('prihlaseni', 'SignController@in')->name('sign_in');
Route::post('prihlaseni', 'SignController@handleIn')->name('handle_sign_in');
Route::get('registrace', 'SignController@up')->name('sign_up');
Route::post('registrace', 'SignController@handleUp')->name('handle_sign_up');
Route::get('odhlaseni', 'SignController@out')->name('sign_out');
