@extends('layouts.app')

@section('content')
@can ('admin_only')
  <span></span>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">管理者用画面</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                
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
    
    
    <video class="visible-desktop" id="hero-vid" poster="{{ asset('storage/sample/suzu2.MP4') }}" autoplay loop muted>
        <source type="video/webm" src="{{ asset('storage/sample/suzu2.MP4') }}"></source>
        <source type="video/mp4" src="{{ asset('storage/sample/suzu2.MP4') }}"></source>
    </video>
    <div id="state" class="visible-desktop"><span class="fa fa-pause"></span></div>
</div>



<!-- ここからメイン -->

<form>
                            @csrf
                            <div class="input-group">
                                    <select name="min" value="">
                                            <option value="">未選択</option>
                                            @foreach($min_prices as $n_price)
                                            <option value="{{ $n_price }}">
                                                {{ $n_price }}
                                            </option> 
                                            @endforeach
                                            </select>
                                                        ~
                                            <select name="max" value="">
                                            <option value="">未選択</option>

                                            @foreach($max_prices as $m_price)
                                            <option value="{{ $m_price }}">
                                                {{ $m_price }}
                                            </option> 
                                            @endforeach
                                            </select>
                                            <div class="col-auto">
                                            <button type="submit" class="btn btn-primary btn-sm ml-4">検索</button>
                                                        </div>
                                                    </div>
                                                </form>
@foreach($posts as $post)
<a href="{{ route('details.show',$post['id']) }}"><img src="{{ asset($post['image_path']) }}" alt="" width="200" height="200"></a>
{{$post['name']}}
{{$post['price']}}円

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
