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
<span>これはユーザーだけ表示させる<br></span>

@foreach($posts as $post)
<img src="{{ asset($post['image_path']) }}" alt="" width="200" height="200">
@endforeach

<!-- head内 -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- body内 -->
<!-- 参考：$itemにはReviewControllerから渡した投稿のレコード$itemsをforeachで展開してます -->
@auth
  <!-- Review.phpに作ったisLikedByメソッドをここで使用 -->
  @if (!$review->isLikedBy(Auth::user()))
    <span class="likes">
        <i class="fas fa-music like-toggle" data-review-id="{{ $item->id }}"></i>
      <span class="like-counter">{{$item->likes_count}}</span>
    </span><!-- /.likes -->
  @else
    <span class="likes">
        <i class="fas fa-music heart like-toggle liked" data-review-id="{{ $item->id }}"></i>
      <span class="like-counter">{{$item->likes_count}}</span>
    </span><!-- /.likes -->
  @endif
@endauth
@guest
  <span class="likes">
      <i class="fas fa-music heart"></i>
    <span class="like-counter">{{$item->likes_count}}</span>
  </span><!-- /.likes -->
@endguest

<style>

.liked {
  color: pink;
}

</style>


@endcan
@endsection
