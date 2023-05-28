<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostChunk extends Component
{
    public $postIds;

    public function render()
    {
        $posts = Post::whereIn('id', $this->postIds)->get()->keyBy('id');

        $orderedPosts = collect($this->postIds)->map(fn ($id) => $posts[$id]);

        return view('livewire.post-chunk', ['posts' => $orderedPosts]);
    }
}
