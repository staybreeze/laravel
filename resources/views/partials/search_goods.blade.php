<link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Orbitron:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

<style>
    @import url('https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic&display=swap');

    .liked {
        color: #fe302f
    }

    #shoppingBtn,
    #discountBanner {
        display: none;
    }

    @media screen and (max-width: 450px) {

        #shoppingBtn,
        #discountBanner {
            display: block;

        }

        .img-rotate {
            width: 75%;
            margin-top: 20px;
            margin-left: 50px
        }

    }

    .disabled {
        display: none;
    }

    .banner {

        position: relative;
        font-family: 'Orbitron', sans-serif;
    }

    .item {
        text-align: center;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        /* opacity: 0; */
    }

    .item h2,
    .good-header h3,
    p {

        font-family: 'Zen Maru Gothic', serif;
    }

    .top {
        position: fixed;
        width: 30px;
        height: 30px;
        padding-top: 1px;
        text-align: center;
        align-items: center;
        right: 20px;
        bottom: 200px;
        background-color: rgb(216, 162, 90);
        color: #fff;
        /* font-weight: bold; */
        font-size: 20px;
        font-family: Rubik scribble;
        /* border-bottom: 1px solid#00707f;   */
        z-index: 99;
        opacity: 0;
        transition: opacity 0.5s;
    }

    #checkOutBtn {
        z-index: 999;
    }
</style>
<a href="#">
    <div id="top" class="top"><i class="fa-solid fa-angle-up"></i></div>
</a>
<section class="section-products" id="store">
    <div class="container goods">
        <div class="row justify-content-center text-center " id="storeBannerRow" style="margin-bottom:24px">
            <div class="col-md-8 col-lg-6">
                <div class="good-header" style="cursor:pointer" onclick="location.href='#onlineStore'">
                    <div class="banner" id="onlineStore">
                        <div class="item">
                            <h2 style="font-size:30px">—　<b>商品搜尋結果</b>　— </h2>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row good-row mt-5">
                <div id="discountBanner" style="padding-top:18px;height:85.7px" onclick="location.href='#onlineStore'">
                    <p class="discount-p">"&nbsp;&nbsp;滿&nbsp;<span>5&nbsp;0&nbsp;0&nbsp;0</span>&nbsp;元，打&nbsp;<span>8</span>&nbsp;折&nbsp;&nbsp;"</p>
                </div>
                @if(request()->has('query'))
                @php
                $query = request()->input('query');
                $goods = App\Models\Good::where('name', 'LIKE', '%' . $query . '%')->get();
                @endphp

                @if($goods->isEmpty())
                <p style="font-size:25px;color:red"><b>抱歉，沒有搜尋到指定的商品！</b></p>
                @else
                @foreach($goods as $good)
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div id="product<?= $good['id']; ?>" class="single-product">

                        <div class="part-1">
                            <img class="img-rotate" src="<?= $good['img']; ?>" width="80%">
                            <br><br>
                            <div><i class="fa-sharp fa-solid fa-boxes-stacked" style="font-size:smaller"><span style="font-size:smaller">&nbsp;&nbsp;&nbsp;<?= $good['remain']; ?></span></i></div>
                            @if(!empty($good['discount']))
                            <span class="discount">{{ $good['discount'] }}% off</span>
                            @endif

                            @if($good['new'] > 0)
                            <span class="new">new</span>
                            @endif

                            @php
                            $isLiked = '';
                            if(session()->has('liked_products')) {
                            $isLiked = in_array($good['id'], session('liked_products')) ? 'liked' : '';
                            }
                            @endphp
                            <ul>
                                <li>
                                    @if($good['remain'] > 0)
                                    <a href="{{ route('add.good', ['id' => $good['id'], 'cart' => 'true']) }}" class="plus-atag">
                                        <i class="fas fa-shopping-cart"></i>
                                    </a>
                                    @else
                                    <a class="good-sold-out">
                                        <i class="fas fa-shopping-cart" style="color: gray;"></i>
                                    </a>
                                    @endif
                                </li>
                                <li><a style="cursor:pointer" class="like" id="<?= $good['id']; ?>" data-id="<?= $good['id']; ?>"><i class="fas fa-heart <?= $isLiked; ?>"></i></a></li>
                                <li>
                                    @if($good['remain'] > 0)
                                    <a href="{{ route('add.good', ['id' => $good['id'], 'query' => $query ?? '']) }}" class="plus-atag">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    @else
                                    <a class="good-sold-out">
                                        <i class="fas fa-plus" style="color: gray;"></i>
                                    </a>
                                    @endif
                                </li>
                                <li><a style="cursor:pointer" class="goodImgExpand"><i class="fas fa-expand" data-img="<?= $good['img']; ?>"></i></a></li>
                            </ul>
                        </div>
                        <div class="part-2">
                            <h3 class="product-title" style="font-weight:bold"><?= $good['name']; ?></h3>

                            @if($good['old_price'] != $good['price'])
                            <span class="product-old-price">NTD {{ $good['old_price'] }}</span>
                            @endif

                            <h4 class="product-price">NTD <?= $good['price']; ?></h4>
                            <div><i class="fa-sharp fa-solid fa-boxes-stacked" style="font-size:smaller"><span style="font-size:smaller">&nbsp;&nbsp;&nbsp;<?= $good['remain']; ?></span></i></div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
                @endif

            </div>
        </div>
        <!-- good Modal -->
        <div class="modal fade poster-modal" id="good">
            <div class="modal-dialog">
                <!-- Modal body -->
                <img id="imgModalSrc" width="100%">
                <!-- Modal footer -->
                <button type="button" class="btn  close-btn mt-2" id="close-btn" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        <a href="{{ url('/cart') }}"><button type="button" class="btn  close-btn mt-2" id="checkOutBtn"><em>CHECK OUT</em></button></a>
</section>
<script>
    var addGoodUrlTemplate = "{{ route('add.good', ['id' => 'GOOD_ID', 'mobile' => 'true']) }}";
</script>
<script>
    $(document).ready(function() {

        $('#top').on('click', function() {
            if (window.innerWidth > 450) {
                $(this).css('background', '#12304a');
            }
            setTimeout(function() {
                $('#top').css('background', 'rgb(216, 162, 90)');
            }, 800);
        });

        $(".good-sold-out").click(function() {

            alert('商品賣完囉！拍謝～我們會盡快補貨～💛💛💛')
        })

        $(".like").click(function(event) {
            let productId = $(this).data("id");
            console.log(productId);
            $.post("./api/add_like", {
                '_token': $('meta[name="csrf-token"]').attr('content'), 
                'id': productId
            }, (res) => {
                console.log(res);

                $("#" + productId).load(location.href + " #" + productId + " > *");
            });
        });
    });

    $(document).ready(function() {

        $('.goodImgExpand').click(function() {
            let imgName = $(this).find("i").data("img");
            console.log('ok');
            $("#imgModalSrc").attr("src", "./img/" + imgName);
            $('#good').modal('show');
        });

    });

    $("#shoppingBtn").click(function() {

        $("#shoppingBtn").hide()
    })

    if (window.innerWidth > 450) {
        let part2 = $(".part-2")
        part2.find(".fa-sharp").addClass('disabled');
    }
    if (window.innerWidth < 450) {

        if (window.location.hash.includes('store')) {
            $("#shoppingBtn").hide();
            $(".discount-p").removeClass('discount-p');
            $(".good-row").css('border', '10px solid #d8a25a');
            $("#discountBanner").css('border', '10px solid #d8a25a');
            $("#discountBanner").css('background-color', '#d8a25a');
            $("#discountBanner").css('color', '#fff');
            $(".good-row").css('margin-top', '4.5px');
        }
    };
    var scrollThreshold = 610;
    var scrolltoTop = 100;
    var scrolltoDiscountBar = 400;
    $(window).scroll(function() {

        var scrollPosition = $(this).scrollTop();
        var documentHeight = $(document).height();
        var windowHeight = $(this).height();

        if (scrollPosition < scrolltoTop) {
            var scrollPosition = $(this).scrollTop();
            $("#top").css('opacity', '0')

        } else {
            $("#top").css('opacity', '1')
        }

        if (scrollPosition < scrolltoDiscountBar) {
            $("#top").css('opacity', '0')

        };

        if (window.innerWidth < 450) {
            var scrollPosition = $(this).scrollTop();
            var documentHeight = $(document).height();
            var windowHeight = $(this).height();

            if (scrollPosition > scrollThreshold) {
                $(".good-row").css('border', '10px solid #d8a25a ');
                $("#discountBanner").css('background-color', '#d8a25a ');


            } else {
                $(".good-row").css('border', '10px solid rgb(148, 86, 6) ');
                $("#discountBanner").css('border', '1px solid rgb(252, 233, 122) ');
                $("#discountBanner").css('background-color', 'rgb(148, 86, 6) ');
                $("#discountBanner").css('color', 'rgb(252, 233, 122) ');
                $(".good-row").css('margin-top', '4.5px');
            }

            if (scrollPosition < scrolltoTop) {
                $(".good-row").css('border', '10px solid rgb(73, 42, 2) ');
                $("#discountBanner").css('border', '1px solid d rgb(252, 233, 122) ');
                $("#discountBanner").css('background-color', 'rgb(73, 42, 2) ');
                $("#discountBanner").css('color', 'rgb(252, 233, 122) ');
                $("#discountBanner").css('padding-top', '18px');
                $("#storeBannerRow").css('margin-bottom', '14px');
                $("#top").css('opacity', '0')
                $("#top").css('margin-top', '50px')
            } else {
                $("#top").css('opacity', '1')
            }

            if (scrollPosition < scrolltoDiscountBar) {
                $("#top").css('opacity', '0')
                $("#top").css('margin-top', '50px')
            };
        }
    });
    $(document).ready(function() {
        var windowWidth = $(window).width();

        if (windowWidth < 450) {
            $('.plus-atag').each(function() {
                var goodId = $(this).data('id');
                var href = addGoodUrlTemplate.replace('GOOD_ID', goodId);
                $(this).attr('href', href);
            });
        }
    });
</script>