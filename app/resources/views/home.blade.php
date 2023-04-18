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

<link rel="stylesheet" href="{{ asset('css/style.css') }}">


<div id="overlay">
    <div id="title"><h1>Parallaxelicious</h1></div>
    <video class="visible-desktop" id="hero-vid" poster="https://www.markhillard.com/sandbox/media/polina.jpg" autoplay loop muted>
        <source type="video/webm" src="https://www.markhillard.com/sandbox/media/polina.webm"></source>
        <source type="video/mp4" src="https://www.markhillard.com/sandbox/media/polina.mp4"></source>
    </video>
    <div id="state" class="visible-desktop"><span class="fa fa-pause"></span></div>
    <img id="hero-pic" class="hidden-desktop" src="https://www.markhillard.com/sandbox/media/polina.jpg" alt="">
</div>
<div id="content">
    <p>Cookie cotton candy powder. Unerdwear.com sweet cake. Powder jujubes marshmallow marzipan. Jelly jelly-o sweet apple pie brownie apple pie. Bonbon sweet roll carrot cake tart gummi bears drag&eacute;e sweet. Marshmallow candy powder. Applicake danish apple pie marzipan cheesecake icing macaroon sweet biscuit. Sesame snaps jelly-o pie cheesecake tootsie roll chocolate cake souffl&eacute; cotton candy. Sweet roll brownie applicake. Sweet roll apple pie sesame snaps biscuit bear claw sweet roll chocolate bar. Tart sweet roll unerdwear.com pie cake brownie carrot cake. Tootsie roll lollipop marshmallow.</p>

    <p>Jelly-o lollipop pie bear claw powder macaroon lollipop lemon drops. Topping jujubes jujubes sesame snaps fruitcake biscuit chocolate jelly beans. Cookie dessert gingerbread. Pudding sweet applicake. Wafer sweet roll marshmallow toffee jelly halvah. Drag&eacute;e lemon drops oat cake tart halvah jujubes jelly biscuit. Pie wafer wafer jelly-o jelly gummies sugar plum pudding. Topping oat cake bear claw danish cookie brownie. Jelly beans tootsie roll gingerbread pastry cookie liquorice applicake. Gummi bears biscuit icing toffee chocolate cake. Powder cheesecake drag&eacute;e brownie applicake lollipop. Jelly beans gingerbread unerdwear.com chocolate bar cake. Chocolate cake caramels dessert sweet topping icing gingerbread sesame snaps marzipan.</p>

    <p>Muffin chocolate cake pudding sweet roll donut marshmallow tootsie roll gingerbread candy canes. Marshmallow cookie topping cookie tiramisu. Unerdwear.com donut brownie unerdwear.com brownie pudding sesame snaps. Souffl&eacute; danish candy sweet sweet candy. Gummi bears dessert jelly macaroon tootsie roll gummi bears lemon drops sweet. Applicake sugar plum gummies chupa chups halvah. Gummies souffl&eacute; icing lollipop. Ice cream chocolate caramels pudding. Marzipan cupcake candy jelly beans fruitcake tiramisu wafer danish bonbon. Halvah biscuit chocolate halvah. Cookie danish cookie lemon drops candy chocolate cake. Jelly beans pastry dessert gummies cake sweet danish.</p>

    <p>Macaroon candy sweet fruitcake jelly beans. Pudding applicake gummies sweet roll. Drag&eacute;e bear claw tiramisu oat cake chocolate bar wafer. Pastry donut chocolate cake danish sesame snaps tiramisu jujubes apple pie wafer. Sesame snaps tootsie roll drag&eacute;e croissant gummi bears jujubes dessert. Icing jujubes sugar plum fruitcake brownie cookie souffl&eacute;. Candy oat cake bonbon sesame snaps. Donut biscuit icing liquorice. Applicake lollipop liquorice pudding. Dessert muffin chupa chups. Jelly-o bear claw caramels souffl&eacute; bonbon toffee gingerbread. Toffee cake lollipop chocolate bar. Jelly-o tiramisu cake carrot cake carrot cake tiramisu sesame snaps. Macaroon cake marzipan macaroon danish croissant halvah unerdwear.com.</p>

    <p>Tart gummies cotton candy marshmallow chocolate gummi bears dessert. Sesame snaps powder liquorice donut. Croissant chocolate ice cream jelly-o cupcake sweet roll jelly-o chocolate bar liquorice. Brownie biscuit croissant ice cream. Candy chocolate sweet roll gummi bears pastry cupcake pie lollipop pie. Brownie lemon drops powder muffin. Gummi bears apple pie apple pie applicake powder. Wafer gummi bears chocolate brownie halvah. Gingerbread sesame snaps unerdwear.com cookie sweet roll. Gingerbread gummies lemon drops pie sesame snaps jujubes applicake cupcake. Drag&eacute;e danish souffl&eacute; candy canes icing tart. Lollipop tootsie roll croissant biscuit pastry jelly-o tootsie roll pastry. Pastry cake applicake icing cake danish lollipop. Croissant souffl&eacute; marshmallow gummi bears dessert souffl&eacute; marshmallow cookie candy.</p>

    <p>Sweet macaroon cheesecake halvah toffee marzipan sweet tootsie roll. Chocolate lemon drops powder chupa chups cake. Jujubes cotton candy liquorice brownie pudding pudding. Pie sesame snaps topping macaroon lemon drops. Chocolate bar gingerbread caramels bear claw cookie icing macaroon gummi bears drag&eacute;e. Cupcake cheesecake gummies cotton candy sweet roll. Pudding marzipan oat cake. Muffin chupa chups lemon drops. Souffl&eacute; caramels cookie. Chocolate cake fruitcake pudding powder dessert fruitcake pie wafer. Sugar plum pudding sweet lemon drops jelly-o pie. Candy canes sweet roll wafer croissant. Gummi bears tart toffee. Chocolate cake lollipop jujubes halvah.</p>

    <p>Pudding candy chocolate cake donut gingerbread toffee cotton candy jujubes. Gummi bears carrot cake tart macaroon cheesecake sugar plum chocolate cake gummi bears. Biscuit fruitcake pastry apple pie carrot cake bonbon jelly beans. Fruitcake sugar plum drag&eacute;e. Oat cake lollipop toffee lollipop sugar plum powder caramels. Macaroon chocolate pudding ice cream gummies pie donut jelly-o. Candy canes macaroon powder pastry. Pudding candy canes bonbon pie topping cupcake sweet tootsie roll. Cake marshmallow sugar plum chupa chups macaroon carrot cake marzipan lollipop topping. Gummi bears unerdwear.com muffin cupcake jelly beans tart souffl&eacute;. Danish wafer cheesecake fruitcake marshmallow sweet carrot cake cookie brownie. Icing muffin lollipop jelly.</p>


<a href ="{{route('guests.show', auth()->user())}}" class="btn btn-info">マイページへ</a>

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
        <i class="fa-sharp fa-solid fa-heart like-toggle liked" data-product-id="{{ $post['id'] }}"></i>
     
    </span><!-- /.likes -->
  @endif
  @endforeach

<style>

.liked {
  color: red;
}

</style>

<script>

$('#btn-1').mouseover(function() {
  showVideo('1');
});
$('#btn-2').mouseover(function() {
  showVideo('2');
});
$('#btn-3').mouseover(function() {
  showVideo('3');
});
$('#btn-4').mouseover(function() {
  showVideo('4');
});

function showVideo(videoId){
  $('.Video').css('display', 'none');
  $('#video-'+videoId).css('display', 'block');  
}


</script>
@endcan
@endsection
