<div class="movie_item relative">
    <a href="{{ route('movies.show', $movie['id']) }}">
        <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
        <!-- Swiper -->
        <div class="movie_card_swiper_container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="movie_item_overlay">

                        <h2 class="title">{{$movie['title']}}</h2>
            
                        <span class="year">
                            <span class="inner">Год: </span>
                            {{\Carbon\Carbon::parse($movie['release_date'])->format('Y') }}
                        </span>
            
                        <span class="rate">
                            <span class="inner">Рейтинг: </span>
                            {{$movie['vote_average']}}
                        </span>
            
                        <span class="orig_title">
                            <span class="inner">Назвнаие: </span>
                            {{$movie['original_title']}}
                        </span>
            
                        <span class="lang">
                            <span class="inner">Страна: </span>
                            {{$movie['original_language']}}
                        </span>
            
                        <span class="genre">
                            <span class="inner">Жанры: </span>
                            @foreach ($movie['genre_ids'] as $genre)
                        
                                @foreach($genres as $key => $value) 
                                    @if($key === $genre)
                                        {{$value}}
                                    @endif
                                @endforeach
                                @if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </span>
                       
                        {{-- <span class="p-2 block text-orange-500">{{$movie['overview']}}</span> --}}
                        <div class="watch">
                            <span>Смотреть</span>
                        </div>     
                    </div>
                </div>
            </div>
            <!-- Add Scroll Bar -->
            <div class="swiper-scrollbar"></div>
        </div>
        
    </a>
</div>
