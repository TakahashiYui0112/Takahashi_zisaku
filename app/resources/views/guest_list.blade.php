@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/style.css') }}">


<div id="overlay">
    <div id="title"><h1>R'oseate</h1></div>

    </video>
    <div id="state" class="visible-desktop"><span class="fa fa-pause"></span></div>
  
</div>

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

<footer class="flex-rw">
<section class="footer-social-section flex-rw">
      <span class="footer-social-overlap footer-social-connect">
      CONNECT <span class="footer-social-small">with</span> US
      </span>
      <span class="footer-social-overlap footer-social-icons-wrapper">
      <a href="https://www.facebook.com/paviliongift" class="generic-anchor" target="_blank" title="Facebook" itemprop="significantLink"><i class="fa fa-facebook"></i></a>
      <a href="https://twitter.com/PavilionGiftCo" class="generic-anchor" target="_blank" title="Twitter" itemprop="significantLink"><i class="fa fa-twitter"></i></a>
      <a href="http://instagram.com/paviliongiftcompany" class="generic-anchor" target="_blank" title="Instagram" itemprop="significantLink"><i class="fa fa-instagram"></i></a>
      <a href="https://www.youtube.com/channel/UCYgUODvd0qXbu_LkUWpTVEg" class="generic-anchor" target="_blank" title="Youtube" itemprop="significantLink"><i class="fa fa-youtube"></i></a>
      <a href="https://plus.google.com/+Paviliongift/posts" class="generic-anchor" target="_blank" title="Google Plus" itemprop="significantLink"><i class="fa fa-google-plus"></i></a>
      </span>
</section>
      <section class="footer-bottom-section flex-rw">
      <div class="footer-bottom-wrapper">   
      <i class="fa fa-copyright" role="copyright"></i> 
      2019 Pavilion in <address class="footer-address" role="company address">Bergen, NY</address><span class="footer-bottom-rights"> - All Rights Reserved - </span>
     </div>
      <div class="footer-bottom-wrapper">
      <a href="/terms-of-use.html" class="generic-anchor" rel="nofollow">Terms</a> | <a href="/privacy-policy.html" class="generic-anchor" rel="nofollow">Privacy</a>
      </div>
      </section>
</footer>


@endsection