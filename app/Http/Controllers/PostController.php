<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Post;
use App\Page;

class PostController extends Controller
{
    /**
     * Return the requested post with complete hierarchy
     * @param string $pageSlug
     * @param string $postSlug
     * @return \Illuminate\View\View
     */
    public function show($pageSlug, $postSlug)
    {
        $page = Page::where('pages.slug', $pageSlug)
            ->with(['posts' => function ($q) use ($postSlug) {
                $q->where('posts.slug', $postSlug);
            }])
            ->with('posts.comments')
            ->first();

        return view('post', compact('page'));
    }
}
