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
        @include('partials.tv-left-sidebar-index')


        <div class="popular_movies w-80%">
            {{-- Popular --}}
            @include('tv.popular')            
            
                
            {{-- No playing --}}
            @include('tv.today')      
           
            {{-- Top rated --}}
            @include('tv.thisWeek')
            

            {{-- Upcoming--}}
            @include('tv.toprated')
            
            
        </div>
    </div>
@endsection