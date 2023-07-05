<x-layout :site-name="false">
    <div class="site-intro flex items-center justify-center bg-black text-white">
        <h1 class="text-[80px] lg:text-[140px]">{{ config('app.name') }}</h1>
    </div>

    <x-container>
        @if ($featured->isNotEmpty())
            <h2 class="mt-8 text-2xl">Featured posts</h2>

            <div class="mt-10 grid gap-8 grid-cols-1 lg:grid-cols-2">
                @foreach ($featured as $post)
                    <x-card :post="$post"></x-card>
                @endforeach
            </div>
        @endif
    </x-container>
</x-layout>
