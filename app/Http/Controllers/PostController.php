<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Post;
use App\Page;

class PostController extends Controller
{
    /**
     * Return the requested page
     * @param Post $postSlug - Eager loaded
     * @param Post $postSlug - Eager loaded
     * @return \Illuminate\View\View
     */
    public function show($pageSlug, $postSlug)
    {
        $page = DB::table('pages')
                ->leftJoin('posts', 'pages.id', '=', 'posts.page_id')
                ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
                ->where('pages.slug', $pageSlug)
                ->where('posts.slug', $postSlug)
                ->get();
        dd($page);

        return view('page', compact('page'));
    }
}
