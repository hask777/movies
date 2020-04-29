@extends('layouts.main')

@section('content')
    <div class="container flex mx-auto px-4 mt-6 mb-8">
        <div class="mr-8">
            @include('partials.filter')
            @include('partials.sidebar')
        </div>
        <div class="popular_movies w-80%">
            <div class="flex movies_header justify-between items-center">
            <h2 class='movies_header_title tracking-wider text-orange-500 text-2xl  text-center font-semibold'>Страна: {{$country_name}}</h2>
            
            @include('partials.styles')
            
                @php
                    if(!empty($_GET['country_id']) && !empty($_GET['country_name'])){
                        $country_id = $_GET['country_id'];
                        $country_name = $_GET['country_name'];

                        echo $country_paginate->appends([
                                    'country_id' => $country_id,
                                    'country_name' => $country_name
                                ])->links();
                    }
                @endphp

            </div>

            <div class="flex mt-5">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @foreach($country_paginate as $movie)
                        <x-movie-card :movie="$movie" :genres="$genres"/>
                    @endforeach
                
                    <div class="movies_page_pagination">
                        {{ $country_paginate->links() }}
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    
@endsection
