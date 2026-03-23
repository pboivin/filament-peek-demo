@props([
    'image' => false,
    'url' => false,
    'alt' => false,
    'caption' => false,
    'ratio' => false,
])

@php
    $src = $image ? Storage::url($image) : $url;

    $ratioClass = \App\Filament\Blocks\Image::getRatioClass($ratio ?: '4-3');
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
