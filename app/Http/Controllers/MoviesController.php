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
        $popularMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/popular?page=1&language=ru-RU')
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

        $years = [
            '2020', '2019', '2018', '2017', '2016', '2015', '2014', '2013', '2012', '2011', '2010', '2009',
            '2008', '2007', '2007', '2006', '2005', '2004', '2003', '2002', '2001', '2000', '1999', '1998'
        ];

        $collection = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/collection/10')
            ->json();

        // $i = 1;
        // $pages = [];

        // while($i< 5){
        //     $movie = Http::withToken(config('services.tmdb.token'))
        //         ->get('https://api.themoviedb.org/3/movie/popular?page='.$i++.'&language=ru-RU')
        //         ->json()['results'];

        //     foreach ($movie as $page):
        //         // dump($page['original_title']);
        //         array_push($pages, $page);
        //     endforeach;             
        // }
       
        // $movies_paginate = $this->paginate($pages);
        // dump($movies_paginate);
        
        return view('index', [
            'popularMovies' => $popularMovies,
            'genres' => $genres,
            'nowPlayingMovies' => $nowPlayingMovies,
            'collection' => $collection,
            'years' => $years,
            // 'movies_paginate' => $movies_paginate

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
        $movie = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/'. $id . '?append_to_response=credits,videos,images&language=ru')
            ->json();

            // Запрос к videocdn title=$title

            $videos = Http::get('https://videocdn.tv/api/movies?api_token=lTf8tBnZLmO0nHTyRaSlvGI5UH1ddZ2f&query='.$movie['title'].'&limit=10')
            ->json()['data'];

            if(!$videos){
                return view('show', [
                    'movie' => $movie,
                    'videos' => 'NO'
                ]);
            }
            else
            {
                foreach($videos as $video):
                    if(!empty($video_item))
                    {
                        if($movie['imdb_id'] === $video['imdb_id'])
                        {
                            return view('show', [
                                'movie' => $movie,                
                                'videos' => $video
                             ]);
                        }             
                    }
                    else
                    {
                        return view('show', [
                            'movie' => $movie,                
                            'videos' => "NO"
                        ]);
                    }                    
                endforeach;
                // dd($video);      
            }
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
