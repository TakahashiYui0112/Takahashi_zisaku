<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Like;

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

 
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    //後でViewで使う、いいねされているかを判定するメソッド。
    public function isLikedBy($user): bool {
        return Like::where('user_id', $user->id)->where('product_id', $this->id)->first() !==null;
    }

}
