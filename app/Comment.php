<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Comment extends Model
{    
    use Translatable;

    protected $translatable = ['admin_remark', 'body'];
    
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

    /**
     * 
     * @param array $options
     */
    public function save(array $options = [])
    {
        // If no author has been assigned, assign the current user's id as the author of the post
        if (!$this->user_id && Auth::user()) {
            $this->user_id = Auth::user()->id;
        }

        parent::save();
    }

    /**
     * Scope a query to only include active comments.
     *
     * @param  $query  \Illuminate\Database\Eloquent\Builder
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
}
