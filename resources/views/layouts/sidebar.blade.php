<div class="sidebar py-4 ">
    <!-- Logo -->
    <div class="flex items-center flex-col px-1 pt-4">
        @auth
            @if(Auth::user()->role === 'Admin')
            <a href="{{ route('admin.dashboard') }}" class="flex items-center justify-center" >
                <div class="flex justify-center items-center">
                    <x-application-logo />
                </div>

                <div class="flex justify-center items-center flex-col my-auto ms-1 " >
                    <p class="text-white text-left fw-semibold lh-sm fs-6 mb-0 pb-0 " >PBTS MACAMOT</p>
                    <small class="fw-semibold lh-sm mb-0 pb-0 text-gray-300" >Digital Thesis Archive</small>
                </div>
            </a>
            @elseif(Auth::user()->role === 'Student')
            <a href="{{ route('student.dashboard') }}" class="flex items-center justify-center" >
                <div class="flex justify-center items-center">
                    <x-application-logo />
                </div>

                <div class="flex justify-center items-center flex-col my-auto ms-1 " >
                    <p class="text-white text-left fw-semibold lh-sm fs-6 mb-0 pb-0 " >PBTS MACAMOT</p>
                    <small class="fw-semibold lh-sm mb-0 pb-0 text-gray-300" >Digital Thesis Archive</small>
                </div>
            </a>
            @endif
        @endauth
    </div>

    <div class="px-2">
        <ul class="mt-5">
            @auth
            @if(Auth::user()->role === 'Admin')
                <x-side-nav-link link="{{ route('admin.dashboard') }}" icon="bi bi-house-door-fill" :active="request()->is('admin/dashboard')">Dashboard</x-side-nav-link>
                <x-side-nav-link icon="bi bi-people-fill" hasDropdown="true" :dropdownActiveRoutes="['admin/users/student', 'admin/users/admin']">Users</x-side-nav-link>
                <x-side-nav-link link="{{ route('admin.profile.edit') }}" icon="bi bi-person-fill" :active="request()->is('admin/profile')">Profile</x-side-nav-link>
            @elseif(Auth::user()->role === 'Student')
                <x-side-nav-link link="{{ route('student.dashboard') }}" icon="bi bi-house-door-fill" :active="request()->is('student/dashboard')">Profile</x-side-nav-link>
            @endif
            @endauth
            
        </ul>
    </div>

</div>

