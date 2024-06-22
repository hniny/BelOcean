<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SeaService extends Model
{
    use SoftDeletes;
    protected $with = ['vessel'];
    protected $table = "sea-services";
    protected $fillable = [
        'name_of_vessel','vessel_id', 'personalinfo_id', 'rank', 'grt', 'bph', 'main_engine', 'sign_on_date', 'sign_off_date', 'service_onboard', 'ship_owner'
    ];

    public function vessel()
    {
        return $this->belongsTo('App\Vessel','vessel_id','id');
    }
}
