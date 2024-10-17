<div class="sidebar py-4">
    <!-- Logo -->
    <div class="d-flex items-center flex-column px-1">
        <a href="{{ route('dashboard') }}" class="d-flex alig-items-center justify-content-center" >
            <div class="d-flex justify-content-center alig-items-center">
                <x-application-logo />
            </div>

            <div class="d-flex justify-content-center alig-items-center flex-column my-auto ms-1 " >
                <p class="text-white text-left fw-semibold lh-sm fs-6 mb-0 pb-0 " >PBTS MACAMOT</p>
                <small class="fw-semibold lh-sm mb-0 pb-0 text-gray-300" >Digital Thesis Archive</small>
            </div>
        </a>
    </div>

    <div class="px-2">
        <ul class="mt-5">
            <x-side-nav-link link="{{ route('dashboard') }}" icon="bi bi-house-door-fill" :active="request()->is('dashboard')">Dashboard</x-side-nav-link>
            <x-side-nav-link link="{{ route('profile.edit') }}" icon="bi bi-journal-text" :active="request()->is('profile')" >Thesis Request</x-side-nav-link>
            <x-side-nav-link link="{{ route('dashboard') }}" icon="bi bi-house-door-fill" :active="request()->is('dashboard1')">Dashboard</x-side-nav-link>
            <x-side-nav-link link="{{ route('profile.edit') }}" icon="bi bi-journal-text" :active="request()->is('profile1')" >Thesis Request</x-side-nav-link>
        </ul>
    </div>

</div>