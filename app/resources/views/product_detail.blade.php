@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center">
    <h4 class="gradation02 mb-5">商品詳細</h4>
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
               
                <td> <a href ="  " class="btn btn-secondary">カートに入れる</a>
                
             </tr>
            @endforeach
         </tbody>
     </table>
 </div>
</div>




@endsection