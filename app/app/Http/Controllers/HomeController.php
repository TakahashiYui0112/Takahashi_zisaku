<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
          $products = new Product;
          $keyword = $request->input('keyword');
          $query = Product::query();
          if ($keyword) {  
          // 全角スペースを半角に変換
          $spaceConversion = mb_convert_kana($keyword, 's');
          // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"] 
          $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY); 
          // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
          foreach($wordArraySearched as $value) {
          $query->where('name', 'like', '%'.$value.'%')->orWhere('price', 'like', '%'.$value.'%');            
          }
          }
          $min = $request->min;
          $max = $request->max;
          
          if(!empty($min)&&!empty($max)){
           
              $query = Product::whereBetween('price',[$min,$max]);
            }
            
            $n_price = [5000,10000,50000];
            $m_price = [10000,50000,100000];
            $posts = $query->get();
           return view('home', [
           'posts' => $posts,
           'keyword' => $keyword,
           'products' => $products,
           'min' => $min,
            'max' => $max,
            'max_prices' => $m_price,
            'min_prices' => $n_price,
          ]);
          
          
          
          
          
          
          
          
    }
}

