<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PageController extends Controller
{
    /**
     * Return the requested page with posts eager loaded
     * @param Page $page - Eager loaded
     * @return \Illuminate\View\View
     */
    public function show(Page $page)
    {
        return view('page', compact('page'));
    }
}
