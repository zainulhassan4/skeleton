<?php

namespace App;

use TCG\Voyager\Models\Post as VoyagerPost;
use Illuminate\Database\Eloquent\Model;

class Post extends VoyagerPost
{
    /**
     * The comments relationship associated with the post.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
    /**
     * The page relationship associated with the post.
     */
    public function page()
    {
        return $this->belongsTo('App\Page');
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
