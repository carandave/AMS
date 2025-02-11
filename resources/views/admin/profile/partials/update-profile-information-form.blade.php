<section>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('patch')

        <div class="flex gap-4">
            <!-- <img class="h-28 rounded-full" src="{{ url('storage/' . $user->photo)}}" alt="Jese image"> -->
            <div class="">
              <img class="h-28 rounded-full" src="{{ url('storage/' . $user->photo)}}" alt="Jese image">
            </div>

            <div  class="col-span-1 flex flex-col justify-center">
                <label for="photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile</label>
                <x-text-input id="photo" class="text-sm" type="file" name="photo"/>
                <x-input-error :messages="$errors->get('photo')" class="mt-2" />
            </div>
        </div>

        @if ($user->student_id)
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2">
                    <x-input-label for="student_id" :value="__('Student ID')" />
                    <x-text-input id="student_id" name="student_id" type="text" class="mt-1 block w-full" :value="old('student_id', $user->student_id)" disabled/>
                    <x-input-error class="mt-2" :messages="$errors->get('student_id')" />
                </div>
            </div>
        @endif
        

        <div class="grid grid-cols-2 gap-4">
            <div class="col-span-1">
                <x-input-label for="name" :value="__('First Name')" />
                <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" :value="old('first_name', $user->first_name)" required autofocus autocomplete="first_name" />
                <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
            </div>

            <div class="col-span-1">
                <x-input-label for="name" :value="__('Middle Name')" />
                <x-text-input id="middle_name" name="middle_name" type="text" class="mt-1 block w-full" :value="old('middle_name', $user->middle_name)" required autofocus autocomplete="middle_name" />
                <x-input-error class="mt-2" :messages="$errors->get('middle_name')" />
            </div>

            
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <x-input-label for="name" :value="__('Last Name')" />
                <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $user->last_name)" required autofocus autocomplete="last_name" />
                <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
            </div>

            <div class="col-span-1">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>

        </div>

        <div>

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            {{-- <x-primary-button class="">{{ __('Save') }}</x-primary-button> --}}
            <button type="submit" class="text-sm font-medium px-4 py-2 bg-orange-500 rounded text-white focus:ring-4 focus:outline-none focus:ring-orange-400 hover:bg-orange-600 transition ease-in-out duration-150">Update</button>
            {{-- <x-create-button href="{{ route('admin.list-thesis.create') }}">Create Thesis</x-create-button> --}}

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
