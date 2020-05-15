<?php

// Movies
Route::get('/', 'MoviesController@index')->name('movies.index');
Route::get('/movies/{id}', 'MoviesController@show')->name('movies.show');
Route::get('/popular', 'PopularController@index')->name('popular.index');
Route::get('/nowplaying', 'NowPlayingController@index')->name('movies.nowplaying');
Route::get('/toprated', 'TopRatedController@index')->name('movies.toprated');
Route::get('/future/list', 'FutureMovieController@index')->name('future.index');

Route::get('/genres/genre', 'GenresController@index')->name('genres.index');

Route::get('/years/year', 'YearController@index')->name('year.index');
Route::get('/countries/country', 'CountryController@index')->name('country.index');


