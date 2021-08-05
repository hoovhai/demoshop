<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Menu;

class Product extends Model
{
    

    protected $fillable = [
        'name',
        'menu_id',
        'price',
        'price_sale',
        'description',
        'content',
        'thumb',
        'active'
    ];

    public function menu()
    {
        return $this->hasOne('App\Menu', 'id', 'menu_id');
    }
}
