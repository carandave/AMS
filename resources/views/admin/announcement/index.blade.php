<x-app-layout>

    <div class="py-12 my-30">
        <div class="max-w-7xl mx-auto sm:px-6 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="flex justify-between">
                        <x-header-side-column>Announcement</x-header-side-column>

                        {{-- <x-modal-button data-modal-toggle="create_course" data-modal-target="create_course" data-bs-backdrop="false">Create Course</x-modal-button> --}}
                        
                        <x-modal-button class="mr-1"
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'create-announcement-modal')"
                        >{{ __('Announcement') }}
                        </x-modal-button> 
                        
                        <!-- Inside existing Livewire component -->

                        {{-- <x-modal-button data-modal-target="crud-modal" data-modal-toggle="crud-modal" >Create Student</x-modal-button> --}}
                        
                       <!-- Modal toggle -->
                        {{-- <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            Toggle modal
                        </button> --}}

                        <!-- Modal toggle -->

                        <!-- Modal toggle -->
                        {{-- <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            Toggle modal
                        </button> --}}
                    </div>
                    
                   
                    <div class="row mt-3 ">
                        <div class="col-md-12 ">

                            @if(session('success_announcement'))
                                <div id="alert-official" class="mt-3 flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                                <div class="ms-3 text-sm font-medium">
                                    <span class="font-medium">{{ session('success_announcement') }}</span> 
                                </div>
                                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-official" aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                </button>
                                </div>
                            @endif

                            @if(session('success_edit_announcement'))
                                <div id="alert-official" class="mt-3 flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                                <div class="ms-3 text-sm font-medium">
                                    <span class="font-medium">{{ session('success_edit_announcement') }}</span> 
                                </div>
                                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-official" aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                </button>
                                </div>
                            @endif

                            @livewire('announcement')
                            {{-- <livewire:department-list /> --}}
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <script>
        
    </script>

    

    
</x-app-layout>
