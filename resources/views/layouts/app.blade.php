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


        {{-- Select Search Input --}}
        <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>



        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 ">
            

            <!-- Page Heading -->
            {{-- @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset --}}

            <!-- Page Content -->

            {{-- <div class="row ">
                <div class="col-md-2 bg-dark">
                    SideBar
                </div>

                <div class="col-md-10">
                    
                </div>
            </div> --}}

            {{-- <div class="row mx-0 flex-grow-1">
                <div class="col-md-2 bg-dark vh-100 overflow-auto " style="position: sticky; top: 0; z-index: 1">
                    @include('layouts.sidebar')
                </div>

                <div class="col-md-10 px-0">
                    @include('layouts.navigation')
                    <main class="flex-grow-1">
                        {{ $slot }}
                    </main>
                </div>
            </div> --}}

            <div class="grid grid-cols-12 min-h-screen">
                <div class="col-span-4 md:col-span-2 bg-gray-900 h-screen overflow-auto px-2 sticky top-0 z-0 scrollbar-hide">
                    @include('layouts.sidebar')
                </div>

                <div class="col-span-8 md:col-span-10">
                    @include('layouts.navigation')
                    <main class="flex-grow-1">
                        {{ $slot }}
                    </main>
                </div>
            </div>

            
            
        </div>

        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}
    
        @livewireScripts

        <script>

            

            // document.addEventListener('show.bs.modal', function () {
            //     // Remove all backdrops before opening a new modal
            //     document.querySelectorAll('.modal-backdrop').forEach(backdrop => backdrop.remove());
            // });

            // document.addEventListener('hidden.bs.modal', function (event) {
            //     // Ensure all backdrops are removed when a modal is closed
            //     document.querySelectorAll('.modal-backdrop').forEach(backdrop => backdrop.remove());
                
            //     // Optional: fully dispose of the modal instance to reset it
            //     const modal = event.target;
            //     const bootstrapModal = bootstrap.Modal.getInstance(modal);
            //     if (bootstrapModal) {
            //         bootstrapModal.dispose();
            //     }
            // });

        </script>

        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  
        
    </body>

</html>
