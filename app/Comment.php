<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    /**
     * Always eager load the author with the comment
     * @var array
     */
    protected $with = ['user'];
    
    /**
     * The user relation associated with the comment.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
