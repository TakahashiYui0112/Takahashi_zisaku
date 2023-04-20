<?php

namespace App;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class Cart_product extends Model
{
    public function product(){
        return $this->belongsTo('App\Product');
    }
    public $timestamps = false;
}
