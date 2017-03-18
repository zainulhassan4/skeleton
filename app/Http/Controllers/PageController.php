<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PageController extends Controller
{
    /**
     * Return the requested page
     * @param Page $page
     * @return \Illuminate\View\View
     */
    public function show(Page $page)
    {
        // Get eager loading results
        $page = $page->first();
        
        return view('page', compact('page'));
    }
}
