@props([
    'name',
    'label' => '',
    'id' => '',
])

@php
    $id = $id ?: "{$name}_input";
@endphp

<div>
    @if ($label)
        <label for="{{ $id }}" class="mb-1 block text-sm font-medium text-gray-700">{{ $label }}</label>
    @endif

    <select
        name="{{ $name }}"
        id="{{ $id }}"
        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-green-700 focus:ring-green-700 sm:text-sm"
        {{ $attributes }}
    >
        {!! $slot !!}
    </select>
</div>
