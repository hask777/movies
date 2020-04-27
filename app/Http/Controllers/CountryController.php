<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CountryController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        include 'inc/years.php';
        include 'inc/genres.php';
        include 'inc/countries.php';
        include 'inc/sidebar.php';
    
        $i = 1;
        $pages = [];

        while($i< 5){
            $movie = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/movie/popular?page='.$i++.'&language=ru-RU')
                ->json()['results'];

            foreach ($movie as $page):
                // dump($page['original_title']);
                array_push($pages, $page);
            endforeach;             
        }
       
        $movies_paginate = $this->paginate($pages);

        $country_id = $_GET['country_id'];
        $country_name = $_GET['country_name'];
        // dd($country_name);
        
        
        $countryArray = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3//discover/movie?with_original_language='.$country_id.'')
            ->json()['results'];

        // dump($countryArray);
            
        return view('country', [
            'countryArray' => $countryArray,
            'countries' => $countries,
            'country_name' => $country_name,
            'genres' => $genres,
            'years' => $years,
            'sidebarFutureMovies' => $sidebarFutureMovies,
            'movies_paginate' => $movies_paginate
        ]);
    }

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    public function paginate($items, $perPage = 20, $page = null, $options = [])
    {
        require ('inc/pagination.php');
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
        //
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
