@extends('layouts.main')

@section('content')
    <div class="container flex mx-auto px-4 mt-6">
        <div class="grid w-20% mr-8 p-4">
            <div class="">
                <span class="font-bold text-orange-500">Жанр</span>
                <ul class="text-sm">
                    @foreach($genres as $key=>$value)

                        <label for=""><a href="{{route('genres.index')}}">{{$value}}</a>
                            <input type="hidden" name="movie_genre" value="{{$key}}">
                        </label>,

                    @endforeach
                </ul>
            </div>
        </div>
        <div class="popular-movies w-80%">
            <h2 class='uppercase flex flex-row tracking-wider text-orange-500 text-lg font-semibold mt-4'>Жанр</h2>

            <div class="flex mt-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @foreach($gueryArray as $movie)
                        <x-genre-card :movie="$movie" :genres="$genres"/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
