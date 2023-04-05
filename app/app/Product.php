<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function getimg(){
        $products = Product::query();
        $products = $products->get();


        foreach($products as $product)
        $product->image_path='/sample' . $product->image_path;

        
    return $products;
    }
    protected $fillable = ['name', 'text', 'price', 'image_path'];
    protected $casts = [
        'options' => 'array',
    ];

    // public function (){
    //     return $this->belongsTo('');
    // }
}
