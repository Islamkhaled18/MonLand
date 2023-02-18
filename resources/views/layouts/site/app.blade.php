<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale= 1">
    <title>
        كيان ستور

        @yield('title')
    </title>
    <link rel="stylesheet" href="{{ asset('website_assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/pages-css/product/product-details.css') }}" />
    <link rel="stylesheet" href="{{ asset('website_assets/pages-css/account/orders.css') }}" />
    <link rel="stylesheet" href="{{ asset('website_assets/pages-css/fav.css') }}" />
    <link rel="stylesheet" href="{{ asset('website_assets/pages-css/talab-estragh/talab-estragh.css') }}" />
    <link rel="stylesheet" href="{{ asset('website_assets/pages-css/product/product-details.css') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    </style>
</head>

<body>

    @include('layouts.site._header')

    @include('layouts.site._navbar')


    @yield('content')

    <div class="bg-light p-3 py-5">
        <div class="container">
            <div class="row">
                <div class="col-3 text-right px-5">
                    <img src="{{ asset('website_assets/imgs/logo/logo.png') }}" class="w-100" />
                </div>

                <form action="{{ route('emailUs.store') }}" method="post" class="col-7 text-right px-5">
                    @csrf
                    <h4 class="main-color">
                        هل انت جديد على كيان?
                    </h4>
                    <h6 class="secondary-color">
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
                </form>

                <div class="col-2 text-right">
                    <h4 class="main-color">
                        تابعونا على
                    </h4>
                    <ul class="list-unstyled d-flex mt-4 second-list">

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
    </div>
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-12 mt-4">
                <div class="row text-right">
                    <div class="card col-12 border-0">
                        <div>

                            <div class="row">
                                <div class="col-4">


                                    <ul class="list-unstyled px-3 py-2">
                                        <h4 class="mb-4">
                                            خدمة العملاء
                                        </h4>
                                        <li class="font-weight-bold">
                                            <i class="fas fa-caret-left ml-2 main-color"></i>
                                            اتصل بنا
                                        </li>
                                        <li class="my-2 font-weight-bold">
                                            <i class="fas fa-caret-left ml-2 main-color"></i>
                                            كيفية عمل طلب شراء
                                        </li>
                                        <li class="font-weight-bold">
                                            <i class="fas fa-caret-left ml-2 main-color"></i>
                                            عمل طلب الاستبدال والاسترجاع
                                        </li class="font-weight-bold">
                                        <li class="my-2 font-weight-bold">
                                            <i class="fas fa-caret-left ml-2 main-color"></i>
                                            سياسة الاستبدال والاسترجاع
                                        </li>

                                    </ul>
                                </div>
                                <div class="col-4">


                                    <ul class="list-unstyled px-3 py-2">
                                        <h4 class="mb-4">
                                            حسابى
                                        </h4>
                                        <li class="font-weight-bold">
                                            <i class="fas fa-caret-left ml-2 main-color"></i>
                                            تسجيل الدخول
                                        </li>
                                        <li class="my-2 font-weight-bold">
                                            <i class="fas fa-caret-left ml-2 main-color"></i>
                                            طلباتى
                                        </li>
                                        <li class="font-weight-bold">
                                            <i class="fas fa-caret-left ml-2 main-color"></i>
                                            عناوينى
                                        </li>
                                        <li class="my-2 font-weight-bold">
                                            <i class="fas fa-caret-left ml-2 main-color"></i>
                                            الملف الشخصى
                                        </li>
                                        <li class="my-2 font-weight-bold">
                                            <i class="fas fa-caret-left ml-2 main-color"></i>
                                            المفضلة
                                        </li>
                                        <li class="font-weight-bold">
                                            <i class="fas fa-caret-left ml-2 main-color"></i>
                                            قارن
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>

    <footer class="main-back-color text-center">
        <p class="secondary-color px-3 py-3 h6 mb-0">
            جميع الحقوق محفوظة kayan 2023
        </p>

    </footer>
    <script src="{{ asset('website_assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('website_assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('website_assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('website_assets/js/script.js') }}"></script>
    <script src="{{ asset('website_assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('website_assets/pages-js/orders.js') }}"></script>
    <script src="{{ asset('website_assets/pages-js/product-detailes.js') }}"></script>

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

            e.preventDefault();
            @guest()
                $('.not-loggedin-modal').css('display', 'block');
            @endguest
            $.ajax({
                type: 'post',
                url: "{{ Route('wishlist.store') }}",
                data: {
                    'productId': $(this).attr('data-product-id'),
                },
                success: function(data) {
                    location.reload();
                    if (data.wished)

                        $('.alert-modal').css('display', 'block');

                    else
                        $('.alert-modal2').css('display', 'block');


                }
            });
        });
        $(document).ready(function() {
            countFav();

            function countFav() {
                $.ajax({
                    method: 'GET',
                    url: "{{ Route('wishlist.countFav') }}",
                    success: function(response) {
                        $('.countFavProd').html('');
                        $('.countFavProd').html(response.count);
                    }
                });
            }
        });

        $(document).ready(function() {
            countCart();

            function countCart() {
                $.ajax({
                    method: 'GET',
                    url: "{{ Route('cart.countCart') }}",
                    success: function(response) {
                        $('.productsCount').html('');
                        $('.productsCount').html(response.count);
                    }
                });
            }
        });


        $(document).on('click', '.removeFromWishlist', function(e) {
            e.preventDefault();
            @guest()
                $('.not-loggedin-modal').css('display', 'block');
            @endguest
            $.ajax({
                type: 'delete',
                url: "{{ Route('wishlist.destroy') }}",
                data: {
                    'productId': $(this).attr('data-product-id'),
                },
                success: function(data) {
                    location.reload();
                }
            });
        });


        $(document).on('click', '.addTocomparelist', function(e) {

            e.preventDefault();
            @guest()
                $('.not-loggedin-modal').css('display', 'block');
            @endguest
            $.ajax({
                type: 'post',
                url: "{{ Route('compare.store') }}",
                data: {
                    'productId': $(this).attr('data-product-id'),
                },
                success: function(data) {
                    console.log('ssssss');
                    location.reload();
                    if (data.compared)

                        $('.alert-modal').css('display', 'block');

                    else
                        $('.alert-modal2').css('display', 'block');
                }
            });
        });

        $(document).on('click', '.removeFromcomparelist', function(e) {
            e.preventDefault();
            @guest()
                $('.not-loggedin-modal').css('display', 'block');
            @endguest
            $.ajax({
                type: 'delete',
                url: "{{ Route('compare.destroy') }}",
                data: {
                    'productId': $(this).attr('data-product-id'),
                },
                success: function(data) {
                    location.reload();
                }
            });
        });
    </script>
</body>
