<!-- Start Upper Header -->
<div class="overlay"></div>

<header>
    <div class="container d-flex justify-content-between align-items-center">
        <!-- start sidebar -->
        @include('layouts.site._sidebar')
        <!-- end sidebar -->

        <ul class="list-unstyled m-0 d-md-flex">
            <div class="d-flex align-items-center">
                <li>
                    <a class="open-sidebar">
                        <img src="{{ asset('website_assets/imgs/icons/category.png') }}" />
                    </a>
                </li>

                <li>
                    <a href="../all-products/all-products.html" class="pr-0"> كل
                        الفئات </a>
                </li>
            </div>

            <div class="d-none d-md-flex">

                <li>
                    <a href="#"> أطفال </a>
                </li>
                <li>
                    <a href="#">الجمال </a>
                </li>
                <li>
                    <a href="#"> المنزل </a>
                </li>
                <li>
                    <a href="#"> نسائية </a>
                </li>
                <li>
                    <a href="#"> رجالية </a>
                </li>
                <li>
                    <a href="#"> الالكترونيات </a>
                </li>
                <li>
                    <a href="#"> عروض </a>
                </li>
            </div>
        </ul>
        <div class="input-group w-50 p-0 d-md-none">

            <input type="text" class="form-control " placeholder="عن ماذا تبحث ؟
      ">
            <div class="input-group-prepend">
                <div class="input-group-text p-0">
                    <button class="btn px-3 border-0">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>
        <ul class="list-unstyled d-none d-md-flex special-list m-0
    align-items-center">

            <li>
                <a href="../fav/fav.html" class="d-block text-decoration-none">
                    المفضلة

                    <img src="{{ asset('website_assets/imgs/icons/wishlist.png') }}" />

                </a>
            </li>
            <b>|</b>
            <li>
                <a href="../compare/compare.html" class="d-block
        text-decoration-none">
                    قارن
                    <i class="fa-solid fa-code-compare fa-lg"></i>
                </a>
            </li>
        </ul>
    </div>
</header>
<!-- End Upper Header -->
