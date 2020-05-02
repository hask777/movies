@extends('layouts.main')

@section('content')
    <div class="container flex mx-auto px-4 mt-6 mb-8">
        <div class="left_sidebar mr-8">
            @include('partials.filter')
            @include('partials.sidebar')
        </div>
        <div class="popular_movies w-80%">
            <div class="flex movies_header justify-between items-center">
                <h2 class='movies_header_title capitalize tracking-wider text-orange-500 text-2xl  text-center font-semibold'>Популярные</h2>     
                @include('partials.styles')
            </div>

            <div class="flex mt-5 mb-5">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @foreach($movies_paginate as $movie)
                        <x-movie-card :movie="$movie" :genres="$genres"/>
                    @endforeach              
                </div>        
            </div>

            <div class="movie_page_pagination">
                {{ $movies_paginate->links() }}
            </div>
        </div>
    </div>
@endsection
