@props([
    'image' => false,
    'url' => false,
    'alt' => false,
    'caption' => false,
])

@php
    $src = $image ? Storage::url($image) : $url;
@endphp

@if ($src && $caption)
    <figure>
        <img
            class="w-full"
            src="{{ $src }}"
            @if ($alt) alt="{{ $alt }}" @endif
        >
        <figcaption>{{ $caption }}</figcaption>
    </figure>
@elseif ($src)
    <img
        class="w-full"
        src="{{ $src }}"
        @if ($alt) alt="{{ $alt }}" @endif
    >
@endif
