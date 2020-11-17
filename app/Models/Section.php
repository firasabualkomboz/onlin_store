<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MainCategory;



class Section extends Model
{
    protected $table = 'subsection';

    protected $fillable = [
        'name', 'section_id' , 'photosection', 'content', 'created_at', 'updated_at'
    ];



    public function scopeSelection($query)
    {
        return $query->select('id','name','section_id','photosection','content');
    }

    public function getPhotoAttribute($val)
    {
        return ($val !== null) ? asset('assets/' . $val) : "";

    }

      public function mainsection(){
        return $this -> belongsTo(MainCategory::class,'section_id','id');
      }

      public function getphotosectionAttribute($photosection)
      {
          return asset($photosection);
      }

}
