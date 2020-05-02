@extends('layouts.main')

@section('content')
    <div class="container flex mx-auto px-4 mt-6 mb-8">
        @include('partials.left-sidebar')
        <div class="popular_movies w-80%">
            <div class="flex movies_header justify-between items-center">
                <h2 class='movies_header_title tracking-wider text-orange-500 text-2xl  text-center font-semibold'>Год: {{$year_name}}</h2>
                
                @include('partials.styles')

            </div>

            <div class="flex mt-5">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @foreach($years_paginate as $movie)
                        <x-movie-card :movie="$movie" :genres="$genres"/>
                    @endforeach

                    <div class="movie_page_pagination">
                        @php
                            if(!empty($_GET['year'])){
                                $year = $_GET['year'];
        
                                echo $years_paginate->appends([
                                    'year' => $year,])
                                    ->links();
                            }
                        @endphp
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    
@endsection
