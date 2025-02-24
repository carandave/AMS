<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'PBTS Macamot | Digital Thesis Archive') }}</title>
        <link rel="icon" href="{{asset('images/logos/logo.png')}}" type="image/x-icon"/>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        {{-- Boostrap --}}
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="grid grid-cols-12 h-screen">

            {{ $slot }}
            
        </div>

            {{-- <div class="grid grid-cols-12 ">
                <div class="col-span-7 " >
                    <div class="relative bg-cover bg-center h-screen " style="background-image: url('/images/logos/LoginBg.webp');">
                        
                        <!-- Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-b from-black/20 to-black/60"></div>

                        <div class="relative flex flex-col justify-center pt-0 p-24 h-full ">
                            <div class="mb-10">
                                <img src="{{asset('images/logos/logo.png')}}" class="img-fluid w-28 h-28" alt="Logo po ito">
                            </div>
    
                            <div class="my-12">
                                <h1 class="text-6xl font-bold text-orange-100">Hello, </h1>
                                <h1 class="text-6xl font-bold text-orange-100">Welcome! </h1>
                            </div>
    
                            <div class="">
                                <p class="text-md font-semi-bold text-orange-100">Please sign in to access your account.</p>
                                <p class="text-md font-semi-bold text-orange-100">Secure login. Your credentials are safe with us.</p>
                            </div>
                        </div>

                    </div>                   
                  </div>
        
                <div class="col-span-5 bg-white p-20 flex justify-center items-center">
                    {{ $slot }}
                </div>
            </div> --}}

            {{-- <div>
                <a href="/">
                    <x-application-logo class="w-20 h-10 fill-current text-gray-500 " />
                </a>
            </div>

            <div class="w-full sm:max-w-lg mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                
            </div> --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
