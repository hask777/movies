<div class="popular_movie_item relative">
    <a href="{{ route('movies.show', $movie['id']) }}">
        <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
        <div class="movie_item_overlay">

            <h2 class="title">{{$movie['title']}}</h2>


            <div class="watch">
                <span>Смотреть</span>
            </div>     
        </div>
    </a>
</div>
