<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class UserProductFavorite extends Model
{
    protected $table = 'favorite';
    protected $primaryKey='id';
    protected $fillable = ['user_id','product_id'];
    public $with = ["user"];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
