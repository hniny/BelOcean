<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppliedCategory extends Model
{
    use SoftDeletes;
    protected $fillable =[
        'cat_name'
    ];
}
