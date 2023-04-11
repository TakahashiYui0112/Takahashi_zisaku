@extends('layouts.app')

@section('content')


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
                    <a href ="" class="btn btn-info">購入履歴</a>
                    <a href ="" class="btn btn-info">お気に入りリスト</a>
                    <a href ="{{route('guests.edit',auth()->user())}}" class="btn btn-info">プロフィール編集</a>
                    <a href ="" class="btn btn-info">PASS変更</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection