<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Vendor extends Model
{
    use Notifiable;
    protected $table = 'vendors';

    protected $fillable = [
        'name', 'mobile','password', 'address', 'email','logo', 'category_id', 'active', 'created_at', 'updated_at'
    ];

    protected $hidden =['category_id' ,'password' ];


    public function scopeActive($query){
        return $query -> where('active',1);
    }


    public function getlogoAttribute($val)
    {
        return ($val !== null) ? asset('assets/' . $val) : "";

    }



    public function scopeSelection($query)
    {
        return $query->select('id','category_id','latitude','longitude','active','name','address','email','logo','mobile');
    }

    public function getActive(){
        return   $this -> active == 1 ? 'مفعل'  : 'غير مفعل';
      }


    public function category(){
        // return $this -> hasMany('vendor::class')
        return $this -> belongsTo('App\Models\MainCategory','category_id','id'); //pk -> id
      }


    public function setPasswordAttribute($password){
        if(!empty($password)){ // لو مش فاضية
            $this->attributes['password'] = bcrypt($password);
        }
    }



}
