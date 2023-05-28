<x-layout title="About">
    <x-banner>
        <h1>{{ $page->title }}</h1>
    </x-banner>

    <x-container>
        <div class="prose mt-8 mx-auto text-black">
            {!! $page->content !!}
        </div>
    </x-container>
</x-layout>
