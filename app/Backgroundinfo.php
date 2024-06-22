<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Backgroundinfo extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'bg_name'
    ];
}
