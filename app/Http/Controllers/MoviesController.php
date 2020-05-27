<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        include 'inc/popular.php';
        include 'inc/nowplaying.php';
        include 'inc/top_rated.php';
        include 'inc/upcoming.php';
        include 'inc/genres.php';
        include 'inc/years.php';
        include 'inc/countries.php';
        include 'inc/sidebar.php';
        include 'inc/movies/popular_pagination.php';

        dump($popularMovies);
            
        return view('movies.index', [
            'popularMovies' => $popularMovies,
            'nowPlayingMovies' => $nowPlayingMovies,
            'top_rated' => $top_rated,
            'upcoming' => $upcoming,
            'genresArray' => $genresArray,
            'genres' => $genres,
            'countries' => $countries,
            'years' => $years,
            'sidebarFutureMovies' => $sidebarFutureMovies,
            'popular_paginate' => $popular_paginate
        ]);
    }

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    public function paginate($items, $perPage = 20, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
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
        include 'inc/genres.php';
        include 'inc/years.php';
        include 'inc/countries.php';
        include 'inc/sidebar.php';
        include 'inc/popular.php';
        include 'inc/movies/popular_pagination.php';

        $movie = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/'. $id . '?append_to_response=videos,images,credits&language=ru')
            ->json();

        $recomend = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/'. $id . '/recommendations?append_to_response=videos,images,credits&language=ru')
            ->json()['results'];

        dump($recomend);  

        $credits = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/'. $id . '?append_to_response=credits&language=ru')
            ->json();

        // Запрос к videocdn title=$title
        // $videos = Http::get('https://videocdn.tv/api/movies?api_token=lTf8tBnZLmO0nHTyRaSlvGI5UH1ddZ2f&field='.$movie['imdb_id'] .'&limit=10')
        //     ->json()['data'];
        //     dump($videos);
        
        $videos = Http::get('https://videocdn.tv/api/movies?api_token=lTf8tBnZLmO0nHTyRaSlvGI5UH1ddZ2f&query='.$movie['original_title'] .'&limit=10')
            ->json()['data'];
        // dump($videos);

        if(empty($videos)){
            $videos = Http::get('https://videocdn.tv/api/movies?api_token=lTf8tBnZLmO0nHTyRaSlvGI5UH1ddZ2f&query='.$movie['title'] .'&limit=10')
                ->json()['data'];
        }
        // dump($videos);

            if(!$videos){
                return view('movies.show', [
                    'recomend' => $recomend,
                    'movie' => $movie,
                    'credits' => $credits,
                    'genres' => $genres,
                    'countries' => $countries,
                    'years' => $years,
                    'sidebarFutureMovies' => $sidebarFutureMovies,
                    'videos' => 'NO'
                ]);
            }
            else
            {
                foreach($videos as $video):
                    if(!empty($video))
                    {
                        if($movie['imdb_id'] === $video['imdb_id'])
                        {
                            return view('movies.show', [
                                'recomend' => $recomend,
                                'movie' => $movie,
                                'credits' => $credits,
                                'genres' => $genres,
                                'countries' => $countries,
                                'years' => $years,
                                'sidebarFutureMovies' => $sidebarFutureMovies,               
                                'videos' => $video
                             ]);
                        }             
                    }
                    else
                    {
                        return view('movies.show', [
                            'recomend' => $recomend,
                            'movie' => $movie,
                            'credits' => $credits,
                            'genres' => $genres,
                            'countries' => $countries,
                            'years' => $years,
                            'sidebarFutureMovies' => $sidebarFutureMovies,               
                            'videos' => $video 
                            // OR No
                        ]);
                    }                    
                endforeach;
                // dd($video);     
            }
            return view('movies.show', [
                'recomend' => $recomend,
                'movie' => $movie,
                'credits' => $credits,
                'genres' => $genres,
                'countries' => $countries,
                'years' => $years,
                'sidebarFutureMovies' => $sidebarFutureMovies,                
                'videos' => $video
             ]);

             foreach($videos as $video):
                if(!empty($video))
                {
                    if($movie['imdb_id'] === $video['imdb_id'])
                    {
                        return view('movies.show', [
                            'recomend' => $recomend,
                            'movie' => $movie,
                            'credits' => $credits,
                            'genres' => $genres,
                            'countries' => $countries,
                            'years' => $years,
                            'sidebarFutureMovies' => $sidebarFutureMovies,               
                            'videos' => $video
                         ]);
                    }             
                }
                else
                {
                    return view('movies.show', [
                        'recomend' => $recomend,
                        'movie' => $movie,
                        'credits' => $credits,
                        'genres' => $genres,
                        'countries' => $countries,
                        'years' => $years,
                        'sidebarFutureMovies' => $sidebarFutureMovies,               
                        'videos' => $video 
                        // OR No
                    ]);
                }                    
            endforeach;
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
