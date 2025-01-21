<div>
    <div class="relative overflow-x-auto">
      
        <table class="w-full mt-3 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Author
                </th>
                <th scope="col" class="px-6 py-3">
                    Year
                </th>
                <th scope="col" class="px-6 py-3">
                    Adviser
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Banner Image
                </th>
                <th scope="col" class="px-6 py-3">
                    Thesis File
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
              </tr>
          </thead>
          <tbody>
              @foreach ($list_thesis as $thesis)
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                  
                <td class="px-6 py-4">
                    {{ $thesis->title }}
                </td>
                <td class="px-6 py-4">
                {{ $thesis->author }}
                </td>
                <td class="px-6 py-4">
                    {{ $thesis->year }}
                </td>
                <td class="px-6 py-4">
                    {{ $thesis->adviser }}
                </td>
                <td class="px-6 py-4">
                    {{ $thesis->status }}
                </td>
               
                <td class="px-6 py-4">
                    <img class="w-10 h-10 rounded-full" src="{{ url('storage/' . $thesis->photo)}}" alt="Banner Image">
                </td>
                <td class="px-6 py-4">
                    <a href="{{ url('storage/' . $thesis->file_path) }}" target="_blank">PDF</a>
                </td>
                  
                  
  
              </tr>
              @endforeach
          </tbody>
      </table>
        
    </div>
</div>