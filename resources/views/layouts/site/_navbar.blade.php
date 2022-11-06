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
                @auth
                <li>
                    <a href="#" class="d-block">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </a>
                </li>
                @endauth

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