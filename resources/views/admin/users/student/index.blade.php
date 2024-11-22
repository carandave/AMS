<x-app-layout>

    <div class="py-12 my-30">
        <div class="max-w-7xl mx-auto sm:px-6 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="flex justify-between">
                        <x-header-side-column>Student List </x-header-side-column>

                        <x-modal-button data-modal-toggle="create_student" data-modal-target="create_student" data-bs-backdrop="false">Create Student</x-modal-button>
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
