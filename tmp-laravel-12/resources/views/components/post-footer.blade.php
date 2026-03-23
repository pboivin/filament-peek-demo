@props(['blocks'])

@if ($blocks)
    <div>
        <h2>See also</h2>

        <div class="grid gap-4 grid-cols-1 sm:grid-cols-2">
            <x-render-blocks :blocks="$blocks" />
        </div>
    </div>
@endif
