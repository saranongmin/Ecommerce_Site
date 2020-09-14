<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $fillable = ['picture'];

    public function imagable()
    {
        return $this->morphTo();
    }
}
