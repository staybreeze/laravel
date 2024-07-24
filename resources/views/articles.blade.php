<!DOCTYPE html>
<html lang="en">

<head>
  <title>{{ $appPresenter->fullTitle(request()->path()) }}>文章</title>
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
      font-size: 22px;
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

    @media screen and (max-width: 450px) {

      .modal input[type='submit'] {
        margin-left: 270px !important;
      }

      /* .container-articles{
        border:10px solid #d8a25a;
        border-top:none;
      } */
      .row-articles {
        margin-left: 3px
      }
    }

    @media screen and (max-width: 410px) {
      .row-articles {
        margin-left: 20px
      }

      img {
        width: 300px;
        height: 240px
      }

      h3 {
        font-size: 19px !important;
      }

      input[type='submit'] {
        width: 75px;
        font-size: 13px
      }

      .footer {
        height: 96vh !important
      }
    }
  </style>
</head>

<body>

  @include('partials.header.about_us_articles')
  @include('partials.mouse_squares')

  <div class="container container-articles">
    <div class="d-flex flex-wrap row  row-articles">
      @foreach ($articles as $article)
      <div class="col-md-8 col-lg-6 col-xl-4 mt-5">
        <h3 style="margin:auto" class="h3">&nbsp;{{ $article['title'] }}</h3>
        <a style="margin:auto" href="./articles/{{ $article->formatted_time }}">
          <img class="mt-4" style="border-radius:5px 5px 5px 5px" src="{{ $article['img'] }}" width="375px" height="300px">
        </a>
        <a style="margin:auto" href="./articles/{{ $article->formatted_time }}">
          <button class="btn btn-warning mt-3">觀看文章</button>
        </a>
      </div>
      @endforeach
    </div>
  </div>
  @include('partials.login_form')
  @include('partials.footer')
  <div class=" mt-5 col-md-5 col" style="border-left:5px solid white;margin-left:-5px">
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
        <a class="footer-header" href="#">貓咪文章</a>
      </li>
      <li>
        <a href="#">幼貓</a>
      </li>
      <li>
        <a href="#">成貓</a>
      </li>
      <li>
        <a href="#">老貓</a>
      </li>
    </ul>
    <ul class="pages">
      <li>
        <a class="footer-header" href="{{ url('/index#store') }}">購物商城</a>
      </li>
      <li>
        <a href="{{ url('/index#store') }}">食物</a>
      </li>
      <li>
        <a href="{{ url('/index#store') }}">玩具</a>
      </li>
      <li>
        <a href="{{ url('/index#store') }}">生活用品</a>
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

  @include('partials.copyright')

</body>

</html>