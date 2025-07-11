@props(['name'])

@if ($menu = \App\Models\Menu::whereName($name)->first())
    <ul {{ $attributes->class("flex items-center space-x-4") }}>
        @foreach ($menu->items as $item)
            <li>
                <a
                    href="{{ $item['url'] }}"
                    @if ($item['type'] === 'external') target="_blank" @endif
                >
                    {{ $item['title'] }}
                </a>
            </li>
        @endforeach
    </ul>
@endif
