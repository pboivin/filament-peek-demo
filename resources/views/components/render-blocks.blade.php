@props(['blocks'])

@foreach ($blocks as $block)
    <x-render-block :block="$block" />
@endforeach
