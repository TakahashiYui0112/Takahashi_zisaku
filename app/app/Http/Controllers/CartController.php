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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
