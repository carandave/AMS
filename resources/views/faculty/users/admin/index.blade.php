<x-app-layout>

    <div class="py-12 my-30">
        <div class="max-w-7xl mx-auto sm:px-6 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  
                    <div class="flex justify-between">
                        <x-header-side-column>Official List </x-header-side-column>

                        {{-- <x-modal-button x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'create-official-modal')">Create Official</x-modal-button> --}}
                        @if (auth()->user()->role == "Admin")
                            <x-modal-button
                                x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'create-official-modal')"
                            >{{ __('Create Official') }}
                            </x-modal-button> 
                        @endif
                        
                        
                    </div>
                   
                    <div class="row mt-3">
                        <div class="col-md-12">
                            @livewire('user-list', ['showStudentList' => false])
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    
</x-app-layout>
