<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['body', 'commented_by'];

    public function commentedBy()
    {
        return $this->belongsTo(User::class, 'commented_by');
    }

    /**
     * Get the owning commentable model.
     */
    public function commentable()
    {
        return $this->morphTo();
    }

}
