<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'cart',
    ];

    public function user(){
        return $this->belongsTo(User::Class);
    }
}
