<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
     protected $fillable = ['user_id', 'facebook_url', 'twitter_url', 'bio','picture'];

        public function user()
    {
//        return $this->belongsTo(User::class);
        return $this->belongsTo('App\User');
    }

}
