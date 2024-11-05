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
              placeholder="Search Users..." 
              class="border rounded p-2 w-96 text-sm focus:border-orange-600 focus:ring-orange-500 "
          />
      </div>
    </div>

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
</div>
