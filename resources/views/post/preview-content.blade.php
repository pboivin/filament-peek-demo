<x-layouts.preview>
    <x-container>
        <div class="prose my-8 mx-auto text-black">
            @if ($content_blocks)
                <x-render-blocks :blocks="$content_blocks" />
            @endif
        </div>
    </x-container>
</x-layouts.preview>
