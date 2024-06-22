<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SeamanDoc extends Model
{
    use SoftDeletes;
    protected $with = ['certificate'];
    
    protected $fillable = [
        'certificate_id','personalinfo_id','certificate_no','issued_date','expire_date', 'attach_file'
    ];

    public function certificate()
    {
        return $this->belongsTo('App\Certificate','certificate_id','id');
    }
}
