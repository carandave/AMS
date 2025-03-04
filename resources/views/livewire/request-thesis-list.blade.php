<div>   

    <div class="grid grid-cols-12">
        <div class="col-span-4 flex items-center space-x-4 ">
            <select name="" id="" wire:model.live="status" class="font-semibold text-sm focus:border-orange-600 focus:ring-orange-500 rounded">
            <option value="Approved">Approved</option>
            <option value="Pending">Pending</option>
            <option value="Denied">Denied</option>
            </select>
        </div>
        <div class="col-span-4">
            
        </div>
        
        <div class="col-span-4 flex items-center space-x-4 ">
            @if (auth()->user()->role == "Admin" || auth()->user()->role == "Faculty")
            <input 
                type="text" 
                wire:model.live="search" 
                placeholder="Search Requested By" 
                class="border rounded p-2 w-96 text-sm focus:border-orange-600 focus:ring-orange-500 "
            />
            @endif

            @if (auth()->user()->role == "Student")
            <input 
                type="text" 
                wire:model.live="search" 
                placeholder="Search Title" 
                class="border rounded p-2 w-96 text-sm focus:border-orange-600 focus:ring-orange-500 "
            />
            @endif
        </div>
    </div>

    <div class="relative overflow-x-auto">
        <table class="w-full mt-3 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <th scope="col" class="px-6 py-3">
                    Requested By
                </th>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Purpose
                </th>
                
                @if($status == "Approved")
                <th scope="col" class="px-6 py-3">
                    Approved By
                </th>
                @endif
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Submission Date
                </th>
                @if (auth()->user()->role == "Student" && $status != "Denied")
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
                @endif

                @if (auth()->user()->role == "Admin" || auth()->user()->role == "Faculty")
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
                @endif

              </tr>
          </thead>
          <tbody>
           
            @foreach ($request_thesis as $thesis)
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4">
                    {{ $thesis->student->first_name }} {{ $thesis->student->last_name }}
                </td>
                <td class="px-6 py-4">
                    {{ $thesis->thesis->title }}
                </td>
                <td class="px-6 py-4">
                    {{ $thesis->purpose }}
                </td>
                @if($status == "Approved")
                <td class="px-6 py-4">
                    {{ $thesis->users->first_name }}  {{ $thesis->users->last_name }}
                </td>
                @endif
                <td class="px-6 py-4">
                    @if($thesis->status == "Approved")
                        <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                          Approved
                        </span>
                        @endif
                        @if($thesis->status == "Pending")
                        <span class="bg-orange-100 text-orange-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-orange-900 dark:text-orange-300">{{ $thesis->status }}</span>
                        @endif
                        @if($thesis->status == "Denied")
                        <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">{{ $thesis->status }}</span>
                        @endif
                        @if($thesis->status == "Archived")
                        <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">{{ $thesis->status }}</span>
                        @endif
                </td>
                <td class="px-6 py-4">
                    {{ \Carbon\Carbon::parse($thesis->submission_date)->format('F j, Y') }}
                </td>

                
                <td class="px-6 py-4 flex">
                    @if (auth()->user()->role == "Student" && $thesis->status == "Approved")
                    <a href="{{ url('storage/' . $thesis->thesis->file_path) }}" target="_blank" class="bg-sky-300 p-2 rounded-md text-white hover:bg-sky-600 focus:outline-1 focus:ring transition ease-in-out duration-150"><i class="bi bi-file-earmark"></i>Download PDF</a>
                    @endif

                    @if (auth()->user()->role == "Admin" || auth()->user()->role == "Faculty")
                    <x-edit-modal-button wire:click="editRequestThesis('{{ $thesis->id }}')"
                        x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'edit-request-thesis-modal-{{ $thesis->id }}')"
                    >{{ __('Edit') }}
                    </x-edit-modal-button> 
                    

                    <!--  Request Thesis Modal -->
                    <x-modal name="edit-request-thesis-modal-{{ $thesis->id }}" focusable>

                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Edit Request Download Thesis
                                </h3>
                            </div>

                            <div>
                                <button type="button" wire:click="resetFields" x-on:click="$dispatch('close')" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            
                        </div>
                        <div wire:loading wire:target="editRequestThesis" >
                        <div class="relative items-center block max-w-sm p-6">
                            <div role="status" class="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2">
                                <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                                <span class="sr-only">Loading...</span>
                            </div>
                            
                        </div>
                        <h1 class="text-red">Please wait....</h1>
                        
                        </div>
                        
                        <form wire:submit.prevent="admin_update_request_thesis" >
                            <div class="grid gap-6 grid-cols-2 mt-4 mx-8">
                                <x-text-input id="title" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="hidden" wire:model="title"/>
                                <x-text-input id="user_id" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="hidden" wire:model="user_id"/>
                                <x-text-input id="id" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="hidden" wire:model="id"/>
                                <x-text-input id="email" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="hidden" wire:model="email"/>
                                <x-text-input id="linkfile" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="text" wire:model="linkfile"/>
                                
                                <div class="col-span-2">
                                    <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Requested By </label>
                                    <x-dropdown-input id="user_id" class="bg-gray-50 block mt-1 w-full p-2 text-sm tom-select" wire:model="user_id" required disabled>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->last_name }}, {{ $user->first_name }} {{ $user->middle_name }}.</option>
                                        @endforeach
                                    </x-dropdown-input>
                                    <x-input-error :messages="$errors->get('user_id')" class="mt-2" /> 
                                </div>
                            </div>

                            <div class="grid gap-6 grid-cols-2 mt-4 mx-8">
                                <div class="col-span-2">
                                    <label for="thesis_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project Title</label>
                                    {{-- <x-text-input id="title" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="text" wire:model="title" :value="old('title')" required disabled/>
                                    --}}
                                    <x-dropdown-input id="thesis_id" class="bg-gray-50 block mt-1 w-full p-2 text-sm" wire:model="thesis_id" >
                                        @foreach ($list_thesis as $thesis)
                                            <option value="{{ $thesis->id }}">{{ $thesis->title }}</option>
                                        @endforeach
                                    </x-dropdown-input>
                                    <x-input-error :messages="$errors->get('thesis_id')" class="mt-2" /> 
                                </div>
                            </div>

                            <div class="grid grid-cols-2 mt-3 mx-8">
                                <div class="col-span-2">
                                    <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Purpose</label>
                                    <textarea id="purpose" wire:model="purpose" rows="4" class="w-full bg-gray-50 block mt-1 p-2 text-sm border-gray-300 focus:border-orange-600 focus:ring-orange-500 rounded-md shadow-sm"></textarea>
                                    <x-input-error :messages="$errors->get('purpose')" class="mt-2" /> 
                                </div>
                            </div>
                            <div class="grid grid-cols-2 mt-3 mx-8">
                                <div class="col-span-2">
                                    <label for="abstract" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Update Status </label>
                                    <x-dropdown-input id="old_status" class="bg-gray-50 block mt-1 w-full p-2 text-sm" wire:model.live="old_status" :value="old('old_status')" required >
                                        <option value="Pending">Pending</option> <!-- Default option -->
                                        <option value="Approved">Approved</option>
                                        <option value="Denied">Denied</option>
                                    </x-dropdown-input>
                                    <x-input-error :messages="$errors->get('old_status')" class="mt-2" /> 
                                </div>
                            </div>
                
                            <div class="mt-6 flex justify-end m-8">
                                <x-secondary-button wire:click="resetFields" x-on:click="$dispatch('close')">
                                    {{ __('Cancel') }}
                                </x-secondary-button>

                            
                                <x-modal-button type="submit" class="w-40 focus:ring-10 focus:ring-orange-400 focus:outline-none ml-auto flex justify-center items-center">
                                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                    Update
                
                                    <div wire:loading wire:target="update_thesis" >
                                    <div class="relative items-center block max-w-sm ml-2 p-1 ">
                                        <div role="status" class="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2">
                                            <svg aria-hidden="true" class="w-4 h-4 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                        
                                    </div>
                                    </div>
                                </x-modal-button>
                                
                            </div>
                
                        
                        </form>
                    </x-modal>
                    {{-- @if($status == "Approved")
                        <form wire:submit.prevent="archive('{{ $thesis->id }}')" class="ml-3">
                            <x-archive-modal-button>Archived</x-archive-modal-button> 
                        </form> 
                    @endif --}}
                    
                    @if($status == "Pending")
                        <form wire:submit.prevent="delete('{{ $thesis->id }}')" class="ml-3">
                            <x-archive-modal-button>Delete</x-archive-modal-button> 
                        </form>
                    @endif
                    
                    @endif

                    {{-- Edit Student Thesis Request --}}
                    @if (auth()->user()->role == "Student" && $thesis->status == "Pending")
                    <x-edit-modal-button wire:click="editRequestThesis('{{ $thesis->id }}')"
                        x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'edit-student-request-thesis-modal-{{ $thesis->id }}')"
                    >{{ __('Edit') }}
                    </x-edit-modal-button> 
                    

                    
                    <x-modal name="edit-student-request-thesis-modal-{{ $thesis->id }}" focusable>

                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Edit Request Download Thesis
                                </h3>
                            </div>

                            <div>
                                <button type="button" wire:click="resetFields" x-on:click="$dispatch('close')" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            
                        </div>
                        <div wire:loading wire:target="editRequestThesis" >
                        <div class="relative items-center block max-w-sm p-6">
                            <div role="status" class="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2">
                                <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                                <span class="sr-only">Loading...</span>
                            </div>
                            
                        </div>
                        <h1 class="text-red">Please wait....</h1>
                        
                        </div>
                        
                        <form wire:submit.prevent="student_update_request_thesis" >
                            <div class="grid gap-6 grid-cols-2 mt-4 mx-8">
                              
                                <x-text-input id="title" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="hidden" wire:model="id"/>
                                
                            </div>

                            <div class="grid gap-6 grid-cols-2 mt-4 mx-8">
                                <div class="col-span-2">
                                    <label for="thesis_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project Title</label>
                                    {{-- <x-text-input id="title" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="text" wire:model="title" :value="old('title')" required disabled/>
                                    --}}
                                    <x-dropdown-input id="thesis_id" class="bg-gray-50 block mt-1 w-full p-2 text-sm" wire:model="thesis_id" >
                                        @foreach ($list_thesis as $thesis)
                                            <option value="{{ $thesis->id }}">{{ $thesis->title }}</option>
                                        @endforeach
                                    </x-dropdown-input>
                                    <x-input-error :messages="$errors->get('thesis_id')" class="mt-2" /> 
                                </div>
                            </div>

                            <div class="grid grid-cols-2 mt-3 mx-8">
                                <div class="col-span-2">
                                    <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Purpose</label>
                                    <textarea id="purpose" wire:model="purpose" rows="4" class="w-full bg-gray-50 block mt-1 p-2 text-sm border-gray-300 focus:border-orange-600 focus:ring-orange-500 rounded-md shadow-sm"></textarea>
                                    <x-input-error :messages="$errors->get('purpose')" class="mt-2" /> 
                                </div>
                            </div>
                
                            <div class="mt-6 flex justify-end m-8">
                                <x-secondary-button wire:click="resetFields" x-on:click="$dispatch('close')">
                                    {{ __('Cancel') }}
                                </x-secondary-button>

                            
                                <x-modal-button type="submit" class="w-40 focus:ring-10 focus:ring-orange-400 focus:outline-none ml-auto flex justify-center items-center">
                                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                    Update
                
                                    <div wire:loading wire:target="update_thesis" >
                                    <div class="relative items-center block max-w-sm ml-2 p-1 ">
                                        <div role="status" class="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2">
                                            <svg aria-hidden="true" class="w-4 h-4 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                        
                                    </div>
                                    </div>
                                </x-modal-button>
                                
                            </div>
                
                        
                        </form>
                    </x-modal>

                    <form wire:submit.prevent="delete('{{ $thesis->id }}')" class="ml-3">
                        <x-archive-modal-button>Delete</x-archive-modal-button> 
                    </form>
                    @endif
                </td>

                
              </tr>
            @endforeach

            
              
          </tbody>
      </table>

      {{-- {{ $request_thesis->links() }} --}}
        
    </div>
</div>
