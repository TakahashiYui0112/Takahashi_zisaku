<?php

namespace App\Http\Controllers;

use App\Like;
use App\Product;
use App\Order;
use App\Cart;
use App\Cart_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Http\Requests\CreateData;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $products = Product::withCount('likes')->orderBy('id', 'desc')->paginate(10);
        $param = [
            'products' => $products,
        ];
        return view('products.index', $param);
    
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $records = new Order;

        $columns = ['peyment', 'money', 'user_id', 'cart_id'];

        $cart = Cart::where('user_id',Auth::id())->first();

        $records->payment = $request->payment;
        $records->money = $request->money;
        $records->user_id = Auth::id();
        $records->cart_id = $cart->id;
        
        $records->save();
        Cart_product::where('user_id',Auth::id())->delete();
        return redirect('/'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return view('guest_mypage');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $result = $user->find($user);
        
        
        return view('guest_edit',[
            'id' => $user['id'],
            'result' => $user,
             
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateData $request, $id)
    {
       $user = User::find($id);

        $columns = ['name', 'kana', 'postcode', 'address', 'tel', 'email'];

        foreach($columns as $column){
            $user->$column = $request->$column;
        }
        $user->save();

        return view('guest_mypage');     
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



    public function like(Request $request)
    {

    $user_id = Auth::id(); //1.ログインユーザーのid取得
    $product_id = $request->product_id; //2.商品idの取得
    $already_liked = Like::where('user_id', $user_id)->where('product_id', $product_id)->first(); //3.

    if (!$already_liked) { //もしこのユーザーがこの商品にまだいいねしてなかったら
        $like = new Like; //4.Likeクラスのインスタンスを作成
        $like->product_id = $product_id; //Likeインスタンスにproduct_id,user_idをセット
        $like->user_id = $user_id;
        $like->save();
        $already_liked = Like::where('user_id', $user_id)->where('product_id', $product_id)->first(); //3.
        return response()->json($already_liked);
    } else { //もしこのユーザーがこの商品に既にいいねしてたらdelete
        Like::where('product_id', $product_id)->where('user_id', $user_id)->delete();
        $already_liked = Like::where('user_id', $user_id)->where('product_id', $product_id)->first(); //3.
        return response()->json('no');
    }
    //5.この商品の最新の総いいね数を取得
    // $product_likes_count = Product::withCount('likes')->findOrFail($product_id)->likes_count;
    // $param = [
    //     'product_likes_count' => $product_likes_count,
    // ];
     //6.JSONデータをjQueryに返す
    }




}
