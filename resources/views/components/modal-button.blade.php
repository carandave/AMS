<button {{ $attributes->merge(['type' => 'button', 'class' => 'text-sm font-medium px-4 py-2 bg-orange-500 rounded text-white hover:bg-orange-600 transition ease-in-out duration-150']) }}>{{ $slot }}</button>