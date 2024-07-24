<!DOCTYPE html>
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

    .total-price {
      margin-left: 30px;
      font-size: 20px;
      color: crimson;
    }

    .user-total-price {
      color: brown;
      font-size: 20px;
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
      background-color: gainsboro;
    }

    .ms-80 {
      margin-left: 80px
    }

    a {
      text-decoration: none;
      color: brown;
    }

    .gold-border {
      border: 2px dotted burlywood;
      border-left: 15px solid burlywood;
      text-align: left;

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
          <h2 class="title">訂單管理</h2>
          <?php

          $customerAccArray = array_column($Customer->all('customer_acc'), 'customer_acc');
          $uniqueCustomerAccArray = array_unique($customerAccArray);

          $totalOrders = count($uniqueCustomerAccArray);
          echo "<div class='gold-border mt-5' style='margin-left:95px'><p class='total-price mt-3'><b>訂單數：共<span class='underline'> {$totalOrders} </span>筆</b></p>";
          echo "<p class='total-price' id='totalPrice'><b>總訂單金額：<span class='underline'></span>元</p>";
          echo "<p class='total-price' id='totalPrice'>目前折扣活動：【<span style='text-decoration:underline'>滿5000元，打8折～</span>】</p></div>";
          ?>

          <?php

          $totalPrice = 0;
          $users = $User->all();

          foreach ($users as $user) {

            $cart = $Customer->all(['customer_acc' => $user['acc']], 'ORDER BY product_id ASC');
            if ($cart) {

              $userTotalPrice = 0;
          ?>
              <form method="post" action="../api/back_orders.php" style="margin-left:95px;margin-top:50px">
                <table>
                  <tr>
                    <?php
                    echo "<p style='font-size:20px;font-weight:400'>訂單帳號：<span class='underline'>{$user['acc']}</span></p>";
                    echo "<input type='hidden' name='acc' value='{$user['acc']}'>";

                    echo '<table class="table">';
                    echo '<tr class="th-update text-center" style="height:30px">
                          <th style="width:8%;background-color:#f8ede0">ID</th>
                          <th style="width:10% ;background-color:#f8ede0">圖片</th>
                          <th style="width:30% ;background-color:#f8ede0">商品</th>
                          <th style="width:10%;background-color:#f8ede0">單價</th>
                          <th style="width:10%;background-color:#f8ede0">數量</th>
                          <th style="width:10%;background-color:#f8ede0">小計</th>
                          <th style="width:10%;background-color:#f8ede0">刪除</th>
                        </tr>';

                    foreach ($cart as $cartItem) {
                      $row = $Good->find(['id' => $cartItem['product_id']]);

                      echo '<tr>';
                      echo "<td>{$row['id']}</td>";
                      echo "<td><img src='../img/{$row['img']}' width='50px' alt=''></td>";
                      echo "<td>{$row['name']}</td>";
                      echo "<td class='price'>{$row['price']}</td>";
                      echo "<td><input type='number' style='text-align:center' class='quantity-input' name='number[]' value='{$cartItem['quantity']}'></td>";
                      echo "<input type='hidden' name='name[]' value='{$row['id']}'>";
                      $total = $cartItem['quantity'] * $row['price'];
                      echo "<td class='subtotal' id='subtotal_{$user['acc']}_{$row['id']}'>{$total}</td>";

                      echo "<td><a href='../api/del_good.php?id={$row['id']}&user={$user['acc']}&quantity={$cartItem['quantity']}'><input class='btn btn-danger mt-3' type='button' value='刪除'></a></td>";
                      echo '</tr>';
                      $userTotalPrice += $total;
                    }

                    echo '</table>';
                    echo "<p style='margin-left:1100px;font-size:20px;margin-top:20px' class='user-total-price' data-username='{$user['acc']}' id='userTotal'>總計：<span class='underline total-price'>{$userTotalPrice}</span>元</p>";

                    $totalPrice += $userTotalPrice;

                    ?>

                  </tr>
                </table>
                <table>

                  <br>
                  <tr>
                    <div class="d-flex">
                      <input class="btn myBtn" style="margin-left:1310px " type="submit" value="修改">
                    </div>
                    <hr>
                  </tr>
                </table>
              </form>
          <?php
            }
          }
          ?>
        </div>

      </main>
    </div>
  </div>
  <script src="{{ asset('js/orders_calculation.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="{{ asset('js/back.js') }}"></script>
</body>

</html>