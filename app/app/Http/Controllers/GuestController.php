<?php

namespace App\Http\Controllers;

use App\Like;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\User;

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
        //
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
        

        return view('guest_form',[
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
    public function update(Request $request, $id)
    {
        $instance = new User;
        $record = $instance->find($id);

        $columns = ['name', 'kane', 'postcode', 'address', 'tel', 'email'];

        foreach($columns as $column){
            $record->$column = $request->$column;
        }
        $record->save();

        return redirect('/');     
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

    $user_id = Auth::user()->id; //1.ログインユーザーのid取得
    $product_id = $request->product_id; //2.商品idの取得
    $already_liked = Like::where('user_id', $user_id)->where('product_id', $product_id)->first(); //3.

    if (!$already_liked) { //もしこのユーザーがこの商品にまだいいねしてなかったら
        $like = new Like; //4.Likeクラスのインスタンスを作成
        $like->product_id = $product_id; //Likeインスタンスにproduct_id,user_idをセット
        $like->user_id = $user_id;
        $like->save();
    } else { //もしこのユーザーがこの商品に既にいいねしてたらdelete
        Like::where('product_id', $product_id)->where('user_id', $user_id)->delete();
    }
    //5.この商品の最新の総いいね数を取得
    $product_likes_count = Product::withCount('likes')->findOrFail($product_id)->likes_count;
    $param = [
        'product_likes_count' => $product_likes_count,
    ];
    return response()->json(); //6.JSONデータをjQueryに返す
    }


}
