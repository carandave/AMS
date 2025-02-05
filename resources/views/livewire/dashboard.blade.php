<div>
    {{-- Stop trying to control. --}}
    <div class="grid grid-cols-4 gap-4">
        <div class="col-span-1">
            <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">Total Thesis Uploaded</h5>
                <p class="text-xl font-normal text-gray-700 dark:text-gray-400">{{ $totalThesisUploaded }}</p>
            </a>
        </div>

        <div class="col-span-1">
            <a href="#" class="block max-w-sm p-6 bg-green-100 text-green-800 border border-gray-200 rounded-lg shadow-sm hover:bg-green-200 ">
                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">Approved Request Thesis</h5>
                <p class="text-xl font-normal text-green-700 ">{{ $totalApprovedThesisRequest }}</p>
            </a>
        </div>

        <div class="col-span-1">
            <a href="#" class="block max-w-sm p-6 bg-orange-100 border border-gray-200 rounded-lg shadow-sm hover:bg-orange-300 ">
                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">Pending Request Thesis </h5>
                <p class="text-xl font-normal text-orange-700 ">{{ $totalPendingThesisRequest }}</p>
            </a>
        </div>

        <div class="col-span-1">
            <a href="#" class="block max-w-sm p-6 bg-red-100 border border-gray-200 rounded-lg shadow-sm hover:bg-red-300">
                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">Rejected Request Thesis</h5>
                <p class="text-xl font-normal text-red-700 ">{{ $totalDeniedThesisRequest }}</p>
            </a>
        </div>
    </div>
</div>
