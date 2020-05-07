<?php

// Movies
Route::get('/', 'MoviesController@index')->name('movies.index');
Route::get('/movies/{id}', 'MoviesController@show')->name('movies.show');

Route::get('/genres/genre', 'GenresController@index')->name('genres.index');

Route::get('/years/year', 'YearController@index')->name('year.index');
Route::get('/countries/country', 'CountryController@index')->name('country.index');
Route::get('/future/list', 'FutureMovieController@index')->name('future.index');

// TVs
Route::get('/tv', 'TvController@index')->name('tv.index');
Route::get('/tv/{id}', 'TvController@show')->name('tv.show');