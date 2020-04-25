<?php

Route::get('/', 'MoviesController@index')->name('movies.index');
Route::get('/{movie}', 'MoviesController@show')->name('movies.show');
Route::get('/genres/genre', 'GenresController@index')->name('genres.index');
Route::get('/years/year', 'YearController@index')->name('year.index');
Route::get('/countries/country', 'CountryController@index')->name('country.index');