@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center">
    <h4 class="gradation02 mb-5">商品一覧</h4>
</div>

<div>
  <form action="{{ route('products.index')}}" method="GET">
    <input type="text" name="keyword" value="{{ $keyword }}">
    <input type="submit" value="検索">
  </form>
</div>

<div class="d-flex justify-content-center">
 <div class="col-5 ml-3">
     <table class="table table-striped table-hover">
         <thead>
             <tr>
                 <th>商品名</th>
                 <th>商品説明</th>
                 <th>金額</th>
                 <th></th>
             </tr>
         </thead>
         <tbody>
            @foreach($products as $product)
             <tr>
                <td>{{$product['name']}}</td>
                <td>{{$product['text']}}</td>
                <td>{{$product['price']}}</td>
                <td>{{$product['image_path']}}</td>
               
                <td> <a href =" {{route('products.edit',$product['id'])}} " class="btn btn-secondary">編集</a>
                /
                <td> <a href ="" class="btn btn-danger">削除</a>
             </tr>
            @endforeach
         </tbody>
     </table>
 </div>
</div>




@endsection