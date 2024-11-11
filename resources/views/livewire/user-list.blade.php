<div>
    {{-- In work, do what you enjoy. --}}
    <div class="row">
      <div class="col-md-4 flex items-center space-x-4 ">
        <select name="" id="" wire:model.live="status" class="font-semibold text-sm focus:border-orange-600 focus:ring-orange-500 rounded">
          @if($showStudentList)
          <option value="approved">All Students</option>
          @elseif (!$showStudentList)
          <option value="approved">All Admins</option>
          @endif
          <option value="pending">Pending</option>
          <option value="denied">Denied</option>
          <option value="archive">Archived</option>
        </select>
      </div>
      <div class="col-md-4">
        {{-- <h3>{{ $status }}</h3> --}}
        {{-- <h3>{{ $showStudentList }}</h3> --}}
      </div>
      <div class="col-md-4 flex items-center space-x-4 ">
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
      <div class="p-3 bg-green-100 mt-3 w-full rounded">
        <p class="text-gray-600"> {{ session('success_student') }}</p>
      </div>
    @endif

    <table class="table table-hover pt-6 mt-3 " >
        <thead class="" >
          <tr class="p-8" >
            @if($showStudentList)
              <x-table-th>Student ID</x-table-th>
            @endif
            <x-table-th>Type</x-table-th>
            <x-table-th>First Name</x-table-th>
            <x-table-th>Middle Name</x-table-th>
            <x-table-th>Last Name</x-table-th>
            <x-table-th>Email</x-table-th>
            <x-table-th>Date Created</x-table-th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    @if($showStudentList)
                    {{-- <td class="">{{ $user->student_id }}</td> --}}
                    <x-table-td>{{ $user->student_id }}</x-table-td>
                    @endif
                    <x-table-td>
                      @if ($user->role == 'student')
                          <h1>Student</h1>
                      @elseif ($user->role == 'admin')
                          <h1>Admin</h1>
                      @endif
                    </x-table-td>
                    <x-table-td>{{ $user->first_name }}</x-table-td>
                    <x-table-td>{{ $user->middle_name }}</x-table-td>
                    <x-table-td>{{ $user->last_name }}</x-table-td>
                    <x-table-td>{{ $user->email }}</x-table-td>
                    <x-table-td>{{ $user->created_at }}</x-table-td>
                </tr>
            @endforeach
        </tbody>
      </table>
      {{ $users->links() }}


      <!-- Button trigger modal -->
    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      Launch static backdrop modal
    </button> --}}

    <!-- Modal -->
    <div class="modal fade" id="create_official" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Official</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <x-modal-button data-bs-dismiss="modal" class="bg-gray-400 hover:bg-gray-900" >Close</x-modal-button>
            <x-modal-button >Save</x-modal-button>
          </div>
        </div>
      </div>
    </div>

    <div wire:ignore.self class="modal fade" id="create_student" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Student</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form wire:submit.prevent="insert_student">
              <div class="row">
                <div class="col-md-6">
                    <label for="first_name">First Name <span class="text-rose-700">*</span></label>
                    <x-text-input id="first_name" class="block mt-1 w-full p-2 text-sm" type="text" wire:model="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
                    <x-input-error :messages="$errors->get('first_name')" class="mt-2" /> 
                </div>

                <div class="col-md-6">
                  <label for="middle_name">Middle Name <span class="text-rose-700">*</span></label>
                  <x-text-input id="middle_name" class="block mt-1 w-full p-2 text-sm" type="text" wire:model="middle_name" :value="old('middle_name')" required autofocus autocomplete="middle_name" />
                  <x-input-error :messages="$errors->get('middle_name')" class="mt-2" /> 
                </div>
              </div>

              <div class="row mt-3">
                <div class="col-md-6">
                    <label for="last_name">Last Name <span class="text-rose-700">*</span></label>
                    <x-text-input id="last_name" class="block mt-1 w-full p-2 text-sm" type="text" wire:model="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
                    <x-input-error :messages="$errors->get('last_name')" class="mt-2" /> 
                </div>

                <div class="col-md-6">
                  <label for="student_id">Student ID <span class="text-rose-700">*</span></label>
                  <x-text-input id="student_id" class="block mt-1 w-full p-2 text-sm" type="text" wire:model="student_id" :value="old('student_id')" required autofocus autocomplete="student_id" />
                  {{-- @error('student_id') <span class="text-rose-800 text-sm mt-1">{{ $message }}</span> @enderror  --}}
                  <x-input-error :messages="$errors->get('student_id')" class="mt-2" /> 
                </div>
              </div>

              <div class="row mt-3">
                <div class="col-md-12">
                    <label for="email">Email <span class="text-rose-700">*</span></label>
                    <x-text-input id="email" class="block mt-1 w-full p-2 text-sm" type="email" wire:model="email" :value="old('email')" required autofocus autocomplete="email" />
                    {{-- @error('email') <span class="text-rose-800 text-sm mt-1">{{ $message }}</span> @enderror  --}}
                    <x-input-error :messages="$errors->get('email')" class="mt-2" /> 
                </div>
              </div>

              <div class="row mt-3">
                <div class="col-md-12">
                  {{-- <label for="image">Image <span class="text-rose-700">*</span></label>
                  <x-text-input id="image" class="block mt-1 w-full p-2 text-sm" type="file" wire:model="image" :value="old('image')" required autofocus autocomplete="image" />
                  <x-input-error :messages="$errors->get('image')" class="mt-2" /> --}}
                </div>
              </div>

              <div class="modal-footer">
                <x-modal-button data-bs-dismiss="modal" class="bg-gray-400 hover:bg-gray-900" >Close</x-modal-button>
                <x-modal-button type="submit" >Save</x-modal-button>
              </div>

            </form>
          </div>
          
        </div>
      </div>
    </div>
</div>
