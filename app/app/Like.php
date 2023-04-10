<?php

namespace App;
use App\User;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function user()
    {   //usersテーブルとのリレーションを定義するuserメソッド
        return $this->belongsTo(User::class);
    }

    public function product()
    {   //productsテーブルとのリレーションを定義するreviewメソッド
        return $this->belongsTo(Product::class);
    }

}
