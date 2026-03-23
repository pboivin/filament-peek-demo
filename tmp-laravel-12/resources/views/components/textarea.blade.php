@props([
    'name',
    'label',
    'id' => '',
])

@php
    $id = $id ?: "{$name}_input";
@endphp

<div>
    <label for="{{ $id }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>

    <textarea
        name="{{ $name }}"
        id="{{ $id }}"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-700 focus:ring-green-700 sm:text-sm"
        {{ $attributes }}
    ></textarea>
</div>
