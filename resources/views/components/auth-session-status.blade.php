@props(['status'])

@if ($status)
    {{-- <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600']) }}>
        {{ $status }}
    </div> --}}

    <div id="alert-official" {{ $attributes->merge(['class' => 'mt-3 flex items-center p-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400']) }} role="alert">
        <div {{ $attributes->merge(['class' => 'ms-3 text-sm font-medium']) }} >
            <span class="font-medium">{{ $status }}</span> 
        </div>
        <button type="button" {{ $attributes->merge(['class' => 'ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700']) }} data-dismiss-target="#alert-official" aria-label="Close">
            <span {{ $attributes->merge(['class' => 'sr-only']) }}>Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
@endif
