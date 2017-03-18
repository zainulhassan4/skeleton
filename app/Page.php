<?php

namespace App;

use TCG\Voyager\Models\Page as VoyagerPage;
use Illuminate\Database\Eloquent\Model;

class Page extends VoyagerPage
{
    protected $with = ['posts'];
    
    /**
     * Get the post record associated with the page.
     */
    public function posts()
    {
        return $this->hasMany('TCG\Voyager\Models\Post');
    }
}
