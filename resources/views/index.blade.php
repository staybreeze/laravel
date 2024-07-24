<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{ $appPresenter->fullTitle(request()->path()) }}</title>
  <link rel="icon" href="{{ asset('img/logo3.jpg') }}" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/brands.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" media="screen and (max-width: 1000px)" href="{{ asset('css/small_screen.css') }}">
  <link rel="stylesheet" media="screen and (max-width:1600px)" href="{{ asset('css/middle_screen.css') }}">
  <link rel="stylesheet" media="screen and (min-width: 1600px)" href="{{ asset('css/big_screen.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <style>
    body {
      overflow-x: hidden;
    }

    @keyframes animate {
      0% {
        text-shadow: 0 0 1px rgba(255, 255, 135, 1), 0 0 1px rgba(255, 255, 0, 1);
      }

      50% {
        text-shadow: 0 0 1px rgba(255, 255, 135, 1), 0 0 20px rgba(255, 255, 0, 1);
      }

      100% {
        text-shadow: 0 0 1px rgba(255, 255, 135, 1), 0 0 1px rgba(255, 255, 0, 1);
      }
    }

    #mouseSquareBig {
      width: 20px;
      height: 20px;
      background-color: goldenrod;
      position: fixed;
      transition-duration: 0.1s;
      z-index: 999;
    }
  </style>
</head>

<body>
  @include('partials.header.header')
  @include('partials.mouse_squares')
  <!-- --自動輪播-- -->
  <div class="caroisel carousel-computer" style="background-color:#13304a;height:120vh" id="carousel">
    <!-- data-bs-ride="carousel" 使用 自動輪播功能 -->
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
      <div id="carouselExampleIndicators" class="carousel slide " class="carousel slide">
        <div class="carousel-indicators ">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>

        </div>
        <div class="carousel-inner">
          <!-- 設定 秒數 data-bs-interval="1000" -->
          <div class="carousel-item active" data-bs-interval="6000">
            <div class="blue-block"></div>
            <img src="{{ asset('img/cheetos8.jpg') }}" class="d-block w-100 imgCarousel" style="height:89vh">
            <div class="carousel-caption d-none d-md-block">
              <h5>奇多（東京巴奈奈版）</h5>
              <p>
                Welcome to the Cheetos Meow Cooperative!</p>
            </div>
            <div class="blue-block"></div>
          </div>
          <div class="carousel-item" data-bs-interval="6000">
            <div class="blue-block"></div>
            <img src="{{ asset('img/cheetos6.jpg') }}" class="d-block w-100" style="height:89vh">
            <div class="carousel-caption d-none d-md-block">
              <h5>奇多（幼兒版）</h5>
              <p>Welcome to the Cheetos Meow Cooperative!</p>
            </div>
            <div class="blue-block"></div>
          </div>

          <div class="carousel-item" data-bs-interval="6000">
            <div class="blue-block"></div>
            <img src="{{ asset('img/cheetos5.jpg') }}" class="d-block w-100" style="height:89vh">
            <div class="carousel-caption d-none d-md-block">
              <h5>奇多（妖嬈版）</h5>
              <p>Welcome to the Cheetos Meow Cooperative!</p>
            </div>
            <div class="blue-block"></div>
          </div>

          <div class="carousel-item" data-bs-interval="6000">
            <div class="blue-block"></div>
            <img src="{{ asset('img/cheetos3.jpg') }}" class="d-block w-100" style="height:89vh">
            <div class="carousel-caption d-none d-md-block">
              <h5>奇多（看什麼看版）</h5>
              <p>Welcome to the Cheetos Meow Cooperative!</p>
            </div>
            <div class="blue-block"></div>
          </div>
          <div class="carousel-item" data-bs-interval="6000">
            <div class="blue-block"></div>
            <img src="{{ asset('img/cheetos2.jpg') }}" class="d-block w-100" style="height:89vh">
            <div class="carousel-caption d-none d-md-block">
              <h5>奇多（迷離眼神版）</h5>
              <p>Welcome to the Cheetos Meow Cooperative!</p>
            </div>
            <div class="blue-block"></div>
          </div>
          <div class="carousel-item" data-bs-interval="6000">
            <div class="blue-block"></div>
            <img src="{{ asset('img/cheetos1.jpg') }}" class="d-block w-100" style="height:89vh">
            <div class="carousel-caption d-none d-md-block">
              <h5>奇多（超可愛版）</h5>
              <p>Welcome to the Cheetos Meow Cooperative!</p>
            </div>
            <div class="blue-block"></div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div>
  <div class="carousel carousel-mobile" style="background-color: #12304a;">
    <div>
      <div id="carouselExampleIndicatorsMobile" class="carousel slide " class="carousel slide">
        <div class="carousel-indicators ">
          <button type="button" data-bs-target="#carouselExampleIndicatorsMobile" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicatorsMobile" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicatorsMobile" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleIndicatorsMobile" data-bs-slide-to="3" aria-label="Slide 4"></button>
          <button type="button" data-bs-target="#carouselExampleIndicatorsMobile" data-bs-slide-to="4" aria-label="Slide 5"></button>
          <button type="button" data-bs-target="#carouselExampleIndicatorsMobile" data-bs-slide-to="5" aria-label="Slide 6"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="carousel-img" src="{{ asset('img/cheetos13.jpg') }}" class="d-block w-100">
            <div class="carousel-caption d-none d-md-block">
              <h5>奇多（妖嬈版）</h5>
              <p>Welcome to the Cheetos Meow Cooperative!</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="carousel-img" src="{{ asset('img/cheetos12.jpg') }}" class="d-block w-100"></a>
            <div class="carousel-caption d-none d-md-block">
              <h5>奇多（幼兒版）</h5>
              <p>Welcome to the Cheetos Meow Cooperative!</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="carousel-img" src="{{ asset('img/cheetos14.jpg') }}" class="d-block w-100"></a>
            <div class="carousel-caption d-none d-md-block">
              <h5>奇多（妖嬈版）</h5>
              <p>Welcome to the Cheetos Meow Cooperative!</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="carousel-img" src="{{ asset('img/cheetos11.jpg') }}" class="d-block w-100"></a>
            <div class="carousel-caption d-none d-md-block">
              <h5>奇多（看什麼看版）</h5>
              <p>Welcome to the Cheetos Meow Cooperative!</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="carousel-img" src="{{ asset('img/cheetos9.jpg') }}" class="d-block w-100"></a>
            <div class="carousel-caption d-none d-md-block">
              <h5>奇多（迷離眼神版）</h5>
              <p>Welcome to the Cheetos Meow Cooperative!</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="carousel-img" src="{{ asset('img/cheetos10.jpg') }}" class="d-block w-100"></a>
            <div class="carousel-caption d-none d-md-block">
              <h5>奇多（超可愛版）</h5>
              <p>Welcome to the Cheetos Meow Cooperative!</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicatorsMobile" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicatorsMobile" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div>
  @include('partials.goods', ['goods' => $goods])
  @include('partials.login_form')
  @include('partials.footer')
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
        <a href="{{ url('/articles#') }}">幼貓</a>
      </li>
      <li>
        <a href="{{ url('/articles#') }}">成貓</a>
      </li>
      <li>
        <a href="{{ url('/articles#') }}">老貓</a>
      </li>
    </ul>
    <ul class="pages">
      <li>
        <a class="footer-header store-bar" href="{{ url('/index#store') }}">購物商城</a>
      </li>
      <li>
        <a class="store-bar" href="{{ url('/index#store') }}">食物</a>
      </li>
      <li>
        <a class="store-bar" href="{{ url('/index#store') }}">玩具</a>
      </li>
      <li>
        <a class="store-bar" href="{{ url('/index#store') }}">生活用品</a>
      </li>
    </ul>
    <ul class="pages">
      <li>
        <a class="footer-header" href="login">會員專區</a>
      </li>
        @if(auth()->check())
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

  <!-- 引入 gsap 主程式 -->
<script src="{{ asset('gsap/gsap.js') }}"></script>

  <script>
    // 建立星星
    function createstarWhite(starCount) {
      for (let i = 0; i < starCount; i++) {
        $('#carousel').append(`<div class="white-star animate">⦁</div>`)
      }

      $('.white-star').each(function(index, star) {
        $(this).css({
          position: 'absolute',
          left: gsap.utils.random(0, 100) + '%',
          top: gsap.utils.random(0, 100) + '%',
          color: 'white',

          // overflow:'hidden'
        })
      })
    }

    createstarWhite(20)

    // 建立星星動畫
    gsap.to('.white-star', {
      'font-size': () => gsap.utils.random(1, 10),
      filter: 'drop-shadow(0 0 30px rgba(255, 255, 0, 1))',
      textShadow: '0 0 10px rgba(255, 255, 0, 0.8)',
      left: '+=random(-10, 10)%',
      x: 'random(-50,50)',
      y: 'random(-50,50)',
      rotationY: '-=180',
      scale: () => gsap.utils.random(1, 2),
      duration: () => gsap.utils.random(5, 10),
      delay: () => gsap.utils.random(0, 5),
      repeat: -1,
      repeatRefresh: true,
      ease: 'back',
      stagger: 0.1,
    });
    // 建立星星
    function createstarGold(starCount) {
      for (let i = 0; i < starCount; i++) {
        $('#carousel').append(`<div class="gold-star animate">⦁</div>`)
      }

      $('.gold-star').each(function(index, star) {
        $(this).css({
          position: 'absolute',
          left: gsap.utils.random(0, 100) + '%',
          top: gsap.utils.random(0, 100) + '%',
          color: 'gold',

          // overflow:'hidden'
        })
      })
    }

    createstarGold(20)

    // 建立星星動畫
    gsap.to('.gold-star', {
      'font-size': () => gsap.utils.random(10, 20),
      filter: 'drop-shadow(0 0 30px rgba(255, 255, 0, 1))',
      textShadow: '0 0 10px rgba(255, 255, 0, 0.8)',
      left: '+=random(-10, 10)%',
      x: 'random(-50,50)',
      y: 'random(-50,50)',
      rotationY: '-=180',
      scale: () => gsap.utils.random(1, 2),
      duration: () => gsap.utils.random(5, 10),
      delay: () => gsap.utils.random(0, 5),
      repeat: -1,
      repeatRefresh: true,
      ease: 'back',
      stagger: 0.1,
    });
  </script>
  <script>
    $(window).on('scroll', function() {
      $('#carousel').css('height', '');
    });

    $('.store-bar').on('click', function() {
      $('#carousel').css('height', '');
      var targetAnchor = 'store';
      var targetElement = $('#' + targetAnchor);

      var targetPosition = targetElement.offset().top;

      $('html, body').animate({
        scrollTop: targetPosition - 100 // 
      }, 100); // 
    });

    if (location.href.includes('#store')) {
      $('#carousel').css('height', '');
    }
  </script>



</body>

</html>