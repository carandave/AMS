<x-app-layout>

    <div class="py-12 my-30">
        <div class="max-w-7xl mx-auto sm:px-6 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  
                    <div class="flex justify-between">
                        <x-header-side-column>List of Thesis </x-header-side-column>

                        <x-modal-button data-modal-toggle="create_official" data-modal-target="create_official" data-bs-backdrop="false" >Create Official</x-modal-button>

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
