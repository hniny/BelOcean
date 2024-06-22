<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Declaration extends Model
{
    use SoftDeletes;
    protected $with = ['information'];
    protected $fillable = [
        'backgroundinfo_id', 'personalinfo_id', 'status', 'description'
    ];

    public function information()
    {
        return $this->belongsTo('App\Backgroundinfo','backgroundinfo_id','id');
    }
}
