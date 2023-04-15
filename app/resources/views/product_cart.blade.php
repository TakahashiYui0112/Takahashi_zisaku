@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center">
    <h4 class="gradation02 mb-5">カート一覧</h4>
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
               
               
                <td> <a href ="" class="btn btn-danger">削除</a>
             </tr>
            @endforeach
         </tbody>
         <a href ="{{route('guests.show', auth()->user())}}" class="btn btn-info">ご注文手続きへ</a>
     </table>
 </div>
</div>




@endsection