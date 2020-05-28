<div class="filter">
    <div class="">
        <h2 class='capitalize  tracking-wider text-center text-gray-500 text-2xl  text-center font-semibold'>Фильмы</h2>
    </div>
    <div class="bg-gray-800 p-4 mt-5">
        <livewire:movies-search-dropdown>
            @include('partials.buttons')
        <h3 class="font-bold text-gray-500  mt-6">Жанры:</h3>
        <ul class="movie_list mb-4 mt-2 ml-1">
            @foreach($genres as $key=>$value)
                <x-genres-filter :key="$key" :value="$value"/>
            @endforeach
        </ul>
        <h3 class="font-bold text-gray-500 mt-6 ">Страна:</h3>
        <ul class="countries_list mb-4 mt-2 ml-1">

            @foreach($countries as $key=>$value) 
            
                {{-- {{count($countries)}} --}}
                <x-country-filter :key="$key" :value="$value"/>
            @endforeach
        </ul>
        <h3 class="font-bold text-gray-500 mt-6">Год:</h3>
        <ul class="years_list mb-4 mt-2 ml-1">
            @foreach($years as $key => $year)
               
                {{-- @if($key == 4 || $key == 9 || $key == 14 || $key == 19)
                    <x-year-filter :year="$year"/><br>
                    @else
                    <x-year-filter :year="$year"/>
                @endif --}}

                <x-year-filter :year="$year"/>
               
            @endforeach
        </ul>
        
    </div>
</div>

