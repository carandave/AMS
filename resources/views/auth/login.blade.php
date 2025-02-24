<x-guest-layout>

    <div class="col-span-7 " >
        <div class="relative bg-cover bg-center h-screen " style="background-image: url('/images/logos/LoginBg.webp');">
            
            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-b from-black/20 to-black/60"></div>

            <div class="relative flex flex-col justify-center pt-0 p-24 h-full ">
                <div class="mb-10">
                    <img src="{{asset('images/logos/logo.png')}}" class="img-fluid w-28 h-28" alt="Logo po ito">
                </div>

                <div class="my-12">
                    <h1 class="text-4xl font-bold text-orange-100">Welcome Back!</h1>
                    <h1 class="text-4xl font-bold text-orange-100">Access Your Account </h1>
                </div>

                <div class="">
                    <p class="text-md font-semi-bold text-orange-100">Log in to explore and manage archived research papers.</p>
                    <p class="text-md font-semi-bold text-orange-100">Secure access to academic resources and thesis documents.</p>
                </div>
            </div>

        </div>                   
    </div>

    <div class="col-span-5 bg-white p-20 flex justify-center items-center flex-col">
        <!-- Session Status -->
        {{-- <x-auth-session-status class="mb-4 w-full" :status="session('status')" /> --}}

        

        @if (session('status'))
            
        <div id="alert-official" class="mt-3 flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <div class="ms-3 text-sm font-medium">
                <span class="font-medium">{{ session('status') }}</span> 
            </div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-official" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
            
        @endif
        
        
        

        <form method="POST" action="{{ route('login') }}" class="w-full">
            @csrf

            <!-- Email Address -->
            {{-- <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div> --}}

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            

            <div class="flex items-center justify-between mt-4">
                <div class="">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none " href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>

            <div class="flex justify-end mt-3">
                <x-primary-button class="w-full text-center flex justify-center ">
                    <label for="" class="text-center">Log in</label>
                </x-primary-button>
            </div>

            <div class="mt-5">
                <p class="text-gray-600 text-sm">New User? <a href="{{ route('register') }}" class="text-orange-500 hover:text-orange-600">Sign up</a></p>
            </div>

            
        </form>
        
    </div>

    


    
</x-guest-layout>
