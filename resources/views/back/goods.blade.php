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
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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
      margin-left: 94px
    }

    a {
      text-decoration: none;
      color: brown;
    }

    input {
      text-align: center;
    }

    .show {
      display: block !important;
    }

    .sho2 {
      display: block !important;
    }

    .hidden {
      display: none;
    }

    .dotted-border {
      border: 1px dotted brown;
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
    <div class="row">
      @include('partials.back_nav')
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


        <div class="container-fluid mt-3">
          <h2 class="title">商品管理</h2>
          <h4 class="mt-5 color-gray" style="margin-left:95px">新增</h4>
          <form action="{{ route('goods.create') }}" method="post" class="mt-5" enctype="multipart/form-data">
            @csrf
            <div class="container dotted-border">
              <div class="row mt-3">
                <div class="col-1"></div>
                <div class="col-7">

                </div>
                <div class="col-4">
                  <h5>選擇圖片<p style="color:brown;font-size:small;margin-top:5px">{{ __('general.img_file_size_limit') }}</p></h5>
                  <input type="file" name="img" class="mb-5 mt-3">
                </div>
              </div>

              <div class="row">
                <div class="col-1">
                  <div class="input-group mb-3">

                    <span class="input-group-text bold">ID</span>
                    <input type="text" class="form-control" name="id" disabled>
                    <input type="hidden" name="id">
                  </div>
                </div>
                <div class="col-6">
                  <div class="input-group mb-3">

                    <span class="input-group-text bold">商品名稱</span>
                    <input type="text" class="form-control" name="name">

                  </div>
                </div>

                <div class="col-2 ms-4">
                  <div class="input-group mb-3 ms-3">

                    <span class="input-group-text bold">數量</span>
                    <input type="number" style="border:1px solid lightgray; border-radius:0px 5px 5px 0px;width:100px" name="quantity">

                  </div>
                </div>

                <div class="col-2 pe-5">
                  <div class="input-group mb-3 mt-2 ms-3">

                    <label for="" class="fs-6">是否為新品</label>
                    <input type="checkbox" style="border:1px solid gray;margin-left:20px" name="new">

                  </div>
                </div>

              </div>
              <div class="row">
                <div class="col-1"></div>
                <div class="col-2">
                  <div class="input-group mb-3">

                    <span class="input-group-text bold">原價</span>
                    <input type="number" style="border:1px solid lightgray; border-radius:0px 5px 5px 0px;width:110px" name="old_price">

                  </div>
                </div>

                <div class="col-2 ms-3">
                  <div class="input-group mb-3 discount">

                    <span class="input-group-text bold">折扣</span>
                    <input type="number" style="border:1px solid lightgray;width:78px " placeholder="" name="discount">
                    <span style="padding: 8px; background-color: lightgray;border-radius:0px 5px 5px 0px">%</span>
                  </div>
                </div>
                <div class="col-2">
                  <div class="input-group mb-3" style="margin-left:14px">

                    <span class="input-group-text bold">售價</span>
                    <input type="number" style="border:1px solid lightgray; border-radius:0px 5px 5px 0px;width:110px" name="price" placeholder="原價 x 折扣數" disabled>

                  </div>
                </div>

                <div class="col-2 ms-4">
                  <div class="input-group mb-3" style="height:38px">

                    <span class="input-group-text bold">

                      <i class="fa-sharp fa-solid fa-boxes-stacked"></i>
                    </span>
                    <input type="number" style="border:1px solid lightgray; border-radius:0px 5px 5px 0px;width:115px;text-align:center" name="remain">

                  </div>
                </div>

                <div class="col-2">
                </div>
              </div>

            </div>
        </div>
        <input class="btn myBtn-gold mt-2" style="margin-left:1350px " type="submit" value="送出">

        </form>
        <h4 class="mt-5 color-gray" style="margin-left:107px" id="edit">編輯</h4>
        <div class='d-flex mt-4 me-1' style='margin-left:{{ request('page', 1) == 1 ? '100px' : '69px' }}'>
          @php
          $firstPage = $goods->currentPage() > 1 ? $goods->currentPage() - 1 : 1;
          $lastPage = $goods->currentPage() < $goods->lastPage() ? $goods->currentPage() + 1 : $goods->lastPage();
            @endphp

            <a href="{{ $goods->url($firstPage) }}" class="{{ $goods->currentPage() == 1 ? 'hidden' : '' }}">
              <div class='pages ms-5'>
                < </div>
            </a>
            @foreach(range(1, $goods->lastPage()) as $i)
            @php
            $currentPage = $goods->currentPage() == $i ? 'currentPage' : 'pages';
            $hidden = !in_array($i, [$goods->currentPage(), $goods->currentPage() - 1, $goods->currentPage() + 1]) ? 'hidden' : '';
            @endphp
            <a href="{{ $goods->url($i) }}">
              <div class="{{ $currentPage }} {{ $hidden }} ms-3"> {{ $i }} </div>
            </a>
            @endforeach

            <div class='dotted-line {{ $goods->currentPage() >= $goods->lastPage() - 2 ? 'hidden' : '' }}'></div>
            <a href="{{ $goods->url($lastPage) }}" class="{{ $goods->currentPage() == $goods->lastPage() ? 'hidden' : '' }}">
              <div class='pages ms-3'> > </div>
            </a>
        </div>
        @foreach ($goods as $good)
        <!-- @php
  echo '<pre>';
  print_r($good);
  echo '</pre>';
  @endphp -->
        <form action="{{ route('goods.update', ['id' => $good['id']]) }}" method="post" class="mt-2 mb-5" enctype="multipart/form-data">
          @csrf
          <div class="container dotted-border">
            <div class="row mt-3">
              <div class="col-1"></div>
              <div class="col-7">
                <h5 >上架中的圖片</h5>
                <img src="{{ asset($good['img']) }}" class="mt-2"width="100px" height="60%">
              </div>
              <div class="col-4">
                <h5>選擇新圖片<p style="color:brown;font-size:small;margin-top:5px">{{ __('general.img_file_size_limit') }}</p></h5>
                <input type="file" name="img" class="mt-4 mb-5">
              </div>
            </div>

            <div class="row">
              <div class="col-1">
                <div class="input-group mb-3">
                  <span class="input-group-text bold">ID</span>
                  <input type="text" class="form-control" value="{{ $good['id'] }}" disabled>
                  <input type="hidden" name="id" value="{{ $good['id'] }}">
                </div>
              </div>
              <div class="col-6">
                <div class="input-group mb-3">
                  <span class="input-group-text bold">商品名稱</span>
                  <input type="text" class="form-control" name="name" value="{{ $good['name'] }}">
                </div>
              </div>

              <div class="col-2 ms-4">
                <div class="input-group mb-3 ms-3">
                  <span class="input-group-text bold">數量</span>
                  <input type="number" class="form-control" name="quantity" value="{{ $good['quantity'] }}">
                </div>
              </div>

              <div class="col-2 pe-5">
                <div class="input-group mb-3 mt-2 ms-3">
                  <label class="fs-6">是否為新品</label>
                  <input type="checkbox" class="form-check-input ms-2" name="new" value="1" @if($good['new']==1) checked @endif>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-1"></div>
              <div class="col-2">
                <div class="input-group mb-3">
                  <span class="input-group-text bold">原價</span>
                  <input type="number" class="form-control" name="old_price" value="{{ $good['old_price'] }}">
                </div>
              </div>

              <div class="col-2 ms-3">
                <div class="input-group mb-3">
                  <span class="input-group-text bold">折扣</span>
                  <input type="number" class="form-control" name="discount" value="{{ $good['discount'] }}">
                  <span class="input-group-text">%</span>
                </div>
              </div>

              <div class="col-2">
                <div class="input-group mb-3" style="margin-left:14px">
                  <span class="input-group-text bold">售價</span>
                  <input type="number" class="form-control" name="price" value="{{ $good['price'] }}" disabled>
                </div>
              </div>

              <div class="col-2 ms-4">
                <div class="input-group mb-3">
                  <span class="input-group-text">
                    <i class="fa-sharp fa-solid fa-boxes-stacked"></i>
                  </span>
                  <input type="number" class="form-control" name="remain" value="{{ $good['remain'] }}">
                </div>
              </div>

              <div class="col-2">
                <div class="input-group mb-3">
                  <span class="input-group-text"><i class="fas fa-heart" style="color:crimson"></i></span>
                  <input type="number" class="form-control" disabled value="{{ $good['like_item'] }}">
                </div>
              </div>
            </div>
          </div>
          <div class="d-flex">
            <input class="btn btn-danger mt-2" type="button" style="margin-left:1272px " value="刪除" onclick="location.href='{{ route('goods.delete', ['id' => $good['id']]) }}'">
            <input class="btn myBtn mt-2" style="margin-left:20px " type="submit" value="送出">
          </div>

        </form>
        @endforeach
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
  </div>
  </div>
  </main>
  </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="{{ asset('js/back.js') }}"></script>
  <script>
    $(document).ready(function() {

      $(".old-price-edit, .discount-edit").on("input", function() {
        let container = $(this).closest(".container");
        let oldPriceEdit = parseFloat(container.find(".old-price-edit").val());
        let discountEdit = parseFloat(container.find(".discount-edit").val());

        if (!isNaN(oldPriceEdit) && !isNaN(discountEdit)) {
          let priceEdit = oldPriceEdit * (1 - discountEdit / 100);
          container.find(".price-edit").val(priceEdit.toFixed());
        }
      });
    });
  </script>
</body>

</html>