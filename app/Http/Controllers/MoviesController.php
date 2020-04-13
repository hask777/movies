<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popularMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/popular?append_to_response=&language=ru')
            ->json()['results'];

        $nowPlayingMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/now_playing?append_to_response=&language=ru')
            ->json()['results'];

        $genresArray = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list?append_to_response=&language=ru')
            ->json()['genres'];

        $genres = collect($genresArray)->mapWithKeys(function($genre){
            return [$genre['id'] => $genre['name']];
        });

        $collection = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/collection/10')
            ->json();

            // dump($genresArray);
            

        return view('index', [
            'popularMovies' => $popularMovies,
            'genres' => $genres,
            'nowPlayingMovies' => $nowPlayingMovies,
            'collection' => $collection
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/'. $id . '?append_to_response=credits,videos,images&language=ru')
            ->json();

            // Запрос к videocdn title=$title

           $videos = Http::get('https://videocdn.tv/api/movies?api_token=lTf8tBnZLmO0nHTyRaSlvGI5UH1ddZ2f&query='.$movie['original_title'].'&limit=10')
           ->json()['data'];

           // $kinopoisk = Http::get('https://www.kinopoisk.ru/handler_search.php?ajax=1&q=terminator&topsuggest=true')
           // ->json();

           // dump($kinopoisk);

           return view('show', [
               'movie' => $movie,
               'videos' => $videos
           ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
