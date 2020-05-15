@extends('layouts.main')

@section('content')
@php
    // echo \Request::url();
    // // echo url()->url();
    // echo url()->current();
    // echo url()->full();
@endphp
    <div class="container flex mx-auto px-4 mt-6 mb-8">

        {{-- Filter --}}


        <div class="popular_movies w-80%">
            {{-- Popular --}}
            @include('tv.popular')            
            
                
            {{-- No playing --}}
           
           
            {{-- Top rated --}}
            

            {{-- Upcoming--}}
            
            
        </div>
    </div>
@endsection