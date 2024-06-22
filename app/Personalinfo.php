<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Personalinfo extends Model
{
    use SoftDeletes;
    protected $with = ['applied_cat'];
    protected $fillable = [
      'name','age','date_birth','place_birth','religion','marital_status','height','weight','education','mark','father_name','mother_name','shoe_size','overall_size','next_kin','relation','address','phone_no','email','person_img','readiness','applied_category_id',''  
    ];

    public function applied_cat(){
      return $this->belongsTo('App\AppliedCategory');
    }
    public function declaration(){
      return $this->hasMany('App\Declaration','personalinfo_id');
    }
    public function sea_service(){
      return $this->hasMany('App\SeaService','personalinfo_id');
    } 
    public function sea_doc(){
      return $this->hasMany('App\SeamanDoc','personalinfo_id');
    } 
}
