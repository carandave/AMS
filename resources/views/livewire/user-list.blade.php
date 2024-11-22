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

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 pt-6 mt-3 " >
        <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400" >
          <tr class="p-8" >
            <x-table-th >Photo</x-table-th>
            @if($showStudentList)
              <x-table-th>Student ID</x-table-th>
            @endif
            <x-table-th>Type</x-table-th>
            <x-table-th>First Name</x-table-th>
            <x-table-th>Middle Name</x-table-th>
            <x-table-th>Last Name</x-table-th>
            <x-table-th>Email</x-table-th>
            <x-table-th>Status</x-table-th>
            <x-table-th>Date Created</x-table-th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 ">
                    <x-table-td class="flex justify-center items-center"><img src="{{ url('storage/' . $user->photo)}}" alt="Profile" class="w-12 h-12 rounded-full "></x-table-td>
                    @if($showStudentList)
                    {{-- <td class="">{{ $user->student_id }}</td> --}}
                    <x-table-td >{{ $user->student_id }}</x-table-td>
                    @endif
                    <x-table-td >
                      {{ $user->role }}
                    </x-table-td>
                    <x-table-td >{{ $user->first_name }}</x-table-td>
                    <x-table-td>{{ $user->middle_name }}</x-table-td>
                    <x-table-td>{{ $user->last_name }}</x-table-td>
                    <x-table-td>{{ $user->email }}</x-table-td>
                    <x-table-td class="text-center">
                      @if($user->status == "Approved")
                      <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $user->status }}</span>
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
                    </x-table-td>
                    <x-table-td>{{ $user->created_at }}</x-table-td>
                </tr>
            @endforeach
        </tbody>
      </table>
      {{ $users->links() }}


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
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="create_official">
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
                            <option value="Librarian">Librarian</option>
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

                  <x-modal-button type="submit" class="focus:ring-10 focus:ring-orange-400 focus:outline-none ml-auto flex justify-center items-center">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Save 
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
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="create_student">
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

                  <x-modal-button type="submit" class="focus:ring-10 focus:ring-orange-400 focus:outline-none ml-auto flex justify-center items-center">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Save 
                  </x-modal-button>
              </form>
          </div>
      </div>
    </div> 

    
</div>
