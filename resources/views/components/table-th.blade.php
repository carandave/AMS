{{-- <th class="text-light text-md" style="background-color: rgb(255, 101, 0); color: rgb(244, 246, 255)">{{ $slot }}</th>
 --}}

 <th {{ $attributes->merge(['class' => 'text-md p-2', 'style' => 'background-color: #ff7645ff; color: white']) }}>{{ $slot }}</th>