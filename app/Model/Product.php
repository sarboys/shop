<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function images () {
        return $this->hasMany('App\Model\ProductImage');
    }
    public function category () {
        return $this->belongsTo('App\Model\Category','category_id');
    }
}
