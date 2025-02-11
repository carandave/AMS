<x-app-layout>

    <div class="py-12 my-30">
        <div class="max-w-7xl mx-auto sm:px-6 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="flex justify-between">
                        <x-header-side-column>Audit Trail</x-header-side-column>

                    </div>
                    
                   
                    <div class="row mt-3 ">
                        <div class="col-md-12 ">
                            @livewire('audit')
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <script>
        
    </script>

    

    
</x-app-layout>
