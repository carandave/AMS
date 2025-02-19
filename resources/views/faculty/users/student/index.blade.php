<x-app-layout>

    <div class="py-12 my-30">
        <div class="max-w-7xl mx-auto sm:px-6 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="flex justify-between">
                        <x-header-side-column>Student List </x-header-side-column>

                        {{-- <x-modal-button data-modal-toggle="create_student" data-modal-target="create_student" data-bs-backdrop="false">Create Student</x-modal-button> --}}
                        @if (auth()->user()->role == "Admin")
                        <x-modal-button
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'create-student-modal')"
                        >{{ __('Create Student') }}
                        </x-modal-button> 
                        @endif
                        
                    </div>
                    
                   
                    <div class="row mt-3 ">
                        <div class="col-md-12 ">
                            @livewire('user-list', ['showStudentList' => true])

                            
                        </div>
                    </div>


                    
                </div>
            </div>
        </div>
    </div>

    <script>
        
    </script>

    

    
</x-app-layout>
