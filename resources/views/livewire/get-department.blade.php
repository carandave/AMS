<div>
    

    

    <div class="row mt-10 ">
        <div class="col-md-12">
            <form wire:submit.prevent="store_thesis">
                <div class="grid gap-6 grid-cols-2">
                   
                    <x-text-input id="title" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="hidden" wire:model="user_id"/>
                    
                    <div class="col-span-1">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project Title</label>
                        <x-text-input id="title" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="text" wire:model="title" :value="old('title')" required autofocus autocomplete="title" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" /> 
                    </div>
    
                    <div class="col-span-1">
                        <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year Published</label>
                        <x-dropdown-input id="year" class="bg-gray-50 block mt-1 w-full p-2 text-sm" wire:model="year" :value="old('year')" required autofocus autocomplete="year">
                            <option value="">Select Year</option> <!-- Default option -->
                            <option value="2000">2000</option>
                            <option value="2001">2001</option>
                            <option value="2002">2002</option>
                            <option value="2003">2003</option>
                            <option value="2004">2004</option>
                            <option value="2005">2005</option>
                            <option value="2006">2006</option>
                            <option value="2007">2007</option>
                            <option value="2008">2008</option>
                            <option value="2009">2009</option>
                            <option value="2010">2010</option>
                            <option value="2011">2011</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>
                            
                        </x-dropdown-input>
                        <x-input-error :messages="$errors->get('year')" class="mt-2" /> 
                    </div>
                </div>
    
                <div class="grid grid-cols-2 mt-3">
                    <div class="col-span-2">
                        <label for="author" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Authors <span class="text-red-900">(Format: Last Name, First Name Middle Name. )</span></label>
                        <textarea id="author" wire:model="author" rows="4" class="w-full bg-gray-50 block mt-1 p-2 text-sm border-gray-300 focus:border-orange-600 focus:ring-orange-500 rounded-md shadow-sm" required ></textarea>
                        <x-input-error :messages="$errors->get('author')" class="mt-2" /> 
                    </div>
                </div>
    
                <div class="grid gap-6 grid-cols-2 mt-3">
                    <div class="col-span-1">
                        <label for="adviser" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adviser</label>
                        <x-text-input id="adviser" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="text" wire:model="adviser" required autofocus/>
                        <x-input-error :messages="$errors->get('adviser')" class="mt-2" /> 
                    </div>
    
                    <div class="col-span-1">
                        <label for="keywords" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keywords</label>
                        <x-text-input id="keywords" class="bg-gray-50 block mt-1 w-full p-2 text-sm" type="text" wire:model="keywords" :value="old('keywords')" required autofocus autocomplete="keywords" />
                        <x-input-error :messages="$errors->get('keywords')" class="mt-2" /> 
                    </div>
                </div>
    
                
                
                <div class="grid gap-6 grid-cols-2 mt-3">
                    <div class="col-span-1">
                        <label for="departments_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Course Name</label>
                        <x-dropdown-input id="departments_id" class="bg-gray-50 block mt-1 w-full p-2 text-sm" wire:model.live="departments_id" required >
                            <option value="">Select Course</option> <!-- Default option -->
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </x-dropdown-input>
                        <x-input-error :messages="$errors->get('departments_id')" class="mt-2" /> 
                    </div>
    
                    <div class="col-span-1">
                        <label for="sub_departments_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Major Name</label>
                        <x-dropdown-input id="sub_departments_id" class="bg-gray-50 block mt-1 w-full p-2 text-sm" wire:model="sub_departments_id" required>
                            <option value="">Select Major</option> <!-- Default option -->
                            @foreach ($subdepartments as $subdepartment)
                                <option value="{{ $subdepartment->id }}">{{ $subdepartment->name }}</option>
                            @endforeach
                        </x-dropdown-input>
                        <x-input-error :messages="$errors->get('sub_departments_id')" class="mt-2" /> 
                    </div>
                </div>
    
    
                <div class="grid grid-cols-2 mt-3">
                    <div class="col-span-2">
                        <label for="abstract" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Abstract</label>
                        <textarea id="abstract" wire:model="abstract" rows="4" class="w-full bg-gray-50 block mt-1 p-2 text-sm border-gray-300 focus:border-orange-600 focus:ring-orange-500 rounded-md shadow-sm" required ></textarea>
                        <x-input-error :messages="$errors->get('abstract')" class="mt-2" /> 
                    </div>
                </div>
    
                <div class="grid grid-cols-2 mt-5">
                    <div class="col-span-1">
                        <label for="photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Banner Image</label>
                        <x-text-input id="photo" class="text-sm" type="file" wire:model.defer="photo" required/>
                        <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                    </div>
    
                    <div class="col-span-1">
                        <label for="file_path" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Thesis Document <span class="text-red-900">(Pdf File Only)</span></label>
                        <x-text-input id="file_path" class="text-sm" type="file" wire:model.defer="file_path" required/>
                        <x-input-error :messages="$errors->get('file_path')" class="mt-2" />
                    </div>
                </div>
    
                <div class="grid grid-cols-2 mt-8">
                    <div class="col-span-1">
                        
                    </div>
    
                    <div class="col-span-1">
                        <x-modal-button type="submit" class="w-40 focus:ring-10 focus:ring-orange-400 focus:outline-none ml-auto flex justify-center items-center">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                            Save 
        
                            <div wire:loading wire:target="store_thesis" >
                              <div class="relative items-center block max-w-sm ml-2 p-1 ">
                                <div role="status" class="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2">
                                    <svg aria-hidden="true" class="w-4 h-4 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                                    <span class="sr-only">Loading...</span>
                                </div>
                                
                              </div>
                            </div>
                          </x-modal-button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
