<div class="filter">
    <div class="">
        <h2 class='capitalize  tracking-wider text-center text-orange-500 text-2xl  text-center font-semibold'>Фильмы</h2>
    </div>
    <div class="bg-gray-800 p-4 mt-6">
        <livewire:search-dropdown>
        <h3 class="font-bold text-orange-500  mt-8">Жанры:</h3>
        <ul class="text-sm mb-4 mt-2 ml-1">
            @foreach($genres as $key=>$value)
                <x-genres-filter :key="$key" :value="$value"/>
            @endforeach
        </ul>
        <h3 class="font-bold text-orange-500 mt-8">Страна:</h3>
        <ul class="text-sm mb-4 mt-2">
           <li class="inline">США
                <a href="{{route('country.index')}}">
                    <img src="{{asset('public/img/flags/united-states.svg')}}" alt="" class="w-20% inline">
                </a>
              
           </li>
        </ul>
        <h3 class="font-bold text-orange-500 mt-8">Год:</h3>
        <ul class="text-sm mb-4 mt-2">
            @foreach($years as $key => $year)
               
                @if($key == 4 || $key == 9 || $key == 14 || $key == 19)
                    <x-year-filter :year="$year"/><br>
                    @else
                    <x-year-filter :year="$year"/>
                @endif
               
            @endforeach
        </ul>
    </div>
</div>

