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

    .good-border {
      border: 1px dotted brown;
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

    .underline {
      text-decoration: underline;
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

    .ms-80 {
      margin-left: 80px
    }

    a {
      text-decoration: none;
      color: brown;
    }

    .hidden {
      display: none;
    }

    .show {
      display: block !important;
    }

    .dotted-line {
      font-size: larger;
      padding-top: 10px;
      margin-left: 15px;
      border-bottom: 3px dotted goldenrod;
      width: 30px
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
    <div class="message">
      @include('partials.back_nav')
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      
        <div class="container-fluid mt-3">
          <h2 class="title">留言管理</h2>
          <div class='d-flex mt-4 me-1' style='margin-left:{{ request('page', 1) == 1 ? '80px' : '49px' }}'>
            @php
            $firstPage = $messages->currentPage() > 1 ? $messages->currentPage() - 1 : 1;
            $lastPage = $messages->currentPage() < $messages->lastPage() ? $messages->currentPage() + 1 : $messages->lastPage();
              @endphp

              <a href="{{ $messages->url($firstPage) }}" class="{{ $messages->currentPage() == 1 ? 'hidden' : '' }}">
                <div class='pages ms-5'>
                  < </div>
              </a>

              @foreach(range(1, $messages->lastPage()) as $i)
              @php
              $currentPage = $messages->currentPage() == $i ? 'currentPage' : 'pages';
              $hidden = !in_array($i, [$messages->currentPage(), $messages->currentPage() - 1, $messages->currentPage() + 1]) ? 'hidden' : '';
              @endphp
              <a href="{{ $messages->url($i) }}">
                <div class="{{ $currentPage }} {{ $hidden }} ms-3"> {{ $i }} </div>
              </a>
              @endforeach

              <div class='dotted-line {{ $messages->currentPage() >= $messages->lastPage() - 2 ? 'hidden' : '' }}'></div>
              <a href="{{ $messages->url($lastPage) }}" class="{{ $messages->currentPage() == $messages->lastPage() ? 'hidden' : '' }}">
                <div class='pages ms-3'> > </div>
              </a>
          </div>
          @foreach ($messages as $message)
          <form method="post" action="{{ url('../api/message.php') }}" style="margin-left:95px;margin-top:50px">
            @csrf
            <table>
              <tr>
                <p style='font-size:20px'>寄信人:<span class='underline'>{{ $message['sender'] }}</span></p>
                <table>
                  <tr class="th-update text-center" style="height:30px">
                    <th style="width:8%;background-color:#f8ede0">主旨</th>
                    <th style="width:30%;background-color:#f8ede0">內容</th>
                    <th style="width:10%;background-color:#f8ede0">刪除</th>
                  </tr>
                  <tr>
                    <td style='padding-top:23px'>{{ $message['subject'] }}</td>
                    <td style='padding-top:23px'>{{ $message['text'] }}</td>
                    <td>
                      <a href="{{ url('../api/message.php?id=' . $message['id']) }}">
                        <button type="button" class="btn btn-danger mt-3">刪除</button>
                      </a>
                    </td>
                  </tr>
                </table>
              </tr>
            </table>
            <table>
              <br>
              <tr>
                <div class="d-flex">
                  <!-- <button class="btn myBtn mt-5" style="margin-left:1305px" type="submit">修改</button> -->
                </div>
                <hr>
              </tr>
            </table>
          </form>
          @endforeach
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