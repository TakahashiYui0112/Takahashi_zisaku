@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center">
    <h4 class="gradation02 mb-5">ユーザー一覧</h4>
</div>

<!-- <div>
  <form action="{{ route('products.index')}}" method="GET">
    <input type="text" name="keyword" value="{{ $keyword }}">
    <input type="submit" value="検索">
  </form>
</div> -->

<div class="d-flex justify-content-center">
 <div class="col-5 ml-3">
     <table class="table table-striped table-hover">
         <thead>
             <tr>
                 <th>名前</th>
                 <th>フリガナ</th>
                 <th>郵便番号</th>
                 <th>住所</th>
                 <th>電話番号</th>
                 <th>メールアドレス</th>
             </tr>
         </thead>
         <tbody>
            @foreach($products as $product)
             <tr>
                <td>{{$user['name']}}</td>
                <td>{{$user['kana']}}</td>
                <td>{{$user['postcode']}}</td>
                <td>{{$user['address']}}</td>
                <td>{{$user['tel']}}</td>
                <td>{{$user['email']}}</td>
               
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