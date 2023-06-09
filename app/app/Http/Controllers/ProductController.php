<?php

namespace App\Http\Controllers;

use App\Product;
use App\Like;
use App\User;
use App\Http\Requests\CreateProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Product::paginate(20);
       
        $keyword = $request->input('keyword');

        $query = Product::query();
        if ($keyword) {
            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($keyword, 's');
            // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
            // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
            foreach($wordArraySearched as $value) {
            $query->where('name', 'like', '%'.$value.'%')
            ->orWhere('price', 'like', '%'.$value.'%');
            }
        }

        $posts = $query->paginate(20);
        
        return view('product_list', [
            'products' => $posts,
            'keyword' => $keyword,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProduct $request)
    {

        $product = new Product();
        

        
        

        // ディレクトリ名
        $dir = 'sample';

        // アップロードされたファイル名を取得

       if($request->file('image_path')!==NULL){
            $file_name = $request->file('image_path')->getClientOriginalName();
            $request->file('image_path')->storeAs('public/' . $dir, $file_name);
            $product->name = $request->name;
            $product->text = $request->text;
            $product->price = $request->price;
            $product->image_path = 'storage/' . $dir . '/' . $file_name;
            $product->save();
        }

        // 取得したファイル名で保存
        $product->name = $request->name;
        $product->text = $request->text;
        $product->price = $request->price;
        $product->save();

        // ファイル情報をDBに保存
        
        
        
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
    
        
        $result = $product->find($product);
        

        return view('product_edit',[
            'id' => $product['id'],
            'result' => $product,
             
        ]);
      

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateProduct $request, $id)
    {
        
        $product = Product::find($id);
        $dir = 'sample';
        if($request->file('image_path')!==NULL){
            $file_name = $request->file('image_path')->getClientOriginalName();
            $request->file('image_path')->storeAs('public/' . $dir, $file_name);
            $product->name = $request->name;
            $product->text = $request->text;
            $product->price = $request->price;
            $product->image_path = 'storage/' . $dir . '/' . $file_name;
            $product->save();
        }

        // 取得したファイル名で保存
        $product->name = $request->name;
        $product->text = $request->text;
        $product->price = $request->price;
        $product->save();
    
        

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
        Product::find($id)->delete();
        
        return redirect('/');
    }


    public function search(Request $request)
    {
        //
    
    }
}
