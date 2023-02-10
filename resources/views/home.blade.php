@extends('layouts.site.app')

@section('content')
    <!-- Start Slider And Aside -->
    <div class="slider-aside py-4">
        <div class="container">
            <div class="row">

                <div class="col-3 ">
                    <div class="aside-header d-flex justify-content-between align-items-center py-3 px-2">
                        <h4>الاقسام</h4>
                        <a href="{{ route('Site.allCategory') }}" class="text-white text-decoration-none">
                            إظهار الكل
                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                        </a>
                    </div>

                    <div class="bg-light py-3 px-2 text-right">
                        <ul class="list-unstyled">
                            @foreach ($category_slides as $category_slide)
                                <li class="my-2">
                                    <a href="{{ route('Site.category', $category_slide->name) }}" class="text-dark">
                                        {{ $category_slide->name }}
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>


                <div class="col-9">
                    <div id="carouselExampleControls" style="height: auto !important" class="carousel slide">
                        <div class="carousel-inner h-100">

                            @foreach ($brand_slides as $brand_slide)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <img class="d-block" width="800" height="500" src="{{ $brand_slide->image_url }}"
                                        title="{{ $brand_slide->name }}" alt="{{ $brand_slide->name }}">
                                </div>
                            @endforeach

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                    <div id="owl-demo" class="owl-carousel owl-theme position-relative">
                        @foreach ($brand_slides as $brand_slide)
                            <div class="item">
                                <img src="{{ $brand_slide->image_url }}" title="{{ $brand_slide->name }}"
                                    alt="{{ $brand_slide->name }}" class="w-100 h-100" />
                                <h5 class="mt-2">{{ $brand_slide->name }}</h5>
                            </div>
                        @endforeach

                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- End Slider And Aside -->

    <!-- Start Ads -->
    <div class="ads py-5">
        <div class="container">
            <div class="grid">
                @foreach ($ad_images as $ad_img)
                    <div>
                        <img src="{{ $ad_img->image_url }}" title="{{ $ad_img->name }}" alt="{{ $ad_img->name }}"
                            class="w-100" width="500" height="200" />
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Ads -->

    <!-- Start Collections -->
    <div class="collections py-5">
        <div class="container">
            <ul class="nav nav-tabs justify-content-center border-0" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active border-0" id="home-tab" data-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true">وصلنا حديثا</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link border-0" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                        aria-controls="profile" aria-selected="false">الأكثر مبيعا</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link border-0" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                        aria-controls="contact" aria-selected="false">متميز</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-deck d-flex flex-wrap">
                                @foreach ($new_products as $product)
                                    <div class="card mt-5 position-relative">
                                        <div
                                            class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <button>
                                                        <a class="addToWishlist  add-to-fav" href="#"
                                                            data-product-id="{{ $product->id }}">
                                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                                        </a>
                                                    </button>
                                                </li>

                                                <li>
                                                    <button data-toggle="modal" data-target="#show{{ $product->id }}"><i
                                                            class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                                </li>

                                                <li>
                                                    <button>
                                                        <a class="addTocomparelist  add-to-fav" href="#"
                                                            data-product-id="{{ $product->id }}">
                                                            <i class="fa fa-exchange" aria-hidden="true"></i>
                                                        </a>
                                                    </button>
                                                </li>
                                            </ul>

                                            <div class="w-100 align-self-end text-center">
                                                <form action="{{ route('cart.store') }}" method="POST">
                                                    @csrf

                                                    <button type="submit" name="product_id" value="{{ $product->id }}"
                                                        class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                                </form>
                                            </div>

                                        </div>
                                        <img class="card-img-top" width="40" height="40"
                                            src="{{ $product->images[0]->photo }}" alt="{{ $product->name }}">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">{{ $product->short_description }}</h5>
                                            <h5>{{ $product->price }} جنيه</h5>

                                        </div>
                                    </div>
                                    @include('site.includes.product_detail')
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row">

                        <div class="col-12">
                            <div class="card-deck d-flex flex-wrap">

                                @foreach ($best_sellings as $product)
                                    <div class="card mt-5 position-relative">
                                        <div
                                            class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <button>
                                                        <a class="addToWishlist  add-to-fav" href="#"
                                                            data-product-id="{{ $product->id }}">
                                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                                        </a>
                                                    </button>
                                                </li>

                                                <li>
                                                    <button data-toggle="modal"
                                                        data-target="#show1{{ $product->id }}"><i
                                                            class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                                </li>

                                                <li>
                                                    <button>
                                                        <a class="addTocomparelist  add-to-fav" href="#"
                                                            data-product-id="{{ $product->id }}">
                                                            <i class="fa fa-exchange" aria-hidden="true"></i>
                                                        </a>
                                                    </button>
                                                </li>
                                            </ul>

                                            <div class="w-100 align-self-end text-center">
                                                <form action="{{ route('cart.store') }}" method="POST">
                                                    @csrf

                                                    <button type="submit" name="product_id" value="{{ $product->id }}"
                                                        class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                                </form>
                                            </div>
                                            <div class="badge badge-success px-3 py-2 rounded-0">
                                                جديد
                                            </div>


                                        </div>
                                        <img class="card-img-top" width="40" height="40"
                                            src="{{ $product->images[0]->photo }}" alt="{{ $product->name }}">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">{{ $product->short_description }}</h5>
                                            <h5>{{ $product->price }} جنيه</h5>

                                        </div>
                                    </div>
                                    @include('site.includes.best_sellings')
                                @endforeach

                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="row">

                        <div class="col-12">
                            <div class="card-deck d-flex flex-wrap">
                                @foreach ($featured_products as $product)
                                    <div class="card mt-5 position-relative">
                                        <div
                                            class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <button>
                                                        <a class="addToWishlist  add-to-fav" href="#"
                                                            data-product-id="{{ $product->id }}">
                                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                                        </a>
                                                    </button>
                                                </li>

                                                <li>
                                                    <button data-toggle="modal"
                                                        data-target="#show2{{ $product->id }}"><i
                                                            class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                                </li>

                                                <li>
                                                    <button>
                                                        <a class="addTocomparelist  add-to-fav" href="#"
                                                            data-product-id="{{ $product->id }}">
                                                            <i class="fa fa-exchange" aria-hidden="true"></i>
                                                        </a>
                                                    </button>
                                                </li>
                                            </ul>

                                            <div class="w-100 align-self-end text-center">
                                                <form action="{{ route('cart.store') }}" method="POST">
                                                    @csrf

                                                    <button type="submit" name="product_id" value="{{ $product->id }}"
                                                        class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                                </form>
                                            </div>


                                        </div>
                                        <img class="card-img-top" width="40" height="40"
                                            src="{{ $product->images[0]->photo }}" alt="{{ $product->name }}">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">{{ $product->short_description }}</h5>
                                            <h5>{{ $product->price }} جنيه</h5>

                                        </div>
                                    </div>
                                    @include('site.includes.featured_products')
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Collections -->
    <!-- Today Deal -->
    <div class="today-deal py-4 bg-light pb-5">
        <h2 class="text-center">صفقة اليوم</h2>
        <div class="container">
            <div class="owl-carousel owl-theme todayDeal mt-4">
                @foreach ($dealOfDay_products as $product)
                    <div class="card mt-5 position-relative today-deal-item">
                        <div
                            class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                            <ul class="list-unstyled">
                                <li>
                                    <button>
                                        <a class="addToWishlist  add-to-fav" href="#"
                                            data-product-id="{{ $product->id }}">
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                        </a>
                                    </button>
                                </li>

                                {{-- <li>
                                    <button data-toggle="modal" data-target="#show4{{ $product->id }}"><i
                                            class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                </li> --}}

                                <li>
                                    <button>
                                        <a class="addTocomparelist  add-to-fav" href="#"
                                            data-product-id="{{ $product->id }}">
                                            <i class="fa fa-exchange" aria-hidden="true"></i>
                                        </a>
                                    </button>
                                </li>
                            </ul>

                            <div class="w-100 align-self-end text-center">
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf

                                    <button type="submit" name="product_id" value="{{ $product->id }}"
                                        class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                </form>
                            </div>



                        </div>
                        <img class="card-img-top" width="40" height="40" src="{{ $product->images[0]->photo }}"
                            alt="{{ $product->name }}">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $product->short_description }}</h5>
                            <h5>{{ $product->price }} جنيه</h5>

                        </div>
                    </div>
                    {{-- @include('site.includes.dealOfDay_products') --}}
                @endforeach
            </div>
        </div>
    </div>
    <!-- Today Deal -->
    <div class="men-more-sections p-5">

        <div class="p-2 px-3 main-back-color d-flex align-items-center justify-content-between">
            <div class=" card-deck-title">
                <p class=" text-white text-right px-3 py-2 h5 mb-0">
                    أزياء الرجال
                </p>
            </div>
        </div>

        <div class="px-3">

            <div class="card-deck d-flex flex-wrap bg-light px-3 py-4">

                @foreach ($men_products as $product)
                    <div class="card position-relative">
                        <div
                            class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                            <ul class="list-unstyled">
                                <li>
                                    <button>
                                        <a class="addToWishlist  add-to-fav" href="#"
                                            data-product-id="{{ $product->id }}">
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                        </a>
                                    </button>
                                </li>

                                <li>
                                    <button data-toggle="modal" data-target="#show5{{ $product->id }}"><i
                                            class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                </li>

                                <li>
                                    <button>
                                        <a class="addTocomparelist  add-to-fav" href="#"
                                            data-product-id="{{ $product->id }}">
                                            <i class="fa fa-exchange" aria-hidden="true"></i>
                                        </a>
                                    </button>
                                </li>
                            </ul>

                            <div class="w-100 align-self-end text-center">
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf

                                    <button type="submit" name="product_id" value="{{ $product->id }}"
                                        class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                </form>
                            </div>
                        </div>
                        <img class="card-img-top" width="40" height="40" src="{{ $product->images[0]->photo }}"
                            alt="{{ $product->name }}">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $product->short_description }}</h5>
                            <h5>{{ $product->price }} جنيه</h5>

                        </div>
                    </div>
                    @include('site.includes.men_products')
                @endforeach

            </div>
        </div>

    </div>

    <div class="women-more-sections p-5">

        <div class="p-2 px-3 main-back-color d-flex align-items-center justify-content-between">
            <div class=" card-deck-title">
                <p class=" text-white text-right px-3 py-2 h5 mb-0">
                    أزياء النساء
                </p>
            </div>

        </div>

        <div class="px-3">

            <div class="card-deck d-flex flex-wrap bg-light px-3 py-4">

                @foreach ($women_products as $product)
                    <div class="card position-relative">
                        <div
                            class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                            <ul class="list-unstyled">
                                <li>
                                    <button>
                                        <a class="addToWishlist  add-to-fav" href="#"
                                            data-product-id="{{ $product->id }}">
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                        </a>
                                    </button>
                                </li>

                                <li>
                                    <button data-toggle="modal" data-target="#show6{{ $product->id }}"><i
                                            class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                </li>

                                <li>
                                    <button>
                                        <a class="addTocomparelist  add-to-fav" href="#"
                                            data-product-id="{{ $product->id }}">
                                            <i class="fa fa-exchange" aria-hidden="true"></i>
                                        </a>
                                    </button>
                                </li>
                            </ul>

                            <div class="w-100 align-self-end text-center">
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf

                                    <button type="submit" name="product_id" value="{{ $product->id }}"
                                        class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                </form>
                            </div>


                        </div>
                        <img class="card-img-top" width="40" height="40" src="{{ $product->images[0]->photo }}"
                            alt="{{ $product->name }}">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $product->short_description }}</h5>
                            <h5>{{ $product->price }} جنيه</h5>

                        </div>
                    </div>
                    @include('site.includes.women_products')
                @endforeach


            </div>
        </div>

    </div>

    <div class="women-more-sections p-5">

        <div class="p-2 px-3 main-back-color">
            <div class=" card-deck-title">
                <p class="text-center text-white text-right px-3 py-2 h3 mb-0">
                    عروض على كل حاجة
                </p>
            </div>
        </div>

        <div class="bg-light py-4 px-4">

            <div class="card-deck d-flex flex-wrap">
                @foreach ($flash_products as $product)
                    <div class="card position-relative my-2">
                        <div
                            class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                            <ul class="list-unstyled">
                                <li>
                                    <button>
                                        <a class="addToWishlist  add-to-fav" href="#"
                                            data-product-id="{{ $product->id }}">
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                        </a>
                                    </button>
                                </li>

                                <li>
                                    <button data-toggle="modal" data-target="#show7{{ $product->id }}"><i
                                            class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                </li>

                                <li>
                                    <button>
                                        <a class="addTocomparelist  add-to-fav" href="#"
                                            data-product-id="{{ $product->id }}">
                                            <i class="fa fa-exchange" aria-hidden="true"></i>
                                        </a>
                                    </button>
                                </li>
                            </ul>

                            <div class="w-100 align-self-end text-center">
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf

                                    <button type="submit" name="product_id" value="{{ $product->id }}"
                                        class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                </form>
                            </div>


                        </div>
                        <img class="card-img-top" width="40" height="40" src="{{ $product->images[0]->photo }}"
                            alt="{{ $product->name }}">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $product->short_description }}</h5>
                            <h5>{{ $product->price }} جنيه</h5>

                        </div>
                    </div>
                    @include('site.includes.flash_products')
                @endforeach



            </div>
        </div>

    </div>

    <div class="wafr-more-sections p-5">

        <div class="p-2 px-3 main-back-color d-flex align-items-center justify-content-between">
            <div class=" card-deck-title">
                <p class=" text-white text-right px-3 py-2 h5 mb-0">
                    وفر أكثر مع كيان
                </p>
            </div>


        </div>

        <div class="bg-light">
            <div class="owl-carousel owl-theme todayDeal p-3">
                @foreach ($ad_images as $ad_img)
                    <div class="card mt-2 position-relative today-deal-item border-0">

                        <img src="{{ $ad_img->image_url }}" title="{{ $ad_img->name }}" alt="{{ $ad_img->name }}"
                            class="w-100" width="500" height="200" />
                        {{-- <div class="card-body text-center">
                        <h5 class="card-title"> ملابس</h5>
                    </div> --}}
                    </div>
                @endforeach
            </div>
        </div>

    </div>

    <div class="child-more-sections p-5">

        <div class="p-2 px-3 main-back-color d-flex align-items-center justify-content-between">
            <div class=" card-deck-title">
                <p class=" text-white text-right px-3 py-2 h5 mb-0">
                    الأطفال
                </p>
            </div>

        </div>

        <div class="py-4 px-4 bg-light">

            <div class="card-deck d-flex flex-wrap">

                @foreach ($childrens_products as $product)
                    <div class="card">
                        <div class="position-relative">
                            <div class="position-absolute w-100 p-3 item-assets">

                                <ul class="list-unstyled position-absolute">
                                    <li>
                                        <button>
                                            <a class="addToWishlist  add-to-fav" href="#"
                                                data-product-id="{{ $product->id }}">
                                                <i class="fa fa-heart" aria-hidden="true"></i>
                                            </a>
                                        </button>
                                    </li>

                                    <li>
                                        <button data-toggle="modal" data-target="#show8{{ $product->id }}"><i
                                                class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                    </li>

                                    <li>
                                        <button>
                                            <a class="addTocomparelist  add-to-fav" href="#"
                                                data-product-id="{{ $product->id }}">
                                                <i class="fa fa-exchange" aria-hidden="true"></i>
                                            </a>
                                        </button>
                                    </li>
                                </ul>

                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf

                                    <button type="submit" name="product_id" value="{{ $product->id }}"
                                        class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                </form>
                            </div>
                            <img class="card-img-top" width="40" height="40"
                                src="{{ $product->images[0]->photo }}" alt="{{ $product->name }}">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $product->short_description }}</h5>
                                <h5>{{ $product->price }} جنيه</h5>

                            </div>
                        </div>
                    </div>
                    @include('site.includes.childrens_products')
                @endforeach


            </div>
        </div>

    </div>

    <div class="flash-more-sections p-3">

        <div class="main-back-color pt-2 pb-5">
            <div class="p-2 px-3 d-flex align-items-center justify-content-between">
                <div class="card-deck-title d-flex">
                    <p class="text-white text-right px-3 py-2 h5 mb-0">
                        عروض فلاش
                    </p>
                    <p>
                        {{-- <div id="countdown" class="d-flex flex-row-reverse">
                        <div id="days" class="timer mx-1 px-3 py-2 text-white rounded font-weight-bold"> </div>
                        <div id="hours" class="timer mx-1 px-3 py-2 text-white rounded font-weight-bold"> </div>
                        <div id="minutes" class="timer mx-1 px-3 py-2 text-white rounded font-weight-bold"> </div>
                        <div id="seconds" class="timer mx-1 px-3 py-2 text-white rounded font-weight-bold"> </div>
                    </div> --}}
                    </p>
                </div>
            </div>

            <div class="row  px-5">
                <div class="owl-carousel owl-theme todayDeal mt-4">

                    @foreach ($childrens_products as $product)
                        <div class="card position-relative today-deal-item border-0">
                            <div class="position-relative">
                                <div class="position-absolute w-100 p-3 item-assets">

                                    <ul class="list-unstyled position-absolute">
                                        <li>
                                            <button>
                                                <a class="addToWishlist  add-to-fav" href="#"
                                                    data-product-id="{{ $product->id }}">
                                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                                </a>
                                            </button>
                                        </li>

                                        {{-- <li>
                                            <button data-toggle="modal" data-target="#show{{ $product->id }}"><i
                                                    class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                        </li> --}}

                                        <li>
                                            <button>
                                                <a class="addTocomparelist  add-to-fav" href="#"
                                                    data-product-id="{{ $product->id }}">
                                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                                </a>
                                            </button>
                                        </li>
                                    </ul>

                                    <form action="{{ route('cart.store') }}" method="POST">
                                        @csrf

                                        <button type="submit" name="product_id" value="{{ $product->id }}"
                                            class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                    </form>
                                </div>
                                <img class="card-img-top" width="40" height="40"
                                    src="{{ $product->images[0]->photo }}" alt="{{ $product->name }}">
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $product->short_description }}</h5>
                                    <h5>{{ $product->price }} جنيه</h5>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>


    <div class="banners py-5">
        <div class="container">
            <div class="row">
                @foreach ($ad_images as $ad_img)
                    <div class="col-4">
                        <img src="{{ $ad_img->image_url }}" title="{{ $ad_img->name }}" alt="{{ $ad_img->name }}"
                            class="w-100" width="500" height="200" />
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class="electronics-more-sections p-5">

        <div class="p-2 px-3 main-back-color d-flex align-items-center justify-content-between">
            <div class=" card-deck-title">
                <p class=" text-white text-right px-3 py-2 h5 mb-0">
                    إلكترونيات
                </p>
            </div>

        </div>

        <div class="py-4 px-4 bg-light">

            <div class="card-deck d-flex flex-wrap">
                @foreach ($electronics_products as $product)
                    <div class="card">
                        <div class="position-relative">
                            <div class="position-absolute w-100 p-3 item-assets">

                                <ul class="list-unstyled position-absolute">
                                    <li>
                                        <button>
                                            <a class="addToWishlist  add-to-fav" href="#"
                                                data-product-id="{{ $product->id }}">
                                                <i class="fa fa-heart" aria-hidden="true"></i>
                                            </a>
                                        </button>
                                    </li>

                                    <li>
                                        <button data-toggle="modal" data-target="#show9{{ $product->id }}"><i
                                                class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                    </li>

                                    <li>
                                        <button>
                                            <a class="addTocomparelist  add-to-fav" href="#"
                                                data-product-id="{{ $product->id }}">
                                                <i class="fa fa-exchange" aria-hidden="true"></i>
                                            </a>
                                        </button>
                                    </li>
                                </ul>

                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf

                                    <button type="submit" name="product_id" value="{{ $product->id }}"
                                        class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                </form>
                            </div>
                            <img class="card-img-top" width="40" height="40"
                                src="{{ $product->images[0]->photo }}" alt="{{ $product->name }}">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $product->short_description }}</h5>
                                <h5>{{ $product->price }} جنيه</h5>

                            </div>
                        </div>
                    </div>
                    @include('site.includes.electronics_products')
                @endforeach
            </div>
        </div>

    </div>

    <div class="electronics-more-sections p-5">

        <div class="p-2 px-3 main-back-color d-flex align-items-center justify-content-between">
            <div class=" card-deck-title">
                <p class=" text-white text-right px-3 py-2 h5 mb-0">
                    الجمال
                </p>
            </div>
        </div>

        <div class="py-4 px-4 bg-light">

            <div class="card-deck d-flex flex-wrap">
                @foreach ($beauty_products as $product)
                    <div class="card">
                        <div class="position-relative">
                            <div class="position-absolute w-100 p-3 item-assets">

                                <ul class="list-unstyled position-absolute">
                                    <li>
                                        <button>
                                            <a class="addToWishlist  add-to-fav" href="#"
                                                data-product-id="{{ $product->id }}">
                                                <i class="fa fa-heart" aria-hidden="true"></i>
                                            </a>
                                        </button>
                                    </li>

                                    <li>
                                        <button data-toggle="modal" data-target="#show10{{ $product->id }}"><i
                                                class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                    </li>

                                    <li>
                                        <button>
                                            <a class="addTocomparelist  add-to-fav" href="#"
                                                data-product-id="{{ $product->id }}">
                                                <i class="fa fa-exchange" aria-hidden="true"></i>
                                            </a>
                                        </button>
                                    </li>
                                </ul>

                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf

                                    <button type="submit" name="product_id" value="{{ $product->id }}"
                                        class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                </form>
                            </div>
                            <img class="card-img-top" width="40" height="40"
                                src="{{ $product->images[0]->photo }}" alt="{{ $product->name }}">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $product->short_description }}</h5>
                                <h5>{{ $product->price }} جنيه</h5>

                            </div>
                        </div>
                    </div>
                    @include('site.includes.beauty_products')
                @endforeach
            </div>
        </div>

    </div>

    <div class="electronics-more-sections p-5">

        <div class="p-2 px-3 main-back-color d-flex align-items-center justify-content-between">
            <div class=" card-deck-title">
                <p class=" text-white text-right px-3 py-2 h5 mb-0">
                    البيت والمطبخ
                </p>
            </div>


        </div>

        <div class="py-4 px-4 bg-light">

            <div class="card-deck d-flex flex-wrap">
                @foreach ($home_products as $product)
                    <div class="card">
                        <div class="position-relative">
                            <div class="position-absolute w-100 p-3 item-assets">

                                <ul class="list-unstyled position-absolute">
                                    <li>
                                        <button>
                                            <a class="addToWishlist  add-to-fav" href="#"
                                                data-product-id="{{ $product->id }}">
                                                <i class="fa fa-heart" aria-hidden="true"></i>
                                            </a>
                                        </button>
                                    </li>

                                    <li>
                                        <button data-toggle="modal" data-target="#show11{{ $product->id }}"><i
                                                class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                    </li>

                                    <li>
                                        <button>
                                            <a class="addTocomparelist  add-to-fav" href="#"
                                                data-product-id="{{ $product->id }}">
                                                <i class="fa fa-exchange" aria-hidden="true"></i>
                                            </a>
                                        </button>
                                    </li>
                                </ul>

                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf

                                    <button type="submit" name="product_id" value="{{ $product->id }}"
                                        class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                </form>
                            </div>
                            <img class="card-img-top" width="40" height="40"
                                src="{{ $product->images[0]->photo }}" alt="{{ $product->name }}">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $product->short_description }}</h5>
                                <h5>{{ $product->price }} جنيه</h5>

                            </div>
                        </div>
                    </div>
                    @include('site.includes.home_products')
                @endforeach
            </div>
        </div>



        {{-- <a href="./chat/chat.html"
            class="position-fixed chat rounded-circle d-flex justify-content-center align-items-center">
            <i class="fas fa-comments fa-lg"></i>
        </a> --}}
    </div>


    @include('site.includes.not-logged')
    @include('site.includes.alert')
    <!-- we can use only one with dynamic text -->
    @include('site.includes.alert2')
@endsection



@push('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
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
    </script>
@endpush
