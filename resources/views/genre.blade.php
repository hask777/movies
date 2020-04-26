@extends('layouts.main')

@section('content')
    <div class="container flex mx-auto px-4 mt-6">
        <div class="flex mr-8">
            @include('partials.filter')
        </div>
        <div class="popular_movies w-80%">
            <div class="flex movies_header justify-between items-center">
                <h2 class='movies_header_title tracking-wider text-orange-500 text-2xl  text-center font-semibold'>Жанр: {{$genre_name}}</h2>
                <div class="movies_page_count">
                    показывать по : 20
                </div>
                <div class="movies_page_style">
                    выбрать стиль
                </div>
            
                {{ $genres_paginate->links() }}
            </div>

            <div class="flex mt-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @foreach($genres_paginate as $movie)
                        <x-movie-card :movie="$movie" :genres="$genres"/>
                    @endforeach

                    <div class="movies_page_pagination">
                        {{ $genres_paginate->links() }}
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    
@endsection
