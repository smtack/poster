@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'h-10 p-2 outline-none border border-gray-300 focus:ring-1 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-xs']) !!}>
