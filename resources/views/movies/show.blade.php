@extends('layouts.main')

@section('content')
<div class="container flex mx-auto px-4 mt-6 mb-8">
    @include('partials.left-sidebar')
    <div class="popular_movies w-100 md:w-80%">
        <div class="md:flex movies_header justify-between items-center">
            <h2 class='movies_header_title capitalize tracking-wider text-gray-500 text-2xl  text-center font-semibold'>{{ $movie['original_title'] }} | {{ $movie['title'] }}</h2>        
        </div>

        <div class="sm:flex mx-auto mt-6 momvie-info border-b border-gray-800">
            {{-- Poster --}}
                <div class="movie_item_poster mb-10">
                    <img src="https://image.tmdb.org/t/p/w500/{{$movie['poster_path']}}" alt="parasite" class='w-100 sm:w-64 lg:w-96' >                     
                </div>
            {{-- End Poster --}}
            {{-- Movie --}}
            <div class="container flex flex-col md:flex-row">
                <div class="sm:ml-8 md:ml-8">

                    <div class="text-gray-400 text-sm">
                        {{-- raiting --}}
                        @php
                            $ave = $movie['vote_average']*10
                        @endphp
                        <div class="raiting flex items-center">
                            <span class='text-white font-semibold text-gray-500'>Рэйтинг:</span>                        
                            <div class="show_movie_percent ml-3" 
                                @php  if($ave < 25){echo 'style="border: 3px solid rgb(250, 45, 90)"';} @endphp
                                @php  if($ave < 50){echo 'style="border: 3px solid rgb(230, 211, 42)"';} @endphp
                                @php  if($ave < 75){echo 'style="border: 3px solid rgb(55, 192, 37)"';} @endphp
                                @php  if($ave < 85){echo 'style="border: 3px solid rgb(37, 161, 192)"';} @endphp
                                @php  if($ave < 100){echo 'style="border: 3px solid rgb(148, 37, 192)"';} @endphp
                            >
                                <div class="number">
                                    <h2>{{$ave}}<span>%</span></h2>
                                    
                                </div>
                            </div>
                        </div>     
                        {{-- end raiting --}}
                        {{-- movie date --}}
                        <div class="date mt-2">
                            <span class='text-white font-semibold text-gray-500'>Дата релиза:</span>
                            <span class="ml-4">{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
                        </div>      
                        {{-- end movie date --}}
                        {{-- movie genres --}}
                        <div class="genres mt-4">
                            <span class='text-white font-semibold text-gray-500'>Жанр:</span>
                                <span class="ml-4">
                                @foreach ($movie['genres'] as $genre)
                                    {{ $genre['name'] }}
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </span>
                        </div>     
                        {{-- end movie genres --}}
                    </div>
                    {{-- movie overview --}}
                    <div class="overview flex mt-4">
                        <span class='text-white font-semibold text-gray-500'>Описание:</span>
                        <p class="text-gray-300  text-sm ml-4">
                            {{ $movie['overview'] }}
                        </p>
                    </div>
                    
                    {{-- end movie overview --}}
                    {{-- casts --}}
                    <div class="genres mt-4 flex">
                        <span class="text-white font-semibold text-gray-500">В главных ролях:</span>
                        <div class="ml-3 text-sm">
                            @foreach ($movie['credits']['cast'] as $cast)
                                
                                    @if ($loop->index < 5)
                                        <h3> {{$cast['name']}}</h3>                                     
                                    @endif
                                         
                            @endforeach
                        </div>
                    </div>
                    {{-- end casts --}}
                    <div class="mt-12 pb-12">

                        @if(count($movie['videos']['results']) > 0 && $videos != 'NO')
                            <button id="play_trailer" class="flex inline-flex items-center  rounded font-semibold px-2 py-4">
                            
                                <i class="fa fa-youtube" aria-hidden="true"></i>
                                    <span class="ml-2">Смотреть Трэйлер</span>
                            </button>

                            <button id="play_movie" class="flex inline-flex items-center  rounded font-semibold px-2 py-4">

                                <i class="fa fa-play-circle-o" aria-hidden="true"></i>
                                <span class="ml-2">Смотреть Фильм</span>
                            </button>

                            <div class="youtube">
                                <iframe class="" src="https://www.youtube.com/embed/{{$movie['videos']['results'][0]['key']}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>

                            <div class="videocdn hide">
                                <iframe src="{{$videos['preview_iframe_src']}}"  frameborder="0" allowfullscreen></iframe>
                            </div>                       
                        @endif

                        @if(count($movie['videos']['results']) == 0 && $videos != 'NO')
                            <button id="play_movie" class="flex inline-flex items-center  rounded font-semibold px-2 py-4">
                                <i class="fa fa-play-circle-o" aria-hidden="true"></i>
                                <span class="ml-2">Смотреть Фильм</span>
                            </button>

                            <div class="videocdn">
                                <iframe src="{{$videos['preview_iframe_src']}}"  frameborder="0" allowfullscreen></iframe>
                            </div>                       
                        @endif

                        @if(count($movie['videos']['results']) > 0 && $videos == 'NO')
                            <button id="play_trailer" class="flex inline-flex items-center  rounded font-semibold px-6 py-4">         
                                <i class="fa fa-youtube" aria-hidden="true"></i>
                                    <span class="ml-2">Смотреть Трэйлер</span>
                            </button>

                            <div class="youtube">
                                <iframe class="" src="https://www.youtube.com/embed/{{$movie['videos']['results'][0]['key']}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>                     
                        @endif

                    </div>
                    {{-- end casts --}}
                </div>
            </div>
        </div>
        {{-- end  --}}
        @if(!empty($recomend))
        {{-- Recomindations --}}
        <div class="recomended_title mt-4">
            <h2 class='movies_header_title capitalize tracking-wider text-gray-500 text-2xl   font-semibold'>Рекомендованные</h2>    
        </div>
        <div class="sm:flex mx-auto mt-6 momvie-info border-b border-gray-800 pb-10">
            <div class="flex w-100 ">
                <!-- Slider main container -->
                <div class="swiper-container">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach($recomend as $movie)
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
        @endif
        {{-- end --}}
        {{-- Similar --}}
        @if(!empty($similar))
        <div class="recomended_title mt-4">
            <h2 class='movies_header_title capitalize tracking-wider text-gray-500 text-2xl   font-semibold'>Похожие</h2>    
        </div>
        <div class="sm:flex mx-auto mt-6 momvie-info border-b border-gray-800 pb-10">
            <div class="flex w-100 ">
                <!-- Slider main container -->
                <div class="swiper-container">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach($similar as $movie)
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
        @endif
        {{-- end --}}
        {{-- Collection --}}
        @if($collection != 0)
            <div class="recomended_title mt-4">
                <h2 class='movies_header_title capitalize tracking-wider text-gray-500 text-2xl   font-semibold'>{{$collection['name']}}</h2>    
                </div>
                <div class="sm:flex mx-auto mt-6 momvie-info border-b border-gray-800 pb-10">
                    <div class="flex w-100 ">
                        {{-- @foreach($collection['parts'] as $movie)
                            <div class="swiper-slide">
                                <x-popular-card :movie="$movie" :genres="$genres"/>
                            </div>
                            
                        @endforeach  --}}
                        <!-- Slider main container -->
                        <div class="swiper-container">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                @foreach($collection['parts'] as $movie)
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
        @endif
       
        {{-- end --}}

    </div>
</div>

@endsection
