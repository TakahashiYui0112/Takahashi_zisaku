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


<!-- ここからヘッター -->

<div id="overlay">
    <div id="title"><h1>R'oseate</h1></div>
    
    <video class="visible-desktop" id="hero-vid" poster="https://www.markhillard.com/sandbox/media/polina.jpg" autoplay loop muted>
        <source type="video/webm" src="https://www.markhillard.com/sandbox/media/polina.webm"></source>
        <source type="video/mp4" src="https://www.markhillard.com/sandbox/media/polina.mp4"></source>
    </video>
    <div id="state" class="visible-desktop"><span class="fa fa-pause"></span></div>
</div>



<!-- ここからメイン -->
<a href ="{{route('guests.show', auth()->user())}}" class="btn btn-info .bottom-50">マイページへ</a><br>
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


 


<!-- ここからフッター -->
<footer class="flex-rw">
<section class="footer-social-section flex-rw">
      <span class="footer-social-overlap footer-social-connect">
      CONNECT <span class="footer-social-small">with</span> US
      </span>
      <span class="footer-social-overlap footer-social-icons-wrapper">
    
      <a href="https://www.pinterest.com/paviliongift/" class="generic-anchor" target="_blank" title="Pinterest" itemprop="significantLink"><i class="fa fa-pinterest"></i></a>
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

<script>
$(document).ready(function () {
    $(window).on('load scroll', function () {
        var scrolled = $(this).scrollTop();
        $('#title').css({
            'transform': 'translate3d(0, ' + -(scrolled * 0.2) + 'px, 0)', // parallax (20% scroll rate)
            'opacity': 1 - scrolled / 400 // fade out at 400px from top
        });
        $('#hero-vid').css('transform', 'translate3d(0, ' + -(scrolled * 0.25) + 'px, 0)'); // parallax (25% scroll rate)
    });
    
    // video controls
    $('#state').on('click', function () {
        var video = $('#hero-vid').get(0);
        var icons = $('#state > span');
        $('#overlay').toggleClass('fade');
        if (video.paused) {
            video.play();
            icons.removeClass('fa-play').addClass('fa-pause');
        } else {
            video.pause();
            icons.removeClass('fa-pause').addClass('fa-play');
        }
    });
});
</script>


@endcan
@endsection
