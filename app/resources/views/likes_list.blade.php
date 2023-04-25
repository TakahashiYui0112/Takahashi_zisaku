@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-center">
    <h2>お気に入り一覧</h2>
</div>

<br>
<br>

<div class="d-flex justify-content-center">
 <div class="col-5 ml-3">
     <table class="table table-striped table-hover">
         <thead>
             <tr>
                 <th></th>
                 <th>商品名</th>
             </tr>
         </thead>
         <tbody>
         
        @if($likes == null)
        空です
        @else
        @foreach($likes as $like)
            <tr>
                <td><img src="{{ asset($like->product->image_path) }}" width="50" height="70"></td>
                
            </tr>
        @endforeach
         </tbody>
     </table>
     @endif
 </div>
</div>

@endsection