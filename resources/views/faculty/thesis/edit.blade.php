<x-app-layout>

    <div class="py-12 my-30">
        <div class="max-w-7xl mx-auto sm:px-6 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  
                    <div class="flex justify-between border-b-2 border-gray-300 pb-3 ">
                        <x-header-side-column>Edit Thesis </x-header-side-column>
                    </div>

                    

                    @livewire('edit-thesis')
                    
                </div>
            </div>
        </div>
    </div>

    
</x-app-layout>
