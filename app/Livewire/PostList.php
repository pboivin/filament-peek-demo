<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Post;

class PostList extends Component
{
    const ITEMS_PER_PAGE = 10;

    // All categories
    public $categories;

    // Variables keeping track of the current post query
    public $postCount;
    public $postChunks;
    public $queryCount = 0;
    public $currentChunk = 0;

    // Currently selected category
    public $category;

    // Currently selected order
    public $order = 'date_desc';

    protected $queryString = [
        'category' => ['except' => ''],
        'order' => ['except' => 'date_desc'],
    ];

    public function mount()
    {
        $this->categories = Category::all();

        $this->refreshPosts();
    }

    public function render()
    {
        return view('livewire.post-list', [
            'activeCategory' => $this->getActiveCategory(),
        ]);
    }

    public function updatedCategory()
    {
        $this->refreshPosts();
    }

    public function updatedOrder()
    {
        $this->refreshPosts();
    }

    public function loadMore()
    {
        $this->currentChunk++;
    }

    private function getActiveCategory()
    {
        return $this->categories->first(fn ($i) => $i->slug === $this->category);
    }

    private function getPostQuery()
    {
        $query = Post::published();

        if ($activeCategory = $this->getActiveCategory()) {
            $query = $query->whereCategoryId($activeCategory->id);
        }

        if ($this->order == 'date_asc') {
            $query = $query->orderBy('published_at', 'asc');
        } else {
            $query = $query->orderBy('published_at', 'desc');
        }

        return $query;
    }

    private function refreshPosts()
    {
        // This will force the update of the `post-chunk` child components
        $this->queryCount++;
        $this->currentChunk = 0;

        $postIds = $this->getPostQuery()->pluck('id');
        $this->postCount = $postIds->count();
        $this->postChunks = $postIds->chunk(self::ITEMS_PER_PAGE);
    }
}
