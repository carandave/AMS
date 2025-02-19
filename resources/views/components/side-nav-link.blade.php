@props(['link', 'icon', 'active' => false, 'hasDropdown' => false, 'dropdownActiveRoutes' => []])

@php
    // Check if any of the dropdown routes are active
    $isDropdownActive = collect($dropdownActiveRoutes)->contains(fn($route) => request()->is($route));
@endphp

<li x-data="{ open: {{ $isDropdownActive ? 'true' : 'false' }} }" class="flex flex-col mt-1">
    <a  
        href="{{ $hasDropdown ? '#' : $link }}" 
        @if($hasDropdown) @click.prevent="open = !open" @endif
        class="{{ $active ? 'text-gray-100 bg-gray-700' : 'text-gray-400'}} flex justify-between hover:bg-gray-700 hover:text-gray-100 transition-colors duration-200 p-2 rounded "
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
    @if($hasDropdown && collect($dropdownActiveRoutes)->intersect(['admin/users/student', 'admin/users/admin'])->isNotEmpty())
        <ul x-show="open" x-cloak class="mt-1 ml-7 space-y-1">
            <li class="flex flex-col ">
                <a wire:navigate href="{{ route('admin.users.student') }}" 
                class="{{ request()->is('admin/users/student') ? 'text-gray-100 bg-gray-700 ' : 'text-gray-400' }} text-sm p-2 hover:text-gray-100 transition-colors duration-200 rounded">
                    Student List
                </a>
            </li>
            <li class="flex flex-col mb-1">
                <a wire:navigate href="{{ route('admin.users.admin') }}" 
                class="{{ request()->is('admin/users/admin') ? 'text-gray-100 bg-gray-700 ' : 'text-gray-400' }} text-sm p-2 hover:text-gray-100 transition-colors duration-200 rounded">
                    Official List
                </a>
            </li>
        </ul>
    @endif

    @if($hasDropdown && collect($dropdownActiveRoutes)->intersect(['faculty/users/student', 'faculty/users/admin'])->isNotEmpty())
        <ul x-show="open" x-cloak class="mt-1 ml-7 space-y-1">
            <li class="flex flex-col ">
                <a wire:navigate href="{{ route('faculty.users.student') }}" 
                class="{{ request()->is('faculty/users/student') ? 'text-gray-100 bg-gray-700 ' : 'text-gray-400' }} text-sm p-2 hover:text-gray-100 transition-colors duration-200 rounded">
                    Student List
                </a>
            </li>
            <li class="flex flex-col mb-1">
                <a wire:navigate href="{{ route('faculty.users.admin') }}" 
                class="{{ request()->is('faculty/users/admin') ? 'text-gray-100 bg-gray-700 ' : 'text-gray-400' }} text-sm p-2 hover:text-gray-100 transition-colors duration-200 rounded">
                    Official List
                </a>
            </li>
        </ul>
    @endif

    @if($hasDropdown && collect($dropdownActiveRoutes)->intersect(['admin/department/course', 'admin/department/major'])->isNotEmpty())
        <ul x-show="open" x-cloak class="mt-1 ml-7 space-y-1">
            <li class="flex flex-col ">
                <a wire:navigate href="{{ route('admin.department.course') }}" 
                class="{{ request()->is('admin/department/course') ? 'text-gray-100 bg-gray-700 ' : 'text-gray-400' }} text-sm p-2 hover:text-gray-100 transition-colors duration-200 rounded">
                    Course List
                </a>
            </li>
            <li class="flex flex-col mb-1">
                <a wire:navigate href="{{ route('admin.department.major') }}" 
                class="{{ request()->is('admin/department/major') ? 'text-gray-100 bg-gray-700 ' : 'text-gray-400' }} text-sm p-2 hover:text-gray-100 transition-colors duration-200 rounded">
                    Major List
                </a>
            </li>
        </ul>
    @endif


    @if($hasDropdown && collect($dropdownActiveRoutes)->intersect(['admin/reports/requested_thesis_reports', 'admin/reports/updated_thesis_reports'])->isNotEmpty())
        <ul x-show="open" x-cloak class="mt-1 ml-7 space-y-1">
            <li class="flex flex-col ">
                <a wire:navigate href="{{ route('admin.reports.requested_thesis_reports') }}" 
                class="{{ request()->is('admin/reports/requested_thesis_reports') ? 'text-gray-100 bg-gray-700 ' : 'text-gray-400' }} text-sm p-2 hover:text-gray-100 transition-colors duration-200 rounded">
                    Requested Thesis Reports
                </a>
            </li>
            <li class="flex flex-col mb-1">
                <a wire:navigate href="{{ route('admin.reports.uploaded_thesis_reports') }}" 
                class="{{ request()->is('admin/reports/uploaded_thesis_reports') ? 'text-gray-100 bg-gray-700 ' : 'text-gray-400' }} text-sm p-2 hover:text-gray-100 transition-colors duration-200 rounded">
                    Uploaded Thesis Reports
                </a>
            </li>
        </ul>
    @endif

</li>