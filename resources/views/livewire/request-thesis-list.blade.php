<div>   

    <div class="grid grid-cols-12">
        <div class="col-span-4 flex items-center space-x-4 ">
            <select name="" id="" wire:model.live="status" class="font-semibold text-sm focus:border-orange-600 focus:ring-orange-500 rounded">
            <option value="Approved">Approved</option>
            <option value="Pending">Pending</option>
            <option value="Denied">Denied</option>
            </select>
        </div>
        <div class="col-span-4">
            
        </div>
        
        <div class="col-span-4 flex items-center space-x-4 ">
            
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
                    Purpose
                </th>
                <th scope="col" class="px-6 py-3">
                    Approved By
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Submission Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>

              </tr>
          </thead>
          <tbody>
           
            @foreach ($request_thesis as $thesis)
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4">
                    {{ $thesis->thesis->title }}
                </td>
                <td class="px-6 py-4">
                    {{ $thesis->purpose }}
                </td>
                <td class="px-6 py-4">
                    {{ $thesis->users->last_name }}
                </td>
                <td class="px-6 py-4">
                    @if($thesis->status == "Approved")
                        <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                          Approved
                        </span>
                        @endif
                        @if($thesis->status == "Pending")
                        <span class="bg-orange-100 text-orange-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-orange-900 dark:text-orange-300">{{ $thesis->status }}</span>
                        @endif
                        @if($thesis->status == "Denied")
                        <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">{{ $thesis->status }}</span>
                        @endif
                        @if($thesis->status == "Archived")
                        <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">{{ $thesis->status }}</span>
                        @endif
                </td>
                <td class="px-6 py-4">
                    {{ \Carbon\Carbon::parse($thesis->submission_date)->format('F j, Y') }}
                </td>

                <td class="px-6 py-4">
                    <a href="{{ url('storage/' . $thesis->thesis->file_path) }}" target="_blank" class="bg-sky-300 p-2 rounded-md text-white hover:bg-sky-600 focus:outline-1 focus:ring transition ease-in-out duration-150"><i class="bi bi-file-earmark"></i>Download PDF</a>
                </td>
              </tr>
            @endforeach
              
          </tbody>
      </table>

      {{-- {{ $request_thesis->links() }} --}}
        
    </div>
</div>
