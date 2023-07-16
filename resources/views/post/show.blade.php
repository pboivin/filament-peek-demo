<x-layouts.main :title="$post->title">
    <x-banner :image="$post->getMainImage()">
        <div class="text-4xl text-white">
            <h1>
                {{ $post->title }}
                {{-- @isset($isPeekPreviewModal) [Preview] @endisset --}}
            </h1>
        </div>
    </x-banner>

    <x-container>
        <div class="prose mt-8 mx-auto text-black">
            @if ($post->content_blocks)
                <x-render-blocks :blocks="$post->content_blocks" />
            @endif

            <hr>

            <x-post-meta :post="$post" />

            <x-post-footer :blocks="$post->footer_blocks" />
        </div>
    </x-container>
</x-layouts.main>
