<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{secure_asset('css/main.css')}}">
    <link rel="stylesheet" href="{{secure_asset('css/app.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <livewire:styles>
    </head>
    <body class="bg-gray-900 text-white">

        <header class="border-b border-gray-800">
            <div class="header_wrapper container mx-auto px-4 py-6 flex">
                
                <div class="logo w-20%">
                    @include('layouts.header-parts.logo')
                </div>

                <div class="main_menu lg:w-60% mr-8 flex justify-center items-center">
                    @include('layouts.header-parts.menu')
                </div>

                <div class="authetication flex items-center justify-center">   
                    <livewire:search-dropdown>     
                </div>

            </div>
            {{-- MD --}}
            <div class="main_menu_md container mx-auto px-4 py-6">
                @include('layouts.header-parts.menu')
            </div>
        </header>

	<!-- end header -->

        @yield('content')

        <footer class="border-t border-gray-800">
            <div class="container mx-auto px-4 py-6 flex justify-center">
                <img src="{{secure_asset('img/flags/telegram.svg')}}" alt="" class="ml-1">
                <img src="{{secure_asset('img/flags/odnaklassniki.svg')}}" alt="" class="ml-1">
                <img src="{{secure_asset('img/flags/facebook.svg')}}" alt="" class="ml-1">
                <img src="{{secure_asset('img/flags/vkontakte.svg')}}" alt="" class="ml-1">
            </div>     
        </footer>

        
        <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js'> </script>

        <livewire:scripts>

        


        
        

       
        {{-- <script type="text/javascript" src="{{secure_asset('js/main.js')}}"></script> --}}

        

       
    </body>
</html>
