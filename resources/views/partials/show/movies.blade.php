<div class="mt-12 pb-12">

    @if(count($movie['videos']['results']) > 0 && $videos != 'NO')
        <button id="play_trailer" class="flex inline-flex items-center  rounded font-semibold px-2 py-4">        
            <i class="fa fa-youtube" aria-hidden="true"></i>
                <span class="ml-2">Трэйлер</span>
        </button>

        <button id="play_movie" class="flex inline-flex items-center  rounded font-semibold px-2 py-4">
            <i class="fa fa-play-circle-o" aria-hidden="true"></i>
            <span class="ml-2">Плеер 1</span>
        </button>

        <button id="play_movie" class="flex inline-flex items-center  rounded font-semibold px-2 py-4">
            <i class="fa fa-play-circle-o" aria-hidden="true"></i>
            <span class="ml-2">Плеер 2</span>
        </button>

        <div class="youtube">
            <iframe class="" src="https://www.youtube.com/embed/{{$movie['videos']['results'][0]['key']}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <div class="videocdn hide">
            <iframe src="{{$videos['preview_iframe_src']}}"  frameborder="0" allowfullscreen></iframe>
        </div> 
        
        
        {{-- <iframe src="{{$bazon[0]['link']}}"  frameborder="0" allowfullscreen></iframe> --}}
        
    @endif

    @if(count($movie['videos']['results']) == 0 && $videos != 'NO')
        <button id="play_movie" class="flex inline-flex items-center  rounded font-semibold px-2 py-4">
            <i class="fa fa-play-circle-o" aria-hidden="true"></i>
            <span class="ml-2">Плеер 1</span>
        </button>

        <div class="videocdn">
            <iframe src="{{$videos['preview_iframe_src']}}"  frameborder="0" allowfullscreen></iframe>
        </div>
        
        {{-- <iframe src="{{$bazon[0]['link']}}"  frameborder="0" allowfullscreen></iframe> --}}
    @endif

    @if(count($movie['videos']['results']) > 0 && $videos == 'NO')
        <button id="play_trailer" class="flex inline-flex items-center  rounded font-semibold px-6 py-4">         
            <i class="fa fa-youtube" aria-hidden="true"></i>
                <span class="ml-2">Трэйлер</span>
        </button>

        <div class="youtube">
            <iframe class="" src="https://www.youtube.com/embed/{{$movie['videos']['results'][0]['key']}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        
        {{-- <iframe src="{{$bazon[0]['link']}}"  frameborder="0" allowfullscreen></iframe> --}}
    @endif

</div>