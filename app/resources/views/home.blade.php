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
<span>これはユーザーだけ表示させる</span>

<img src="{{ asset('$product->image_path') }}" alt="">

@endcan
@endsection
