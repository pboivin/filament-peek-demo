@props(['page_id', 'text'])

@if ($page = \App\Models\Page::find($page_id))
    <a
        class="aspect-[4/3] p-4 border bg-gray-100"
        href="{{ route('page.show', ['slug' => $page->slug]) }}"
    >
        {{ $text ?: $page->title }}
    </a>
@endif
