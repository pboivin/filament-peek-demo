@props(['post'])

@if ($post->footer_blocks)
    <div>
        <h2>See also</h2>

        <div class="grid gap-4 grid-cols-1 lg:grid-cols-2">
            <x-render-blocks :blocks="$post->footer_blocks" />
        </div>
    </div>
@endif
