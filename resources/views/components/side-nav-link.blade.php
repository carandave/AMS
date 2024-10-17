@props(['link', 'icon', 'active' => false])

<li class="flex flex-column ">
    <a href="{{ $link }}" class="{{ $active ? 'text-gray-100 font-semibold bg-gray-700' : 'text-gray-400'}} flex justify-between hover:bg-gray-700 transition-colors duration-200 p-2 rounded-2" >
        <div class="d-flex flex-row justify-center items-center">
            <i class="{{ $icon }} text-xl"></i>
            <p class="text-md ml-2">{{ $slot }}</p>
        </div>
    
        {{-- <div class="flex justify-center items-center">
            <i class="bi bi-arrow-down-short text-2xl text-gray-400"></i>
            
        </div> --}}
    </a>
</li>
 