@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center">
    <h4 class="gradation02 mb-5">商品一覧</h4>
</div>

<div class="d-flex justify-content-center">
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
                <th></th>
                 <th>画像</th>
                 <th>商品説明</th>
                 <th>金額</th>
             </tr>
         </thead>
         <tbody>
            @foreach($products as $product)
             <tr>
                
                <td>{{$product['name']}}</td>
                <td>{{$product['text']}}</td>
                <td>{{$product['price']}}</td>
               
                <td> <a href =" {{route('products.edit',$product['id'])}} " class="btn btn-secondary">編集</a>
                /
                <form action="{{ route('products.destroy',$product['id']) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">削除</button>
                </form>
             </tr>
            @endforeach
         </tbody>
     </table>
 </div>
</div>




@endsection