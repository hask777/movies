<div class="filter">
    <div class="">
        <h2 class='capitalize  tracking-wider text-center text-orange-500 text-2xl  text-center font-semibold'>Фильмы</h2>
    
        {{-- {{ $movies_paginate->links() }} --}}
    </div>
    <div class="bg-gray-800 p-3 mt-6">
        <livewire:search-dropdown>
        <h3 class="font-bold text-orange-500 text-2xl mt-2">Жанр</h3>
        <ul class="text-sm mb-4 mt-2">
            @foreach($genres as $key=>$value)
                <x-genres-filter :key="$key" :value="$value"/>
            @endforeach
        </ul>
        <span class="font-bold text-orange-500 text-2xl mt-2">Год</span>
        <ul class="text-sm mb-4">
            @foreach($years as $year)
                <x-year-filter :year="$year"/>
            @endforeach
        </ul>
    </div>
</div>

