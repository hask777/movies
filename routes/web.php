<?php



Route::get('/', 'MoviesController@index')->name('movies.index');
Route::get('/{movie}', 'MoviesController@show')->name('movies.show');
Route::get('/genres/genre', 'GenresController@index')->name('genres.index');
