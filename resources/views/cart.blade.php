<!DOCTYPE html>
<html lang="en">

<head>
  <title>{{ $appPresenter->fullTitle(request()->path()) }}>購物車</title>
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
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
      font-size: x-large;
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

    table {
      width: 100vw;
      /* height:100vh; */
    }

    table,
    tr,
    td {
      border: 1px solid black;
      text-align: center;
    }

    .bg-myColor {

      background-color: #f8ede0
    }

    .quantity-input {
      width: 100px;
      text-align: end;
    }

    @media screen and (max-width: 450px) {

      .modal .input-group {

        width: 330px !important;

      }

      .modal input[type='submit'] {
        margin-left: 270px !important;
        width: 60px !important;
        font-size: 15px;
      }

      table tr,
      table tr td {
        font-size: 13px
      }

      table tr {
        font-size: 10px
      }

      .quantity-input {
        width: 50px
      }

      input[type="submit"],
      input[type="button"] {
        width: 100%;
        height: 100%;
        font-size: 10px
      }

    }

    @media screen and (max-width: 410px) {
      .modal .input-group {

        width: 289px !important;

      }

      .modal input[type='submit'] {
        margin-left: 235px !important;
      }

      .modal-content {
        width: 330px
      }
    }
  </style>
</head>

<body>

  @include('partials.mouse_squares')
  @include('partials.header.about_us_articles')

  <div class="container mt-5">
  @if(session('success'))
            <div class="alert alert-warning">
              {{ session('success') }}
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger">
              {{ session('error') }}
            </div>
            @endif
    <form action="./api/cart_add_good.php" method="post">
      <table class="table">
        <tr class="tr-computer">
          <th style="width:5%;background-color:#f8ede0">ID</th>
          <th style="width:10% ;background-color:#f8ede0">圖片</th>
          <th style="width:40%;background-color:#f8ede0">商品</th>
          <th style="width:10%;background-color:#f8ede0">單價</th>
          <th style="width:10%;background-color:#f8ede0">數量</th>
          <th style="width:10%;background-color:#f8ede0">小計</th>
          <th style="background-color:#f8ede0">刪除</th>
        </tr>

        <tr class="tr-mobile">
          <th style="width:8%;background-color:#f8ede0">ID</th>
          <th style="width:10% ;background-color:#f8ede0">圖片</th>
          <th style="width:40%;background-color:#f8ede0">商品</th>
          <th style="width:10%;background-color:#f8ede0">單價</th>
          <th style="width:10%;background-color:#f8ede0">數量</th>
          <th style="width:10%;background-color:#f8ede0">小計</th>
          <th style="background-color:#f8ede0">刪除</th>
        </tr>
        @php
        $totalPrice = 0;
        @endphp
        @if(!empty($cart))
        @foreach ($cart as $index => $cartItem)
        @php
        $good = App\Models\Good::find($cartItem['product_id']);
        @endphp
        @if($good)
        @php
        $row = $good->toArray();
        $total = $cartItem['quantity'] * $row['price'];
        $totalPrice += $total;
        @endphp

        <tr>
          <td style='padding-top:23px'>{{ $index + 1 }}</td>
          <input type='hidden' name='name[]' value='{{ $row['id'] }}'>

          <td style='padding-top:23px'><img src='{{ $row['img'] }}' width='50px' alt=''></td>
          <td style='padding-top:23px'>{{ $row['name'] }}</td>
          <td style='padding-top:23px' class='price'>{{ $row['price'] }}</td>
          <td style='padding-top:23px'>
            <input type='number' name='quantity[]' class='quantity-input' value='{{ $cartItem["quantity"] }}'>
          </td>
          <td style='padding-top:23px' class='subtotal' id='total'>{{ $total }}</td>
          <!-- 將刪除按鈕放在這裡，確保在 foreach 循環內 -->
          <td>
          <a href="{{ route('cart.delete', ['id' => $row['id']]) }}" class="btn btn-danger mt-3" role="button">刪除</a>
          </td>
        </tr>
        @endif
        @endforeach
        @endif
        <!-- 顯示總計 -->
        <tr>
          <td colspan="6" style='padding-top:23px'>總計: {{ $totalPrice }}</td>
        </tr>
        <td colspan="5">總計</td>
        <!-- <td></td> -->
        <td colspan="2" id="totalPrice">NTD</td>
        <!-- <td></td> -->
        <!-- <td></td>
          <td></td> -->
        </tr>
        <tr>
          <!-- <td></td>
     
          <td></td>
          <td></td>
      
          <td></td> -->
          <td colspan="6">
            <div class="discount-banner pt-1" style="color:crimson">"&nbsp;&nbsp;滿&nbsp;<span>5&nbsp;0&nbsp;0&nbsp;0</span>&nbsp;元，打&nbsp;<span>8</span>&nbsp;折&nbsp;～&nbsp;" </div>
          </td>
          <td>
            <input class="btn btn-warning" id="send" type="submit" value="送出">
          </td>
        </tr>

      </table>
    </form>
  </div>
  @include('partials.login_form')
  @include('partials.footer')
  <div class=" mt-5 col-md-5 col footer-pages" style="border-left:5px solid white">
    <ul class="pages">
      <li>
        <a class="footer-header" href="./aboutUs.php">關於我們</a>
      </li>
      <li>
        <a href="./aboutUs.php#origin">起源</a>
      </li>
      <li>
        <a href="./aboutUs.php#goal">目標</a>
      </li>
      <li>
        <a href="./aboutUs.php#cheetos">店貓－奇多（Cheetos）</a>
      </li>
    </ul>

    <ul class="pages">
      <li>
        <a class="footer-header" href="./articles.php">貓咪文章</a>
      </li>
      <li>
        <a href="./articles.php#">幼貓</a>
      </li>
      <li>
        <a href="./articles.php#">成貓</a>
      </li>
      <li>
        <a href="./articles.php#">老貓</a>
      </li>
    </ul>
    <ul class="pages">
      <li>
        <a class="footer-header" href="./index.php#store">購物商城</a>
      </li>
      <li>
        <a href="./index.php#store">食物</a>
      </li>
      <li>
        <a href="./index.php#store">玩具</a>
      </li>
      <li>
        <a href="./index.php#store">生活用品</a>
      </li>
    </ul>
    <ul class="pages">
      <li>
        <a class="footer-header" href="login.php">會員專區</a>
      </li>
      @auth
      <li>
        <a href="{{route('member.index')}}">修改密碼</a>
      </li>
      @endauth

      @guest
      <li>
        <a href="{{route('register.index')}}">加入會員</a>
      </li>
      @endguest

      <li>
        <a href="cart.php">訂單查詢</a>
      </li>
      <li>
        <a href="back_login.php">管理員登入</a>
      </li>

    </ul>

  </div>
  @include('partials.copyright')
</body>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const numberInputs = document.querySelectorAll('.quantity-input');
    const priceElements = document.querySelectorAll('.price');
    const totalElements = document.querySelectorAll('.subtotal');
    const totalPriceElement = document.getElementById('totalPrice');
    const userPriceElement = document.getElementById('total'); // 將 ID 更改為 'total'

    let itemPrices = Array.from(priceElements).map(element => parseFloat(element.innerText));
    let itemNumbers = Array.from(numberInputs).map(input => parseInt(input.value));

    function updateTotals(index) {
      // 檢查數量和價格是否是有效數字
      if (!isNaN(itemNumbers[index]) & !isNaN(itemPrices[index])) {
        let itemTotal = itemPrices[index] * itemNumbers[index];
        totalElements[index].innerText = itemTotal;
        updateGrandTotal();

      }
    }

    function updateGrandTotal() {
      // 使用 parseFloat 過濾出有效數字，並排除 NaN
      let grandTotal = Array.from(totalElements)
        .map(element => parseFloat(element.innerText))
        .filter(value => !isNaN(value))
        .reduce((acc, value) => acc + value, 0);
      if (grandTotal > 5000) {
        grandTotal = Math.round(grandTotal * 0.8);
      }
      totalPriceElement.innerText = 'NTD ' + grandTotal + ' 元'; // 更新 totalPrice 的內容
    }



    numberInputs.forEach((input, index) => {
      input.addEventListener('input', function() {
        // 檢查數量是否小於1，如果是，將其設置為1
        itemNumbers[index] = Math.max(1, parseInt(input.value));

        input.value = itemNumbers[index]; // 更新輸入欄位的值
        updateTotals(index);
      });
    });

    // 最初更新總計
    Array.from(totalElements).forEach((element, index) => {
      updateTotals(index);
    });
  });

  $(document).ready(function() {
    $("#send").click(function() {
      alert('您的訂單已送出，感謝您的購買！');
    });
  });
</script>







</html>