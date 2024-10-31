@props(['link', 'icon', 'active' => false, 'hasDropdown' => false, 'dropdownActiveRoutes' => []])

@php
    // Check if any of the dropdown routes are active
    $isDropdownActive = collect($dropdownActiveRoutes)->contains(fn($route) => request()->is($route));
@endphp

<li x-data="{ open: {{ $isDropdownActive ? 'true' : 'false' }} }" class="flex flex-column">
    <a  
        href="{{ $hasDropdown ? '#' : $link }}" 
        @if($hasDropdown) @click.prevent="open = !open" @endif
        class="{{ $active ? 'text-gray-100 font-semibold bg-gray-700' : 'text-gray-400'}} flex justify-between hover:bg-gray-700 hover:text-gray-100 transition-colors duration-200 p-2 rounded"
        @if(!$hasDropdown) wire:navigate="{{ $link }}" @endif>
        <div class="flex items-center">
            <i class="{{ $icon }} text-xl"></i>
            <p class="text-md ml-2">{{ $slot }}</p>
        </div>
        @if($hasDropdown)
            <i :class="open ? 'bi bi-chevron-up' : 'bi bi-chevron-down'" class="ml-auto"></i>
        @endif
    </a>

    {{-- Dropdown items --}}
    @if($hasDropdown)
        <ul x-show="open" x-cloak class="mt-1 ml-7 space-y-1">
            <li class="flex flex-column">
                <a wire:navigate href="{{ route('admin.users.student') }}" 
                   class="{{ request()->is('admin/users/student') ? 'text-gray-100 font-semibold bg-gray-700 ' : 'text-gray-400' }} text-sm p-2 hover:text-gray-100 transition-colors duration-200 rounded">
                    Student List
                </a>
            </li>
            <li class="flex flex-column mb-1">
                <a wire:navigate href="{{ route('admin.users.admin') }}" 
                   class="{{ request()->is('admin/users/admin') ? 'text-gray-100 font-semibold bg-gray-700 ' : 'text-gray-400' }} text-sm p-2 hover:text-gray-100 transition-colors duration-200 rounded">
                    Admin List
                </a>
            </li>
        </ul>
    @endif
</li>