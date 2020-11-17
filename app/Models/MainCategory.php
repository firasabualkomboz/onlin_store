<?php

namespace App\Models;
use App\Observers\MainCaregoryObserver;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;
use App\Models\Section;
use App\Models\Product;

class MainCategory extends Model
{
    protected $table = 'main_categories';

    protected $fillable = [
        'translation_lang', 'translation_of', 'name', 'slug', 'photo', 'active', 'created_at', 'updated_at'
    ];

    protected static function boot(){
        parent::boot();
        MainCategory::observe(MainCaregoryObserver::class);
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeSelection($query)
    {
        return $query->select('id','translation_lang','name','slug','photo','active','translation_of');
    }

    public function getPhotoAttribute($val)
    {
        return ($val !== null) ? asset('assets/' . $val) : "";

    }

    public function getActive(){
        return   $this -> active == 1 ? 'مفعل'  : 'غير مفعل';
      }


      public function categories(){
        return   $this -> hasMany(self::class,'translation_of');
      }


      public function vendors(){
        // return $this -> hasMany('vendor::class')
        return $this -> hasMany('App\Models\Vendor','category_id','id'); //pk -> id
      }

      public function scopedefaultCategory($query)
      {
          return $query->where('translation_of', 0);
      }

      public function subcategories(){
        return $this -> hasMany(SubCategory::class,'category_id','id');

      }

      public function section(){
        return $this -> hasMany(Section::class,'section_id','id');

      }

      public function product(){
        return $this -> hasMany(Product::class,'sub_category_id','id');

      }




}
