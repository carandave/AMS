<x-guest-layout>

    <div class="col-span-4 " >
           
    </div>

    <div class="col-span-4 ">
        <div class="flex items-center justify-center h-screen">
            <div class="">

                <div class="mb-4 text-sm text-gray-600 invisible">
                    <p class="">{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</p>
                </div>

                <div class="flex justify-center items-center mb-10">
                    <img src="{{ asset('images/logos/logo.png') }}" alt="" class="h-34 w-32">
                </div>
                

                
            
                
            
                <form method="POST" action="{{ route('password.store') }}">
                    @csrf
            
                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
            
                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
            
                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
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
            
                    <div class="flex justify-end mt-3">
                        <x-primary-button class="w-full text-center flex justify-center ">
                            <label for="" class="text-center">Reset Password</label>
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-span-4">

    </div>



    
</x-guest-layout>
