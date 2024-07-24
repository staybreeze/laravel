
<!DOCTYPE html>
<html lang="en">

<head>
  <title>{{ $appPresenter->fullTitle(request()->path()) }}</title>
  <link rel="icon" href="{{ asset('img/logo3.jpg') }}" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/brands.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" media="screen and (max-width: 1000px)" href="./css/small_screen.css">
  <link rel="stylesheet" media="screen and (max-width:1600px)" href="./css/middle_screen.css">
  <link rel="stylesheet" media="screen and (min-width: 1600px)" href="./css/big_screen.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <style>
    .aside {
      background-image: url(./img/18-2500x1667.jpg);
      opacity: 0.9;

    }

    .main {
      height: 100%;
    }

    .h3 {
      border-left: 10px solid brown;
      font-size: x-large;
      font-weight: bolder;
    }


    h3>p {
      font-size: 20px;
      line-height: 30px;
    }

    .footer {
      margin-top: 50px;
    }

    .box {
      margin-top: 50px;
      width: 33%;
      height: 33%;

    }

    table {
      width: 100vw;
      /* height:100vh; */
    }

    table,
    tr,
    td {
      border: 1px solid black;
      text-align: center;
    }

    .bg-myColor {

      background-color: #f8ede0
    }

    .quantity-input {
      width: 100px;
      text-align: end;
    }

    @media screen and (max-width: 450px) {

      .modal .input-group {

        width: 330px !important;

      }

      .modal input[type='submit'] {
        margin-left: 270px !important;
        width: 60px !important;
        font-size: 15px;
      }

      table tr,
      table tr td {
        font-size: 13px
      }

      table tr {
        font-size: 10px
      }

      .quantity-input {
        width: 50px
      }

      input[type="submit"],
      input[type="button"] {
        width: 100%;
        height: 100%;
        font-size: 10px
      }

    }

    @media screen and (max-width: 410px) {
      .modal .input-group {

        width: 289px !important;

      }

      .modal input[type='submit'] {
        margin-left: 235px !important;
      }

      .modal-content {
        width: 330px
      }
    }
  </style>
</head>


<body>


  @include('partials.mouse_squares')
  @include('partials.header.about_us_articles')

  <!-- ---- -->


  <?php
  include "./inc/adopt_list";
  include "./inc/login_form";
  include "./inc/footer"
  ?>
  <div class=" mt-5 col-md-5 col footer-pages" style="border-left:5px solid white">
    <ul class="pages">
      <li>
        <a class="footer-header" href="{{ url('/about_us') }}">關於我們</a>
      </li>
      <li>
        <a href="{{ url('/about_us#origin') }}">起源</a>
      </li>
      <li>
        <a href="{{ url('/about_us#goal') }}">目標</a>
      </li>
      <li>
        <a href="{{ url('/about_us#cheetos') }}">店貓－奇多（Cheetos）</a>
      </li>
    </ul>

    <ul class="pages">
      <li>
        <a class="footer-header" href="{{ url('/articles') }}">貓咪文章</a>
      </li>
      <li>
        <a  href="{{ url('/articles#') }}">幼貓</a>
      </li>
      <li>
        <a  href="{{ url('/articles#') }}">成貓</a>
      </li>
      <li>
        <a  href="{{ url('/articles#') }}">老貓</a>
      </li>
    </ul>
    <ul class="pages">
      <li>
        <a class="footer-header" href="{{ url('/index#store') }}">購物商城</a>
      </li>
      <li>
        <a  href="{{ url('/index#store') }}">食物</a>
      </li>
      <li>
        <a  href="{{ url('/index#store') }}">玩具</a>
      </li>
      <li>
        <a  href="{{ url('/index#store') }}">生活用品</a>
      </li>
    </ul>
    <ul class="pages">
      <li>
        <a class="footer-header" href="login">會員專區</a>
      </li>
@if(session('user'))
    <li>
        <a href="{{ route('member.index') }}">修改密碼</a>
    </li>
@else
    <li>
        <a href="{{ route('register.index') }}">加入會員</a>
    </li>
@endif

      <li>
        <a href="{{ url('/cart') }}">訂單查詢</a>
      </li>
      <li>
        <a href="{{ url('/back_login') }}">管理員登入</a>
      </li>

    </ul>

  </div>

@include('partials.login_form')
@include('partials.copyright')


</body>

</html>