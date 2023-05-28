<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;

class PageController extends Controller
{
    public function home()
    {
        $featured = Post::featured()->orderBy('published_at', 'desc')->get();

        return view('home', ['featured' => $featured]);
    }

    public function about()
    {
        abort_unless($page = Page::whereSlug('about')->first(), 404);

        return view('about', ['page' => $page]);
    }

    public function contact()
    {
        return view('contact');
    }
}
