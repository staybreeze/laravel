<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>{{ $appPresenter->fullTitle(request()->path()) }}</title>
  <link rel="icon" href="{{ asset('img/logo3.jpg') }}" type="image/x-icon">
  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }


    table,
    tr {
      width: 100%;
    }

    td {
      text-align: center;
      border: none;
    }

    .th {
      height: 40px
    }

    .th-add>td {

      background-color: wheat;
      font-size: 15px;
      font-weight: bold;
      color: #727272;
    }

    .th-update>td {

      background-color: wheat;
      font-size: 15px;
      font-weight: bold;
      color: #727272;

    }

    td>input {
      width: 100%;
    }
  </style>



  <link href="{{ asset('css/back.css') }}" rel="stylesheet">
</head>

<body>
  @include('partials.mouse_squares')
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">

    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{route('back')}}"><img src="{{ asset('img/logo1.png') }}" width="60px" >
      <h3 style="font-weight:bold">{{ __('general.store_name') }}</h3>
    </a>
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="{{ route('logout') }}">Sign out</a>
      </div>
    </div>
  </header>

  <div class="container-fluid">
    <div class="user">
      @include('partials.back_nav')
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      

        <div class="container-fluid mt-3">
          <h2 class="title">會員管理</h2>
          <h4 class="mt-5 color-gray" style="margin-left:95px">新增</h4>
          <form method="post" action="{{ route('user.create') }}" style="margin-left:95px">
            @csrf
            <table>
              <tr class="th-add">
                <td style="width:10%">帳號</td>
                <td style="width:10%">密碼</td>
                <td style="width:10%">稱呼</td>
                <td style="width:30%">地址</td>
                <td style="width:30%">信箱</td>
              </tr>
              <tr>
                <td>
                  <input type="text" name="acc">
                </td>
                <td>
                  <input type="password" name="pw">
                </td>
                <td>
                  <input type="text" name="name">
                </td>
                <td>
                  <input type="text" name="address">
                </td>
                <td>
                  <input type="text" name="email">
                </td>
              </tr>
            </table>
            <table>
              <tr>
                <div class="d-flex">
                  <input type="hidden" name="user" value="user">
                  <input class="btn myBtn-gold mt-5" style="margin-left:1335px " type="submit" value="送出">
                </div>
              </tr>
            </table>
            <hr>
          </form>
          @if(session('success'))
          <div class="alert alert-success" style="margin-left:95px">
            {{ session('success') }}
          </div>
          @endif

          @if(session('error'))
          <div class="alert alert-danger" style="margin-left:95px">
            {{ session('error') }}
          </div>
          @endif
          @isset($message)
          <div class="alert alert-info" style="margin-left:95px">
            {{ $message }}
          </div>
          @endisset
          <h4 class="mt-5 color-gray" style="margin-left:95px">編輯</h4>
          <form method="post" action="{{ route('users.update') }}" style="margin-left:95px">
          @csrf
          <table>
              <tr class="th-update">
                <td style="width:10%">帳號</td>
                <td style="width:10%">密碼</td>
                <td style="width:10%">稱呼</td>
                <td style="width:30%">地址</td>
                <td style="width:30%">信箱</td>
                <td style="width:10%">刪除</td>
              </tr>
              @foreach ($users as $user)
              <tr>
                <td>
                  <input type="text" name="acc[]" value="{{ $user['acc'] }}">
                </td>
                <input type="hidden" name="id[]" value="{{ $user['id'] }}">
                <td>
                  <input type="password" name="pw[]" value="{{ $user['pw'] }}">
                </td>
                <td>
                  <input type="text" name="name[]" value="{{ $user['name'] }}">
                </td>
                <td>
                  <input type="text" name="address[]" value="{{ $user['address'] }}">
                </td>
                <td>
                  <input type="text" name="email[]" value="{{ $user['email'] }}">
                </td>
                <td>
                  <input type="checkbox" name="del[]" value="{{ $user['id'] }}">
                </td>
              </tr>
              @endforeach
            </table>
            <table>
              <tr>
                <div class="d-flex">
                  <input class="btn myBtn mt-5" style="margin-left:1335px " type="submit" value="送出">
                </div>
                <hr>
              </tr>
            </table>

          </form>
        </div>

    </div>

  </div>

  </main>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="{{ asset('js/back.js') }}"></script>
</body>

</html>