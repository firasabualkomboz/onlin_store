<?php

namespace App\Models;
use App\Models\MainCategory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';


    protected $fillable = [
        'name', 'photoone', 'phototwo', 'price', 'main_category_id' , 'sub_section_id', 'created_at', 'updated_at'
    ];

    public function maincategoryproduct(){
        return $this -> belongsTo(MainCategory::class,'sub_category_id','id');
      }

    public function scopeSelection($query)
    {
        return $query->select('id','name','sub_category_id','sub_section_id','photoone','price');
    }

      public function getphotooneAttribute($photoone)
      {
          return asset($photoone);
      }



}
