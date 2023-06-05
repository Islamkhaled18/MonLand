<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale= 1" />
    <title>
        كيان ستور |
        @yield('title')
    </title>
    <link rel="stylesheet" href="{{ asset('website_assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/pages-css/product/product-details.css') }}" />
    <link rel="stylesheet" href="{{ asset('website_assets/pages-css/fav.css') }}" />
    <link rel="stylesheet" href="{{ asset('website_assets/pages-css/account/orders.css') }}" />
    <link rel="stylesheet" href="{{ asset('website_assets/pages-css/product/product-details.css') }}" />

    <!-- <link rel="stylesheet" href="{{ asset('website_assets/pages-css/account/orders.css') }}"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rate:not(:checked)>input {
            position: absolute;
            top: -9999px;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }

        #goog-gt-tt,
        .goog-te-balloon-frame {
            display: none !important;
        }

        .goog-text-highlight {
            background: none !important;
            box-shadow: none !important;
        }

        .goog-te-banner-frame {
            display: none !important;
        }

        .goog-logo-link,
        .goog-te-gadget span {

            display: none !important;

        }

        .goog-te-gadget {

            color: transparent !important;
            font-size: 0;
        }

        .card-deck2 .card {
            min-width: calc(33.33% - 12px) !important;
            max-width: calc(33.33% - 12px) !important;
        }

        .page-item.active .page-link {
            background-color: #7f0924;
            color: #ffb300;
            border: 0;
            box-shadow: none !important;
        }

        .rad-btn:not(:checked) {
            background-color: #f8f9fa;
            /* Change the background color */
            border: none;
            /* Remove the border */
        }
    </style>
</head>

<body class="search-result">

    <section>
        <!-- Start Navbar -->
        @include('layouts.site._navbar')
        <!-- End Navbar -->

        <!-- Start Upper Header -->
        @include('layouts.site._header')
        <!-- End Upper Header -->

    </section>

    <!-- my Cart -->
    @yield('content')



    <section id="footer" class="container-fluid pt-4">
        <!-- Footer banner -->
        <div class="bg-light py-5 ">

            <div class="row d-flex p-3 py-5 justify-content-sm-center align-items-center">


                <div class="col-12 col-md-3 text-right ">
                    <img src="{{ asset('website_assets/imgs/logo/logo.png') }}" sizes="w-100 h-"
                        class="d-block m-auto img-fluid " />
                </div>


                <div class="col-12 col-md-7 d-flex flex-column text-right justify-content-center">
                    <h4 class="text-secondary text-center ">
                        تسوق اينما كنت
                    </h4>

                    <div class="d-flex align-self-center flex-column flex-lg-row ">
                        <a class="p-3">
                            <img src="{{ asset('website_assets/imgs/icons/kisspng-app-store-apple-download-logo-app-store-5b500d8b41f2f0.7056433215319730032701.jpg') }}"
                                alt="">
                        </a>
                        <a class="p-3">
                            <img src="{{ asset('website_assets/imgs/icons/get-it-on-google-play-badge-1.png') }}"
                                alt="">
                        </a>


                    </div>

                </div>

                <div class="col-12 col-md-2 text-right justify-content-center">
                    <h4 class="text-secondary text-center ">
                        تابعونا على
                    </h4>
                    <ul class=" list-unstyled d-flex justify-content-center mt-4 second-list">

                        <li>
                            <a href="{{$instagram}}" class="p-3 whats">
                                <i class="fab fa-instagram fa-lg"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{$twitter}}" class="mx-3 p-3 telegram">
                                <i class="fab fa-twitter fa-lg"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{$face_book}}" class="p-3 facebook main-back-color text-white rounded-circle">
                                <i class=" fab fa-facebook-f fa-lg"></i>
                            </a>
                        </li>
                    </ul>
                </div>


            </div>

        </div>
        <!-- banner end -->

        <div class="my-5 text-start d-flex flex-wrap flex-column-reverse flex-lg-row">
            <div class="col-12 col-lg-4 px-3 py-2 mb-3">

                <ul class="list-unstyled">
                    <h4 class="mb-4">
                        حسابى
                    </h4>
                    <li class="font-weight-bold">
                        <i class="fas fa-caret-left ml-2 main-color"></i>
                        <a href="{{route('login')}}">تسجيل الدخول</a>
                    </li>
                    <li class="my-2 font-weight-bold">
                        <i class="fas fa-caret-left ml-2 main-color"></i>
                        <a href="../account/orders.html">طلباتى</a>

                    </li>
                    <li class="font-weight-bold">
                        <i class="fas fa-caret-left ml-2 main-color"></i>
                        <a href="../account/orders.html">عناوينى</a>

                    </li>
                    <li class="my-2 font-weight-bold">
                        <i class="fas fa-caret-left ml-2 main-color"></i>
                        @guest
                        <a href="{{route('login')}}"> الملف الشخصى</a>
                        @else
                        <a href="{{ route('site.profile', auth()->user()->id) }}">الملف الشخصى</a>
                        @endguest

                    </li>
                    <li class="my-2 font-weight-bold">
                        <i class="fas fa-caret-left ml-2 main-color"></i>
                        <a href="{{ route('wishlist.products.index') }}">المفضلة</a>

                    </li>
                    <li class="font-weight-bold">
                        <i class="fas fa-caret-left ml-2 main-color"></i>
                        <a href="{{ route('compare.products.index') }}">قارن</a>

                    </li>
                </ul>
            </div>
            <div class="col-12 col-lg-4 px-3 py-2 mb-3">

                <ul class="list-unstyled">
                    <h4 class="mb-4">
                        خدمة العملاء
                    </h4>

                    <li class="my-2 font-weight-bold">
                        <i class="fas fa-caret-left ml-2 main-color"></i>

                        <a href="#">كيفية عمل طلب شراء</a>
                    </li>
                    <li class="font-weight-bold">
                        <i class="fas fa-caret-left ml-2 main-color"></i>

                        <a href="../talab-Estragah/talab-Estragah.html">عمل طلب الاستبدال
                            والاسترجاع</a>
                    </li class="font-weight-bold">
                    <li class="my-2 font-weight-bold">
                        <i class="fas fa-caret-left ml-2 main-color"></i>
                        @guest

                        <a href="{{ route('exchange.create') }}">سياسة الاستبدال والاسترجاع</a>
                        @else
                        <a href="{{ route('login') }}">سياسة الاستبدال والاسترجاع</a>

                        @endguest
                    </li>
                    <li class="font-weight-bold">
                        <i class="fas fa-caret-left ml-2 main-color"></i>

                        <a href="{{route('sizeTable')}}">جدول المقاسات </a>
                    </li>

                </ul>
            </div>

            <div class="col-12 col-md text-right px-5 mb-3">
                <h4 class="main-color">
                    هل انت جديد على كيان <span>؟</span>
                </h4>
                <h6 class="">
                    اشترك فى نشرتنا الاخبارية للحصول على احدث المنتجات
                </h6>

                <div class="form-group d-flex mt-4">
                    <form action="{{ route('emailUs.store') }}" method="POST">
                        @csrf

                        <input type="email" name="email" value="{{ old('email') }}" class="form-control rounded-0 py-4"
                            placeholder="ادخل بريدك الالكترونى هنا" />
                        <button type="submit" class="text-white py-2 px-4 rounded-0">اشترك</button>
                    </form>
                </div>

            </div>

            <div class="d-flex justify-content-center main-color text-bold col-12">
                <ul class="list-unstyled d-flex flex-wrap">
                    <li class="m-2">
                        <a href="#" class="footer-link">عن المنظمه</a>
                    </li>
                    <li class="m-2">
                        <a href="{{route('site.DeliveryPolicy.index')}}" class="footer-link">سياسة الشحن</a>
                    </li>
                    <li class="m-2">
                        <a href="#" class="footer-link">سياسة الخصوصية</a>
                    </li>
                    <li class="m-2">
                        <a href="{{route('site.terms.index')}}" class="footer-link">الشروط والأحكام</a>
                    </li>

                </ul>
            </div>
        </div>

    </section>

    <footer class="main-back-color text-center">
        <p class="text-white px-3 py-3 h6 mb-0">
            جميع الحقوق محفوظة kayan 2023
        </p>

    </footer>
    <script src="{{ asset('website_assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('website_assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('website_assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('website_assets/pages-js/orders.js') }}"></script>
    <script src="{{ asset('website_assets/js/script.js') }}"></script>
    <script src="{{ asset('website_assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('website_assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('website_assets/pages-js/orders.js') }}"></script>
    <script src="{{ asset('website_assets/pages-js/product-detailes.js') }}"></script>

    {{-- <script src="{{ asset('website_assets/js/pages.js') }}"></script> --}}


    @stack('scripts')
    <script>
        let progressCircle = document.querySelector(".progress");
        let radius = progressCircle.r.baseVal.value;
        //circumference of a circle = 2πr;
        let circumference = radius * 2 * Math.PI;
        progressCircle.style.strokeDasharray = circumference;

        //0 to 100
        setProgress(40);

        function setProgress(percent) {
            progressCircle.style.strokeDashoffset = circumference - (percent / 100) * circumference;
        }
    </script>
    <script>
        const selectEl = document.querySelector('select[name="category"]');
        selectEl.addEventListener('change', () => {
            const formEl = selectEl.closest('form');
            const hiddenInput = formEl.querySelector('input[name="category"]');
            if (hiddenInput) {
                hiddenInput.value = selectEl.value;
            } else {
                console.error('Could not find input element with name "category"');
            }
        });
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click', '.addToWishlist', function(e) {
            var product_id = $(this).data('product-id');
            //console.log(product_id)
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: "{{ route('wishlist.store') }}",
                data: {
                    product_id: product_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {

                    if (response === 'added') {
                        $('.favorite-alert-modal-first').css('display', 'block');
                        setTimeout(function() {
                            $('.favorite-alert-modal-first').css('display', 'none');
                        }, 2500);
                    } else if (response === 'exists') {
                        $('.favorite-alert-modal-exist').css('display', 'block');
                        setTimeout(function() {
                            $('.favorite-alert-modal-exist').css('display', 'none');
                        }, 2500);
                    }
                },
                error: function(response) {
                    alert('Error adding product to favorites!');
                }
            });
        });


        $(document).on('click', '.removeFromWishlist', function(e) {
            e.preventDefault();
            var favorite_uuid = 'favorite_uuid';
            var product_id = $(this).data('product-id');

             $.ajax({
                 type: 'DELETE',
                 url: '{{ route('wishlist.destroy')}}',
                data: {
                    _token: '{{ csrf_token() }}'
                 },
                 success: function(response) {

                    location.reload();
                 },
                 error: function(response) {
                    alert('Error removing product from favorites!');
                 }
             });
        });

        $(document).on('click', '.addTocomparelist', function(e) {
            e.preventDefault();

            var product_id = $(this).data('product-id');
            //console.log(product_id)
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: "{{ route('compare.store') }}",
                data: {
                    product_id: product_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response === 'added') {
                        $('.compare-alert-modal-first').css('display', 'block');
                        setTimeout(function() {
                            $('.compare-alert-modal-first').css('display', 'none');
                        }, 2500);
                    } else if (response === 'exists') {
                        $('.compare-alert-modal-exist').css('display', 'block');
                        setTimeout(function() {
                            $('.compare-alert-modal-exist').css('display', 'none');
                        }, 2500);
                    } else if (response === 'limit_reached') {
                        $('.compare-alert-modal-max').css('display', 'block');
                        setTimeout(function() {
                            $('.compare-alert-modal-max').css('display', 'none');
                        }, 2500);
                    }
                },
                error: function(response) {
                    alert('Error adding product to compares!');
                }
            });
        });

        $(document).on('click', '.removeFromcomparelist', function(e) {
            e.preventDefault();

            var compare_uuid = 'compare_uuid';
            var product_id = $(this).data('product-id');

             $.ajax({
                 type: 'DELETE',
                 url: '{{ route('compare.destroy')}}',
                data: {
                    _token: '{{ csrf_token() }}'
                 },
                 success: function(response) {

                    location.reload();
                 },
                 error: function(response) {
                    alert('Error removing product from favorites!');
                 }
             });
        });

        $(document).ready(function() {

            $('.default-address-checkbox').on('change', function() {
                var addressId = $(this).data('address-id');

                $.ajax({
                    url: '{{ route("site.profile.setDefaultAddress") }}',
                    type: 'POST',
                    data: {
                        addressId: addressId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        location.reload();
                    },
                    error: function(xhr) {
                        alert('Error in is default !');
                    }
                });
            });
        });

        $(document).ready(function() {
            $('select[name="governorate_id"]').on('change', function() {
                var governorate_id = $(this).val();
                if (governorate_id) {
                    $.ajax({
                        url: "{{ URL::to('Site/cities') }}/" + governorate_id
                        , type: "GET"
                        , dataType: "json"
                        , success: function(data) {
                            $('select[name="city_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="city_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    , });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });

        $(document).ready(function() {
            $('.available-size').click(function() {
                var price = $(this).data('price');
                var size = $(this).text();
                $('#after-price .text-bold').text(price + ' جنيه');
            });
        });

        $(document).on('click', '.available-color', function() {
            $('.available-color').removeClass('active');
            $(this).addClass('active');
        });

        $(document).on('click', '.addToCart', function(e) {
            var product_id = $(this).data('product-id');
            var selectedSize = $('.available-sizes .available-size.active').data('size');
            var selectedPrice = $('.available-sizes .available-size.active').data('price');
            var selectedColor = $('.available-colors .available-color.active').data('color');

            e.preventDefault();
            $.ajax({
                type: 'post',
                url: "{{ route('site.cart.store') }}",
                data: {
                    product_id: product_id,
                    size: selectedSize,
                    price: selectedPrice,
                    color: selectedColor,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {

                    if (response === 'added') {
                        $('.cart-alert-modal-first').css('display', 'block');
                        setTimeout(function() {
                            $('.cart-alert-modal-first').css('display', 'none');
                        }, 2500);
                    } else if (response === 'exists') {
                        $('.cart-alert-modal-exist').css('display', 'block');
                        setTimeout(function() {
                            $('.cart-alert-modal-exist').css('display', 'none');
                        }, 2500);
                    }
                },
                error: function(response) {
                    alert('Error adding product to favorites!');
                }
            });
        });



    </script>

    <script>
        function googleTranslateElementInit() {

            new google.translate.TranslateElement({

                autoDisplay: 'true',

                includedLanguages: 'ar,en'
                , layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL,

            }, 'google_translate_element');

        }

    </script>

    <script src='//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit'></script>

</body>

</html>
