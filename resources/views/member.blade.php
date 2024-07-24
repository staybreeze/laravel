<!DOCTYPE html>
<html lang="en">

<head>
  <title>{{ $appPresenter->fullTitle(request()->path()) }}>會員中心</title>
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
    }


    h3>p {
      font-size: 20px;
      line-height: 30px;
    }

    .footer {
      margin-top: 0px;

    }

    .logout {

      width: 295px !important;
      margin-left: 0px !important;

    }

    .modal input[type='submit'] {
      margin-left: 408px !important;
    }

    .modal-body>.delete {
      font-size: large;
      font-weight: bold;
      color: crimson;
      margin-top: 28px;
    }

    @media screen and (max-width: 550px) {
      .section {
        width: 100%;
        margin: auto !important;
        /* border: 1px solid black; */
      }

      .box {
        margin-left: -160px !important;

      }

      .input-group {

        width: 325px !important;
      }

      .box>p {
        margin-left: 130px !important;
        margin-bottom: 30px !important;
      }

      .btn-group {
        margin-left: 110px !important;
      }

      .logout {
        width: 325px !important;
        margin-left: -1px !important;
      }


      .modal .input-group {

        width: 450px !important;

      }

      .modal input[type='submit'] {
        margin-left: 350px !important;
      }
    }

    @media screen and (max-width: 450px) {
      .section {
        width: 100%;
        margin: auto !important;
        /* border: 1px solid black; */
      }

      .box {
        margin-left: -160px !important;

      }

      .input-group {
        margin-left: -13px !important;
        width: 325px !important;
      }

      .box>p {
        margin-left: 130px !important;
        margin-bottom: 30px !important;
      }

      .btn-group {
        margin-left: 110px !important;
        margin-left: 96px !important;
      }

      .logout {

        width: 325px !important;
        margin-left: -14px !important;
      }

      .modal .input-group {

        width: 330px !important;

      }

      .modal input[type='submit'] {
        margin-left: 270px !important;
      }
    }

    @media screen and (max-width: 410px) {

      .modal .input-group {

        width: 289px !important;

      }

      .modal input[type='submit'] {
        margin-left: 231px !important;
      }

      .footer {
        height: 96vh !important
      }
    }
  </style>
</head>


<body>
  @if(!auth()->check())
  <script>
    window.location.href = "{{ route('register.index') }}";
  </script>
  @endif
  @include('partials.mouse_squares')
  @include('partials.header.about_us_articles')
  <div class="container-fluid">
    <div class="row d-flex main">
      <div class="col-5 aside">

      </div>

      <div class="col-12 col-sm-6  section ms-5 ps-5">
        <br>
        <div class="box mt-5 text-center">

          <p style="font-size:30px">歡迎光臨！{{ auth()->user()->name }}💛</p>

          <p class="mt-4" style="font-size:25px;font-weight:bold;text-align:center">使用者資料</p>

          @if(session('msg'))
          <div class='alert alert-warning text-center col-4 m-auto'>
            {{ session('msg') }}
          </div>
          @endif

          @php
          $user = auth()->user();
          @endphp
          <form action="{{ route('user.update') }}" method="post" class="col-4 m-auto pt-3">
            @csrf
            <div class="input-group my-1">
              <label class="col-4  input-group-text mt-3 w-100">帳號：</label>
              <input class="form-control" type="text" name="acc" id="acc" value="<?= $user['acc']; ?>" readonly>
            </div>
            <div class="input-group my-1">
              <label class="col-4  input-group-text mt-3 w-100">密碼：</label>
              <input class="form-control" type="password" name="pw" id="pw" value="<?= $user['pw']; ?>">
            </div>
            <div class="input-group my-1">
              <label class="col-4  input-group-text mt-3 w-100">姓名：</label>
              <input class="form-control" type="text" name="name" id="name" value="<?= $user['name']; ?>">
            </div>
            <div class="input-group my-1">
              <label class="col-4  input-group-text mt-3 w-100">電子郵件：</label>
              <input class="form-control" type="text" name="email" id="email" value="<?= $user['email']; ?>">
            </div>
            <div class="input-group my-1">
              <label class="col-4  input-group-text mt-3 w-100">居住地：</label>
              <input class="form-control" type="text" name="address" id="address" value="<?= $user['address']; ?>">
            </div>
            <div class="btn-group">
              <input class="form-control" type="hidden" name="id" id="id" value="<?= $user['id']; ?>">
              <input class="btn btn-secondary mx-2 mt-5 " style="border-radius:5px 0 0 5px" type="reset" value="重置">
              <input class="btn btn-warning mx-2 mt-5  myBtn" type="submit" value="更新">
              <input class="btn btn-danger mx-2 mt-5" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal" type="button" value="刪除">
            </div>
            <a href="{{ route('logout') }}" class='btn logout btn-warning mt-4 col-9 mx-2'>登出</a>
          </form>
          <br><br><br>
        </div>
        <div class="col-1"></div>
      </div>
    </div>
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
        <a class="footer-header" href="{{ url('/articles#') }}">貓咪文章</a>
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

  <script>
    function showDeleteConfirmModal() {
      var modal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'), {
        keyboard: false
      });

      modal.show();

      document.getElementById('confirmDeleteButton').addEventListener('click', function() {

        location.href = './api/del_user?id=<?= $user['id']; ?>';
        modal.hide();
      });
    }
  </script>


  <div class="modal fade" id="deleteConfirmModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->

        <!-- Modal Body -->
        <div class="modal-body">
          <p class="delete">確定要刪除嗎？<br><br>資料會一去不復返喔！</p>
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
          <button type="button" class="btn btn-danger" onclick="location.href='{{ route('user.delete', ['id' => $user['id']]) }}'">刪除</button>
        </div>
      </div>
    </div>
  </div>

</body>

</html>