<x-guest-layout>

    <div class="col-span-4 " >
           
    </div>

    <div class="col-span-4 ">
        <div class="flex items-center justify-center h-screen">
            <div class="">

                <div class="flex justify-center items-center mb-10">
                    <img src="{{ asset('images/logos/logo.png') }}" alt="" class="h-34 w-32">
                </div>
                

                <div class="mb-4 text-sm text-gray-600">
                    {{ __('Please input your Email here so we will send the Reset Password Page Link to your Email.') }}
                </div>
            
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
                
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
            
                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
            
                    {{-- <div class="flex items-center justify-end mt-4">
                        <x-primary-button>
                            {{ __('Email Password Reset Link') }}
                        </x-primary-button>
                    </div> --}}

                    <div class="flex justify-end mt-3">
                        <x-primary-button class="w-full text-center flex justify-center ">
                            <label for="" class="text-center">Email Password Reset Link</label>
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-span-4">

    </div>
    
</x-guest-layout>
