<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['name', 'text', 'price', 'image_path'];

    // public function (){
    //     return $this->belongsTo('');
    // }
}
