<x-layout :title="$post->title">
    <x-banner :image="$post->getMainImage()">
        <div class="text-4xl text-white">
            <h1>
                {{ $post->title }}
            </h1>
        </div>
    </x-banner>

    <x-container>
        <div class="prose mt-8 mx-auto text-black">
            {!! $post->content !!}

            <div class="mt-16">
                <x-post-meta :post="$post" />
            </div>
        </div>
    </x-container>
</x-layout>
