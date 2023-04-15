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
            
             <tr>
                <td>{{$products['name']}}</td>
                <td>{{$products['text']}}</td>
                <td>{{$products['price']}}</td>
             </tr>
            
         </tbody>
         <a href ="" class="btn btn-info">注文を確定する</a>
     </table>
 </div>
</div>




@endsection