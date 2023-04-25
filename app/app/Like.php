<?php

namespace App;
use App\User;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['user_id','product_id'];
    public function user()
    {   //usersテーブルとのリレーションを定義するuserメソッド
        return $this->belongsTo(User::class);
    }

    public function product()
    {   //productsテーブルとのリレーションを定義するreviewメソッド
        return $this->belongsTo('App\Product','product_id','id');
        
    }
    
    public $timestamps = false;

}
