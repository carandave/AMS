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
                <td class="px-6 py-4 ">

                  <x-danger-button wire:click="editUser({{ $user->id }})"
                      x-data=""
                      x-on:click.prevent="$dispatch('open-modal', 'edit-user-modal-{{ $user->id }}')"
                  >{{ __('Edit') }}
                  </x-danger-button> 

                  

                  <x-modal name="edit-user-modal-{{ $user->id }}" focusable>

                    <div wire:loading wire:target="editUser" >
                      <div class="relative items-center block max-w-sm p-6 ">
                        <div role="status" class="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2">
                            <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                            <span class="sr-only">Loading...</span>
                        </div>
                      </div>
                    </div>
                      
                      <form wire:loading.remove wire:target="editUser" method="post" action="{{ route('admin.profile.destroy') }}" class="p-6">
                          
                        
                        
                          @csrf
                          @method('delete')
                          <label for="">First Name</label>
                          <input type="text" wire:model.defer="user.first_name">
                          

                          <h2 class="text-lg font-medium text-gray-900">
                              {{ __('Are you sure you want to delete your account?') }}
                          </h2>

                          <p class="mt-1 text-sm text-gray-600">
                              {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                          </p>

                          <div class="mt-6">
                              <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                              <x-text-input
                                  id="password"
                                  name="password"
                                  type="password"
                                  class="mt-1 block w-3/4"
                                  placeholder="{{ __('Password') }}"
                              />

                              <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                          </div>

                          <div class="mt-6 flex justify-end">
                              <x-secondary-button x-on:click="$dispatch('close')">
                                  {{ __('Cancel') }}
                              </x-secondary-button>

                              <x-danger-button class="ms-3">
                                  {{ __('Delete Account') }}
                              </x-danger-button>
                          </div>
                      </form>
                  </x-modal>
                  
                  {{-- <button wire:click="editUser({{ $user->id }})" data-modal-toggle="edit_student" data-modal-target="edit_student" data-bs-backdrop="false" class="bg-blue-300 text-sm rounded-full p-1 mr-1">
                    <svg class=" text-blue-800 w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
                  </svg>
                  </button> --}}
                  
                  {{-- <button data-modal-toggle="archive_student" data-modal-target="archive_student" data-bs-backdrop="false" class="bg-red-300 text-sm rounded-full p-1 ml-1 ">
                    <svg class="text-red-800 w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                      <path fill-rule="evenodd" d="M20 10H4v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8ZM9 13v-1h6v1a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                      <path d="M2 6a2 2 0 0 1 2-2h16a2 2 0 1 1 0 4H4a2 2 0 0 1-2-2Z"/>
                    </svg>
                  </button> --}}
                </td>

                <!-- Edit Student Modal -->
                {{-- <div wire:ignore.self id="edit_student" data-modal-backdrop="static" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full ">
                  <div class="relative p-4 w-full max-w-md max-h-full">
                      <!-- Modal content -->
                      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 w-full max-w-md max-h-full animate-fadeDown">
                          <!-- Modal header -->
                          <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                              <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                  Edit Student
                              </h3>
                              <button type="button" wire:modal="closeEditModal" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="edit_student">
                                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                  </svg>
                                  <span class="sr-only">Close modal</span>
                              </button>
                          </div>

                            <!-- Modal body -->
                              <form wire:submit.prevent="store_student" id="edit-student-form" class="p-4 md:p-5 ">
                                <div class="grid gap-4 mb-4 grid-cols-2 px-5">
                                    <div class="col-span-1">
                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                                        <x-text-input id="first_name" wire:model="edit_user.first_name" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="text" required autofocus autocomplete="first_name" />
                                        <x-input-error :messages="$errors->get('first_name')" class="mt-2" /> 
                                    </div>
                                    <div class="col-span-1 sm:col-span-1">
                                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Middle Name</label>
                                        <x-text-input id="middle_name" wire:model="edit_user.middle_name" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="text" required autofocus autocomplete="middle_name" />
                                        <x-input-error :messages="$errors->get('middle_name')" class="mt-2" /> 
                                    </div>

                                    <div class="col-span-1">
                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                                        <x-text-input id="last_name" wire:model="edit_user.last_name" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="text" required autofocus autocomplete="last_name" />
                                        <x-input-error :messages="$errors->get('last_name')" class="mt-2" /> 
                                    </div>
                                    
                                    <div class="col-span-1 sm:col-span-1">
                                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Student ID</label>
                                        <x-text-input id="student_id" wire:model="edit_user.student_id" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="text" required autofocus autocomplete="student_id" />
                                        <x-input-error :messages="$errors->get('student_id')" class="mt-2" /> 
                                    </div>

                                    <div class="col-span-2">
                                      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                      <x-text-input id="email" wire:model="edit_user.email" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="email" required autofocus autocomplete="email" />
                                      <x-input-error :messages="$errors->get('email')" class="mt-2" /> 
                                    </div>
                                  
                                    <div class="col-span-2 ">
                                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                                        <x-text-input id="photo" class="text-sm" type="file" wire:model="photo" :value="old('photo')" required autofocus autocomplete="photo" />
                                        <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                                    </div>

                                    <div class="col-span-2 mb-4">
                                      <x-modal-button type="submit" class="focus:ring-10 focus:ring-orange-400 focus:outline-none ml-auto flex justify-center items-center">
                                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                        Save 
                                      </x-modal-button>
                                    </div>
                                </div>
                            </form>
                      </div>
                  </div>
                </div>  --}}

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
