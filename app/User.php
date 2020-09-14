<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
     const ADMIN = 1;
    const EDITOR = 2;
    const GUEST = 10;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


//      public function profile()
//     {
//         return $this->hasOne(Profile::class, 'user_id', 'id');
// //        return $this->hasOne('App\Profile');
//     }

//     public function blogs()
//     {
//         return $this->hasMany(Blog::class);
//     }


}
