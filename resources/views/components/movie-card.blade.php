<div class="movie_item relative flex">
    <a href="{{ route('movies.show', $movie['id']) }}">
        <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
        <div class="bg-black opacity-75 w-100 absolute bottom-0 left-0">
            <span class="p-2 block text-orange-500">{{$movie['title']}}</span>
            <span>{{$movie['release_date']}}</span>
        </div>
    </a>
</div>
