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
            @foreach($carts as $cart)
             <tr>
                <td>{{$cart->product->name}}</td>
                <td>{{$cart->product->text}}</td>
                <td>{{$cart->product->price}}</td>
                <td>{{$cart->product->image_path}}</td>
               
               
                <td> <a href ="" class="btn btn-danger">削除</a>
             </tr>
            @endforeach
         </tbody>
         <a href ="" class="btn btn-info">ご注文手続きへ</a>
     </table>
 </div>
</div>




@endsection