@props(['block'])

@component("components.blocks.{$block['type']}", $block['data'] ?? []) @endcomponent
