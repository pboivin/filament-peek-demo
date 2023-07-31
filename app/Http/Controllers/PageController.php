<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;

class PageController extends Controller
{
    public function home()
    {
        $featured = Post::featured()->orderBy('published_at', 'desc')->get();

        return view('page.show-home', ['featured' => $featured]);
    }

    public function contact()
    {
        return view('page.show-contact');
    }

    public function show($slug)
    {
        abort_unless($page = Page::whereSlug($slug)->first(), 404);

        return view('page.show', ['page' => $page]);
    }
}
