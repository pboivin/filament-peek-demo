@props([
    'image' => false,
    'url' => false,
    'alt' => false,
    'caption' => false,
    'ratio' => false,
])

@php
    $src = $image ? Storage::url($image) : $url;

    $ratioClass = match ($ratio ?: '4-3') {
        '4-3' => 'aspect-[4/3]',
        '3-4' => 'aspect-[3/4]',
        default => '',
    }
@endphp

@if ($src && $caption)
    <figure>
        <img
            class="w-full {{ $ratioClass }} object-cover object-center"
            src="{{ $src }}"
            @if ($alt) alt="{{ $alt }}" @endif
        >
        <figcaption>{{ $caption }}</figcaption>
    </figure>
@elseif ($src)
    <img
        class="w-full {{ $ratioClass }}"
        src="{{ $src }}"
        @if ($alt) alt="{{ $alt }}" @endif
    >
@endif
