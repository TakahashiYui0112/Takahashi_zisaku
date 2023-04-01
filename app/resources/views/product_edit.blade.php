@extends('layouts.app')

@section('content')
<form id="contact" action="{{route('products.update',$result['id'])}}" method="post" enctype="multipart/form-data">
@method('patch')
@csrf
  <div class="container">
    <div class="head">
      <h2>Say Hello</h2>
    </div>
    <input type="text" name="name" placeholder="Name" value="{{ $result['name']}}" /><br />
    <input  type="text" name="text" placeholder="Teuxxt" value="{{ $result['text']}}" /><br />
    <input type="text" name="price" placeholder="Price" value="{{ $result['price']}}"></textarea><br />
    <input type="file" name="image_path" value="{{ $result['image_path']}}">
    <button>アップロード</button>
    <button id="submit" type="submit">
      Send!
    </button>
  </div>
</form>

<style>
    body {
    padding-top:25px;
    background-color:#454545;
    margin-left:10px;
    margin-right:10px;
    }
    .container {
    max-width:600px;
    margin:0 auto;
    text-align:center;
    -webkit-border-radius:6px;
    -moz-border-radius:6px;
    border-radius:6px;
    background-color:#FAFAFA;
    }
    .head {
    -webkit-border-radius:6px 6px 0px 0px;
    -moz-border-radius:6px 6px 0px 0px;
    border-radius:6px 6px 0px 0px;
    background-color:#2ABCA7;
    color:#FAFAFA;
    }
    h2 {
    text-align:center;
    padding:18px 0 18px 0;
    font-size: 1.4em;
    }
    input {
    margin-bottom:10px;
    }
    textarea {
    height:100px;
    margin-bottom:10px;
    }
    input:first-of-type
    {
    margin-top:35px;
    }
    input, textarea {
    font-size: 1em;
    padding: 15px 10px 10px;
    font-family: 'Source Sans Pro',arial,sans-serif;
    border: 1px solid #cecece;
    background: #d7d7d7;
    color:#FAFAFA;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    width: 80%;
    max-width: 600px;
    }
    ::-webkit-input-placeholder {
    color: #FAFAFA;
    }
    :-moz-placeholder {
    color: #FAFAFA;  
    }
    ::-moz-placeholder {
    color: #FAFAFA; 
    }
    :-ms-input-placeholder {  
    color: #FAFAFA;  
    }
    button {
    margin-top:15px;
    margin-bottom:25px;
    background-color:#2ABCA7;
    padding: 12px 45px;
    -ms-border-radius: 5px;
    -o-border-radius: 5px;
    border-radius: 5px;
    border: 1px solid #2ABCA7;
    -webkit-transition: .5s;
    transition: .5s;
    display: inline-block;
    cursor: pointer;
    width:30%;
    color:#fff;
    }
    button:hover, .button:hover {
    background:#19a08c;
    }
    label.error {
        font-family:'Source Sans Pro',arial,sans-serif;
        font-size:1em;
        display:block;
        padding-top:10px;
        padding-bottom:10px;
        background-color:#d89c9c;
        width: 80%;
        margin:auto;
        color: #FAFAFA;
        -webkit-border-radius:6px;
        -moz-border-radius:6px;
        border-radius:6px;
    }
    /* media queries */
    @media (max-width: 700px) {
    label.error {
        width: 90%;
    }
    input, textarea {
        width: 90%;
    }
    button {
        width:90%;
    }
    body {
    padding-top:10px;
    }  
    }
    .message {
        font-family:'Source Sans Pro',arial,sans-serif;
        font-size:1.1em;
        display:none;
        padding-top:10px;
        padding-bottom:10px;
        background-color:#2ABCA7;
        width: 80%;
        margin:auto;
        color: #FAFAFA;
        -webkit-border-radius:6px;
        -moz-border-radius:6px;
        border-radius:6px;
}

</style>
@endsection