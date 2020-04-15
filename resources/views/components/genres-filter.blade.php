<li class="inline ">
    <form class="mb-0 inline" action="{{route('genres.index')}}" method="get">
        @csrf
        <input type="hidden" name="movie_id" value="{{$key}}">
        <input type="hidden" name="movie_name" value="{{$value}}">
        <button type="submit" class="text-base font-light">{{$value}}</button>
    </form>,
</li>
