<!-- Start Navbar -->
<div class="navbar">
    <div class="container d-flex flex-nowrap justify-content-between">
        <div class="logo d-lg-flex align-items-center
                        align-items-center">
            <a href="#" class="d-flex align-items-center h-100">
                <img src="{{ asset('website_assets/imgs/logo/logo.png') }}" class="w-100" />
            </a>
        </div>

        <div class="input-group w-50 p-0 d-none d-md-flex">

            <input type="text" class="form-control " placeholder="عن
                            ماذا تبحث ؟ ">
            <div class="input-group-prepend">
                <div class="input-group-text p-0">
                    <button class="btn px-3 border-0">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>

        <ul class="list-unstyled d-flex special-list m-0 align-items-center">
            <li>
                {{-- <select class="form-control mr-auto border-0 bg-transparent
        shadow-0 ">
                    <option>العربية</option>
                    <option>English</option>
                </select> --}}


            </li>
            <div id='google_translate_element'></div>
            <b>|</b>
            <li>
                <a href="../register/registerNewAccount.html" class="d-block
        text-decoration-none">
                    تسجيل الدخول
                    <i class="fa fa-user" aria-hidden="true"></i>
                </a>
            </li>
            <b>|</b>
            <li>
                <a href="../cart/cart-page.html" class="d-block
        text-decoration-none">
                    عربية التسوق
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
            </li>


        </ul>

    </div>
</div>
<!-- End Navbar -->
