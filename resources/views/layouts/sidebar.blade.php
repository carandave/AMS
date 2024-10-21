<div class="sidebar py-4">
    <!-- Logo -->
    <div class="d-flex items-center flex-column px-1">
        @auth
            @if(Auth::user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}" class="d-flex alig-items-center justify-content-center" >
                <div class="d-flex justify-content-center alig-items-center">
                    <x-application-logo />
                </div>

                <div class="d-flex justify-content-center alig-items-center flex-column my-auto ms-1 " >
                    <p class="text-white text-left fw-semibold lh-sm fs-6 mb-0 pb-0 " >PBTS MACAMOT</p>
                    <small class="fw-semibold lh-sm mb-0 pb-0 text-gray-300" >Digital Thesis Archive</small>
                </div>
            </a>
            @elseif(Auth::user()->role === 'student')
            <a href="{{ route('student.dashboard') }}" class="d-flex alig-items-center justify-content-center" >
                <div class="d-flex justify-content-center alig-items-center">
                    <x-application-logo />
                </div>

                <div class="d-flex justify-content-center alig-items-center flex-column my-auto ms-1 " >
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
                @if(Auth::user()->role === 'admin')
                <x-side-nav-link link="{{ route('admin.dashboard') }}" icon="bi bi-house-door-fill" :active="request()->is('admin/dashboard')">Dashboard</x-side-nav-link>
                <x-side-nav-link link="{{ route('admin.users') }}" icon="bi bi-journal-text" :active="request()->is('admin/users')" >Users</x-side-nav-link>
                @elseif(Auth::user()->role === 'student')
                <x-side-nav-link link="{{ route('student.dashboard') }}" icon="bi bi-house-door-fill" :active="request()->is('student/dashboard')">Dashboard</x-side-nav-link>
                @endif
            @endauth
            
        </ul>
    </div>

</div>