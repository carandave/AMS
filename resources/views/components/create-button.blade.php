<a {{ $attributes->merge(['class' => 'text-sm font-medium px-4 py-2 bg-orange-500 rounded text-white focus:ring-4 focus:outline-none focus:ring-orange-400 hover:bg-orange-600 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>