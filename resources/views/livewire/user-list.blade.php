<div>
    {{-- In work, do what you enjoy. --}}

    <table class="table pt-6">
        <thead class="">
          <tr class="p-8">
            <th class="border">Student ID</th>
            <th class="border">First Name</th>
            <th class="border">Middle Name</th>
            <th class="border">Last Name</th>
            <th class="border">Email</th>
            <th class="border">Created Date</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="border">{{ $user->student_id }}</td>
                    <td class="border">{{ $user->first_name }}</td>
                    <td class="border">{{ $user->middle_name }}</td>
                    <td class="border">{{ $user->last_name }}</td>
                    <td class="border">{{ $user->email }}</td>
                    <td class="border">{{ $user->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
      </table>
      {{ $users->links() }}
</div>
