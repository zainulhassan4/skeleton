<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    /**
     * Always eager load the posts with page
     * @var array
     */
    protected $with = ['user'];
    
    /**
     * Get the post record associated with the page.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
