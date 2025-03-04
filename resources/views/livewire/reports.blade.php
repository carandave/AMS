<div>
    {{-- In work, do what you enjoy. --}}
    <div class="grid grid-cols-12 ">
      <div class="col-span-6 flex items-center space-x-4 ">
        
        {{-- <div id="date-range-picker" date-rangepicker class="flex items-center">
            <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                </svg>
            </div>
            <input id="datepicker-range-start" name="start" wire:model="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
            </div>
            <span class="mx-4 text-gray-500">to</span>
            <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                </svg>
            </div>
            <input id="datepicker-range-end" name="end" wire:model="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end">
        </div>
        </div> --}}

        <div class="mb-4">
            <label for="end_date" class="mx-2">Approved Date: </label>
            <input type="date" id="start_date" wire:model.live="start" class="bg-gray-50 border-gray-300 border text-gray-900 text-md rounded-lg focus:ring-orange-500 focus:border-orange-500 ">
            <label for="end_date" class="mx-2">To </label>
            <input type="date" id="end_date" wire:model.live="end" class="bg-gray-50 border-gray-300 border text-gray-900 text-md rounded-lg focus:ring-orange-500 focus:border-orange-500">
        </div>
  
        
      </div>
      <div class="col-span-3">
        {{-- <h3>{{ $status }}</h3> --}}
        {{-- <h3>{{ $showStudentList }}</h3> --}}
        
      </div>

      <div class="col-span-3 ml-auto ">
        <button onclick="printReport()" class="px-4 py-2 bg-blue-500 text-white rounded">Print Report</button> 
      </div>
      
      {{-- <div class="col-span-4 flex items-center space-x-4 ">
         
      </div> --}}
    </div>


    <div class="relative overflow-x-auto " id="reportTable">
      
      @if ($showRequestedReports)
      <table class="w-full mt-3 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Requested By
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Submission Date
                    </th>


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
                        Approved Date
                    </th>
                    
                   
    
                  </tr>
        </thead>
        <tbody>
            
            
            @foreach ($thesis_list as $thesis)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
              <td class="px-6 py-4">
                  {{ $thesis->student->first_name }} {{ $thesis->student->last_name }}
              </td>
              <td class="px-6 py-4">
                {{ \Carbon\Carbon::parse($thesis->submission_date)->format('F j, Y') }}
              </td>
              <td class="px-6 py-4">
                  {{ $thesis->thesis->title }}
              </td>
              <td class="px-6 py-4">
                  {{ $thesis->purpose }}
              </td>
              
              <td class="px-6 py-4">
                  {{ $thesis->users->first_name }}  {{ $thesis->users->last_name }}
              </td>

              <td class="px-6 py-4">
                {{ \Carbon\Carbon::parse($thesis->approved_date)->format('F j, Y') }}
            </td>
              
              

            </tr>
          @endforeach
           
        </tbody>
    </table>


    {{-- For Thesis List Reports --}}
    @elseif ($showRequestedReports == false)
    <table class="w-full mt-3 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Leader
                </th>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Authors
                </th>
                <th scope="col" class="px-6 py-3">
                    Keywords
                </th>
                
                <th scope="col" class="px-6 py-3">
                    Year Published
                </th>

                <th scope="col" class="px-6 py-3">
                    Department
                </th>

                <th scope="col" class="px-6 py-3">
                    Major
                </th>

                <th scope="col" class="px-6 py-3">
                    Adviser
                </th>
               
                <th scope="col" class="px-6 py-3">
                    Submission Date
                </th>
                
                <th scope="col" class="px-6 py-3">
                    Approved Date
                </th>
                
                
              </tr>
        </thead>
        <tbody>
            
            
            @foreach ($thesis_list as $thesis)
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4">
                    {{ $thesis->user->last_name }}, {{ $thesis->user->first_name }} {{ $thesis->user->middlex_name }}.
                </td>
                <td class="px-6 py-4">
                    {{ $thesis->title }}
                </td>
                <td class="px-6 py-4">
                {{ $thesis->author }}
                </td>

                <td class="px-6 py-4">
                {{ $thesis->keywords }}
                </td>

                <td class="px-6 py-4">
                    {{ $thesis->year }}
                </td>
                
                <td class="px-6 py-4">
                    {{ $thesis->department->name }}
                </td>
                
                <td class="px-6 py-4">
                    {{ $thesis->sub_department->name ?? 'N/A' }}
                </td>

                <td class="px-6 py-4">
                    {{ $thesis->adviser }}
                </td>

                <td class="px-6 py-4">
                    {{ \Carbon\Carbon::parse($thesis->submission_date)->format('F j, Y') }}
                </td>
                   
                <td class="px-6 py-4">
                    {{ \Carbon\Carbon::parse($thesis->approval_date)->format('F j, Y') }}
                </td>
              @endforeach
           
        </tbody>
    </table>
    @endif
  </div>

  <script>
    function printReport() {
        var content = document.getElementById("reportTable").innerHTML;
        var printWindow = window.open("", "", "width=800,height=600");
        printWindow.document.write("<html><head><title>Print Report</title></head><body>");
        printWindow.document.write(content);
        printWindow.document.write("</body></html>");
        printWindow.document.close();
        printWindow.print();
    }
</script>

</div>



