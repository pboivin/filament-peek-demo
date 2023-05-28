@props(['post'])

Published on {{ $post->published_at->format('M jS, Y') }} —
in <a href="{{ route('post.index', ['category' => $post->category->slug]) }}">{{ $post->category->name }}</a>
