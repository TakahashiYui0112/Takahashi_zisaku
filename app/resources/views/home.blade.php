@extends('layouts.app')

@section('content')
@can ('admin_only')
  <span>管理者にだけ表示させる</span>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <a href ="{{route('products.create')}}" class="btn btn-info">商品登録</a>
                    <a href ="{{route('products.index')}}" class="btn btn-info">商品一覧</a>
                </div>
            </div>
        </div>
    </div>
</div>


@elsecan ('user_only')


<link rel="stylesheet" href="{{ asset('css/style.css') }}">


<div id="overlay">
    <div id="title"><h1>R'oseate</h1></div>
    
    <video class="visible-desktop" id="hero-vid" poster="https://www.markhillard.com/sandbox/media/polina.jpg" autoplay loop muted>
        <source type="video/webm" src="https://www.markhillard.com/sandbox/media/polina.webm"></source>
        <source type="video/mp4" src="https://www.markhillard.com/sandbox/media/polina.mp4"></source>

        https://drive.google.com/file/d/1f8Kv3TLXAeWr9pD9yXuoV83WBB-HGGP8/view?usp=share_link

    </video>
    <div id="state" class="visible-desktop"><span class="fa fa-pause"></span></div>
  
</div>
<div id="content">



<a href ="{{route('guests.show', auth()->user())}}" class="btn btn-info">マイページへ</a><br>
<a href ="{{route('carts.index')}}" class="btn btn-info">カートへ</a><br>

@foreach($posts as $post)
<a href="{{ route('details.show',$post['id']) }}"><img src="{{ asset($post['image_path']) }}" alt="" width="200" height="200"></a>


<!-- head内 -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- body内 -->
<!-- 参考：$itemにはGuestControllerから渡した商品のレコード$itemsをforeachで展開してます -->

  <!-- Product.phpに作ったisLikedByメソッドをここで使用 -->
  @if (!$products->isLikedBy(Auth::id(),$post['id']))
    <span class="likes">
        <i class="fa-regular fa-heart like-toggle" data-product-id="{{ $post['id'] }}"></i>
     
    </span><!-- /.likes -->
  @else
    <span class="likes">
        <i class="fa-solid fa-heart like-toggle liked" data-product-id="{{ $post['id'] }}"></i>
     
    </span><!-- /.likes -->
  @endif
  @endforeach


  
 

<style>

.liked {
  color: red;
}

</style>




<section>
  <h1>Classy Footer</h1>
  <h3>Hover over the circle below</h3>
</section>
<div class="footer">
  <div id="button"></div>
<div id="container">
<div id="cont">
<div class="footer_center">
     <h3>Classy footer text</h3>
</div>
</div>
</div>
</div>


@endcan
@endsection
