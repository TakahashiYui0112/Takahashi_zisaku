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
        $product = $products->all()->toArray();
        //$products = $this->request->getimg(); 
        
        return view('home',[
            'posts' => $product,
            'products' => $products,
        ]);
    }
}

