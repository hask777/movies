<?php



Route::get('/', 'MoviesController@index')->name('movies.index');
Route::get('/{movie}', 'MoviesController@show')->name('movies.show');
