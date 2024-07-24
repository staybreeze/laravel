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

    .dotted-line {
      font-size: larger;
      padding-top: 10px;
      margin-left: 15px;
      border-bottom: 3px dotted goldenrod;
      width: 30px
    }

    .hidden {
      display: none;
    }

    .good-border {
      border: 1px dotted brown;
    }

    .ms-95 {
      margin-left: 95px;

    }

    .color-brown {
      color: goldenrod;
      font-size: 20px;
    }

    .dotted-border {
      border: 1px dotted brown;
    }

    a {
      text-decoration: none;
    }

    .color-blue {
      color: cadetblue;
      /* border:3px dotted goldenrod; */
      font-weight: bold;
    }

    .w-95 {
      width: 95%;
      text-align: center;
      margin: auto;
    }

    .pages {

      margin-left: 30px;
      font-size: large;
      border: 3px dotted goldenrod;
      color: brown;
      text-decoration: none;
      width: 30px;
      text-align: center;
    }

    .pages:hover {
      background-color: beige;
    }

    .currentPage {
      background-color: beige;
      margin-left: 30px;
      font-size: large;
      border: 3px dotted goldenrod;
      color: brown;
      text-decoration: none;
      width: 30px;
      text-align: center;

    }

    .ms-20 {
      margin-left: 21px
    }

    a {
      text-decoration: none;
      color: brown;
    }

    .show {
      display: block !important;
    }

    .sho2 {
      display: block !important;
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
    <div class="row">

      @include('partials.back_nav')
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <!-- content -->

        <div class="container-fluid mt-3 ">
          <h2 class="title">文章管理</h2>
          <div class="d-flex">

            <a href="{{ url('/back/articles/create?do=articles&create') }}">
              <h4 class="mt-5 color-gray ms-95 mb-4 ">新增</h4>
            </a>
            @if(request()->has('edit') || request()->has('page'))
            <a href="{{ url('/back/articles/edit?do=articles&edit') }}">
              <h4 class="mt-5 color-blue ms-4 mb-4">編輯</h4>
            </a>
            @else
            <a href="{{ url('/back/articles/edit?do=articles&edit') }}">
              <h4 class="mt-5 color-gray ms-4 mb-4">編輯</h4>
            </a>
            @endif
          </div>
          <div class="dotted-border ms-95">

            <div class='d-flex mt-4 me-1' style='margin-left:{{ request('page', 1) == 1 ? '21px' : '-11px' }}'>
              @php
              $firstPage = $articles->currentPage() > 1 ? $articles->currentPage() - 1 : 1;
              $lastPage = $articles->currentPage() < $articles->lastPage() ? $articles->currentPage() + 1 : $articles->lastPage();
                @endphp

                <a href="{{ $articles->url($firstPage) }}" class="{{ $articles->currentPage() == 1 ? 'hidden' : '' }}">
                  <div class='pages ms-5'>
                    < </div>
                </a>

                @foreach(range(1, $articles->lastPage()) as $i)
                @php
                $currentPage = $articles->currentPage() == $i ? 'currentPage' : 'pages';
                $hidden = !in_array($i, [$articles->currentPage(), $articles->currentPage() - 1, $articles->currentPage() + 1]) ? 'hidden' : '';
                $now = request()->query('page', 1);
                @endphp
                <a href="{{ $articles->url($i) }}">
                  <div class="{{ $currentPage }} {{ $hidden }} ms-3"> {{ $i }} </div>
                </a>
                @endforeach

                <div class='dotted-line {{ $articles->currentPage() >= $articles->lastPage() - 2 ? 'hidden' : '' }}'></div>
                <a href="{{ $articles->url($lastPage) }}" class="{{ $articles->currentPage() == $articles->lastPage() ? 'hidden' : '' }}">
                  <div class='pages ms-3'> > </div>
                </a>
            </div>

            <table class="mt-3 w-95">
              <tr class="th-update text-center" style="height:30px">
                <th style="width:30%;background-color:#f8ede0">圖片</th>
                <th style="width:20%;background-color:#f8ede0">標題</th>
                <th style="width:40%;background-color:#f8ede0">內容</th>
                <th style="width:10%;background-color:#f8ede0">編輯</th>
                <th style="width:10%;background-color:#f8ede0">刪除</th>
              </tr>
              @foreach ($articles as $article)
              <tr>
                <td style="padding-top:23px"><img src="{{ asset($article['img']) }}" width="300px" class="mb-3"></td>
                <td style="padding-top:23px">{{ $article['title'] }}</td>
                <td style="padding-top:23px">{{ $article['content'] }}</td>
                <td>
                  <a href="{{ route('article.edit', ['id' => $article['id'], 'page' => $now]) }}">
                    <button class="btn btn-secondary mt-5 mb-5">編輯</button>
                  </a>
                </td>
                <td><a href="{{ route('article.delete', ['id' => $article['id']]) }}"><button class="btn btn-danger mt-5 mb-5">刪除</button></a></td>
              </tr>
              @endforeach
            </table>
            @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger">
              {{ session('error') }}
            </div>
            @endif
          </div>
          <br<br><br>
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