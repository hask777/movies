<?php 

$token = 'a27474c28593adb669d04ead29ee0c41';

$bazon = Http::get('https://bazon.cc/api/search?token=a27474c28593adb669d04ead29ee0c41&title='.$movie['original_title'].'')->json()['results'];

dump($bazon);