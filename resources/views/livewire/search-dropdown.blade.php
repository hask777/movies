<div class="relative mt-3 md:mt-0">
    <input wire:model="search"  class="bg-gray-800 rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline" placeholder="Поиск">
    <div class="absolute bg-gray-800 text-sm rounded w-64 mt-4">
        <ul>
            <li class='border-b border-gray-700'>
                <a href="#" class="block hover:bg-gray-700 px-3 py-3">{{$search}}</a>
            </li>
        </ul>
    </div>
</div>
