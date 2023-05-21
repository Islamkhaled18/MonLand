<!-- Start Navbar -->
<div class="navbar">
    <div class="container d-flex flex-nowrap justify-content-between">
        <div class="logo d-lg-flex align-items-center">
            <a href="{{ route('home') }}">
                <img src="{{ asset('website_assets/imgs/logo/logo.png') }}" class="w-100" />
            </a>
        </div>

        <div class="input-group w-50 p-0">
            <div class="input-group-append">
                <select class="form-control mr-auto">
                    <option>جميع الفئات</option>
                </select>
                <form action="{{ route('site.search') }}" method="GET">
            </div>
            <input type="text" class="form-control" name="name" placeholder="عن ماذا تبحث ؟ ">
            <div class="input-group-prepend">
                <div class="input-group-text p-0">
                    <button class="btn px-3 border-0">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            </form>
        </div>

        <ul class="list-unstyled d-flex special-list m-0">

            <li>
                <a href="{{ route('compare.products.index') }}" class="d-block">
                    <i class="fa fa-exchange" aria-hidden="true"></i>
                </a>
            </li>
            @auth
                <li>
                    <a href="{{ route('site.profile', auth()->user()->id) }}" class="d-block">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </a>
                </li>
            @endauth

            <li>
                <a href="{{ route('wishlist.products.index') }}" class="d-block">
                    <i class="fa fa-heart" aria-hidden="true"></i>
                    <span class="badgo countFavProd">0</span>
                </a>
            </li>

            <li>
                <a href="{{ route('cart.index') }}" class="d-block">
                    <i class="fa fa-shopping-cart " aria-hidden="true"></i>
                    <span class="badgo productsCount">0</span>

                </a>
            </li>
        </ul>

    </div>
</div>
<!-- End Navbar -->
