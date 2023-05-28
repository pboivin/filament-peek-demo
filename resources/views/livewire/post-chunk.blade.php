<div class="mt-16 grid gap-16 grid-cols-1 lg:grid-cols-2">
    @foreach ($posts as $post)
        <x-card :post="$post"></x-card>
    @endforeach
</div>
