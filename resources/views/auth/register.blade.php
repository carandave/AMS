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
                    <h1 class="text-4xl font-bold text-orange-100">Join the Research Community, </h1>
                    <h1 class="text-4xl font-bold text-orange-100">Create Your Account! </h1>
                </div>

                <div class="">
                    <p class="text-md font-semi-bold text-orange-100">Access and manage a collection of archived theses and research papers.</p>
                    <p class="text-md font-semi-bold text-orange-100">Sign up now to submit, explore, and preserve academic works</p>
                </div>
            </div>

        </div>                   
    </div>

    <div class="col-span-5 bg-white flex justify-center items-center flex-col">

        @if (session('success'))
            
            <div id="alert-official" class="mt-3 flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <div class="ms-3 text-sm font-medium">
                    <span class="font-medium">{{ session('success') }}</span> 
                </div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-official" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
            
        @endif

    <form method="POST" action="{{ route('register') }}" class="" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-2 gap-4">
             <!-- First Name -->
            <div>
                <x-input-label for="first_name" :value="__('First Name')" />
                <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <!-- Middle Name -->
            <div class="">
                <x-input-label for="middle_name" :value="__('Middle Name')" />
                <x-text-input id="middle_name" class="block mt-1 w-full" type="text" name="middle_name" :value="old('middle_name')" required autofocus autocomplete="middle_name" />
                <x-input-error :messages="$errors->get('middle_name')" class="mt-2" />
            </div>
        </div>

        <div class="grid grid-cols-1 ">
           <!-- Middle Name -->
           <div class="mt-4">
               <x-input-label for="last_name" :value="__('Last Name')" />
               <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
               <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
           </div>
       </div>

        
        
        
        <div class="grid grid-cols-2 gap-4">
            

            <div class="col-span-1">
                <!-- Student ID -->
                <div class="mt-4">
                    <x-input-label for="student_id" :value="__('Student ID')" />
                    <x-text-input id="student_id" class="block mt-1 w-full" type="text" name="student_id" :value="old('student_id')" required autofocus autocomplete="student_id" />
                    <x-input-error :messages="$errors->get('student_id')" class="mt-2" />
                </div>
            </div>

            <div class="col-span-1">
                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
            </div>

        </div>
        

        

        

        <div class="grid grid-cols-2 gap-4">
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        </div>

        <!-- Profile -->
        <div class="mt-4">
            <x-input-label for="profile" :value="__('Profile')" />
            <x-text-input id="profile" class="block mt-1 w-full" type="file" name="profile" :value="old('profile')" required autofocus autocomplete="profile" />
            <x-input-error :messages="$errors->get('profile')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-3">
            <x-primary-button class="w-full text-center flex justify-center ">
                <label for="" class="text-center">Register</label>
            </x-primary-button>
        </div>

        <div class="mt-5">
            <p class="text-gray-600 text-sm">Already Registered? <a href="{{ route('login') }}" class="text-orange-500 hover:text-orange-600">Sign in</a></p>
        </div>

    </form>
  </div>
</x-guest-layout>
