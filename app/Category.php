<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    use SoftDeletes;


    protected $fillable = ['title', 'description'];



    public function products()
    {
        return $this->hasMany(Product::class);
    }
     public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
