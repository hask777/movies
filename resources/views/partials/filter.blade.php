<div class="filter">
    <span class="font-bold text-orange-500 text-2xl">Жанр</span>
    <ul class="text-sm mb-4">
        @foreach($genres as $key=>$value)
            <x-genres-filter :key="$key" :value="$value"/>
        @endforeach
    </ul>
    <span class="font-bold text-orange-500 text-2xl">Год</span>
    <ul class="text-sm mb-4">
        @foreach($years as $year)
            <x-year-filter :year="$year"/>
        @endforeach
    </ul>
</div>
