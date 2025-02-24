<div>
    {{-- In work, do what you enjoy. --}}
    <div class="grid grid-cols-12">
      <div class="col-span-4 flex items-center space-x-4 ">
        @if (auth()->user()->role === "Admin")
        <div class="grid grid-cols-12 mb-3">
            <div class="col-span-4 flex items-center space-x-4 ">
              <select name="" id="" wire:model.live="status" class="font-semibold text-sm focus:border-orange-600 focus:ring-orange-500 rounded">
                <option value="Active">Active</option>
                <option value="Archived">Archived</option>
              </select>
            </div>
            <div class="col-span-4">
              
            </div>
            
            <div class="col-span-4 flex items-center space-x-4 ">
               
            </div>
        </div>
        @endif
      </div>
      <div class="col-span-4">
        {{-- <h3>{{ $status }}</h3> --}}
        {{-- <h3>{{ $showStudentList }}</h3> --}}
        
      </div>
      
      <div class="col-span-4 flex items-center space-x-4 ">
         <input 
              type="text" 
              wire:model.live="search" 
              placeholder="Search Title"
              class="border rounded p-2 w-96 text-sm focus:border-orange-600 focus:ring-orange-500 "
          />
      </div>
    </div>

    <div class="relative overflow-x-auto">
      
      
      <table class="w-full mt-3 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Title 
                </th>
                <th scope="col" class="px-6 py-3">
                    Content
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Date & Time
                </th>
                @if(auth()->user()->role == "Admin")
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($announcement as $announce)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4">
                    {{ $announce->title}}
                </td>
                <td class="px-6 py-4">
                    {{ $announce->content}}
                </td>
                <td class="px-6 py-4">
                    @if($announce->status == "Active")
                        <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                          {{ $announce->status }}
                        </span>
                    @elseif($announce->status == "Archived")
                    <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">{{ $announce->status }}</span>
                    @endif
                </td>
                <td class="px-6 py-4 ">
                    {{ \Carbon\Carbon::parse($announce->created_at)->format('F j, Y h:i:s') }}
                </td>
                <td class="px-6 py-4 flex">

                    @if(auth()->user()->role == "Admin")
                      <x-edit-modal-button class="mr-1" wire:click="editAnnouncement('{{ $announce->id }}')"
                          x-data=""
                          x-on:click.prevent="$dispatch('open-modal', 'edit-announcement-modal-{{ $announce->id }}')"
                      >{{ __('Edit') }}
                      </x-edit-modal-button>
                    @endif 
  
                    <!-- Edit Major Modal -->
                    <x-modal name="edit-announcement-modal-{{ $announce->id }}" focusable>
  
                      <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                          <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                              Edit Announcement
                          </h3>
                          
                          <button type="button" wire:click="resetFields" x-on:click="$dispatch('close')" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                              </svg>
                              <span class="sr-only">Close modal</span>
                          </button>
                          
                      </div>
                      <div wire:loading wire:target="editAnnouncement" >
                        <div class="relative items-center block max-w-sm p-6">
                          <div role="status" class="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2">
                              <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                              <span class="sr-only">Loading...</span>
                          </div>
                          
                        </div>
                        <h1 class="text-red">Please wait....</h1>
                        
                      </div>
  
                        <form wire:submit.prevent='update_announcement' wire:loading.remove wire:target="editAnnouncement" class="p-6">
                            <x-text-input id="id" wire:model="id" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="hidden" />
                          <div class="grid gap-4 mb-4 grid-cols-2 ">
                              
                                <div class="col-span-2">
                                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                    <x-text-input id="title" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="text" wire:model="title" :value="old('title')" required autofocus autocomplete="title" />
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" /> 
                                </div>
                          </div>
                  
                          <div class="grid gap-4 mb-4 grid-cols-2">
                              <div class="col-span-2">
                                  <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                                  <textarea id="content" wire:model="content" rows="4" class="w-full bg-gray-50 block mt-1 p-2 text-sm border-gray-300 focus:border-orange-600 focus:ring-orange-500 rounded-md shadow-sm" required ></textarea>
                                  <x-input-error :messages="$errors->get('content')" class="mt-2" /> 
                              </div>
                          </div>

                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <div class="col-span-2">
                                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                    <select name="" id="" wire:model="status" class="bg-gray-50 block p-2 mt-1 w-full text-sm border-gray-300 focus:border-orange-600 focus:ring-orange-500 rounded-md shadow-sm" required autofocus>
                                        <option value="Active">Active</option>
                                        <option value="Archived">Archived</option>
                                    </select>
                                </div>
                            </div>
                              
                            <div class="mt-6 flex justify-end">
                                <x-secondary-button wire:click="resetFields" x-on:click="$dispatch('close')">
                                    {{ __('Cancel') }}
                                </x-secondary-button>
  
                                <x-modal-button type="submit" wire:click="update_announcement" class="focus:ring-10 focus:ring-orange-400 focus:outline-none ml-auto flex justify-center items-center">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mr-2 bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                  </svg>
                                  UPDATE 
  
                                  <div wire:loading wire:target="update_announcement" >
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
    {{ $announcement->links() }}

    <!-- Create Announcement Modal -->
  <x-modal name="create-announcement-modal" focusable>

    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
            Create Announcement
        </h3>
        
        <button type="button" wire:click="resetFields" x-on:click="$dispatch('close')" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            <span class="sr-only">Close modal</span>
        </button>
        
    </div>
    <div wire:loading wire:target="storeAnnouncement" >
      <div class="relative items-center block max-w-sm p-6">
        <div role="status" class="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2">
            <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
            <span class="sr-only">Loading...</span>
        </div>
        
      </div>
      <h1 class="text-red">Please wait....</h1>
      
    </div>

        <form wire:submit.prevent="store_announcement" class="p-4 md:p-5">
          <div class="grid gap-4 mb-4 grid-cols-2">
              <div class="col-span-2">
                  <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                  <x-text-input id="title" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="text" wire:model="title" :value="old('title')" required autofocus autocomplete="title" />
                  <x-input-error :messages="$errors->get('title')" class="mt-2" /> 
              </div>
          </div>

          <div class="grid gap-4 mb-4 grid-cols-2">
            <div class="col-span-2">
                <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                <textarea id="content" wire:model="content" rows="4" class="w-full bg-gray-50 block mt-1 p-2 text-sm border-gray-300 focus:border-orange-600 focus:ring-orange-500 rounded-md shadow-sm" required ></textarea>
                <x-input-error :messages="$errors->get('content')" class="mt-2" /> 
            </div>
          </div>

          <x-modal-button type="submit" wire:click="store_announcement" class="focus:ring-10 focus:ring-orange-400 focus:outline-none ml-auto flex justify-center items-center">
            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
            Save 

            <div wire:loading wire:target="store_announcement" >
              <div class="relative items-center block max-w-sm ml-2 p-1 ">
                <div role="status" class="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2">
                    <svg aria-hidden="true" class="w-4 h-4 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                    <span class="sr-only">Loading...</span>
                </div>
                
              </div>
            </div>
          </x-modal-button>
      </form>
  </x-modal> 

  </div>
    
</div>
