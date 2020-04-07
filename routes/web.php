<?php

// use Illuminate\Support\Facades\Route;
//
// Route::view('/', 'index');

Route::get('/', 'MoviesController@index')->name('movies.index');
Route::get('/movies/{movie}', 'MoviesController@show')->name('movies.show');
