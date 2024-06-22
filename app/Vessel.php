<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vessel extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $fillable =[
        'vsl_name',
    ];

    public function seaservices()
    {
        return $this->hasOne('App\SeaService','vessel_id',$primaryKey);
    }
}
