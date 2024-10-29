<div>
    {{-- In work, do what you enjoy. --}}
    <div class="row">
      <div class="col-md-4">

      </div>
      <div class="col-md-4">

      </div>
      <div class="col-md-4 flex flex-end">
        {{-- <input type="text" class="border border-gray-200 p-2 rounded w-96" placeholder="Search students" wire:model="search">
         --}}
         <input 
              type="text" 
              wire:model.debounce.300ms="search" 
              placeholder="Search Users..." 
              class="border rounded p-2 mb-4"
          />
      </div>
    </div>
    <div>Search Query: {{ $search }}</div>
    

    <table class="table pt-6 mt-3">
        <thead class="">
          <tr class="p-8">
            <th class="" >Student ID</th>
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
                    <td class="">{{ $user->student_id }}</td>
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
