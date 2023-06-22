@extends('layouts.site.app')

@section('title')
- المنتج {{ $productDetails->name }}
@endsection

@section('content')

<section id="product-details" class="container-fluid">
    <!-- Page Navigation -->
    <div class="page-nav row px-4">
        <a href="/" class="text-dark pl-2">
            <img src="../imgs/icons/home-icon-silhouette.png" alt>
            <!-- <i class="fa-solid fa-house-chimney"></i> -->
        </a>
        <a href="#" class="text-dark">
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
            {{ $productDetails->name }}
        </a>
    </div>

    <div id="content-wrapper" class="row d-flex py-5 px-4">
        <!-- image cursoul -->
        <div id=" imgs-section" class="col-md-4 no-gutters pl-4">
            <div class="row">
                <img id="featured" class="w-100" src="{{ $productDetails->image_url }}" />
            </div>
            <!-- Slider Nav imgs -->
            <div id="slide" class="d-flex justify-content-between flex-wrap mt-2 py-2">
                @foreach ($productDetails->images as $key => $image)
                <img class="thumbnail{{ $loop->first ? ' active' : '' }}"
                    src="{{ $image->photo ? asset($image->photo) : asset('images/default.png') }}"
                    alt="{{ $productDetails->name }}" />
                @if ($key == 5) {{-- Stop after 6 images --}}
                @break
                @endif
                @endforeach


            </div>

        </div>
        <!-- product detials -->
        <div class=" col-12 col-md-8 no-gutters">
            <div class="d-flex row">

                <div id="text-section" class="col-12 col-md-8 pl-3">
                    <!-- <div class></div> -->
                    <p id="brarnd" class="main-color text-larger text-bold"> {{ $brand_name->name }} : الماركة</p>
                    <div id="product-title" class="text-larger py-2 text-bold">
                        {{ $productDetails->name }}
                    </div>
                    <!-- model and rating -->
                    <div class="d-flex ">
                        <div class="model-num">
                            <span>رقم الموديل</span>
                            <span id="model-number" class="px-1">{{ $productDetails->model ?? $productDetails->name
                                }}</span>
                        </div>
                        <!-- Rating Start-->
                        <div class="d-flex mx-2">

                            <div class="star-rating  ">
                                <span id="rating-score">{{ $averageStarRating }}</span>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-4 text-success">(اراء
                                العملاء {{ $reviewsCount }})</span>

                        </div>
                    </div>

                    <div id="before-price" class=" my-3">
                        <span>قبل</span>
                        <span class="text-crossed px-1">{{ $productDetails->old_price }} جنيه</span>
                    </div>
                    <div id="after-price" class=" my-3">
                        <span>الأن</span>
                        <span class="px-1 text-bold">{{ $productDetails->new_price }} جنيه</span>
                    </div>
                    <div id="save-section" class=" my-3 d-flex ">
                        <span>وفرت</span>
                        <span class="px-1 ">{{ $productDetails->old_price - $productDetails->new_price }} جنيه</span>
                        <div class=" px-2 saving-bage ">
                            <span>خصم</span>
                            <span id="save-quantity">{{ number_format((($productDetails->old_price -
                                $productDetails->new_price) /
                                $productDetails->old_price) * 100, 2, '.', '') }}</span>
                            <span>%</span>
                        </div>

                    </div>

                    <!-- Colors -->
                    <div id="color-section" class="my-4">
                        <div class="normal-text my-2">الوان</div>
                        <div class="d-flex available-colors flex-nowrap">
                            @foreach ($product_colors as $color)
                            <div class="available-color" data-color="{{ $color->name }}"
                                style="background:{{ $color->name }}"></div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Sizes -->
                    <div id="size-section" class="my-4">
                        <div class="normal-text my-2  d-flex justify-content-between">
                            المقاس
                            <a href="{{ route('sizeTable') }}" class="under-line text-dark"><u>جدول المقاسات</u></a>
                        </div>
                        <div class="d-flex available-sizes flex-nowrap">
                            @foreach ($product_sizes as $size)
                            <div class="available-size" data-size="{{ $size->name }}" data-price="{{ $size->price }}">{{
                                $size->name }}</div>
                            @endforeach
                        </div>
                    </div>
                    @if ($productDetails->qty <= 20 )
                     <div id="remaining-section" class="main-color text-bold">
                        <span>باقي</span>
                        <span id="remaining-quantity">{{ $productDetails->qty }}</span>
                        <span>قطع فقط</span>

                    </div>
                    @endif

                <!-- order quantity and add to card -->
                <div class="row my-3">
                    <div id="order-quantity-dropdown" class="dropdown  ml-1">
                        <button class="btn py-3 border-dark dropdown-toggle" type="button" data-toggle="dropdown"
                            aria-expanded="false">
                            <span id="order-quantity" class="border-left px-2">1</span>
                        </button>
                        <div id="order-quantity-list" class="dropdown-menu">
                            <a class="dropdown-item quantity-option" href="#" id="quantity-1">1</a>
                            <a class="dropdown-item quantity-option" href="#" id="quantity-2">2</a>
                            <a class="dropdown-item quantity-option" href="#" id="quantity-3">3</a>
                            <a class="dropdown-item quantity-option" href="#" id="quantity-4">4</a>
                            <a class="dropdown-item quantity-option" href="#" id="quantity-5">5</a>
                            <a class="dropdown-item quantity-option" href="#" id="quantity-6">6</a>
                            <a class="dropdown-item quantity-option" href="#" id="quantity-7">7</a>
                            <a class="dropdown-item quantity-option" href="#" id="quantity-8">8</a>
                            <a class="dropdown-item quantity-option" href="#" id="quantity-9">9</a>
                            <a class="dropdown-item quantity-option" href="#" id="quantity-10">10</a>
                        </div>

                        <!-- Add to card button -->

                    </div>
                    <button class="col-8 col-lg-9 bg-main text-white text-larger badge addToCart"
                        data-product-id="{{ $productDetails->id }}">
                        أضف الي العربة
                    </button>
                </div>
            </div>

            <!-- info -->
            <div class="col-12 col-md-4 no-gutters">

                <div class="info-section border-right px-3 text-start  d-flex flex-column  flex-wrap">

                    <div class=" pt-3 pb-4">

                        <img src="{{ asset('website_assets/imgs/icons/product-return.png') }}">
                        <!-- <i class="fa-solid fa-arrow-rotate-left px-1 main-color"></i> -->
                        <span>لا يمكن استبدال او ارجاع هذا المنتج</span>
                    </div>

                    <div id="seller-info" class="  d-flex justify-content-between text-start pt-3 pb-4">
                        <div class>
                            <span>

                                <img src="{{ asset('website_assets/imgs/icons/shop.png') }}">
                                <!-- <i class="fa-solid fa-arrow-rotate-left px-1 main-color"></i> -->
                                <span class="seller-name"> <a
                                        href="{{ route('Site.product.vendorProducts', $productDetails->vendor_id) }}">
                                        اسم البائع : {{ $vendor->vendor_name }}</a> </span>
                            </span>
                            <p class="seller-rate"><span class="number">{{ $average }}%</span> تقييم
                                البائع</p>
                        </div>
                        {{-- <div class="d-flex flex-column justify-content-end  align-items-end">
                            <button class="subscribe-btn px-3">تابع</button>
                            <p class="seller-subscribers"><span class="number">117525</span>
                                المتابعين</p>

                        </div> --}}
                    </div>

                    <div class=" pt-3 pb-4">
                        <div>

                            <img src="{{ asset('website_assets/imgs/icons/delivery-truck.png') }}">
                            <!-- <i class="fa-solid fa-arrow-rotate-left px-1 main-color"></i> -->
                            <span class="text-large text-simi-bold pr-2">شحن موثوق به</span>
                        </div>

                        <p class="pr-5">
                            {{ $vendor->exhange_status }}
                        </p>

                    </div>

                    <div class=" pt-3 pb-4">
                        <div>

                            <img src="{{ asset('website_assets/imgs/icons/encrypted.png') }}">
                            <span class="text-large text-simi-bold pr-2">تسوق امن</span>
                        </div>

                        <p class="pr-5">بياناتك محمية دائما</p>

                    </div>
                </div>
            </div>

        </div>

    </div>

    </div>

    <!-- Tabs -->
    <div class="collections pt-5 text-start">
        <div class="container-fluid">
            <!-- navigation -->

            <ul class="nav nav-tabs justify-content-start border-bottom border-dark py-2 text-large" id="myTab"
                role="tablist">
                <li class="nav-item">
                    <a class="nav-link  border-0" id="description-tab" data-toggle="tab" href="#description" role="tab"
                        aria-controls="description" aria-selected="true">نظره عامة</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  border-0" id="more-info-tab" data-toggle="tab" href="#more-info" role="tab"
                        aria-controls="more-info" aria-selected="false">المواصفات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active border-0" id="reviwes-tab" data-toggle="tab" href="#reviwes" role="tab"
                        aria-controls="contact" aria-selected="false">التقيمات</a>
                </li>

            </ul>

            <!--Content Tabs -->
            <div class="tab-content" id="myTabContent">
                <!-- generail view Tab -->
                <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab">
                    <div id="description-text" class=" d-flex flex-wrap py-4 text-bold text-start">
                        {{ $productDetails->description }}
                    </div>
                </div>
                <!--  Description Tab -->

                @php

                @endphp
                <div class="tab-pane fade show " id="more-info" role="tabpanel" aria-labelledby="more-info-tab">
                    <div class=" d-flex flex-row flex-wrap py-4 text-bold text-large">
                        <div class="col-12 my-2 col-md-6 ">

                            @foreach ($productSpecifications as $specification)
                            <div class="px-2">{{ $specification->spec_key }} : {{ $specification->spec_value }}</div>
                            @endforeach

                        </div>


                    </div>
                </div>
                <!-- rerviews Tab -->
                <div class="tab-pane fade show active py-5" id="reviwes" role="tabpanel" aria-labelledby="reviwes-tab">
                    <div class=" d-flex flex-row flex-wrap pt-3 pb-5 text-bold text-large bg-light">
                        <!-- ratings -->
                        <div class="col-12 d-flex flex-row flex-wrap px-4 pt-3 col-md-6 ">
                            <div class="col-12 col-lg-3 no-gutters d-flex flex-column align-items-center ">
                                <span class="text-xlarge">التقيم العام</span>

                                <div class="circle-wrap">
                                    <div class="circle">
                                        <div class="mask full">
                                            <div class="fill"></div>
                                        </div>
                                        <div class="mask half">
                                            <div class="fill"></div>
                                        </div>
                                        <div class="inside-circle">
                                            <div id="generail-review-rating"
                                                class="  position-absolute total-rate text-success">{{
                                                $averageStarRating }}</div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-12 col-lg-9 no-gutters d-flex flex-row my-3">

                                <div class="col no-gutters">
                                    <div class="d-flex">5
                                        <div class="bar-container m-1 ">
                                            <div class="bar bar-{{ $productsWithRatingFive }}"></div>
                                        </div>
                                        ({{ $productsWithRatingFive }})
                                    </div>
                                    <div class="d-flex">4
                                        <div class="bar-container m-1 ">
                                            <div class="bar bar-{{ $productsWithRatingFour }}"></div>
                                        </div>
                                        ({{ $productsWithRatingFour }})
                                    </div>
                                    <div class="d-flex">3
                                        <div class="bar-container m-1 ">
                                            <div class="bar bar-{{ $productsWithRatingThree }}"></div>
                                        </div>
                                        ({{ $productsWithRatingThree }})
                                    </div>
                                    <div class="d-flex">2
                                        <div class="bar-container m-1 ">
                                            <div class="bar bar-{{ $productsWithRatingTwo }}"></div>
                                        </div>
                                        ({{ $productsWithRatingTwo }})
                                    </div>
                                    <div class="d-flex">1
                                        <div class="bar-container m-1 ">
                                            <div class="bar bar-{{ $productsWithRatingOne }}"></div>
                                        </div>
                                        ({{ $productsWithRatingOne }})
                                    </div>

                                </div>
                            </div>

                        </div>
                        <!-- questions -->
                        <div class="col-12 my-2  pt-3  col-md-6 border-right ">
                            <div class="question text-smaller main-color">أزاي اقيم المنتج
                                ده؟</div>
                            <div class="answer text-small">لو اشتريت منتج من كيان و ممكن
                                تدخل علي "الطلبات" وبعدين تدوس علي
                                "تقديم تقييم"</div>

                            <div class="question text-smaller main-color">أزاي بتتحسب
                                التقيمات؟</div>
                            <div class="answer text-small">التقيمات من عملاء كيان الذين
                                اشترو المنتج وكتبو تقييم</div>

                        </div>

                        <!-- reviews postes -->
                        <div id="users-review-details" class="w-100 text-normal">

                            <!-- review comment start -->

                            @include('site.partials.users_review_details')
                            {{-- @foreach ($users_review_details as $review )
                            <div class=" d-flex flex-wrap d-flex review my-4 justify-content-center text-start  ">

                                <div class="col-3 col-md-1 d-flex justify-content-center align-items-center mr-3">
                                    <img src="{{ asset('website_assets/imgs/productdetails/gir.jpg') }}" alt
                                        class="rounded-circle review-image">
                                </div>
                                <div class="col-12 col-md-7 px-3 align-content-center align-content-md-start">
                                    <div class="review-customer-name py-2 ">{{ $review->user->firstName . '
                                        ' .
                                        $review->user->lastName }}</div>

                                    <div class="text-success">
                                        @for ($i = 1; $i <= 5; $i++) @if ($i <=$review->star_rating)
                                            <i class="fa-solid fa-star"></i>
                                            @elseif ($i - 0.5 === $review->star_rating)
                                            <i class="fa-solid fa-star-half-stroke flip"></i>
                                            @else
                                            <i class="fa-regular fa-star"></i>
                                            @endif
                                            @endfor
                                    </div>

                                    <div class="review-customer-review py-1"> {{ $review->comments }}
                                    </div>
                                    <div class="review-date text-muted text-xsmall">{{
                                        $review->created_at->format('Y-m-d') }}</div>
                                </div>
                                <div class="col-12 col-md d-flex justify-content-end align-items-end">
                                    <div class="review-customer-name text-success ">
                                        <i class="fa-solid fa-circle-check "></i>
                                        طلبية مؤكدة
                                    </div>
                                </div>
                            </div>

                            @endforeach --}}
                            <!-- review comment ens -->


                        </div>
                        <!-- review pagination controllers -->
                        <div class="text-small d-flex justify-content-center align-content-center w-100 mt-5 px-3">
                            <div class="d-flex  justify-content-center mt-5 pt-3">
                                @if ($users_review_details->hasMorePages())
                                <button id="load-more-btn" class="px-5 py-2 bg-transparent border">
                                    <i class="fas fa-chevron-right ml-2"></i>
                                    مشاهدة تقييمات اكثر
                                </button>
                                @endif
                                {{-- <button class="mx-3 px-5 py-2  bg-transparent border">
                                    الصفحة الجاية
                                    <i class="fas fa-chevron-left mr-2"></i>
                                </button> --}}
                            </div>


                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- End Tabs -->

    <!-- fast order -->
    @if($productSetting->quick_request == true)

    @if ($productDetails->quick_request == true)
    <div id="fast-order" class="d-flex flex-column flex-lg-row align-items-center text-start pb-5">

        <div class="col-12  col-lg-4 d-flex flex-nowrap flex-column mt-5 mb-1">

            <p class="main-color text-bold text-xlarge pl-5">اطلب علي السريع</p>
            <h6>الأن يمكنك طلب المنتج عبر السوشيل ميديا</h6>
            <div class=" py-1 d-flex align-items-centers">
                <i class="fa-solid fa-circle-info main-color  px-2"></i>
                <h6>هذا الاختيار لطلب منتج واحد فقط</h6>
            </div>
        </div>

        <div class="col-8 d-flex justify-content-center justify-content-lg-start flex-wrap my-4">

            <button class="bg-add-to-cart px-5 m-2 py-2"><a href="{{$face_book}}">اطلب عبر الفيسبوك</a> <img
                    src="{{ asset('website_assets/imgs/social media/facebook.svg') }}" alt class="social-icon">
            </button>
            <button class="bg-add-to-cart px-5 m-2 py-2"><a href="{{$whatsapp}}">اطلب عبر الواتساب</a> <img
                    src="{{ asset('website_assets/imgs/social media/whatsapp.svg') }}" alt class="social-icon">
            </button>

        </div>

    </div>
    @endif
    @endif

    <div id="share-product" class="d-flex flex-column align-items-center pt-5">
        <h5>مشاركة هذا المنتج</h5>
        <div> <a href="https://wa.me/?text={{ urlencode($shareUrl) }}" class="text-decoration-none">
                <img src="{{ asset('website_assets/imgs/icons/whatsapp.png') }}">
            </a>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($shareUrl) }}" target="_blank"
                class="text-decoration-none">
                <img src="{{ asset('website_assets/imgs/icons/facebook.png') }}">
            </a>
            <a href="https://www.instagram.com" class="text-decoration-none">
                <img src="{{ asset('website_assets/imgs/icons/instagram.png') }}">
            </a>
            <a href="https://twitter.com/intent/tweet?url={{ urlencode($shareUrl) }}&text=Check%20out%20this%20product"
                target="_blank" class="text-decoration-none">
                <img src="{{ asset('website_assets/imgs/icons/twitter.png') }}">
            </a>
        </div>
    </div>

</section>

<!-- samiler products -->
<section id="semilar-products" class="container-fluid product-card">
    <div class="row pt-5 px-4 text-start">
        <div class="col-12">

            <h4>مزيد من المنتجات من هذا البائع</h4>

            <div class="card-deck d-flex flex-wrap px-2">

                <!-- product card start  -->
                @if($vendors_products)

                @foreach ($vendors_products as $product)
                @php
                $reviewsCount = $product->reviews()->count();
                $averageStarRating = $product->reviews()->avg('star_rating');
                $averageStarRating = round($averageStarRating, 2);
                @endphp
                <div class="card mt-4 text-start">
                    <div class="position-relative">
                        <div class="position-absolute w-100 p-3 item-assets ">

                            <ul class="list-unstyled">
                                <li>
                                    <button class="add-to-fav">
                                        <i class="fa fa-heart" addToWishlist" data-product-id="{{ $product->id }}"
                                            aria-hidden="true"></i>
                                    </button>
                                </li>

                                <li>
                                    <button>
                                        <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                    </button>
                                </li>

                                <li>
                                    <button>
                                        <i class="fa fa-exchange addTocomparelist" data-product-id="{{ $product->id }}"
                                            aria-hidden="true"></i>
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

                        <p class="card-title"><a href="{{ route('Site.product',$product->name ) }}">{{
                                $product->name}}</a>
                        </p>
                        <div class="d-flex row no-gutters justify-content-between">
                            <span class="px-1 text-bold"><a href="{{ route('Site.product',$product->name ) }}">{{
                                    $product->new_price }}</a> جنيه</span>
                            <div class="d-flex justify-content-end ">
                                <div class="star-rating d-flex align-items-center  text-small">
                                    <span id="rating-score">{{ $averageStarRating ?? 0 }}</span>
                                    <i class="fa-solid text-smaller fa-star"></i>
                                </div>
                                <span id="product-review-count" class="mx-1">({{ $reviewsCount ?? 0 }})</span>
                            </div>
                        </div>

                        <div id="before-price" class=" my-3 row">
                            <span class="text-crossed  px-1"><a href="{{ route('Site.product',$product->name ) }}">{{
                                    $product->old_price }}</a> جنيه</span>

                            <div class="text-success text-bold d-flex"><span>خصم</span>
                                <span id="save-quantity">{{ number_format((($product->old_price - $product->new_price) /
                                    $product->old_price) * 100, 2, '.', '') }}</span>
                                <span>%</span>
                            </div>
                        </div>

                        <div class="  border-dotted p-2 text-bold">

                            {{ $product->created_at->diffInDays(now()) < 10 ? 'جديد' : 'موجود منذ فتره' }} </div>
                        </div>
                        <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                            أضف إلى العربة
                        </button>
                    </div>
                    @endforeach
                    @endif



                </div>
            </div>
        </div>

</section>
<!-- related products -->
<section id="semilar-products" class="container-fluid product-card">
    <div class="row my-5 pt-5 px-4 text-start">
        <div class="col-12">

            <h4>منتجات ذات صلة</h4>

            <div class="card-deck d-flex flex-wrap px-2">

                <!-- product card start  -->

                @if($related_products)

                @foreach ($related_products as $product)
                @php
                $reviewsCount = $product->reviews()->count();
                $averageStarRating = $product->reviews()->avg('star_rating');
                $averageStarRating = round($averageStarRating, 2);
                @endphp
                <div class="card mt-4 text-start">
                    <div class="position-relative">
                        <div class="position-absolute w-100 p-3 item-assets ">

                            <ul class="list-unstyled">
                                <li>
                                    <button class="add-to-fav">
                                        <i class="fa fa-heart" addToWishlist" data-product-id="{{ $product->id }}"
                                            aria-hidden="true"></i>
                                    </button>
                                </li>

                                <li>
                                    <button>
                                        <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                    </button>
                                </li>

                                <li>
                                    <button>
                                        <i class="fa fa-exchange addTocomparelist" data-product-id="{{ $product->id }}"
                                            aria-hidden="true"></i>
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

                        <p class="card-title"><a href="{{ route('Site.product',$product->name ) }}">{{
                                $product->name}}</a>
                        </p>
                        <div class="d-flex row no-gutters justify-content-between">
                            <span class="px-1 text-bold"><a href="{{ route('Site.product',$product->name ) }}">{{
                                    $product->new_price }}</a> جنيه</span>
                            <div class="d-flex justify-content-end ">
                                <div class="star-rating d-flex align-items-center  text-small">
                                    <span id="rating-score">{{ $averageStarRating ?? 0 }}</span>
                                    <i class="fa-solid text-smaller fa-star"></i>
                                </div>
                                <span id="product-review-count" class="mx-1">({{ $reviewsCount ?? 0 }})</span>
                            </div>
                        </div>



                        <div id="before-price" class=" my-3 row">
                            <span class="text-crossed  px-1"><a href="{{ route('Site.product',$product->name ) }}">{{
                                    $product->old_price }}</a> جنيه</span>

                            <div class="text-success text-bold d-flex"><span>خصم</span>
                                <span id="save-quantity">{{ number_format((($product->old_price - $product->new_price) /
                                    $product->old_price) * 100, 2, '.', '') }}</span>
                                <span>%</span>
                            </div>
                        </div>

                        <div class="  border-dotted p-2 text-bold">

                            {{ $product->created_at->diffInDays(now()) < 10 ? 'جديد' : 'موجود منذ فتره' }} </div>
                        </div>
                        <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">
                            أضف إلى العربة
                        </button>
                    </div>
                    @endforeach
                    @endif





                </div>
            </div>
        </div>

        {{-- //favorites --}}
        @include('site.includes.first_add_to_favorite_modal')
        @include('site.includes.exist_same_product_in_favorites_modal')
        {{-- //compares --}}
        @include('site.includes.first_add_to_compare_modal')
        @include('site.includes.exist_same_product_in_compares_modal')
        @include('site.includes.max_products_in_compares')
        {{-- //carts --}}
        @include('site.includes.first_add_to_cart_modal')
        @include('site.includes.exist_same_product_in_carts_modal')



</section>


@endsection

@push('scripts')
<script>
    // تحميل ريفيوهات اكتر في صفحة المنتج نفسه
    var nextPage = {{ $users_review_details->currentPage() + 1 }};
    var lastPage = {{ $users_review_details->lastPage() }};
    var loadMoreBtn = document.getElementById('load-more-btn');
    var usersReviewDetailsContainer = document.getElementById('users-review-details');

    loadMoreBtn.addEventListener('click', function() {
        if (nextPage <= lastPage) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '?page=' + nextPage, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var response = xhr.responseText;
                    var parser = new DOMParser();
                    var newContent = parser.parseFromString(response, 'text/html');
                    var newReviews = newContent.getElementById('users-review-details').innerHTML;
                    usersReviewDetailsContainer.innerHTML += newReviews;
                    nextPage++;
                    if (nextPage > lastPage) {
                        loadMoreBtn.style.display = 'none';
                    }
                }
            };
            xhr.send();
        }
    });
</script>
@endpush
