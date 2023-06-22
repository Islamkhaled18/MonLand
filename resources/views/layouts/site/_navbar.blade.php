<!-- Start Navbar -->
<div class="navbar">
    <div class="container d-flex flex-nowrap justify-content-between">
        <div class="logo d-lg-flex align-items-center
                        align-items-center">
            <a href="{{ route('home') }}" class="d-flex align-items-center h-100">
                <img src="{{ asset('website_assets/imgs/logo/logo.png') }}" class="w-100" />
            </a>
        </div>

        <form action="{{ route('site.search') }}" method="GET">
            <div class="input-group p-0 d-none d-md-flex">
                <input type="text" name="name" class="form-control" placeholder="عن ماذا تبحث ؟ ">
                <div class="input-group-prepend">
                    <div class="input-group-text p-0">
                        <button class="btn px-3 border-0">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>

            </div>
        </form>

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
                @guest

                <a href="{{route('login')}}" class="d-block text-decoration-none">
                    تسجيل الدخول
                    <i class="fa fa-user" aria-hidden="true"></i>
                </a>
                @else
                {{-- <a href="{{route('logout')}}" class="d-block text-decoration-none">
                    تسجيل الخروج
                    <i class="fa fa-user" aria-hidden="true"></i>
                </a> --}}

                <a class="dropdown-item" href="page-login.html" class="d-block text-decoration-none"
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault();document.getElementById('logout-form_site').submit();">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    تسجيل الخروج
                    <form id="logout-form_site" action="{{ route('logout') }}" method="post" style="display: none;">
                        @csrf
                    </form>
                </a>


                @endguest
            </li>
            <b>|</b>
            <li>
                <a href="{{ route('cart.index') }}" class="d-block text-decoration-none">
                    عربية التسوق
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
            </li>


        </ul>

    </div>
</div>
<!-- End Navbar -->
