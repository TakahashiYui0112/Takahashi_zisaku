<?php

namespace App\Http\Controllers;

use App\Product;
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
    public function store(Request $request)
    {

        $product = new Product();

        $product->name = $request->name;
        $product->text = $request->text;
        $product->price = $request->price;
        $product->image_path = $request->image_path;

        // ディレクトリ名
        $dir = 'sample';

        // アップロードされたファイル名を取得
        $file_name = $request->file('image_path')->getClientOriginalName();

        // 取得したファイル名で保存
        $request->file('image_path')->storeAs('public/' . $dir, $file_name);

        // ファイル情報をDBに保存
        $product->name = $file_name;
        $product->image_path = 'storage/' . $dir . '/' . $file_name;
        $product->save();
        
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
    public function update(int $id, Request $request)
    {
        
        $instance = new Product;
        $record = $instance->find($id);

        $columns = ['name', 'text', 'price', 'image_path'];

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


    public function search(Request $request)
    {
        //
    
    }
}
