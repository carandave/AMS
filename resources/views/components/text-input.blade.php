@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-orange-600 focus:ring-orange-500 rounded-md shadow-sm']) }}>
