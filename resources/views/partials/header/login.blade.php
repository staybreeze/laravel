@include('partials.header.effect')

<header class="h-11 bg-gray container-fluid header  hide-header" id="header">
  <div class="row bg-gray">

    <div class="test col-xxl-2 col-xl-6 col-12 ms-3 logo-area">
      <a href="{{ url('/index') }}" data-bs-toggle="modal" data-bs-target="#myModal-2">
        <img class="logo" src="{{ asset('img/logo1.png') }}" id="logo" style="transition:all 1s;height:10vh;"></a>
        </div>
    </div>
    <div class="test col-xxl-2 col-xl-6 col-12 mt-4 pt-3 header-title">

      <a href="{{ url('/index') }}">
        <h2 style="font-weight:600;transition:all 1s" id="title">{{ __('general.store_name') }}</h2>
      </a>

    </div>
    <div class="col-xxl-3 col-xl-12 col-12 test-1 pt-5 header-group" id="header-pages" style="transition:all 1s">
      <div class="page-link ">

        <ul>
          <li class="nav-item me-3">
            <a href="{{ url('/index') }}">回首頁</a>
            <div class="unloading-bar"></div>
            <div class="loading-bar"></div>
          </li>


          <li class="nav-item" style="margin-left:36px">


            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#myModal">

              <?php
              if (isset($_SESSION['user'])) {
                echo "<span> <a href='./api/logout'>登出</a></span>
            <div class='unloading-bar'></div>
            <div class='loading-bar'></div>
       ";
              // } elseif(!isset($_GET['error'])) {

              //   echo '<span> 會員登入</span>
              //   <div class="unloading-bar"></div>
              //   <div class="loading-bar"></div>'; 
              }
              ?>

            </a>

          </li>
        </ul>

      </div>

    </div>

    <div class="col-xxl-1 col-xl-2 col-2 pt-4 test buy-icon" style="margin-top:5px;margin-left:37px">
      <a class="shopping-cart-a" target="_blank">
      <a href="{{ url('/cart') }}">
          <i class="fa-sharp fa-solid fa-cart-shopping shopping-cart fa-l hidden-icon" style="font-size: 2em;transition:all 1s">
          </i>
        </a>
        <p class="mt-1 shopping-cart-p hidden-words ms-2">

          <?php
          if (isset($_SESSION['good'])) {
          ?>
        <span  style="font-size:15px>">【 <span style="color:brown;font-size: 12px;font-weight:300;font-family: 'Orbitron', sans-serif;font-weight:600;"><?=count($_SESSION['good']);?></span>  】</span>
      
          <?php
          } else {
            echo "Buy it !";
          } ?>
        </p>
      </a>

    </div>

    <div class="col-xxl-1 col-xl-2 col-2 pt-4 test buy-icon" style="margin-top:5px;margin-left:-35px">
      <a class="shopping-cart-a" target="_blank">
        <a href="./adoption">

        <i class="fa-solid fa-shield-cat fa-l hidden-icon" style="font-size: 2em;transition:all 1s;padding-left:8px"></i>

        </a>
        <p class="mt-1 shopping-cart-p hidden-words ms-2">Adoption</p>
      </a>

    </div>
    <div class="col-xxl-1 col-xl-2 col-2 test pt-4 search-icon" style="margin-top:20px;margin-left:80px;transition:all 1s">
      <form class="d-flex">
        <input class="search-wrapper me-2 myInput" id="searchInput" type="text" placeholder="Search Product">
        <button id="searchButton" class="btn btn-warning rounded-pill btn-bg" style="width:130px" type="button">Search</button>
      </form>
    </div>
  </div>
</header>

<header class="h-11 bg-gray container-fluid header2 ">

  <!-- <h2  style="font-weight:600;position:absolute;margin-left:155px;padding-top:42px">{{ $appPresenter->fullTitle(request()->path()) }}</h2> -->
  <h2 style="font-weight:600;position:absolute;margin-left:145px;padding-top:42px" class="header-title-mobile">{{ $appPresenter->fullTitle(request()->path()) }}</h2>


  <a href="{{ url('/index') }}">
    <img class="logo2" src="{{ asset('img/logo1.png') }}" ></a>

  <div class="header-title2">

    <a class="shopping-cart-a" target="_blank">
    <a href="{{ url('/cart') }}"> <i class="fa-sharp fa-solid fa-cart-shopping shopping-cart fa-l" style="  font-size: 2em;"></i></a>
      <p class=" shopping-cart-p ps-1">Buy it !</p>
    </a>

  </div>



  <div class="header-title3 ms-2 pb-2 ps-3 pt-1">





@if(auth()->check())
    <a href="{{ url('/member') }}"><i class="fa-regular fa-circle-user ms-3" style="font-size: 2em;"></i></a>
@else
    <i class="fa-regular fa-circle-user ms-3" style="font-size: 2em;" data-bs-toggle="modal" data-bs-target="#myModal"></i>
@endif



    <p class="mt-1 me-5 shopping-cart-p">Menbership</p>

  </div>

  </div>


  <nav class="nav-box">
    <input type="checkbox" id="menu">
    <label for="menu" class="line">
      <div class="menu"></div>
    </label>

    <div class="menu-list">
      <div class="page-link">

        <ul>
          <li class="nav-item me-3">
            <a href="./index">回首頁</a>
            <div class="unloading-bar"></div>
            <div class="loading-bar"></div>
          </li>
@if(auth()->check())
    <li>
        <span> <a href="{{ route('logout') }}">登出</a></span>
        <div class='unloading-bar'></div>
        <div class='loading-bar'></div>
    </li>
@endif

          </a>

          </li>
        </ul>
      </div>
      <div class="page-link-min">

        <ul>
          <li class="nav-item me-3">
            <a href="./index">回首頁</a>
            <div class="unloading-bar"></div>
            <div class="loading-bar"></div>
          </li>
          @if(session('user'))
    <li>
        <span> <a href="{{ route('logout') }}">登出</a></span>
        <div class='unloading-bar'></div>
        <div class='loading-bar'></div>
    </li>
@endif

          </a>

          </li>
        </ul>
      </div>
    </div>
  </nav>

</header>
<script>
  $(document).ready(function() {
    $('#searchButton').click(function() {
      var searchQuery = $('#searchInput').val();

      var encodedQuery = encodeURIComponent(searchQuery);
      var url = "search?query=" + encodedQuery;
      window.location.href = url;
    });
    $('#searchInput').on('keypress', function(event) {
      if (event.keyCode === 13 || event.which === 13) {
        event.preventDefault();
        var searchQuery = $('#searchInput').val();
        var encodedQuery = encodeURIComponent(searchQuery);
        var url = "search?query=" + encodedQuery;
        window.location.href = url;
      }
    });
  });
</script>
<script src="{{ asset('js/login.js') }}"></script>
