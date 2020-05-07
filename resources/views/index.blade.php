@extends('layouts.main')

@section('content')
@php
    // echo \Request::url();
    // // echo url()->url();
    // echo url()->current();
    // echo url()->full();
@endphp
    <div class="container flex mx-auto px-4 mt-6 mb-8">
        <div class="mobile_sidebar_close_button">
            <span>Закрыть</span>
        </div>
        @include('partials.left-sidebar')
        @include('partials.left-sidebar-mobile')
        <div class="popular_movies w-80%">
            <div class="flex movies_header justify-between items-center">
                <h2 class='movies_header_title capitalize tracking-wider text-orange-500 text-2xl  text-center font-semibold'>Популярные</h2>     
                @include('partials.styles')
                <span class="filter_trigger">Filter</span>
            </div>

            <div class="flex mt-5 mb-5">
                <div class="flex">
                    <!-- Slider main container -->
                    <div class="swiper-container">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            @foreach($popularMovies as $movie)
                                <div class="swiper-slide">
                                    <x-popular-card :movie="$movie" :genres="$genres"/>
                                </div>
                                
                            @endforeach 
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>

                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev  z-50"></div>
                        <div class="swiper-button-next  z-50"></div>

                        <!-- If we need scrollbar -->
                        <div class="swiper-scrollbar"></div>
                    </div>
                                 
                </div>        
            </div>
            {{-- No playing --}}
            {{-- <div class="flex movies_header justify-between items-center">
                <h2 class='movies_header_title capitalize tracking-wider text-orange-500 text-2xl  text-center font-semibold'>Сейчас смотрят</h2>     
                @include('partials.styles')
                <span class="filter_trigger">Filter</span>
            </div>
            <div class="flex mt-5 mb-5">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @foreach($popularMovies as $movie)
                        <x-movie-card :movie="$movie" :genres="$genres"/>
                    @endforeach              
                </div>        
            </div> --}}
        </div>
    </div>
@endsection
