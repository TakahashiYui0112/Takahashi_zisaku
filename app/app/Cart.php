<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function user()
    {  
       //usersテーブルとのリレーションを定義するuserメソッド
       return $this->belongsTo(User::class);
    }

    public function product()
    {   //productsテーブルとのリレーションを定義するreviewメソッド
        return $this->belongsTo(Product::class);
    }

    protected $fillable = ['user_id',];
    public $timestamps = false;
    
}
