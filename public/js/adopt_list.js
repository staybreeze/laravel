
    window.addEventListener('scroll', function() {

        const scrollHeight = document.documentElement.scrollHeight - window.innerHeight;

        const scrollTop = window.scrollY;

        const scrollProgress = (scrollTop / scrollHeight) * 100;

        document.getElementById('progressBar').style.width = scrollProgress + '%';
    });


    $(document).ready(function() {

        $('#top').on('click', function() {
            if (window.innerWidth > 450) {
                $(this).css('background', '#12304a');
            }
            setTimeout(function() {
                $('#top').css('background', 'rgb(216, 162, 90)');
            }, 800);
        });

        var scrollThreshold = 610;
        var scrolltoTop = 100;
        var scrolltoDiscountBar = 400;

        $(window).scroll(function() {
            var scrollPosition = $(this).scrollTop();
            var documentHeight = $(document).height();
            var windowHeight = $(this).height();


            if (scrollPosition < scrolltoTop) {

                $("#top").css('opacity', '0');
            } else {
                $("#top").css('opacity', '1');
            }

        });
        $(window).scroll(function() {
            if ($(this).scrollTop() == 0) {
                // $("#top").css('opacity', '0');
                window.location.reload();

            }
        });
        $(window).on('scroll', function() {
            $('.section-products').css('height', '90vh');
        });

        $('#top').on('click', function() {
            if (window.innerWidth > 450) {
                $(this).css('background', '#12304a');
            }
            setTimeout(function() {
                $('#top').css('background', 'rgb(216, 162, 90)');
            }, 800);
        });
    });
    $(document).ready(function() {
        $('.myBtn').on('click', function() {

            $(this).parent().siblings().find('.myBtn').css('background-color', 'rgb(107, 62, 2)');


            $(this).css('background-color', 'rgb(216, 162, 90)');
        });
    });
    // $('g').on('mouseover click', function() {
    //     if ($(this).data('id') == 22) {
    //         $('#locationTitle').text('— 金門縣 —');
    //         $('#locationTitle').css({
    //             'color': 'rgb(107, 62, 2)',
    //             'margin-top': '600px'
    //         });
    //     }
    // });

    let clicked = false;

    $('path').on('click', function() {
        clicked = true;
    });
    // $('g').on('click', function() {
    //     clicked = true;
    // });
    $('path').on('mouseover', function() {


        if (!clicked) {
            if ($(this).data('id') == 2) {
                $('#locationTitle').text('— 臺北市 —');
                $('#locationTitle').css({
                    'color': 'rgb(107, 62, 2)',
                    'margin-top': '600px'
                });
            }
            if ($(this).data('id') == 4) {
                $('#locationTitle').text('— 基隆市 —');
                $('#locationTitle').css({
                    'color': 'rgb(107, 62, 2)',
                    'margin-top': '600px'
                });
            }
            if ($(this).data('id') == 5) {
                $('#locationTitle').text('— 宜蘭縣 —');
                $('#locationTitle').css({
                    'color': 'rgb(107, 62, 2)',
                    'margin-top': '600px'
                });
            }
            if ($(this).data('id') == 19) {
                $('#locationTitle').text('— 花蓮縣 —');
                $('#locationTitle').css({
                    'color': 'rgb(107, 62, 2)',
                    'margin-top': '600px'
                });
            }
            if ($(this).data('id') == 20) {
                $('#locationTitle').text('— 臺東縣 —');
                $('#locationTitle').css({
                    'color': 'rgb(107, 62, 2)',
                    'margin-top': '600px'
                });
            }

            if ($(this).data('id') == 17) {
                $('#locationTitle').text('— 高雄市 —');
                $('#locationTitle').css({
                    'color': 'rgb(107, 62, 2)',
                    'margin-top': '600px'
                });
            }
            if ($(this).data('id') == 18) {
                $('#locationTitle').text('— 屏東縣 —');
                $('#locationTitle').css({
                    'color': 'rgb(107, 62, 2)',
                    'margin-top': '600px'
                });
            }
            if ($(this).data('id') == 16) {
                $('#locationTitle').text('— 臺南市 —');
                $('#locationTitle').css({
                    'color': 'rgb(107, 62, 2)',
                    'margin-top': '600px'
                });
            }
            if ($(this).data('id') == 15) {
                $('#locationTitle').text('— 嘉義市 —');
                $('#locationTitle').css({
                    'color': 'rgb(107, 62, 2)',
                    'margin-top': '600px'
                });
            }
            if ($(this).data('id') == 14) {
                $('#locationTitle').text('— 嘉義縣 —');
                $('#locationTitle').css({
                    'color': 'rgb(107, 62, 2)',
                    'margin-top': '600px'
                });
            }
            if ($(this).data('id') == 13) {
                $('#locationTitle').text('— 雲林縣 —');
                $('#locationTitle').css({
                    'color': 'rgb(107, 62, 2)',
                    'margin-top': '600px'
                });
            }
            if ($(this).data('id') == 12) {
                $('#locationTitle').text('— 南投縣 —');
                $('#locationTitle').css({
                    'color': 'rgb(107, 62, 2)',
                    'margin-top': '600px'
                });
            }
            if ($(this).data('id') == 11) {
                $('#locationTitle').text('— 彰化縣 —');
                $('#locationTitle').css({
                    'color': 'rgb(107, 62, 2)',
                    'margin-top': '600px'
                });
            }
            if ($(this).data('id') == 10) {
                $('#locationTitle').text('— 臺中市 —');
                $('#locationTitle').css({
                    'color': 'rgb(107, 62, 2)',
                    'margin-top': '600px'
                });
            }
            if ($(this).data('id') == 9) {
                $('#locationTitle').text('— 苗栗縣 —');
                $('#locationTitle').css({
                    'color': 'rgb(107, 62, 2)',
                    'margin-top': '600px'
                });
            }
            if ($(this).data('id') == 8) {
                $('#locationTitle').text('— 新竹市 —');
                $('#locationTitle').css({
                    'color': 'rgb(107, 62, 2)',
                    'margin-top': '600px'
                });
            }
            if ($(this).data('id') == 7) {
                $('#locationTitle').text('— 新竹縣 —');
                $('#locationTitle').css({
                    'color': 'rgb(107, 62, 2)',
                    'margin-top': '600px'
                });
            }
            if ($(this).data('id') == 6) {
                $('#locationTitle').text('— 桃園市 —');
                $('#locationTitle').css({
                    'color': 'rgb(107, 62, 2)',
                    'margin-top': '600px'
                });
            }
            if ($(this).data('id') == 3) {
                $('#locationTitle').text('— 新北市 —');
                $('#locationTitle').css({
                    'color': 'rgb(107, 62, 2)',
                    'margin-top': '600px'
                });
            }
            if ($(this).data('id') == 22) {
                $('#locationTitle').text('— 金門縣 —');
                $('#locationTitle').css({
                    'color': 'rgb(107, 62, 2)',
                    'margin-top': '600px'
                });
            }
            if ($(this).data('id') == 21) {
                $('#locationTitle').text('— 澎湖縣 —');
                $('#locationTitle').css({
                    'color': 'rgb(107, 62, 2)',
                    'margin-top': '600px'
                });
            }
            if ($(this).data('id') == 23) {
                $('#locationTitle').text('— 連江縣 —');
                $('#locationTitle').css({
                    'color': 'rgb(107, 62, 2)',
                    'margin-top': '600px'
                });
            }
        }
    })

    $(window).scroll(function() {
        if ($(this).scrollTop() > 450) {
            clicked = false;
        }
    })
    let isLoading = false;

    let isProcessing = false;

    $('path').on('click', function() {

        if (!isProcessing) {
            isProcessing = true;

            $('body').css('overflow', 'hidden');

            let location = $(this).data('id');

            showLoadingIndicator();

            $.get(`./api/file_get?location=${location}`, {
                location
            }, (res) => {
                let parsedRes = JSON.parse(res);
                render(parsedRes);

                setTimeout(function() {
                    let targetElement = $('#dataCat');
                    let offsetTop = 180;
                    let targetOffset = targetElement.offset().top - offsetTop;
                    $('html, body').animate({
                        scrollTop: targetOffset
                    }, 500, function() {
                        $('body').css('overflow', 'auto');
                        hideLoadingIndicator();

                        isProcessing = false;
                    });
                }, 1000);
            });
        }
    });


    function showLoadingIndicator() {
        isLoading = true;
        document.getElementById('loadingIndicator').style.display = 'block';
    }

    function hideLoadingIndicator() {
        isLoading = false;
        document.getElementById('loadingIndicator').style.display = 'none';
    }

    function render(datas) {
        $(".good-row").html("");
        datas.forEach((data, idx) => {

            let adoptionDateStr = data.animal_createtime;

            let adoptionDate = new Date(adoptionDateStr);

            let currentDate = new Date();

            let timeDifference = currentDate.getTime() - adoptionDate.getTime();

            let daysDifference = Math.floor(timeDifference / (1000 * 60 * 60 * 24));

            let imageUrl = data.album_file;
            isImageValid(imageUrl)
                .then(valid => {
                    if (!valid) {
                        imageUrl = '{{ asset('img/logo1.png') }}';
                    }
                    let data_layout =
                        '<div class="col-md-6 col-lg-4 col-xl-3 mt-5" id="dataCat">' +
                        '<div class="single-product">' +
                        '<div class="part-1">' +
                        `<img class="img-cat" src="${imageUrl}" loading="lazy">` +
                        '</div>' +
                        '<div class="part-2">' +
                        `<div class="d-flex"><h3 class="data-title" style="font-weight:bolder;">${data.animal_Variety}   ${data.animal_sex === 'M' ? '<i class="fa-solid fa-mars"></i>' : '<i class="fa-solid fa-venus"></i>'}</h3><div class="go-adopt"><i class="fa-solid fa-house"></i></div></div>` +
                        '<br>' +
                        '<br>' +
                        `<h4 class="data-cats" style="line-height:30px">${data.animal_place}</h4>` +
                        '<br>' +
                        `<h4 class="data-cats">電話：${data.shelter_tel}</h4>` +
                        '<br>' +
                        `<h4 class="data-cats">我已經待了<span style="color:crimson;text-decoration:underline"> ${daysDifference} </span>天</h4>` +
                        '<br>' +
                        `<h4 class="data-cats animal-subid">收容編號：${data.animal_subid}</h4>` +
                        '<div></div>' +
                        '</div>' +
                        '</div>';
                    $(".good-row").append(data_layout);
                })
                .catch(error => {
                    console.error('Error checking image validity:', error);
                });
        });
    }

    function isImageValid(url) {
        return new Promise((resolve, reject) => {
            let img = new Image();
            img.onload = function() {
                resolve(this.complete && this.naturalWidth !== 0);
            };
            img.onerror = function() {
                resolve(false);
            };
            img.src = url;
        });
    }

    $(document).on('click', '.part-1', function() {
        let animalSubid = $(this).parent().parent().find('.animal-subid').text().trim();
        let imgCat = $(this).find('.img-cat').attr('src');
        Swal.fire({
            title: "貓貓的" + animalSubid,
            html: "<p style='line-height:50px'>請在接下来的網站找到相對應的欄位，填上收容編號後，完成領養手續 <i class='fa-solid fa-paw'> </i><i class='fa-solid fa-paw'></i><p>",
            imageUrl: imgCat,
            // imageWidth: 300,
            // imageHeight: 200,
            confirmButtonText: '領養GO！',
            confirmButtonColor: 'rgb(216, 162, 90)',
        }).then((result) => {
            if (result.isConfirmed) {
                window.open('https://www.pet.gov.tw/AnimalApp/AnnounceMent.aspx?PageType=Adopt', '_blank');
            }
        });
    });



    $(document).on('click', '.go-adopt', function() {
        let animalSubid = $(this).parent().parent().find('.animal-subid').text().trim();
        let imgCat = $(this).parent().parent().parent().find('.img-cat').attr('src');
        Swal.fire({
            title: "貓貓的" + animalSubid,
            html: "<p style='line-height:50px'>請在接下来的網站找到相對應的欄位，填上收容編號後，完成領養手續 <i class='fa-solid fa-paw'> </i><i class='fa-solid fa-paw'></i></p>",
            imageUrl: imgCat,
            // imageWidth: 300,
            // imageHeight: 200,
            confirmButtonText: '領養GO！',
            confirmButtonColor: 'rgb(216, 162, 90)',
        }).then((result) => {
            if (result.isConfirmed) {
                window.open('https://www.pet.gov.tw/AnimalApp/AnnounceMent.aspx?PageType=Adopt', '_blank');
            }
        });
    });




    // 建立星星
    function createstarWhite(starCount) {
        for (let i = 0; i < starCount; i++) {
            $('.section-products').append(`<div class="white-star animate">❄</div>`)
        }

        $('.white-star').each(function(index, star) {
            $(this).css({
                position: 'absolute',
                left: gsap.utils.random(0, 90) + '%',
                top: gsap.utils.random(0, 100) + '%',
                color: 'white',

                // overflow:'hidden'
            })
        })
    }

    createstarWhite(20)

    // 建立星星動畫
    gsap.to('.white-star', {
        'font-size': () => gsap.utils.random(1, 10),
        filter: 'drop-shadow(0 0 30px rgba(255, 255, 0, 1))',
        textShadow: '0 0 10px rgba(255, 255, 0, 0.8)',
        left: '+=random(-10, 10)%',
        x: 'random(-50,50)',
        y: 'random(-50,50)',
        rotationY: '-=180',
        scale: () => gsap.utils.random(1, 2),
        duration: () => gsap.utils.random(5, 10),
        delay: () => gsap.utils.random(0, 5),
        repeat: -1,
        repeatRefresh: true,
        ease: 'back',
        stagger: 0.1,
    });
    // 建立星星
    function createstarGold(starCount) {
        for (let i = 0; i < starCount; i++) {
            $('section').append(`<div class="gold-stars animate"><i class="fa-solid fa-star"></i></div>`)
        }

        $('.gold-stars').each(function(index, star) {
            $(this).css({
                position: 'absolute',
                left: gsap.utils.random(0, 100) + '%',
                top: gsap.utils.random(0, 100) + '%',
                color: 'gold',

                // overflow:'hidden'
            })
        })
    }

    //   createstarGold(20)

    // 建立星星動畫
    gsap.to('.gold-stars', {
        'font-size': () => gsap.utils.random(10, 20),
        filter: 'drop-shadow(0 0 30px rgba(255, 255, 0, 1))',
        textShadow: '0 0 10px rgba(255, 255, 0, 0.8)',
        left: '+=random(-10, 10)%',
        x: 'random(-50,50)',
        y: 'random(-50,50)',
        rotationY: '-=180',
        scale: () => gsap.utils.random(1, 2),
        duration: () => gsap.utils.random(5, 10),
        delay: () => gsap.utils.random(0, 5),
        repeat: -1,
        repeatRefresh: true,
        ease: 'back',
        stagger: 0.1,
    });
    if (window.innerWidth < 1600) {
        alert('此網站不支援手機及平板瀏覽>"""<，請使用電腦開啟！');
        window.location.href = 'index';
    }
