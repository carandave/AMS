<div>
    {{-- In work, do what you enjoy. --}}
    <div class="row">
      <div class="col-md-4 flex items-center space-x-4">
        <select name="" id="" wire:model.live="status">
          <option value="approved">All Students</option>
          <option value="pending">Pending</option>
          <option value="denied">Denied</option>
          <option value="archive">Archive</option>
        </select>
      </div>
      <div class="col-md-4">
        {{-- <h3>{{ $status }}</h3> --}}
        {{-- <h3>{{ $showStudentList }}</h3> --}}
      </div>
      <div class="col-md-4 flex flex-end items-center space-x-4">
        {{-- <input type="text" class="border border-gray-200 p-2 rounded w-96" placeholder="Search students" wire:model="search">
         --}}
         <input 
              type="text" 
              wire:model.live="search" 
              placeholder="Search Users..." 
              class="border rounded p-2 mb-4 w-96"
          />
      </div>
    </div>

    <table class="table pt-6 mt-3">
        <thead class="">
          <tr class="p-8">
            @if($showStudentList)
            <th class="" >Student ID</th>
            @endif
            <th class="" >Role</th>
            <th class="">First Name</th>
            <th class="">Middle Name</th>
            <th class="">Last Name</th>
            <th class="">Email</th>
            <th class="">Created Date</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    @if($showStudentList)
                    <td class="">{{ $user->student_id }}</td>
                    @endif
                    <td class="">
                      @if ($user->role == 'student')
                          <h1>Student</h1>
                      @elseif ($user->role == 'admin')
                          <h1>Admin</h1>
                      @endif
                    </td>
                    <td class="">{{ $user->first_name }}</td>
                    <td class="">{{ $user->middle_name }}</td>
                    <td class="">{{ $user->last_name }}</td>
                    <td class="">{{ $user->email }}</td>
                    <td class="">{{ $user->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
      </table>
      {{ $users->links() }}
</div>
