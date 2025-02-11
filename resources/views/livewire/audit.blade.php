<div>
    {{-- In work, do what you enjoy. --}}
    <div class="grid grid-cols-12">
      <div class="col-span-4 flex items-center space-x-4 ">
        
      </div>
      <div class="col-span-4">
        {{-- <h3>{{ $status }}</h3> --}}
        {{-- <h3>{{ $showStudentList }}</h3> --}}
        
      </div>
      
      <div class="col-span-4 flex items-center space-x-4 ">
         <input 
              type="text" 
              wire:model.live="search" 
              placeholder="Search User"
              class="border rounded p-2 w-96 text-sm focus:border-orange-600 focus:ring-orange-500 "
          />
      </div>
    </div>

    <div class="relative overflow-x-auto">
      
      
      <table class="w-full mt-3 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    User 
                </th>
                <th scope="col" class="px-6 py-3">
                    User Type
                </th>
                <th scope="col" class="px-6 py-3">
                    Event Type
                </th>
                <th scope="col" class="px-6 py-3">
                    Table Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Record ID 
                </th>
                <th scope="col" class="px-6 py-3">
                    Date & Time
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($audit_trail as $log)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4">
                    {{ $log->user->last_name }}, {{ $log->user->first_name }} {{ $log->user->middle_name }}.
                </td>
                <td class="px-6 py-4">
                    {{ $log->user->role}}
                </td>
                <td class="px-6 py-4">
                    {{ $log->action}}
                </td>
                <td class="px-6 py-4">
                    {{ $log->table_name}}
                </td>
                <td class="px-6 py-4">
                    {{ $log->record_id}}
                </td>
                <td class="px-6 py-4 ">
                    {{ \Carbon\Carbon::parse($log->created_at)->format('F j, Y h:i:s') }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $audit_trail->links() }}

  </div>
    
</div>
