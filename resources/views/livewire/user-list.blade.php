<div>
    {{-- In work, do what you enjoy. --}}
    <div class="grid grid-cols-12">
      <div class="col-span-4 flex items-center space-x-4 ">
        <select name="" id="" wire:model.live="status" class="font-semibold text-sm focus:border-orange-600 focus:ring-orange-500 rounded">
          @if($showStudentList)
          <option value="Approved">All Students</option>
          <option value="Pending">Pending</option>
          <option value="Denied">Denied</option>
          <option value="Archived">Archived</option>
          @elseif (!$showStudentList)
          <option value="Approved">All Officials</option>
          <option value="Archived">Archived</option>
          @endif
          
        </select>
      </div>
      <div class="col-span-4">
        {{-- <h3>{{ $status }}</h3> --}}
        {{-- <h3>{{ $showStudentList }}</h3> --}}
        
      </div>
      
      <div class="col-span-4 flex items-center space-x-4 ">
         <input 
              type="text" 
              wire:model.live="search" 
              @if($showStudentList)
              placeholder="Search Students" 
              @endif
              placeholder="Search Officials" 
              class="border rounded p-2 w-96 text-sm focus:border-orange-600 focus:ring-orange-500 "
          />
      </div>
    </div>

    @if(session('success_student'))
    <div id="alert-student" class="mt-3 flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
      <div class="ms-3 text-sm font-medium">
        <span class="font-medium">{{ session('success_student') }}</span> 
      </div>
      <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-student" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
      </button>
    </div>
    @endif

    @if(session('success_official'))
    <div id="alert-official" class="mt-3 flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
      <div class="ms-3 text-sm font-medium">
        <span class="font-medium">{{ session('success_official') }}</span> 
      </div>
      <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-official" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
      </button>
    </div>
    @endif


    @if(session('success_edit_student'))
    <div id="alert-official" class="mt-3 flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
      <div class="ms-3 text-sm font-medium">
        <span class="font-medium">{{ session('success_edit_student') }}</span> 
      </div>
      <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-official" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
      </button>
    </div>
    @endif

    @if(session('success_edit_official'))
    <div id="alert-official" class="mt-3 flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
      <div class="ms-3 text-sm font-medium">
        <span class="font-medium">{{ session('success_edit_official') }}</span> 
      </div>
      <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-official" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
      </button>
    </div>
    @endif

    @if(session('success_archive_student'))
    <div id="alert-official" class="mt-3 flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
      <div class="ms-3 text-sm font-medium">
        <span class="font-medium">{{ session('success_archive_student') }}</span> 
      </div>
      <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-official" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
      </button>
    </div>
    @endif

    @if(session('success_archive_official'))
    <div id="alert-official" class="mt-3 flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
      <div class="ms-3 text-sm font-medium">
        <span class="font-medium">{{ session('success_archive_official') }}</span> 
      </div>
      <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-official" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
      </button>
    </div>
    @endif

    @if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@if(session()->has('gow'))
    <div class="alert alert-danger">
        {{ session('gow') }}
    </div>
@endif

    

    <div class="relative overflow-x-auto">
      <table class="w-full mt-3 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Full Name
                </th>
                @if($showStudentList)
                  <th class="px-6 py-4">
                    Student ID
                  </th>
                @endif
                <th scope="col" class="px-6 py-3">
                    Type
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                  Date Created
              </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <img class="w-10 h-10 rounded-full" src="{{ url('storage/' . $user->photo)}}" alt="Jese image">
                    <div class="ps-3">
                        <div class="text-base font-semibold">{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</div>
                        <div class="font-normal text-gray-500">{{ $user->email }}</div>
                    </div>  
                </th>
                
                @if($showStudentList)
                    <td>{{ $user->student_id }}</td>
                @endif
                <td class="px-6 py-4">
                  {{ $user->role }}
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                        @if($user->status == "Approved")
                        <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                          Active
                        </span>
                        @endif
                        @if($user->status == "Pending")
                        <span class="bg-orange-100 text-orange-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-orange-900 dark:text-orange-300">{{ $user->status }}</span>
                        @endif
                        @if($user->status == "Denied")
                        <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">{{ $user->status }}</span>
                        @endif
                        @if($user->status == "Archived")
                        <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">{{ $user->status }}</span>
                        @endif
                    </div>
                </td>
                <td class="px-6 py-4">
                  {{ $user->created_at }}
                </td>
                <td class="px-6 py-4 flex justify-evenly">

                  @if($showStudentList)
                    <!-- Edit Student Modal Button -->
                    @if($user->status == "Approved" || $user->status == "Pending" || $user->status == "Denied")
                    <x-edit-modal-button wire:click="editUser({{ $user->id }})"
                        x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'edit-student-modal-{{ $user->id }}')"
                    >{{ __('Edit') }}
                    </x-edit-modal-button> 
                    @endif
                    
                    @if($user->status != "Archived")
                    <form wire:submit.prevent="archive({{ $user->id }})">
                      <x-archive-modal-button>Archived</x-archive-modal-button> 
                    </form>
                    
                    @endif

                    @if($user->status == "Archived")
                    <form wire:submit.prevent="archive({{ $user->id }})">
                      <x-archive-modal-button>Unarchived</x-archive-modal-button> 
                    </form>
                    
                    @endif
                    
                    {{-- @if($user->status == "Archived")
                    <x-archive-modal-button wire:click="archiveUser({{ $user->id }})"
                      >Unarchived 
                    </x-archive-modal-button> 
                    @endif --}}
                    

                    {{-- @if($user->status == "Approved")
                      <x-archive-modal-button data-modal-toggle="archive_student" data-modal-target="archive_student"  wire:click="archiveUser({{ $user->id }})"
                      
                      >{{ __('Archive') }}
                      </x-archive-modal-button> 
                    @endif --}}

                    {{-- <x-archive-modal-button wire:click="archiveUser({{ $user->id }})"
                      x-data=""
                      x-on:click.prevent="$dispatch('open-modal', 'archive-student-modal-{{ $user->id }}')"
                    >{{ __('Archive') }}
                    </x-archive-modal-button>  --}}

                    
                  @elseif (!$showStudentList)
                    <!-- Edit Official Modal Button -->
                    
                    @if($user->status == "Approved")
                    <x-edit-modal-button wire:click="editUser({{ $user->id }})"
                        x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'edit-official-modal-{{ $user->id }}')"
                    >{{ __('Edit') }}
                    </x-edit-modal-button> 
                    @endif

                    @if($user->status != "Archived")
                    <form wire:submit.prevent="archive({{ $user->id }})">
                      <x-archive-modal-button>Archived</x-archive-modal-button> 
                    </form>
                    
                    @endif

                    @if($user->status == "Archived")
                    <form wire:submit.prevent="archive({{ $user->id }})">
                      <x-archive-modal-button>Unarchived</x-archive-modal-button> 
                    </form>
                    
                    @endif

                    {{-- <x-archive-modal-button data-modal-toggle="archive_official" data-modal-target="archive_official"  wire:click="archiveUser({{ $user->id }})"
                      
                      >{{ __('Archive') }}
                      </x-archive-modal-button>  --}}
                  @endif

                  
                  <!-- Edit Student Modal -->
                  <x-modal name="edit-student-modal-{{ $user->id }}" focusable>

                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Edit Student
                        </h3>
                        
                        <button type="button" wire:click="resetFields" x-on:click="$dispatch('close')" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        
                    </div>
                    <div wire:loading wire:target="editUser" >
                      <div class="relative items-center block max-w-sm p-6">
                        <div role="status" class="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2">
                            <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                            <span class="sr-only">Loading...</span>
                        </div>
                        
                      </div>
                      <h1 class="text-red">Please wait....</h1>
                      
                    </div>
                    
                      <form wire:submit.prevent='update_student' wire:loading.remove wire:target="editUser" class="p-6">
                          <div class="grid gap-4 mb-4 grid-cols-2 px-5">
                              <x-text-input id="id" wire:model="id" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="hidden" />

                              <div class="col-span-1">
                                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                                  <x-text-input id="first_name" wire:model="first_name" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="text" required/>
                                  <x-input-error :messages="$errors->get('first_name')" class="mt-2" /> 
                              </div>
                              <div class="col-span-1 sm:col-span-1">
                                  <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Middle Name</label>
                                  <x-text-input id="middle_name" wire:model="middle_name" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="text" required />
                                  <x-input-error :messages="$errors->get('middle_name')" class="mt-2" /> 
                              </div>

                              <div class="col-span-1">
                                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                                  <x-text-input id="last_name" wire:model="last_name" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="text" required />
                                  <x-input-error :messages="$errors->get('last_name')" class="mt-2" /> 
                              </div>
                              
                              <div class="col-span-1 sm:col-span-1">
                                  <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Student ID</label>
                                  <x-text-input id="student_id" wire:model="student_id" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="text" required />
                                  <x-input-error :messages="$errors->get('student_id')" class="mt-2" /> 
                              </div>

                              <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <x-text-input id="email" wire:model="email" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="email" required />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" /> 
                              </div>

                              @if($user->status == "Pending" || $user->status == "Denied")
                              <div class="col-span-2 sm:col-span-2">
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                <select name="" id="" wire:model="status" class="bg-gray-50 block p-2 mt-1 w-full text-sm border-gray-300 focus:border-orange-600 focus:ring-orange-500 rounded-md shadow-sm" required autofocus>
                                  <option value="Pending">Pending</option>
                                  <option value="Approved">Approved</option>
                                  <option value="Denied">Denied</option>
                                </select>
                                {{-- <x-input-error :messages="$errors->get('type')" class="mt-2" />  --}}
                              </div>
                              @endif

                              @if($user->status == "Archived")
                              <div class="col-span-2 sm:col-span-2">
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                <select name="" id="" wire:model="status" class="bg-gray-50 block p-2 mt-1 w-full text-sm border-gray-300 focus:border-orange-600 focus:ring-orange-500 rounded-md shadow-sm" required autofocus>
                                  <option value="Denied">Archived</option>
                                  <option value="Active">Unarchived</option>
                                </select>
                                {{-- <x-input-error :messages="$errors->get('type')" class="mt-2" />  --}}
                              </div>
                              @endif



                            
                              <div class="col-span-2 ">
                                  <div class="flex gap-4">
                                    <!-- <img class="h-28 rounded-full" src="{{ url('storage/' . $user->photo)}}" alt="Jese image"> -->
                                    <div class="mt-2">
                                      <img class="h-28 rounded-full" src="{{ url('storage/' . $user->photo)}}" alt="Jese image">
                                    </div>

                                    <div  class="col-span-1 flex flex-col justify-center">
                                      <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile</label>
                                      <x-text-input id="photo" class="text-sm" type="file" wire:model.defer="photo" :value="old('photo')"  />
                                      <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                                    </div>
                                  </div>
                              </div>

                              <div class="col-span-2 mb-4">
                                
                              </div>
                          </div>
                          
                          <div class="mt-6 flex justify-end">
                              <x-secondary-button wire:click="resetFields" x-on:click="$dispatch('close')">
                                  {{ __('Cancel') }}
                              </x-secondary-button>

                              <x-modal-button type="submit" wire:click="update_student" class="focus:ring-10 focus:ring-orange-400 focus:outline-none ml-auto flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mr-2 bi bi-pencil-square" viewBox="0 0 16 16">
                                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                </svg>
                                UPDATE 

                                <div wire:loading wire:target="update_student" >
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

                  <!-- Edit Official Modal -->
                  <x-modal name="edit-official-modal-{{ $user->id }}" focusable>

                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Edit Official
                        </h3>
                        
                        <button type="button" wire:click="resetFields" x-on:click="$dispatch('close')" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        
                    </div>
                    <div wire:loading wire:target="editUser" >
                      <div class="relative items-center block max-w-sm p-6 ">
                        <div role="status" class="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2">
                            <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                            <span class="sr-only">Loading...</span>
                        </div>
                        
                      </div>
                      <h1 class="text-red">Please wait....</h1>
                      
                    </div>
                    
                      <form wire:submit.prevent='update_official' wire:loading.remove wire:target="editUser" class="p-6">
                          <div class="grid gap-4 mb-4 grid-cols-2 px-5">
                              <x-text-input id="id" wire:model="id" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="hidden" />

                              <div class="col-span-1">
                                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                                  <x-text-input id="first_name" wire:model="first_name" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="text" required/>
                                  <x-input-error :messages="$errors->get('first_name')" class="mt-2" /> 
                              </div>
                              <div class="col-span-1 sm:col-span-1">
                                  <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Middle Name</label>
                                  <x-text-input id="middle_name" wire:model="middle_name" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="text" required />
                                  <x-input-error :messages="$errors->get('middle_name')" class="mt-2" /> 
                              </div>

                              <div class="col-span-1">
                                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                                  <x-text-input id="last_name" wire:model="last_name" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="text" required />
                                  <x-input-error :messages="$errors->get('last_name')" class="mt-2" /> 
                              </div>
                              
                              <div class="col-span-1 sm:col-span-1">
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                                <select name="" id="" wire:model="type" class="bg-gray-50 block p-2 mt-1 w-full text-sm border-gray-300 focus:border-orange-600 focus:ring-orange-500 rounded-md shadow-sm" required autofocus>
                                  <option value="">Select Type</option>
                                  <option value="Admin">Admin</option>
                                  <option value="Faculty">Faculty</option>
                                </select>
                                <x-input-error :messages="$errors->get('type')" class="mt-2" /> 
                              </div>

                              <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <x-text-input id="email" wire:model="email" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="email" required />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" /> 
                              </div>

                            
                              <div class="col-span-2 ">
                                  <div class="flex gap-4">
                                    <!-- <img class="h-28 rounded-full" src="{{ url('storage/' . $user->photo)}}" alt="Jese image"> -->
                                    <div class="mt-2">
                                      <img class="h-28 rounded-full" src="{{ url('storage/' . $user->photo)}}" alt="Jese image">
                                    </div>

                                    <div  class="col-span-1 flex flex-col justify-center">
                                      <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile</label>
                                      <x-text-input id="photo" class="text-sm" type="file" wire:model.defer="photo" :value="old('photo')"  />
                                      <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                                    </div>
                                  </div>
                              </div>

                              <div class="col-span-2 mb-4">
                                
                              </div>
                          </div>
                          
                          <div class="mt-6 flex justify-end">
                              <x-secondary-button wire:click="resetFields" x-on:click="$dispatch('close')">
                                  {{ __('Cancel') }}
                              </x-secondary-button>

                              <x-modal-button type="submit" wire:click="update_official" class="focus:ring-10 focus:ring-orange-400 focus:outline-none ml-auto flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mr-2 bi bi-pencil-square" viewBox="0 0 16 16">
                                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                </svg>
                                UPDATE 

                                <div wire:loading wire:target="update_official" >
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

                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
      {{ $users->links() }}
    </div>


    


    
    <!-- Create Official modal -->
    <div wire:ignore.self id="create_official" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-md max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                      Create New Official
                  </h3>
                  <button wire:click="resetFields" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="create_official">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <form wire:submit.prevent="store_official" class="p-4 md:p-5">
                  <div class="grid gap-4 mb-4 grid-cols-2">
                      <div class="col-span-1">
                          <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                          <x-text-input id="first_name" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="text" wire:model="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
                          <x-input-error :messages="$errors->get('first_name')" class="mt-2" /> 
                      </div>
                      <div class="col-span-1 sm:col-span-1">
                          <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Middle Name</label>
                          <x-text-input id="middle_name" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="text" wire:model="middle_name" :value="old('middle_name')" required autofocus autocomplete="middle_name" />
                          <x-input-error :messages="$errors->get('middle_name')" class="mt-2" /> 
                      </div>

                      <div class="col-span-1">
                          <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                          <x-text-input id="last_name" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="text" wire:model="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
                          <x-input-error :messages="$errors->get('last_name')" class="mt-2" /> 
                      </div>
                      
                      <div class="col-span-1 sm:col-span-1">
                          <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                          <select name="" id="" wire:model="type" class="bg-gray-50 block p-2 mt-1 w-full text-sm border-gray-300 focus:border-orange-600 focus:ring-orange-500 rounded-md shadow-sm" required autofocus>
                            <option value="">Select Type</option>
                            <option value="Admin">Admin</option>
                            <option value="Faculty">Faculty</option>
                          </select>
                          <x-input-error :messages="$errors->get('type')" class="mt-2" /> 
                      </div>

                      <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <x-text-input id="email" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="email" wire:model="email" :value="old('email')" required autofocus autocomplete="email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" /> 
                      </div>
                    
                      <div class="col-span-2 ">
                          <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                          <x-text-input id="photo" class="text-sm" type="file" wire:model="photo" :value="old('photo')" required autofocus autocomplete="photo" />
                          <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                      </div>

                  </div>

                  <x-modal-button type="submit" wire:click="store_official" class="focus:ring-10 focus:ring-orange-400 focus:outline-none ml-auto flex justify-center items-center">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Save 

                    <div wire:loading wire:target="store_official" >
                      <div class="relative items-center block max-w-sm ml-2 p-1 ">
                        <div role="status" class="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2">
                            <svg aria-hidden="true" class="w-4 h-4 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                            <span class="sr-only">Loading...</span>
                        </div>
                        
                      </div>
                    </div>
                  </x-modal-button>
              </form>
          </div>
      </div>
    </div> 


    <!-- Create Student modal -->
    <div wire:ignore.self id="create_student" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-md max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                      Create New Student
                  </h3>
                  <button wire:click="resetFields" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="create_student">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <form wire:submit.prevent="store_student" class="p-4 md:p-5">
                  <div class="grid gap-4 mb-4 grid-cols-2">
                      <div class="col-span-1">
                          <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                          <x-text-input id="first_name" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="text" wire:model="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
                          <x-input-error :messages="$errors->get('first_name')" class="mt-2" /> 
                      </div>
                      <div class="col-span-1 sm:col-span-1">
                          <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Middle Name</label>
                          <x-text-input id="middle_name" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="text" wire:model="middle_name" :value="old('middle_name')" required autofocus autocomplete="middle_name" />
                          <x-input-error :messages="$errors->get('middle_name')" class="mt-2" /> 
                      </div>

                      <div class="col-span-1">
                          <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                          <x-text-input id="last_name" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="text" wire:model="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
                          <x-input-error :messages="$errors->get('last_name')" class="mt-2" /> 
                      </div>
                      
                      <div class="col-span-1 sm:col-span-1">
                          <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Student ID</label>
                          <x-text-input id="student_id" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="text" wire:model="student_id" :value="old('student_id')" required autofocus autocomplete="student_id" />
                          <x-input-error :messages="$errors->get('student_id')" class="mt-2" /> 
                      </div>

                      <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <x-text-input id="email" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="email" wire:model="email" :value="old('email')" required autofocus autocomplete="email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" /> 
                      </div>
                    
                      <div class="col-span-2 ">
                          <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                          <x-text-input id="photo" class="text-sm" type="file" wire:model="photo" :value="old('photo')" required autofocus autocomplete="photo" />
                          <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                      </div>

                  </div>

                  <x-modal-button type="submit" wire:click="store_student" class="focus:ring-10 focus:ring-orange-400 focus:outline-none ml-auto flex justify-center items-center">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Save 

                    <div wire:loading wire:target="store_student" >
                      <div class="relative items-center block max-w-sm ml-2 p-1 ">
                        <div role="status" class="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2">
                            <svg aria-hidden="true" class="w-4 h-4 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                            <span class="sr-only">Loading...</span>
                        </div>
                        
                      </div>
                    </div>
                  </x-modal-button>
              </form>
          </div>
      </div>
    </div> 


    {{-- Archive Codes --}}

    {{-- <div wire:ignore.self id="archive_student" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-md max-h-full">
         
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
             
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                     
                      {{ $status == 'Archived' ? 'Unarchived Student' : 'Archived Student'}}
                  </h3>
                  <button wire:click="resetFields" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="archive_student">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
             
              <form wire:submit.prevent="archive" class="p-4 md:p-5">

                <h1 class="text-lg">Are you sure you want to {{ $status == 'Archived' ? 'Unarchived' : 'Archived'}} this Student?</h1>

                <x-text-input id="id" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="hidden" wire:model="id"/>

                  <x-modal-button type="submit" class="bg-red-600 hover:bg-red-700 focus:ring-10 mt-10 focus:ring-danger-400 focus:outline-none ml-auto flex justify-center items-center">
                    <i class="bi bi-archive-fill mr-3"></i>
                    {{ $status == 'Archived' ? 'UNARCHIVED' : 'ARCHIVED'}} 
                  </x-modal-button>
              </form>
          </div>
      </div>
    </div>

    <div wire:ignore.self id="archive_official" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-md max-h-full">
          
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
             
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                      Archive Official
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="archive_official">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
            
              <form wire:submit.prevent="archive" class="p-4 md:p-5">

                <h1 class="text-lg">Are you sure you want to Archive this Official?</h1>

                <x-text-input id="id" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="hidden" wire:model="id"/>

                <x-modal-button type="submit" class="bg-red-600 hover:bg-red-700 focus:ring-10 mt-10 focus:ring-danger-400 focus:outline-none ml-auto flex justify-center items-center">
                  <i class="bi bi-archive-fill mr-3"></i>
                  ARCHIVE 
                </x-modal-button>
              </form>
          </div>
      </div>
    </div> --}}


    {{-- UNARCHIVE --}}


    {{-- <div wire:ignore.self id="unarchive_student" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-md max-h-full">
         
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
             
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                      Unarchive Student1
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="unarchive_student">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
            
              <form wire:submit.prevent="unarchive" class="p-4 md:p-5">

                <h1 class="text-lg">Are you sure you want to Unarchive this Student?</h1>

                <x-text-input id="id" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="hidden" wire:model="id"/>

                  <x-modal-button type="submit" class="bg-red-600 hover:bg-red-700 focus:ring-10 mt-10 focus:ring-danger-400 focus:outline-none ml-auto flex justify-center items-center">
                    <i class="bi bi-archive-fill mr-3"></i>
                    UNARCHIVE 
                  </x-modal-button>
              </form>
          </div>
      </div>
    </div> --}}


    
</div>



