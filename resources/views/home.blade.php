@extends('layouts.site.app')

@section('content')
<!-- Start Slider And Aside -->
<div class="slider-aside py-3">

    <div id="carouselExampleControls" style="height: auto !important" class="carousel slide carousel-vertical">
        <ol class="carousel-indicators main-slider">
            <li data-bs-target="#carouselExampleControls" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExampleControls" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselExampleControls" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner h-100">
            @if ($brand_slides)
            @php
            $active = true;
            @endphp

            @foreach ($brand_slides as $brand_slide)
            <div class="carousel-item {{ $active ? ' active' : '' }}">
                <img class="d-block w-100" src="{{ $brand_slide->image_url }}" title="{{ $brand_slide->name }}"
                    alt="{{ $brand_slide->name }}" height="600" alt="First slide">
            </div>
            @php
            $active = false;
            @endphp
            @endforeach

            @else

            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}"
                    alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}"
                    alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}"
                    alt="Third slide">
            </div>
            @endif
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
            data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" style="transform: scale(2.5);" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button"
            data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" style="transform: scale(2.5);" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div id="owl-demo" class="owl-carousel owl-theme position-relative upper">

        @if ($category_slides)
        @foreach ($category_slides as $category_slide )

        <div class="item">
            <img src="{{ $category_slide->image_url }}" title="{{ $category_slide->name }}"
                alt="{{ $category_slide->name }}" height="160" width="100" />
            <h5 class="mt-2">ملابس</h5>
        </div>
        @endforeach
        @else

        <div class="item">
            <img src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" class="w-100 h-100" />
            <h5 class="mt-2">ملابس</h5>
        </div>
        @endif



    </div>

</div>
<!-- End Slider And Aside -->

<!-- Start Ads -->
<div class="ads py-5">
    <div class="container-fluid px-5 ">
        <div class="row">

            <div class="d-flex col-md-4 col-12 px-2 py-3">
                <div class="bg-light p-3 pb-5">
                    <h3 class="text-right">كل الخصومات</h3>
                    <div class="row justify-content-between w-100">
                        @if($all_offers)

                        @foreach ($all_offers as $all_offer )

                        <div class="col-6">
                            <img src="{{$all_offer->image_url }}" title="{{$all_offer->name }}"
                                alt="{{$all_offer->name }}" height="155" class="w-100 m-3" />
                        </div>
                        @endforeach

                        @else

                        <div class="col-6">
                            <img src=" {{ asset('website_assets/Design/Finished/404-ar.png') }}"
                                class="w-100 h-100 m-3" />
                        </div>
                        <div class="col-6">
                            <img src=" {{ asset('website_assets/Design/Finished/404-ar.png') }}"
                                class="w-100 h-100 m-3" />
                        </div>
                        <div class="col-6 mt-4">
                            <img src=" {{ asset('website_assets/Design/Finished/404-ar.png') }}"
                                class="w-100 h-100 m-3" />
                        </div>
                        <div class="col-6 mt-4">
                            <img src=" {{ asset('website_assets/Design/Finished/404-ar.png') }}"
                                class="w-100 h-100 m-3" />
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="d-flex col-md-4 col-12 px-2 py-3">
                <div class="bg-light p-3 pb-5">
                    <h3 class="text-right"> عروض اخر الاسبوع</h3>
                    <div class="row justify-content-between w-100">

                        @if($weekend_offers)

                        @foreach ($weekend_offers as $weekend_offer )

                        <div class="col-6">
                            <img src="{{$weekend_offer->image_url }}" title="{{$weekend_offer->name }}"
                                alt="{{$weekend_offer->name }}" height="155" class="w-100 m-3" />
                        </div>
                        @endforeach

                        @else

                        <div class="col-6">
                            <img src=" {{ asset('website_assets/Design/Finished/404-ar.png') }}"
                                class="w-100 h-100 m-3" />
                        </div>
                        <div class="col-6">
                            <img src=" {{ asset('website_assets/Design/Finished/404-ar.png') }}"
                                class="w-100 h-100 m-3" />
                        </div>
                        <div class="col-6 mt-4">
                            <img src=" {{ asset('website_assets/Design/Finished/404-ar.png') }}"
                                class="w-100 h-100 m-3" />
                        </div>
                        <div class="col-6 mt-4">
                            <img src=" {{ asset('website_assets/Design/Finished/404-ar.png') }}"
                                class="w-100 h-100 m-3" />
                        </div>
                        @endif

                    </div>
                </div>
            </div>

            <div class="d-flex col-md-4 col-12 px-2 py-3">
                <div class="bg-light p-3 pb-5">
                    <h3 class="text-right"> اشترى وبالك مرتاح</h3>
                    <div class="row justify-content-between w-100">
                        @if($buy_your_mind_is_frees)

                        @foreach ($buy_your_mind_is_frees as $buy_your_mind_is_free )

                        <div class="col-6">
                            <img src="{{$buy_your_mind_is_free->image_url }}" title="{{$buy_your_mind_is_free->name }}"
                                alt="{{$buy_your_mind_is_free->name }}" height="155" class="w-100 m-3" />
                        </div>
                        @endforeach

                        @else

                        <div class="col-6">
                            <img src=" {{ asset('website_assets/Design/Finished/404-ar.png') }}"
                                class="w-100 h-100 m-3" />
                        </div>
                        <div class="col-6">
                            <img src=" {{ asset('website_assets/Design/Finished/404-ar.png') }}"
                                class="w-100 h-100 m-3" />
                        </div>
                        <div class="col-6 mt-4">
                            <img src=" {{ asset('website_assets/Design/Finished/404-ar.png') }}"
                                class="w-100 h-100 m-3" />
                        </div>
                        <div class="col-6 mt-4">
                            <img src=" {{ asset('website_assets/Design/Finished/404-ar.png') }}"
                                class="w-100 h-100 m-3" />
                        </div>
                        @endif

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- End Ads -->

<!-- Today Deal -->
<div class="today-deal py-4 pb-5">

    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="text-right"> عروضنا المفضلة</h2>
            <button class=" btn bg-main text-white text-bold mx-2 my-3  py-2 px-4">
                تسوق الأن
            </button>
        </div>

        <div class="owl-carousel owl-theme todayDeal mt-4">
            @if ($flash_products)
            @foreach ($flash_products as $product )

            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">

                            <div class="carousel-item active">
                                <img class="card-img-top"
                                    src="{{ $product->images[0]->photo ? asset($product->images[0]->photo) : asset('images/default.png') }}"
                                    alt="{{ $product->name }}" title="{{ $product->name }}" />
                            </div>

                            <div class="carousel-item">
                                <img class="card-img-top"
                                    src="{{ $product->images[1]->photo ? asset($product->images[1]->photo) : asset('images/default.png') }}"
                                    alt="{{ $product->name }}" title="{{ $product->name }}" />
                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top"
                                    src="{{ $product->images[2]->photo ? asset($product->images[2]->photo) : asset('images/default.png') }}"
                                    alt="{{ $product->name }}" title="{{ $product->name }}" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body mt-4">

                    <p class="card-title">{{  $product->name }}

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">{{ $product->new_price }} جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">{{ $product->old_price }} جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">{{ number_format((($product->old_price - $product->new_price) / $product->old_price) * 100, 2, '.', '') }}</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">
                        {{ $product->created_at->diffInDays(now()) < 10 ? 'جديد' : 'موجود منذ فتره' }}


                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>
            @endforeach


            @else
            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>
            @endif


        </div>
    </div>
</div>
<!-- Today Deal -->

<!-- Start Electronics -->
<div class="today-deal py-4 pb-5">

    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="text-right"> الكترونيات</h2>
            <button class=" btn bg-main text-white text-bold mx-2 my-3  py-2 px-4">
                عرض الكل
            </button>
        </div>
        <div class="overflow-auto">
            <div class="row flex-nowrap">
                <div class="col-md-2 col-4">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-md-2 col-4">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-md-2 col-4">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-md-2 col-4">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-md-2 col-4">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-md-2 col-4">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Electronics -->

<!-- Start Electronics Offer -->

<div class="today-deal py-4 pb-5">

    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="text-right"> عروضنا الألكترونيات</h2>
            <button class=" btn bg-main text-white text-bold mx-2 my-3  py-2 px-4">
                تسوق الأن
            </button>
        </div>
        <div class="owl-carousel owl-theme todayDeal mt-4">
            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-7" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-7" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-7" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-7" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>



                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>

            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-8" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-8" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-8" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-8" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>



                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>

            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-9" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-9" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-9" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-9" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>

            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-10" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-10" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-10" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-10" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>

            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-11" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-11" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-11" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-11" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>

            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-12" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-12" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-12" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-12" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Electronics Offer -->

<div class="banners py-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-4">
                <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100 h-100" />
            </div>
            <div class="col-4">
                <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100 h-100" />
            </div>
            <div class="col-4">
                <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100 h-100" />
            </div>
        </div>
    </div>
</div>

<!-- Start Men Fashion -->
<div class="today-deal py-4 pb-5">

    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="text-right"> أزياء الرجال</h2>
            <button class=" btn bg-main text-white text-bold mx-2 my-3  py-2 px-4">
                عرض الكل
            </button>
        </div>

        <div class="overflow-auto">
            <div class="row flex-nowrap">
                <div class="col-4 col-md-2">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-4 col-md-2">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-4 col-md-2">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-4 col-md-2">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-4 col-md-2">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-4 col-md-2">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Men Fashion  -->

<!-- Start Men Fashion Offer -->

<div class="today-deal py-4 pb-5">

    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="text-right"> عروض أزياء الرجال </h2>
            <button class=" btn bg-main text-white text-bold mx-2 my-3  py-2 px-4">
                تسوق الأن
            </button>
        </div>
        <div class="owl-carousel owl-theme todayDeal mt-4">
            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-13" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-13" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-13" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-13" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>

            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-14" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-14" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-14" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-14" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>



                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>

            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-9" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-15" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-15" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-15" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>

            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-16" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-16" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-16" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-16" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>

            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-17" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-17" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-17" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-17" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>



                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>

            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-18" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-18" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-18" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-18" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Men Fashion Offer -->

<!-- Start women Fashion -->
<div class="today-deal py-4 pb-5">

    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="text-right"> أزياء نسائية</h2>
            <button class=" btn bg-main text-white text-bold mx-2 my-3  py-2 px-4">
                عرض الكل
            </button>
        </div>


        <div class="overflow-auto">
            <div class="row flex-nowrap">
                <div class="col-4 col-md-2">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-md-2 col-4">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-md-2 col-4">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-md-2 col-4">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-md-2 col-4">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-md-2 col-4">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Women Fashion  -->

<!-- Start Women Fashion Offer -->

<div class="today-deal py-4 pb-5">

    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="text-right"> عروضنا الأزياء النسائية</h2>
            <button class=" btn bg-main text-white text-bold mx-2 my-3  py-2 px-4">
                تسوق الأن
            </button>
        </div>
        <div class="owl-carousel owl-theme todayDeal mt-4">
            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-19" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-19" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-19" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-19" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>



                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>

            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-19" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-19" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-19" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-19" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>

            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-20" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-20" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-20" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-20" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>

            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-21" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-21" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-21" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-21" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>

            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-22" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-22" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-22" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-22" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>

            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-23" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-23" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-23" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-23" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Women Fashion Offer -->

<!-- Start Beauty -->
<div class="today-deal py-4 pb-5">

    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="text-right"> الجمال </h2>
            <button class=" btn bg-main text-white text-bold mx-2 my-3  py-2 px-4">
                عرض الكل
            </button>
        </div>
        <div class="overflow-auto">
            <div class="row flex-nowrap">
                <div class="col-md-2 col-4">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-md-2 col-4">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-md-2 col-4">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-md-2 col-4">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-md-2 col-4">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-md-2 col-4">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
            </div>
        </div>
    </div>
</div>


<!-- End Beauty  -->

<!-- Start Accessories -->
<div class="today-deal py-4 pb-5">

    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="text-right"> اكسسوارات </h2>
            <button class=" btn bg-main text-white text-bold mx-2 my-3  py-2 px-4">
                عرض الكل
            </button>
        </div>
        <div class="overflow-auto">
            <div class="row flex-nowrap">
                <div class="col-md-2 col-4">
                    <img src=" {{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-md-2 col-4">
                    <img src=" {{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-md-2 col-4">
                    <img src=" {{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-md-2 col-4">
                    <img src=" {{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-md-2 col-4">
                    <img src=" {{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-md-2 col-4">
                    <img src=" {{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
            </div>
        </div>



    </div>
</div>
<!-- End Accessories  -->

<!-- Start Accessories Offer -->

<div class="today-deal py-4 pb-5">

    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="text-right"> عروض اكسسوارات </h2>
            <button class=" btn bg-main text-white text-bold mx-2 my-3  py-2 px-4">
                تسوق الأن
            </button>
        </div>
        <div class="owl-carousel owl-theme todayDeal mt-4">
            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-24" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-24" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-24" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-24" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>

            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-25" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-25" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-25" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-25" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>

            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-26" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-26" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-26" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-26" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>

            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-27" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-27" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-27" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-27" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>

            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-28" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-28" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-28" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-28" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>

            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-29" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-29" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-29" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-29" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Accessories  Offer -->

<!-- Start Top Sells -->

<div class="today-deal py-4 pb-5">

    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="text-right"> الأكثر مبيعا </h2>
            <button class=" btn bg-main text-white text-bold mx-2 my-3  py-2 px-4">
                تسوق الأن
            </button>
        </div>
        <div class="owl-carousel owl-theme todayDeal mt-4">
            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-30" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-30" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-30" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-30" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>

            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-31" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-31" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-31" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-31" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>

            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-32" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-32" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-32" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-32" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>

            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-33" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-33" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-33" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-33" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>

            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-34" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-34" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-34" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-34" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>

            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-35" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-35" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-35" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-35" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Top Sells   -->

<!-- Start Home And Kitchen -->
<div class="today-deal py-4 pb-5">

    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="text-right"> البيت والمطبخ </h2>
            <button class=" btn bg-main text-white text-bold mx-2 my-3  py-2 px-4">
                عرض الكل
            </button>
        </div>
        <div class="overflow-auto">
            <div class="row flex-nowrap">
                <div class="col-md-2 col-4">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-md-2 col-4">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-md-2 col-4">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-md-2 col-4">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-md-2 col-4">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-md-2 col-4">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Home And Kitchen  -->

<!-- Start Home And Kitchen Offers -->
<div class="today-deal py-4 pb-5">

    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="text-right"> عروض البيت والمطبخ</h2>
            <button class=" btn bg-main text-white text-bold mx-2 my-3  py-2 px-4">
                تسوق الأن
            </button>
        </div>
        <div class="owl-carousel owl-theme todayDeal mt-4">
            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-36" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-36" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-36" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-36" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>

            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-37" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-37" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-37" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-37" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>

            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-38" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-38" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-38" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-38" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>

            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-39" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-39" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-39" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-39" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>

            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-40" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-40" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-40" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-40" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>

            <div class="card mt-4 text-start">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets ">

                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                    </div>
                    <div id="product-card-indicators-41" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators ">
                            <li data-target="#product-card-indicators-41" data-slide-to="0" class="active"></li>
                            <li data-target="#product-card-indicators-41" data-slide-to="1" class="border"></li>
                            <li data-target="#product-card-indicators-41" data-slide-to="2" class="border"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                            <div class="carousel-item">
                                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}"
                                    alt="Card image cap" />

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body mt-4">

                    <p class="card-title"> هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                        المساحة

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold">70 جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">03</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">(180)</span>
                        </div>
                    </div>

                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1">100 جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">47</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">

                        جديد
                    </div>
                </div>
                <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                    أضف إلى العربة
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Home And Kitchen Offers -->

<!-- Start More Cats -->
<div class="today-deal py-4 pb-5">

    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="text-right"> فئات أكثر </h2>
            <button class=" btn bg-main text-white text-bold mx-2 my-3  py-2 px-4">
                عرض الكل
            </button>
        </div>
        <div class="overflow-auto">
            <div class="row flex-nowrap">
                <div class="col-md-2 col-4">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-md-2 col-4">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-md-2 col-4">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-md-2 col-4">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-md-2 col-4">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                <div class="col-md-2 col-4">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End More Cats  -->

<div class="bg-light py-5">
    <div class="container-fluid">
        <h1 class="text-center">تسوق حسب الماركة</h1>
        <div class="row mt-5">
            <div class="col-md-3 col-4 mt-4">
                <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100" />
            </div>
            <div class="col-md-3 col-4 mt-4">
                <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100" />
            </div>
            <div class="col-md-3 col-4 mt-4">
                <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100" />
            </div>
            <div class="col-md-3 col-4 mt-4">
                <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100" />
            </div>
            <div class="col-md-3 col-4 mt-4">
                <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100" />
            </div>
            <div class="col-md-3 col-4 mt-4">
                <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100" />
            </div>

            <div class="col-md-3 col-4 mt-4">
                <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100" />
            </div>
            <div class="col-md-3 col-4 mt-4">
                <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100" />
            </div>
            <div class="col-md-3 col-4 mt-4">
                <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100" />
            </div>
            <div class="col-md-3 col-4 mt-4">
                <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100" />
            </div>
            <div class="col-md-3 col-4 mt-4">
                <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100" />
            </div>
            <div class="col-md-3 col-4 mt-4">
                <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100" />
            </div>

            <div class="col-md-3 col-4 mt-4">
                <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100" />
            </div>
            <div class="col-md-3 col-4 mt-4">
                <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100" />
            </div>
            <div class="col-md-3 col-4 mt-4">
                <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100" />
            </div>
            <div class="col-md-3 col-4 mt-4">
                <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100" />
            </div>
            <div class="col-md-3 col-4 mt-4">
                <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100" />
            </div>
            <div class="col-md-3 col-4 mt-4">
                <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100" />
            </div>
        </div>
    </div>
</div>
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
