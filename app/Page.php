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
        return $this->hasMany('App\Post');
    }
    
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
