<?php

// Запрос к videocdn title=$title
        // $videos = Http::get('https://videocdn.tv/api/movies?api_token=lTf8tBnZLmO0nHTyRaSlvGI5UH1ddZ2f&field='.$movie['imdb_id'] .'&limit=10')
        //     ->json()['data'];
        //     dump($videos);
        
        $videos = Http::get('https://videocdn.tv/api/movies?api_token=lTf8tBnZLmO0nHTyRaSlvGI5UH1ddZ2f&query='.$movie['original_title'] .'&limit=10')
            ->json()['data'];
        // dump($videos);

        if(empty($videos)){
            $videos = Http::get('https://videocdn.tv/api/movies?api_token=lTf8tBnZLmO0nHTyRaSlvGI5UH1ddZ2f&query='.$movie['title'] .'&limit=10')
                ->json()['data'];
        }
        // dump($videos);