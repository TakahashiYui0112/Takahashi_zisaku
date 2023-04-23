<?php

namespace App\Http\Controllers;

use App\Product;
use App\Like;
use App\User;
use App\Cart_product;
use App\Cart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $cart = Cart_product::where('user_id',Auth::id())->get();


        return view('product_cart',[
            'carts'=>$cart
        ]);   

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cart = Cart::where('user_id',Auth::id())->first();


        if($cart==NULL){
            $new = new Cart;

            $new->user_id = Auth::id();

            $new->save();
            $cart = Cart::where('user_id',Auth::id())->first();
            $cart_product = new Cart_product;
           
            $cart_product->user_id=Auth::id();
            $cart_product->cart_id=$cart->id;
            $cart_product->product_id=$id;

            $cart_product->save();
            return redirect('/carts');  
            }else{
            $cart_product = new Cart_product;
       
            $cart_product->user_id=Auth::id();
            $cart_product->cart_id=$cart->id;
            $cart_product->product_id=$id;

            $cart_product->save();
            return redirect('/carts');  
        }


       
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cart = new Cart_product;
        $oder = $cart->where('user_id',Auth::id())->with('product')->get();
        // $oders = Product::withSum('cart_product', 'price')->get();
        
        $users = Cart_product::query()
            ->withCount([
                'product AS total_price_count' => function ($query) {
                    $query->select(DB::raw("SUM(price) as view_count_sum"));
                }
            ])->get();
            $sum=0;
            foreach($users as $user){
                $sum +=$user->total_price_count;
            }
            
       
        
        return view('oder',[
            'oders'=>$oder,
            'sum' => $sum

        ]);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart_product::find($id)->delete();
        
        return redirct('/');
    }
}
