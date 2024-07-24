@include('partials.header.effect')

<header class="h-11 bg-gray container-fluid header hide-header" id="header">
  <div class="row">

    <div class="test col-xxl-1 col-xl-6 col-12 ms-3 logo-area">
      <a href="{{ url('/index') }}" data-bs-toggle="modal" data-bs-target="#myModal-2">
        <img class="logo" src="{{ asset('img/logo1.png') }}" id="logo" style="transition:all 1s; height:10vh;"></a>
    </div>
    <div class="test col-xxl-2 col-xl-6 col-12 mt-4 pt-3 header-title">

      <a href="{{ url('/index') }}">
        <h2 style="font-weight:600;transition:all 1s;font-size:1.9rem" id="title">{{ __('general.store_name') }}</h2>
      </a>

    </div>
    <div class="col-xxl-4 col-xl-12 col-12 test-1 pt-5 header-group" id="header-pages" style="transition:all 1s">
      <div class="page-link ">

        <ul>
          <li class="nav-item me-3">
            <a href="{{ url('/about_us') }}">關於我們</a>
            <div class="unloading-bar"></div>
            <div class="loading-bar"></div>
          </li>
          <li class="nav-item  me-3" style="margin-left:36px">
            <a href="{{ url('/articles') }}">文章</a>
            <div class="unloading-bar"></div>
            <div class="loading-bar"></div>
          </li>
          <li class="nav-item me-3" style="margin-left:36px">
            <a href="{{ url('/index#store') }}" class="store-bar">商城</a>
            <div class="unloading-bar"></div>
            <div class="loading-bar"></div>
          </li>
          <li class="nav-item me-3" style="margin-left:36px">
            <span data-bs-toggle="modal" data-bs-target="#contact">聯絡我們</span>
            <div class="unloading-bar"></div>
            <div class="loading-bar"></div>
          </li>
          <li class="nav-item" style="margin-left:36px">
            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#myModal">
              @if(auth()->check())
              <span> <a href="{{ route('logout') }}">登出</a></span>
              <div class='unloading-bar'></div>
              <div class='loading-bar'></div>
              @else
              <span> 會員登入</span>
              <div class="unloading-bar"></div>
              <div class="loading-bar"></div>
              @endif
            </a>
          </li>
        </ul>

      </div>

    </div>

    <div class="col-xxl-1 col-xl-2 col-2 pt-4 test buy-icon" style="margin-top:5px;margin-left:20px">
      <a class="shopping-cart-a" target="_blank">
        <a href="{{ url('/cart') }}">
          <i class="fa-solid fa-cart-shopping shopping-cart fa-l hidden-icon" style="font-size: 2em;transition:all 1s">
          </i>
        </a>
        <p class="mt-1 shopping-cart-p hidden-words ms-2">
          @if(session('good'))
          <span style="font-size:15px;">【 <span style="color:brown;font-size: 12px;font-weight:300;font-family: 'Orbitron', sans-serif;font-weight:600;">{{ count(session('good')) }}</span> 】</span>
          @else
          Buy it !
          @endif
        </p>
      </a>

    </div>

    <div class="test col-xxl-1 col-xl-2 col-2 pt-4  member-icon" style="margin-top:5px;margin-left:-30px;overflow:hidden">

    <div class="offcanvas offcanvas-end" id="demo">
        <div class="offcanvas-header" style="background-color:#12304a;text-align:center;padding-top:17.5px;color:#fff">
          <h2 class="offcanvas-title">會員中心<img class="mb-2" src="{{ asset('img/logo1.png') }}"  width="80px"></h2>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
          <div class="modal-header">
            <h4 class="modal-title"></h4>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <!-- 插入程式碼要有頭跟END，方便日後維護及辨識 -->
            <!-- Modal body container.. -->
            <div class="container mt-3">
            @if(session('login_success'))
          <div class="alert alert-success">
            {{ session('login_success') }}
          </div>
          @endif

          @if(session('login_error'))
          <div class="alert alert-danger">
            {{ session('login_error') }}
          </div>
          @endif
              <form action="{{ route('logging') }}" method="post">
                @csrf
                @if(!session('user'))
                <div class="row">
                  <div class="col-12">
                    <div class="input-group mb-3 mt-4">
                      <span class="input-group-text bold">帳號</span>
                      <input type="text" class="form-control" placeholder="Account123" name="acc">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="input-group mb-3 mt-3">
                      <span class="input-group-text bold">密碼</span>
                      <input type="password" class="form-control" placeholder="****" name="pw">
                    </div>
                  </div>
                  <a href="{{ route('register.index') }}" style="text-align:left;text-decoration:underline;color:cadetblue" class="mb-3">
                    <i class="fa-solid fa-user-plus ms-1"></i>&nbsp;加入會員
                  </a>
                </div>
                <div style="display:flex" class="mt-3">
                  @php
                  session(['ans' => $appPresenter->code(5)]);
                  $img = $appPresenter->captcha(session('ans'));
                  @endphp
                  <img src="{{ $img }}">
                  <input type="hidden" id="sessionAns" value="{{ session('ans') }}">
                  <input type="text" name="ans" id="ans" style="height:40px;margin-top:4px;margin-left:40px;width:150px;border:1px dotted brown;border-radius:5px" placeholder="請輸入驗證碼">
                </div>
                <div class="row mt-3">
                  <div class="col-12">
                    <div>
                      <div class="d-flex gap-2">
                        <button type="reset" class="btn btn-primary btn-secondary col-6">重置</button>
                        <button type="submit" class="btn btn-primary btn-warning col-6">送出</button>
                      </div>
                    </div>
                  </div>
                </div>
                @else
                <img src="./img/cheetos20.jpg" width="310px">
                <br>歡迎光臨！{{ session('user') }} 💛
                <br><a href='./member' class='btn btn-secondary mt-4 col-7 mx-2'>修改會員資料</a>
                <br><a href="{{ route('logout') }}" class='btn btn-warning mt-4 col-7 mx-2'>登出</a>
                @endif
              </form>
            </div>
            </form>
            <!-- Modal body container end -->
          </div>
          @if(auth()->check())
          {{-- <img class="mb" src="{{ asset('img/cheetos19.jpg') }}" width="383px" style="position:relative;top:30px"> --}}
          {{-- <img class="mb" src="{{ asset('img/cheetos21.jpg') }}" width="300px"> --}}
          @else
          <br> <br> <br> <br> <br> <img class="ms-3" src="{{ asset('img/cheetos15.jpg') }}" width="300px" >
          @endif
        </div>
      </div>
      <div>
        <i class="fa-regular fa-circle-user  hidden-icon" style=" font-size: 2em;transition:all 1s;cursor:pointer" data-bs-toggle="offcanvas" data-bs-target="#demo"></i>
        <p class="mt-1  shopping-cart-p hidden-words">Menbership</p>
      </div>
    </div>
    <div class="col-xxl-1 col-xl-2 col-2 pt-4 test buy-icon" style="margin-top:5px;margin-left:-35px">
      <a class="shopping-cart-a" target="_blank">
        <a href="./adoption">

          <i class="fa-solid fa-shield-cat fa-l hidden-icon" style="font-size: 2em;transition:all 1s;padding-left:8px"></i>

        </a>
        <p class="mt-1 shopping-cart-p hidden-words ms-2">Adoption</p>
      </a>

    </div>
    <div class="col-xxl-1 col-xl-2 col-2 test pt-4 search-icon" style="margin-top:20px;margin-left:20px;transition:all 1s">
      <form class="d-flex">
        <input class="search-wrapper me-2 myInput" id="searchInput" type="text" placeholder="Search Product">
        <button id="searchButton" class="btn btn-warning rounded-pill btn-bg" style="width:130px" type="button">Search</button>
      </form>
    </div>
  </div>
</header>
<header class="h-11 bg-gray container-fluid header2" id="headerMobile">

  <!-- <h2  style="font-weight:600;position:absolute;margin-left:155px;padding-top:42px">{{ $appPresenter->fullTitle(request()->path()) }}</h2> -->
  <h2 style="font-weight:600;position:absolute;margin-left:145px;padding-top:42px" class="header-title-mobile"> <a href="{{ url('/index') }}">{{ $appPresenter->fullTitle(request()->path()) }}</a></h2>
  <a href="{{ url('/index') }}">

    <img class="logo2" src="{{ asset('img/logo1.png') }}" > </a>


  <div class="header-title2">

    <a class="shopping-cart-a" target="_blank">
      <a href="{{ url('/cart') }}"> <i class="fa-sharp fa-solid fa-cart-shopping shopping-cart fa-l" style="  font-size: 2em;"></i></a>
      <p class=" shopping-cart-p ps-1">Buy it !</p>
    </a>
  </div>
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
      <div class="page-link ">

        <ul>
          <li class="nav-item me-3">
            <a href="about_us">關於我們</a>
            <div class="unloading-bar"></div>
            <div class="loading-bar"></div>
          </li>
          <li class="nav-item  me-3" style="margin-left:36px">
            <a href="{{ url('/articles') }}">文章</a>
            <div class="unloading-bar"></div>
            <div class="loading-bar"></div>
          </li>
          <li class="nav-item me-3" style="margin-left:36px">
            <a href="#store">商城</a>
            <div class="unloading-bar"></div>
            <div class="loading-bar"></div>
          </li>
          <li class="nav-item me-3" style="margin-left:36px">
            <span data-bs-toggle="modal" data-bs-target="#contact">聯絡我們</span>
            <div class="unloading-bar"></div>
            <div class="loading-bar"></div>
          </li>
          <li class="nav-item" style="margin-left:36px">


            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#myModal">

              @if(auth()->check())
              <span> <a href="{{ route('logout') }}">登出</a></span>
              <div class='unloading-bar'></div>
              <div class='loading-bar'></div>
              @else
              <span> 會員登入</span>
              <div class="unloading-bar"></div>
              <div class="loading-bar"></div>
              @endif


            </a>

          </li>
        </ul>

      </div>
      <div class="page-link-min">

        <ul>
          <li class="nav-item me-3">
            <a href="about_us">關於我們</a>
            <div class="unloading-bar"></div>
            <div class="loading-bar"></div>
          </li>
          <li class="nav-item  me-3" style="margin-left:-25px">
            <a href="{{ url('/articles') }}">文章</a>
            <div class="unloading-bar"></div>
            <div class="loading-bar"></div>
          </li>
          <li class="nav-item me-3" style="margin-left:-25px">
            <a href="{{ url('/cart') }}">購物車</a>
            <div class="unloading-bar"></div>
            <div class="loading-bar"></div>
          </li>

          <li class="nav-item" style="margin-left:-25px">


            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#myModal">

              @if(auth()->check())
              <span> <a href="{{ route('logout') }}">登出</a></span>
              <div class='unloading-bar'></div>
              <div class='loading-bar'></div>
              @else
              <span> 會員登入</span>
              <div class="unloading-bar"></div>
              <div class="loading-bar"></div>
              @endif


            </a>

          </li>
        </ul>

      </div>
  </nav>

</header>

<script src="./js/header_index.js"></script>
<script src="{{ asset('js/login.js') }}"></script>