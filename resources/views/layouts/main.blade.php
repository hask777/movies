<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <livewire:styles>
    </head>
    <body>
        <body class="font-sans bg-gray-900 text-white">

	<!-- header -->
        {{-- <nav class='border-b border-gray-800'>
            <div class="container mx-auto flex flex-col md:flex-row   px-4 py-6">
                
                <div class="search_dropdown  w-20%">
                    @include('layouts.header-parts.logo')
                </div>
                <div class="">
                    @include('layouts.header-parts.menu')
                </div>
                </div>
               

                <div class="">
                    <livewire:search-dropdown>
                </div>

                
            </div> --}}
            
        {{-- </nav> --}}

        <header class="border-b border-gray-800 ">
            <div class="container mx-auto px-4 py-6 flex">
                
                <div class="logo w-20% mr-8">
                    @include('layouts.header-parts.logo')
                </div>

                <div class="main_menu lg:w-60%">
                    @include('layouts.header-parts.menu')
                </div>

                <div class="search">
                    sign in 
                </div>

            </div>
            <div class="main_menu_md container mx-auto px-4 py-6 ">
                @include('layouts.header-parts.menu')
            </div>
        </header>

	<!-- end header -->

        @yield('content')
        <livewire:scripts>
        <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js'>

        </script>
        {{-- <script type="text/javascript" src="{{asset('js/main.js')}}"> --}}

        </script>
    </body>
</html>
