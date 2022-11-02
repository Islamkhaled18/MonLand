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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Start Upper Header -->
    <header>
        <div class="container d-flex justify-content-between align-items-center">
            <ul class="list-unstyled m-0 d-none d-md-flex">
                <li>
                    <a href="#">عن المتجر</a>
                </li>
                <li>
                    <a href="#">سياسة الشحن </a>
                </li>
                <li>
                    <a href="#">سياسة الخصوصية </a>
                </li>
                <li>
                    <a href="#">الشروط والأحكام </a>
                </li>
            </ul>

            <select class="form-control mr-auto">
                <option>العربية</option>
                <option>English</option>
            </select>

        </div>
    </header>
    <!-- End Upper Header -->

    <!-- Start Navbar -->
    <div class="navbar">
        <div class="container d-flex flex-nowrap justify-content-between">
            <div class="logo d-lg-flex align-items-center">
                <a href="#">
                    <img src="{{ asset('website_assets/imgs/logo/logo.png') }}" class="w-100" />
                </a>
            </div>

            <div class="input-group w-50 p-0">
                <div class="input-group-append">
                    <select class="form-control mr-auto">
                        <option>جميع الفئات</option>
                    </select>
                </div>
                <input type="text" class="form-control" placeholder="عن ماذا تبحث ؟ ">
                <div class="input-group-prepend">
                    <div class="input-group-text p-0">
                        <button class="btn px-3 border-0">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>

            <ul class="list-unstyled d-flex special-list m-0">
                
                <li>
                    <a href="#" class="d-block">
                        <i class="fa fa-exchange" aria-hidden="true"></i>
                    </a>
                </li>

                <li>
                    <a href="#" class="d-block">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </a>
                </li>

                <li>
                    <a href="#" class="d-block">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                        <span>3</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="d-block">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <span>5</span>
                    </a>
                </li>
            </ul>

        </div>
    </div>
    <!-- End Navbar -->

    @yield('content')

    <div class="bg-light p-3 py-5">
        <div class="container">
            <div class="row">
                <div class="col-3 text-right px-5">
                    <img src="{{ asset('website_assets/imgs/logo/logo.png') }}" class="w-100" />
                </div>

                <div class="col-7 text-right px-5">
                    <h4 class="main-color">
                        هل انت جديد على كيان?
                    </h4>
                    <h6 class="secondary-color">
                        اشترك فى نشرتنا الاخبارية للحصول على احدث المنتجات
                    </h6>
                    <div class="form-group d-flex mt-4">
                        <input type="email" class="form-control rounded-0 py-4" placeholder="ادخل بريدك الالكترونى هنا" />
                        <button class="text-white py-2 px-4 rounded-0">اشترك</button>
                    </div>
                </div>

                <div class="col-2 text-right">
                    <h4 class="main-color">
                        تابعونا على
                    </h4>
                    <ul class="list-unstyled d-flex mt-4 second-list">

                        <li>
                            <a class="p-3 whats">
                                <i class="fab fa-instagram fa-lg"></i>
                            </a>
                        </li>
                        <li>
                            <a class="mx-3 p-3 telegram">
                                <i class="fab fa-twitter fa-lg"></i>
                            </a>
                        </li>
                        <li>
                            <a class="p-3 facebook main-back-color text-white rounded-circle">
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
            جميع الحقوق محفوظة kayan 2022
        </p>

    </footer>
    <script src="{{ asset('website_assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('website_assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('website_assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('website_assets/js/script.js') }}"> </script>
    <script src="{{ asset('website_assets/js/owl.carousel.min.js') }}"></script>
</body>