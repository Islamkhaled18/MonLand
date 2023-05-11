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
    <!-- <link rel="stylesheet" href="{{ asset('website_assets/pages-css/account/orders.css') }}"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
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

            <div class="row d-flex p-3 py-5 justify-content-sm-center
          align-items-center">


                <div class="col-12 col-md-3 text-right ">
                    <img src="{{ asset('website_assets/imgs/logo/logo.png') }}" sizes="w-100 h-" class="d-block
              m-auto img-fluid " />



                </div>


                <div class="col-12 col-md-7 d-flex flex-column text-right
            justify-content-center">
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
                    <ul class=" list-unstyled d-flex justify-content-center mt-4
              second-list">

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
                            <a class="p-3 facebook main-back-color text-white
                  rounded-circle">
                                <i class=" fab fa-facebook-f fa-lg"></i>
                            </a>
                        </li>
                    </ul>
                </div>


            </div>

        </div>
        <!-- banner end -->

        <div class="my-5 text-start d-flex flex-wrap flex-column-reverse
        flex-lg-row">
            <div class="col-12 col-lg-4 px-3 py-2 mb-3">

                <ul class="list-unstyled">
                    <h4 class="mb-4">
                        حسابى
                    </h4>
                    <li class="font-weight-bold">
                        <i class="fas fa-caret-left ml-2 main-color"></i>
                        <a href="../register/registerNewAccount.html">تسجيل الدخول</a>
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
                        <a href="../account/orders.html">الملف الشخصى</a>

                    </li>
                    <li class="my-2 font-weight-bold">
                        <i class="fas fa-caret-left ml-2 main-color"></i>
                        <a href="../fav/fav.html">المفضلة</a>

                    </li>
                    <li class="font-weight-bold">
                        <i class="fas fa-caret-left ml-2 main-color"></i>
                        <a href="../compare/compare.html">قارن</a>

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

                        <a href="#">سياسة الاستبدال والاسترجاع</a>
                    </li>
                    <li class="font-weight-bold">
                        <i class="fas fa-caret-left ml-2 main-color"></i>

                        <a href="../contact-us/contact-us.html">جدول المقاسات </a>
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
                    <input type="email" class="form-control rounded-0 py-4" placeholder="ادخل بريدك الالكترونى هنا" />
                    <button class="text-white py-2 px-4 rounded-0">اشترك</button>
                </div>
            </div>
            <div class="d-flex justify-content-center main-color text-bold col-12">
                <ul class="list-unstyled d-flex flex-wrap">
                    <li class="m-2">
                        <a href="#" class="footer-link">عن المنظمه</a>
                    </li>
                    <li class="m-2">
                        <a href="#" class="footer-link">سياسة الشحن</a>
                    </li>
                    <li class="m-2">
                        <a href="#" class="footer-link">سياسة الخصوصية</a>
                    </li>
                    <li class="m-2">
                        <a href="#" class="footer-link">الشروط والأحكام</a>
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
</body>

</html>
