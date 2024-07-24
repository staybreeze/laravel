
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
      <title>aaaaa</title>
      <link rel="icon" href="{{ asset('img/logo3.jpg') }}" type="image/x-icon">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/brands.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" media="screen and (max-width: 1000px)" href="{{ asset('css/small_screen.css') }}">
      <link rel="stylesheet" media="screen and (max-width:1600px)" href="{{ asset('css/middle_screen.css') }}">
      <link rel="stylesheet" media="screen and (min-width: 1600px)" href="{{ asset('css/big_screen.css') }}">
      <style>
    .main {
      height: 100%;
    }

    .h3 {
      border-left: 10px solid brown;
      font-weight: bolder;
    }

    .box>p {
      font-size: 20px;
      line-height: 40px;
    }

    .footer {
      margin-top: 0px;
    }

    @media screen and (max-width: 550px) {
      .aside {
        margin-left: 110px;
      }
    }

    @media screen and (max-width: 550px) {
      .aside>img {
        width: 300px;
      }
      .box{
        width: 350px;
      }
    }
    @media screen and (max-width: 450px) {

   .box{
        margin-left: -50px;
      }
      .aside>img{
        margin-left: -60px;
      }
      .modal input[type='submit'] {
    margin-left: 283px !important;
     }
    }
    @media screen and (max-width: 410px) {


.aside img{
  padding-right:30px
 }

 h3 {
   font-size: 18px !important;
 }

 input[type='submit'] {
   width: 75px;
   font-size: 13px
 }

 p{
   font-size: 15px !important;
 }

 .footer{
   /* height: 96vh !important; */
 }
 .box {
   width: 300px;
 }
 .modal input[type='submit'] {
margin-left: 227px !important;
}
}
      </style>
    </head>
    <body>
    @include('partials.header.article')
    @include('partials.mouse_squares')
<div class="container-fluid">
  <div class="row d-flex main">
    <div class="col-5 aside">
    <img src="{{ asset('img/1721294155.png') }}" width="100%" style="padding-top:70px">
    </div>
    <div class="col-6 section ms-5 ps-5">
      <br>
      <div class="box mt-5">
        <h3 class="h3">&nbsp; aaaaa</h3>
        <p class="mt-5" id="origin">
        bbbbb
         </p> <br>
      </div>
      <div class="col-1"></div>
    </div>
  </div>
</div>
@include('partials.login_form')
@include('partials.footer_article')
</body>

</html>