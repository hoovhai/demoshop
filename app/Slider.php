<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    

    protected $fillable = [
        'name',
        'thumb',
        'url',
        'sort_by',
        'active'
    ];
}
