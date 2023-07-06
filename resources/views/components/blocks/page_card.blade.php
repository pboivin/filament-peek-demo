@props(['page_id', 'text'])

@if ($page = \App\Models\Page::find($page_id))
    <a
        class="aspect-square p-4 border"
        href="{{ route('page.show', ['slug' => $page->slug]) }}"
    >
        {{ $text ?: $page->title }}
    </a>
@endif
