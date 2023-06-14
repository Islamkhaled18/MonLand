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

        </div>

        <div class="owl-carousel owl-theme todayDeal mt-4">
            @if ($dealOfDay_products)
            @foreach ($dealOfDay_products as $product )

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
                                    <i class="fa fa-heart addToWishlist" data-product-id="{{ $product->id }}"
                                        aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt " aria-hidden="true"></i>
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

                    <p class="card-title"><a href="{{ route('Site.product',$product->name ) }}">{{ $product->name}}</a>
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

                    @if ($product->colors->count() > 0 || $product->sizes->count() > 0)

                    <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">

                        <a href="{{ route('Site.product',$product->name) }}">اضف الى العربه</a>
                    </button>
                    @else

                    <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2 addToCart"
                        data-product-id="{{ $product->id }}">
                        أضف إلى العربة
                    </button>
                    @endif

                </div>
                {{-- modal --}}

                {{-- @include('site.includes.product-details',$product) --}}
                @endforeach

                @endif


            </div>
        </div>
    </div>
</div>
<!-- Today Deal -->


<!-- Start Electronics -->
<div class="today-deal py-4 pb-5">

    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="text-right"> الكترونيات</h2>
            @php
            $main_category = \App\Models\MainCategory::where('name','إلكترونيات')->first();
            @endphp
            <button class=" btn bg-main text-white text-bold mx-2 my-3  py-2 px-4">
                <a href="{{ route('mainCategory.products',$main_category->name) }}">عرض الكل</a>

            </button>
        </div>
        <div class="overflow-auto">
            <div class="row flex-nowrap">
                @if ($electronics_products_photos)
                @foreach ($electronics_products_photos as $electronics_products_photo)

                <div class="col-md-2 col-4">
                    <img src="{{ $electronics_products_photo->images[0]->photo ? asset($electronics_products_photo->images[0]->photo) : asset('images/default.png') }}"
                        alt="{{ $electronics_products_photo->name }}" title="{{ $electronics_products_photo->name }}"
                        class="w-100">
                </div>

                @endforeach
                @endif

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
            @php
            $main_category = \App\Models\MainCategory::where('name','إلكترونيات')->first();
            @endphp
            <button class=" btn bg-main text-white text-bold mx-2 my-3  py-2 px-4">
                <a href="{{ route('mainCategory.products',$main_category->name) }}">عرض الكل</a>

            </button>

        </div>
        <div class="owl-carousel owl-theme todayDeal mt-4">

            @if ($electronics_products)
            @foreach ($electronics_products as $product )

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
                                    <i class="fa fa-heart addToWishlist" data-product-id="{{ $product->id }}"
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

                    <p class="card-title"> <a href="{{ route('Site.product',$product->name ) }}">{{ $product->name}}</a>
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

                    @if ($product->colors->count() > 0 || $product->sizes->count() > 0)

                    <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">

                        <a href="{{ route('Site.product',$product->name) }}">اضف الى العربه</a>
                    </button>
                    @else

                    <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2 addToCart"
                        data-product-id="{{ $product->id }}">
                        أضف إلى العربة
                    </button>
                    @endif

                </div>
                @endforeach

                @endif


            </div>



        </div>
    </div>
</div>
<!-- End Electronics Offer -->


<div class="banners py-5">
    <div class="container-fluid">
        <div class="row">
            @foreach ($banners as $banner)

            <div class="col-4">
                <img src="{{$banner->image_url }}" title="{{$banner->name }}" alt="{{$banner->name }}"
                    class="w-100 h-100" />
            </div>
            @endforeach

        </div>
    </div>
</div>


<!-- Start Men Fashion -->
<div class="today-deal py-4 pb-5">

    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="text-right"> أزياء الرجال</h2>
            @php
            $main_category = \App\Models\MainCategory::where('name','أزياء الرجال')->first();
            @endphp
            <button class=" btn bg-main text-white text-bold mx-2 my-3  py-2 px-4">
                <a href="{{ route('mainCategory.products',$main_category->name) }}">عرض الكل</a>

            </button>

        </div>

        <div class="overflow-auto">
            <div class="row flex-nowrap">
                @if($men_products_photos)
                @foreach ($men_products_photos as $men_products_photo)

                <div class="col-4 col-md-2">
                    <img src="{{ $men_products_photo->images[0]->photo ? asset($men_products_photo->images[0]->photo) : asset('images/default.png') }}"
                        alt="{{ $men_products_photo->name }}" title="{{ $men_products_photo->name }}" height="200"
                        class="w-100">
                </div>
                @endforeach
                @else
                <div class="col-4 col-md-2">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                @endif

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
            @php
            $main_category = \App\Models\MainCategory::where('name','أزياء الرجال')->first();
            @endphp
            <button class=" btn bg-main text-white text-bold mx-2 my-3  py-2 px-4">
                <a href="{{ route('mainCategory.products',$main_category->name) }}">عرض الكل</a>

            </button>
        </div>
        <div class="owl-carousel owl-theme todayDeal mt-4">
            @if ($men_products)
            @foreach ($men_products as $product )

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
                                    <i class="fa fa-heart addToWishlist" data-product-id="{{ $product->id }}"
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

                    <p class="card-title"><a href="{{ route('Site.product',$product->name ) }}">{{ $product->name }}</a>

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold"><a href="{{ route('Site.product',$product->name ) }}">{{
                                $product->new_price }}</a> جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">{{ $averageStarRating }}</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">({{ $reviewsCount }})</span>
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

                    @if ($product->colors->count() > 0 || $product->sizes->count() > 0)

                    <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">

                        <a href="{{ route('Site.product',$product->name) }}">اضف الى العربه</a>
                    </button>
                    @else

                    <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2 addToCart"
                        data-product-id="{{ $product->id }}">
                        أضف إلى العربة
                    </button>
                    @endif
                </div>
                @endforeach

                @endif
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
            @php
            $main_category = \App\Models\MainCategory::where('name','أزياء النساء')->first();
            @endphp
            <button class=" btn bg-main text-white text-bold mx-2 my-3  py-2 px-4">
                <a href="{{ route('mainCategory.products',$main_category->name) }}">عرض الكل</a>

            </button>
        </div>


        <div class="overflow-auto">
            <div class="row flex-nowrap">
                @if($women_products_photos)
                @foreach ($women_products_photos as $women_products_photo)

                <div class="col-4 col-md-2">
                    <img src="{{ $women_products_photo->images[0]->photo ? asset($women_products_photo->images[0]->photo) : asset('images/default.png') }}"
                        alt="{{ $women_products_photo->name }}" title="{{ $women_products_photo->name }}" height="200"
                        class="w-100">
                </div>
                @endforeach
                @else
                <div class="col-4 col-md-2">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                @endif
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
            @php
            $main_category = \App\Models\MainCategory::where('name','أزياء النساء')->first();
            @endphp
            <button class=" btn bg-main text-white text-bold mx-2 my-3  py-2 px-4">
                <a href="{{ route('mainCategory.products',$main_category->name) }}">عرض الكل</a>

            </button>
        </div>
        <div class="owl-carousel owl-theme todayDeal mt-4">
            @if ($women_products)
            @foreach ($women_products as $product )

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
                                    <i class="fa fa-heart addToWishlist" data-product-id="{{ $product->id }}"
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

                    <p class="card-title"><a href="{{ route('Site.product',$product->name ) }}">{{ $product->name }}</a>

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
                            <span id="save-quantity">{{ number_format((($product->old_price -
                                $product->new_price) /
                                $product->old_price) * 100, 2, '.', '') }}</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">
                        {{ $product->created_at->diffInDays(now()) < 10 ? 'جديد' : 'موجود منذ فتره' }} </div>
                    </div>

                    @if ($product->colors->count() > 0 || $product->sizes->count() > 0)

                    <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">

                        <a href="{{ route('Site.product',$product->name) }}">اضف الى العربه</a>
                    </button>
                    @else

                    <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2 addToCart"
                        data-product-id="{{ $product->id }}">
                        أضف إلى العربة
                    </button>
                    @endif

                </div>
                @endforeach



                @endif
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
            @php
            $main_category = \App\Models\MainCategory::where('name','الجمال')->first();
            @endphp
            <button class=" btn bg-main text-white text-bold mx-2 my-3  py-2 px-4">
                <a href="{{ route('mainCategory.products',$main_category->name) }}">عرض الكل</a>

            </button>
        </div>
        <div class="overflow-auto">
            <div class="row flex-nowrap">
                @if($beauty_products_photos)
                @foreach ($beauty_products_photos as $beauty_products_photo)

                <div class="col-4 col-md-2">
                    <img src="{{ $beauty_products_photo->images[0]->photo ? asset($beauty_products_photo->images[0]->photo) : asset('images/default.png') }}"
                        alt="{{ $beauty_products_photo->name }}" title="{{ $beauty_products_photo->name }}" height="200"
                        class="w-100">
                </div>
                @endforeach
                @else
                <div class="col-4 col-md-2">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                @endif
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
            @php
            $main_category = \App\Models\MainCategory::where('name','اكسسوارات')->first();
            @endphp
            <button class=" btn bg-main text-white text-bold mx-2 my-3  py-2 px-4">
                <a href="{{ route('mainCategory.products',$main_category->name) }}">عرض الكل</a>

            </button>
        </div>
        <div class="overflow-auto">
            <div class="row flex-nowrap">
                @if($accessories_products_photos)
                @foreach ($accessories_products_photos as $accessories_products_photo)

                <div class="col-4 col-md-2">
                    <img src="{{ $accessories_products_photo->images[0]->photo ? asset($accessories_products_photo->images[0]->photo) : asset('images/default.png') }}"
                        alt="{{ $accessories_products_photo->name }}" title="{{ $accessories_products_photo->name }}"
                        height="200" class="w-100">
                </div>
                @endforeach
                @else
                <div class="col-4 col-md-2">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                @endif
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
            @php
            $main_category = \App\Models\MainCategory::where('name','اكسسوارات')->first();
            @endphp
            <button class=" btn bg-main text-white text-bold mx-2 my-3  py-2 px-4">
                <a href="{{ route('mainCategory.products',$main_category->name) }}">عرض الكل</a>

            </button>
        </div>
        <div class="owl-carousel owl-theme todayDeal mt-4">

            @if ($accessories_products)
            @foreach ($accessories_products as $product )

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
                                    <i class="fa fa-heart addToWishlist" data-product-id="{{ $product->id }}"
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
                            <li data-target="#product-card-indicators" data-slide-to="0" class="active">
                            </li>
                            <li data-target="#product-card-indicators" data-slide-to="1" class="border">
                            </li>
                            <li data-target="#product-card-indicators" data-slide-to="2" class="border">
                            </li>
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

                    <p class="card-title"><a href="{{ route('Site.product',$product->name ) }}">{{ $product->name }}</a>

                    </p>
                    <div class="d-flex row no-gutters justify-content-between">
                        <span class="px-1 text-bold"><a href="{{ route('Site.product',$product->name ) }}">{{
                                $product->new_price }}</a> جنيه</span>
                        <div class="d-flex justify-content-end ">
                            <div class="star-rating d-flex align-items-center  text-small">
                                <span id="rating-score">{{ $averageStarRating ??0 }}</span>
                                <i class="fa-solid text-smaller fa-star"></i>
                            </div>
                            <span id="product-review-count" class="mx-1">({{ $reviewsCount ?? 0 }})</span>
                        </div>
                    </div>


                    <div id="before-price" class=" my-3 row">
                        <span class="text-crossed  px-1"><a href="{{ route('Site.product',$product->name ) }}">{{
                                $product->old_price }}</a> جنيه</span>

                        <div class="text-success text-bold d-flex"><span>خصم</span>
                            <span id="save-quantity">{{ number_format((($product->old_price -
                                $product->new_price) /
                                $product->old_price) * 100, 2, '.', '') }}</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">
                        {{ $product->created_at->diffInDays(now()) < 10 ? 'جديد' : 'موجود منذ فتره' }} </div>
                    </div>
                    @if ($product->colors->count() > 0 || $product->sizes->count() > 0)

                    <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">

                        <a href="{{ route('Site.product',$product->name) }}">اضف الى العربه</a>
                    </button>
                    @else

                    <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2 addToCart"
                        data-product-id="{{ $product->id }}">
                        أضف إلى العربة
                    </button>
                    @endif
                </div>
                @endforeach
                @endif

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

        </div>
        <div class="owl-carousel owl-theme todayDeal mt-4">

            @if ($best_sellings)
            @foreach ($best_sellings as $product )


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
                                    <i class="fa fa-heart addToWishlist" data-product-id="{{ $product->id }}"
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
                            <li data-target="#product-card-indicators" data-slide-to="0" class="active">
                            </li>
                            <li data-target="#product-card-indicators" data-slide-to="1" class="border">
                            </li>
                            <li data-target="#product-card-indicators" data-slide-to="2" class="border">
                            </li>
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

                    <p class="card-title"><a href="{{ route('Site.product',$product->name ) }}">{{ $product->name }}</a>

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
                            <span id="save-quantity">{{ number_format((($product->old_price -
                                $product->new_price) /
                                $product->old_price) * 100, 2, '.', '') }}</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">
                        {{ $product->created_at->diffInDays(now()) < 10 ? 'جديد' : 'موجود منذ فتره' }} </div>
                    </div>

                    @if ($product->colors->count() > 0 || $product->sizes->count() > 0)

                    <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">

                        <a href="{{ route('Site.product',$product->name) }}">اضف الى العربه</a>
                    </button>
                    @else

                    <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2 addToCart"
                        data-product-id="{{ $product->id }}">
                        أضف إلى العربة
                    </button>
                    @endif

                </div>
                @endforeach

                @endif

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
            @php
            $main_category = \App\Models\MainCategory::where('name','البيت والمطبخ')->first();
            @endphp
            <button class=" btn bg-main text-white text-bold mx-2 my-3  py-2 px-4">
                <a href="{{ route('mainCategory.products',$main_category->name) }}">عرض الكل</a>

            </button>
        </div>
        <div class="overflow-auto">
            <div class="row flex-nowrap">
                @if($home_products_photos)
                @foreach ($home_products_photos as $home_products_photo)

                <div class="col-4 col-md-2">
                    <img src="{{ $home_products_photo->images[0]->photo ? asset($home_products_photo->images[0]->photo) : asset('images/default.png') }}"
                        alt="{{ $home_products_photo->name }}" title="{{ $home_products_photo->name }}" height="200"
                        class="w-100">
                </div>
                @endforeach
                @else
                <div class="col-4 col-md-2">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- End Home and Kitchen  -->

<!-- Start Home And Kitchen Offers -->
<div class="today-deal py-4 pb-5">

    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="text-right"> عروض البيت والمطبخ</h2>
            @php
            $main_category = \App\Models\MainCategory::where('name','البيت والمطبخ')->first();
            @endphp
            <button class=" btn bg-main text-white text-bold mx-2 my-3  py-2 px-4">
                <a href="{{ route('mainCategory.products',$main_category->name) }}">عرض الكل</a>

            </button>
        </div>
        <div class="owl-carousel owl-theme todayDeal mt-4">
            @if ($home_products)
            @foreach ($home_products as $product )


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
                                    <i class="fa fa-heart addToWishlist" data-product-id="{{ $product->id }}"
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

                    <p class="card-title"><a href="{{ route('Site.product',$product->name ) }}">{{ $product->name }}</a>

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
                            <span id="save-quantity">{{ number_format((($product->old_price -
                                $product->new_price) /
                                $product->old_price) * 100, 2, '.', '') }}</span>
                            <span>%</span>
                        </div>
                    </div>

                    <div class="  border-dotted p-2 text-bold">
                        {{ $product->created_at->diffInDays(now()) < 10 ? 'جديد' : 'موجود منذ فتره' }} </div>
                    </div>

                    @if ($product->colors->count() > 0 || $product->sizes->count() > 0)

                    <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2">

                        <a href="{{ route('Site.product',$product->name) }}">اضف الى العربه</a>
                    </button>
                    @else

                    <button class=" btn bg-main text-white text-bold mx-2 my-3  py-1 px-2 addToCart"
                        data-product-id="{{ $product->id }}">
                        أضف إلى العربة
                    </button>
                    @endif

                </div>
                @endforeach



                @endif
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
                <a href="{{ route('Site.allCategory') }}">عرض الكل</a>

            </button>
        </div>
        <div class="overflow-auto">
            <div class="row flex-nowrap">
                @if($new_products)
                @foreach ($new_products as $new_product)

                <div class="col-4 col-md-2">
                    <img src="{{ $new_product->images[0]->photo ? asset($new_product->images[0]->photo) : asset('images/default.png') }}"
                        alt="{{ $new_product->name }}" title="{{ $new_product->name }}" height="200" class="w-100">
                </div>
                @endforeach
                @else
                <div class="col-4 col-md-2">
                    <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100">
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- End More Cats  -->

<div class="bg-light py-5">
    <div class="container-fluid">
        <h1 class="text-center">تسوق حسب الماركة</h1>
        <div class="row mt-5">
            @if($ads)

            @foreach ($ads as $ad )

            <div class="col-md-3 col-4 mt-4">
                <img src="{{$ad->image_url }}" title="{{$ad->name }}" alt="{{$ad->name }}" height="250" class="w-100" />
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



@endsection



@push('scripts')

<script>
    $(document).on('click', '.quick-view', function () {
        $('.quickview-modal-product-details-' + $(this).attr('data-product-id')).css("display", "block");
    });
    $(document).on('click', '.close', function () {
        $('.quickview-modal-product-details-' + $(this).attr('data-product-id')).css("display", "none");

    });




    function generateUUID() {
        return uuid.v4();
      }

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

</script>
@endpush
