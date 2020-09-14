<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'sub_category_id', 'title', 'code','unit_price','discount','description', 'is_active', 'image', 'created_by', 'updated_by'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class);
    }

    /**
     * Get all of the tags for the post.
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class,
            'taggable'
        );
    }

    /**
     * Get all of the post's comments.
     */
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function scopeActive($query){
            $query->where('is_active', false);
    }

    public function pictures()
    {
        return $this->morphMany(Image::class, 'imagable');
    }


    public function orders()
    {
        return $this->hasMany(Order::class);
    }



}
