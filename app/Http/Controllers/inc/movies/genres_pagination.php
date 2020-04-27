<?php


$i = 1;
$pages = [];

while($i< 5){
    $movie = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/discover/movie?with_genres='. $genre_id .'&page='.$i++.'&append_to_response=&language=ru')
        ->json()['results'];

    foreach ($movie as $page):
        array_push($pages, $page);
    endforeach;             
}

$genres_paginate = $this->paginate($pages);