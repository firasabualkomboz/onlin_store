<?php

namespace App;

use App\Models\Order;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\userlogin;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    // $user->notify(new userlogin($userlog));


    protected $fillable = [
        'name', 'email', 'password',
    ];



    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Comment(){
        return $this -> belongsToMany(Comment::class);
      }

      public function orders(){
        return $this->hasMany(Order::Class);
      }
}
