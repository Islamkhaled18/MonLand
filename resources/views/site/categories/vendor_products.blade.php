@extends('layouts.site.app')

@section('title')

- منتجات البائع
@endsection

@section('content')

<!-- samiler products -->
<section id="semilar-products" class="container">
    <div class="row my-5 pt-5">
        <div class="col-12">
            <div class="p-2 text-white card-deck-title text-right">
                <p>مزيد من المنتجات من هذا البائع</p>
            </div>

            <div class="bg-light pt-4">
                <div class="info-section border border-secondary border-top-0 d-flex flex-row  flex-wrap ">

                    <div class="col-6 col-md-4 no-gutters border-secondary border-top py-1">
                        <div class="table-header text-larger text-center py-1">
                            <i class="fa-solid fa-rotate-left main-color"></i>
                        </div>
                        <div class="border-top border-secondary d-block text-start px-2">
                            <p>لا يمكن استبدال او ارجاع هذا المنتج</p>
                            <p></p>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 no-gutters border-secondary border-top py-1">
                        <div class="table-header text-larger text-center py-1">
                            <i class="fa-solid fa-truck-fast main-color"></i>
                        </div>
                        <div class="border-top border-secondary d-block text-start px-2">
                            <p class="text-large">شحن موثوق به</p>
                            <p>كل شحنه لها مصاريف شحن خاصة بها علي حسب عروض البائع</p>
                            <a href="#" class="main-color font-weight-bold">معرفه المزيد</a>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 no-gutters border-secondary border-top border-left-0 py-1">
                        <div class="table-header text-larger text-center py-1">
                            <i class="fa-solid fa-shield main-color"></i>
                        </div>
                        <div class="border-top border-secondary d-block text-start px-2">
                            <p class="text-large">تسوق امن</p>
                            <p class="">بياناتك محمية دائما</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-3 text-right pr-0">
                <div>
                    <h6 class="font-weight-bold">عرض</h6>
                    <hr />
                    <form>
                        <div class="d-flex align-items-center">
                            <input type="radio" name="offers" id="all-products" class="position-relative" />
                            <label for="all-products" class="mr-2">كل المنتجات</label>
                        </div>
                        <div class="d-flex align-items-center">
                            <input type="radio" name="offers" id="all-offers" />
                            <label for="all-offers" class="mr-2">العروض فقط</label>

                        </div>
                    </form>
                </div>

                <div class="my-4">
                    <h6 class="font-weight-bold">السعر</h6>
                    <hr />
                    <form class="multi-range-field my-2">
                        <input id="multi" class="multi-range" type="range" min="0" max="100" value="0" />
                        <div class="mt-2">
                            <span>السعر</span>
                            <span id="price">0</span>
                        </div>
                    </form>
                </div>

                <div>
                    <h6 class="font-weight-bold">اللون</h6>
                    <hr />
                    <div class="d-flex available-colors flex-nowrap">
                        <div class="bg-danger"></div>
                        <div class="bg-warning"></div>
                        <div class="bg-success"></div>
                    </div>
                </div>

                <div class="my-4">
                    <h6 class="font-weight-bold">المقاس</h6>
                    <hr />
                    <form>
                        <div class="row align-items-center">
                            <div class="col-6 d-flex align-items-center">
                                <input type="radio" name="size" id="all-sizes" class="position-relative" />
                                <label for="all-sizes" class="mr-2 mb-0">الكل</label>
                            </div>
                            <div class="col-6 d-flex align-items-center">
                                <input type="radio" name="size" id="small" class="position-relative" />
                                <label for="small" class="mr-2 mb-0">s</label>
                            </div>
                            <div class="col-6 d-flex align-items-center mt-3">
                                <input type="radio" name="size" id="xl" class="position-relative" />
                                <label for="xl" class="mr-2 mb-0">xl</label>
                            </div>
                            <div class="col-6 d-flex align-items-center mt-3">
                                <input type="radio" name="size" id="xxl" class="position-relative" />
                                <label for="xxl" class="mr-2 mb-0">xxl</label>
                            </div>
                            <div class="col-6 d-flex align-items-center mt-3">
                                <input type="radio" name="size" id="41" class="position-relative" />
                                <label for="41" class="mr-2 mb-0">41</label>
                            </div>
                            <div class="col-6 d-flex align-items-center mt-3">
                                <input type="radio" name="size" id="43" class="position-relative" />
                                <label for="43" class="mr-2 mb-0">43</label>
                            </div>
                        </div>

                    </form>
                </div>
                <div>
                    <h6 class="font-weight-bold">الماركة</h6>
                    <hr />
                    <form>
                        <div class="d-flex align-items-center">
                            <input type="radio" name="brand" id="all-brands" class="position-relative" />
                            <label for="all-brands" class="mr-2">الكل </label>
                        </div>
                        <div class="d-flex align-items-center">
                            <input type="radio" name="brand" id="brand-1" />
                            <label for="brand-1" class="mr-2">ماركة 1</label>
                        </div>

                        <div class="d-flex align-items-center">
                            <input type="radio" name="brand" id="brand-2" />
                            <label for="brand-2" class="mr-2">ماركة 2</label>
                        </div>
                    </form>
                </div>

                <div class="my-4">
                    <h6 class="font-weight-bold">التقييم</h6>
                    <hr />
                    <form>
                        <div class="d-flex align-items-center">
                            <input type="radio" name="brand" id="four-stars" class="position-relative" />
                            <label for="four-stars" class="mr-2 d-flex justify-content-between">
                                <div class="star-rating ml-3">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star text-light2"></i>
                                </div>
                                <span>أو أعلى</span>
                            </label>
                        </div>

                        <div class="d-flex align-items-center">
                            <input type="radio" name="brand" id="three-stars" class="position-relative" />
                            <label for="three-stars" class="mr-2 d-flex justify-content-between">
                                <div class="star-rating ml-3">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star text-light2"></i>
                                    <i class="fa-solid fa-star text-light2"></i>
                                </div>
                                <span>أو أعلى</span>
                            </label>
                        </div>

                        <div class="d-flex align-items-center">
                            <input type="radio" name="brand" id="two-stars" class="position-relative" />
                            <label for="two-stars" class="mr-2 d-flex justify-content-between">
                                <div class="star-rating ml-3">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star text-light2"></i>
                                    <i class="fa-solid fa-star text-light2"></i>
                                    <i class="fa-solid fa-star text-light2"></i>
                                </div>
                                <span>أو أعلى</span>
                            </label>
                        </div>

                        <div class="d-flex align-items-center">
                            <input type="radio" name="brand" id="one-stars" class="position-relative" />
                            <label for="one-stars" class="mr-2 d-flex justify-content-between">
                                <div class="star-rating ml-3">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star text-light2"></i>
                                    <i class="fa-solid fa-star text-light2"></i>
                                    <i class="fa-solid fa-star text-light2"></i>
                                    <i class="fa-solid fa-star text-light2"></i>
                                </div>
                                <span>أو أعلى</span>
                            </label>
                        </div>



                    </form>
                </div>

                <div>
                    <h6 class="font-weight-bold">نسبة الخصم</h6>
                    <hr />
                    <form>
                        <div class="d-flex align-items-center">
                            <input type="radio" name="brand" id="all-dis" class="position-relative" />
                            <label for="all-dis" class="mr-2">الكل </label>
                        </div>

                        <div class="d-flex align-items-center">
                            <input type="radio" name="brand" id="five-dis" class="position-relative" />
                            <label for="five-dis" class="mr-2">50% أو أكثر </label>
                        </div>

                        <div class="d-flex align-items-center">
                            <input type="radio" name="brand" id="four-dis" class="position-relative" />
                            <label for="four-dis" class="mr-2">40% أو أكثر </label>
                        </div>

                        <div class="d-flex align-items-center">
                            <input type="radio" name="brand" id="twenty-dis" class="position-relative" />
                            <label for="twenty-dis" class="mr-2">20% أو أكثر </label>
                        </div>

                        <div class="d-flex align-items-center">
                            <input type="radio" name="brand" id="ten-dis" class="position-relative" />
                            <label for="ten-dis" class="mr-2">10% أو أكثر </label>
                        </div>

                    </form>
                </div>

                <div class="my-4">
                    <h6 class="font-weight-bold">تقييم البائع </h6>
                    <hr />
                    <form>
                        <div class="d-flex align-items-center">
                            <input type="radio" name="brand" id="all-seller-rates" class="position-relative" />
                            <label for="all-seller-rates" class="mr-2">الكل </label>
                        </div>

                        <div class="d-flex align-items-center">
                            <input type="radio" name="brand" id="eight-rates" class="position-relative" />
                            <label for="eight-rates" class="mr-2">80% أو أكثر </label>
                        </div>

                        <div class="d-flex align-items-center">
                            <input type="radio" name="brand" id="six-rates" class="position-relative" />
                            <label for="six-rates" class="mr-2">60% أو أكثر </label>
                        </div>

                        <div class="d-flex align-items-center">
                            <input type="radio" name="brand" id="four-rates" class="position-relative" />
                            <label for="four-rates" class="mr-2">40% أو أكثر </label>
                        </div>

                        <div class="d-flex align-items-center">
                            <input type="radio" name="brand" id="twenty-rates" class="position-relative" />
                            <label for="twenty-rates" class="mr-2">20% أو أكثر </label>
                        </div>

                    </form>
                </div>
            </div>



            <div class="col-9">
                <div class="row">
                    <div class="col-12">
                        <div class="row p-2 text-white card-deck-title">
                            <a class="text-white" href="{{route('Site.getVendor',$vendor->id)}}">

                                <p>معلومات اكتر عن التاجر ومنتجاته واراء العملاء</p>
                            </a>
                        </div>

                        <div class="card-deck2 d-flex flex-wrap">

                            @foreach ( $vendors_products as $product )

                            <div class="card mt-4">
                                <div class="position-relative">
                                    <div class="position-absolute w-100 p-3 item-assets">
                                        <div class="badge product-label badge-success px-3 py-2 rounded-0">
                                            الأكثر
                                        </div>
                                        <ul class="list-unstyled position-absolute">
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

                                        <form action="{{route('cart.store')}}" method="POST">
                                            @csrf

                                            <button type="submit" name="product_id" value="{{$product->id}}" class="add-to-cart btn py-1 px-2">
                                                أضف إلى العربة
                                            </button>
                                        </form>
                                    </div>
                                    <img class="card-img-top" src="{{$product ->images[0]->photo ?? asset('images/default.png')}}" alt="{{$product->name}}" />
                                </div>

                                <div class="card-body text-center">
                                    <h5 class="card-title">{{$product->name}}</h5>
                                    <h5>{{$product->price }} جنيه</h5>
                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>
                </div>

                {{-- <div class="row">
                    <div class="col-12">
                        <div class="card-deck2 d-flex flex-wrap">
                            <div class="card mt-4">
                                <div class="position-relative">
                                    <div class="position-absolute w-100 p-3 item-assets">
                                        <div class="badge product-label badge-success px-3 py-2 rounded-0">
                                            الأكثر
                                        </div>
                                        <ul class="list-unstyled position-absolute">
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

                                        <button class="add-to-cart btn py-1 px-2">
                                            أضف إلى العربة
                                        </button>
                                    </div>
                                    <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" alt="Card image cap" />
            </div>

            <div class="card-body text-center">
                <h5 class="card-title">هذا النص هو مثال ....</h5>
                <h5>70 جنيه</h5>
            </div>
        </div>

        <div class="card mt-4">
            <div class="position-relative">
                <div class="position-absolute w-100 p-3 item-assets">
                    <div class="badge product-label badge-primary px-3 py-2 rounded-0">
                        متميز
                    </div>
                    <ul class="list-unstyled position-absolute">
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

                    <button class="add-to-cart btn py-1 px-2">
                        أضف إلى العربة
                    </button>
                </div>
                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" alt="Card image cap" />
            </div>

            <div class="card-body text-center">
                <h5 class="card-title">هذا النص هو مثال ....</h5>
                <h5>70 جنيه</h5>
            </div>
        </div>

        <div class="card mt-4">
            <div class="position-relative">
                <div class="position-absolute w-100 p-3 item-assets">
                    <div class="badge product-label badge-success px-3 py-2 rounded-0">
                        الأكثر
                    </div>
                    <ul class="list-unstyled position-absolute">
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

                    <button class="add-to-cart btn py-1 px-2">
                        أضف إلى العربة
                    </button>
                </div>
                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" alt="Card image cap" />
            </div>

            <div class="card-body text-center">
                <h5 class="card-title">هذا النص هو مثال ....</h5>
                <h5>70 جنيه</h5>
            </div>
        </div>

        <div class="card mt-4">
            <div class="position-relative">
                <div class="position-absolute w-100 p-3 item-assets">
                    <div class="badge product-label badge-diff1 px-3 py-2 rounded-0">
                        30%
                    </div>
                    <ul class="list-unstyled position-absolute">
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

                    <button class="add-to-cart btn py-1 px-2">
                        أضف إلى العربة
                    </button>
                </div>
                <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" alt="Card image cap" />
            </div>

            <div class="card-body text-center">
                <h5 class="card-title">هذا النص هو مثال ....</h5>
                <h5>70 جنيه</h5>
            </div>
        </div>
    </div>
    </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card-deck2 d-flex flex-wrap">
                <div class="card mt-4">
                    <div class="position-relative">
                        <div class="position-absolute w-100 p-3 item-assets">
                            <div class="badge product-label badge-success px-3 py-2 rounded-0">
                                الأكثر
                            </div>
                            <ul class="list-unstyled position-absolute">
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

                            <button class="add-to-cart btn py-1 px-2">
                                أضف إلى العربة
                            </button>
                        </div>
                        <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" alt="Card image cap" />
                    </div>

                    <div class="card-body text-center">
                        <h5 class="card-title">هذا النص هو مثال ....</h5>
                        <h5>70 جنيه</h5>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="position-relative">
                        <div class="position-absolute w-100 p-3 item-assets">
                            <div class="badge product-label badge-primary px-3 py-2 rounded-0">
                                متميز
                            </div>
                            <ul class="list-unstyled position-absolute">
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

                            <button class="add-to-cart btn py-1 px-2">
                                أضف إلى العربة
                            </button>
                        </div>
                        <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" alt="Card image cap" />
                    </div>

                    <div class="card-body text-center">
                        <h5 class="card-title">هذا النص هو مثال ....</h5>
                        <h5>70 جنيه</h5>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="position-relative">
                        <div class="position-absolute w-100 p-3 item-assets">
                            <div class="badge product-label badge-success px-3 py-2 rounded-0">
                                الأكثر
                            </div>
                            <ul class="list-unstyled position-absolute">
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

                            <button class="add-to-cart btn py-1 px-2">
                                أضف إلى العربة
                            </button>
                        </div>
                        <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" alt="Card image cap" />
                    </div>

                    <div class="card-body text-center">
                        <h5 class="card-title">هذا النص هو مثال ....</h5>
                        <h5>70 جنيه</h5>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="position-relative">
                        <div class="position-absolute w-100 p-3 item-assets">
                            <div class="badge product-label badge-diff1 px-3 py-2 rounded-0">
                                30%
                            </div>
                            <ul class="list-unstyled position-absolute">
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

                            <button class="add-to-cart btn py-1 px-2">
                                أضف إلى العربة
                            </button>
                        </div>
                        <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" alt="Card image cap" />
                    </div>

                    <div class="card-body text-center">
                        <h5 class="card-title">هذا النص هو مثال ....</h5>
                        <h5>70 جنيه</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card-deck2 d-flex flex-wrap">
                <div class="card mt-4">
                    <div class="position-relative">
                        <div class="position-absolute w-100 p-3 item-assets">
                            <div class="badge product-label badge-success px-3 py-2 rounded-0">
                                الأكثر
                            </div>
                            <ul class="list-unstyled position-absolute">
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

                            <button class="add-to-cart btn py-1 px-2">
                                أضف إلى العربة
                            </button>
                        </div>
                        <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" alt="Card image cap" />
                    </div>

                    <div class="card-body text-center">
                        <h5 class="card-title">هذا النص هو مثال ....</h5>
                        <h5>70 جنيه</h5>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="position-relative">
                        <div class="position-absolute w-100 p-3 item-assets">
                            <div class="badge product-label badge-primary px-3 py-2 rounded-0">
                                متميز
                            </div>
                            <ul class="list-unstyled position-absolute">
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

                            <button class="add-to-cart btn py-1 px-2">
                                أضف إلى العربة
                            </button>
                        </div>
                        <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" alt="Card image cap" />
                    </div>

                    <div class="card-body text-center">
                        <h5 class="card-title">هذا النص هو مثال ....</h5>
                        <h5>70 جنيه</h5>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="position-relative">
                        <div class="position-absolute w-100 p-3 item-assets">
                            <div class="badge product-label badge-success px-3 py-2 rounded-0">
                                الأكثر
                            </div>
                            <ul class="list-unstyled position-absolute">
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

                            <button class="add-to-cart btn py-1 px-2">
                                أضف إلى العربة
                            </button>
                        </div>
                        <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" alt="Card image cap" />
                    </div>

                    <div class="card-body text-center">
                        <h5 class="card-title">هذا النص هو مثال ....</h5>
                        <h5>70 جنيه</h5>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="position-relative">
                        <div class="position-absolute w-100 p-3 item-assets">
                            <div class="badge product-label badge-diff1 px-3 py-2 rounded-0">
                                30%
                            </div>
                            <ul class="list-unstyled position-absolute">
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

                            <button class="add-to-cart btn py-1 px-2">
                                أضف إلى العربة
                            </button>
                        </div>
                        <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" alt="Card image cap" />
                    </div>

                    <div class="card-body text-center">
                        <h5 class="card-title">هذا النص هو مثال ....</h5>
                        <h5>70 جنيه</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card-deck2 d-flex flex-wrap">
                <div class="card mt-4">
                    <div class="position-relative">
                        <div class="position-absolute w-100 p-3 item-assets">
                            <div class="badge product-label badge-success px-3 py-2 rounded-0">
                                الأكثر
                            </div>
                            <ul class="list-unstyled position-absolute">
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

                            <button class="add-to-cart btn py-1 px-2">
                                أضف إلى العربة
                            </button>
                        </div>
                        <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" alt="Card image cap" />
                    </div>

                    <div class="card-body text-center">
                        <h5 class="card-title">هذا النص هو مثال ....</h5>
                        <h5>70 جنيه</h5>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="position-relative">
                        <div class="position-absolute w-100 p-3 item-assets">
                            <div class="badge product-label badge-primary px-3 py-2 rounded-0">
                                متميز
                            </div>
                            <ul class="list-unstyled position-absolute">
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

                            <button class="add-to-cart btn py-1 px-2">
                                أضف إلى العربة
                            </button>
                        </div>
                        <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" alt="Card image cap" />
                    </div>

                    <div class="card-body text-center">
                        <h5 class="card-title">هذا النص هو مثال ....</h5>
                        <h5>70 جنيه</h5>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="position-relative">
                        <div class="position-absolute w-100 p-3 item-assets">
                            <div class="badge product-label badge-success px-3 py-2 rounded-0">
                                الأكثر
                            </div>
                            <ul class="list-unstyled position-absolute">
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

                            <button class="add-to-cart btn py-1 px-2">
                                أضف إلى العربة
                            </button>
                        </div>
                        <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" alt="Card image cap" />
                    </div>

                    <div class="card-body text-center">
                        <h5 class="card-title">هذا النص هو مثال ....</h5>
                        <h5>70 جنيه</h5>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="position-relative">
                        <div class="position-absolute w-100 p-3 item-assets">
                            <div class="badge product-label badge-diff1 px-3 py-2 rounded-0">
                                30%
                            </div>
                            <ul class="list-unstyled position-absolute">
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

                            <button class="add-to-cart btn py-1 px-2">
                                أضف إلى العربة
                            </button>
                        </div>
                        <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" alt="Card image cap" />
                    </div>

                    <div class="card-body text-center">
                        <h5 class="card-title">هذا النص هو مثال ....</h5>
                        <h5>70 جنيه</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card-deck2 d-flex flex-wrap">
                <div class="card mt-4">
                    <div class="position-relative">
                        <div class="position-absolute w-100 p-3 item-assets">
                            <div class="badge product-label badge-success px-3 py-2 rounded-0">
                                الأكثر
                            </div>
                            <ul class="list-unstyled position-absolute">
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

                            <button class="add-to-cart btn py-1 px-2">
                                أضف إلى العربة
                            </button>
                        </div>
                        <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" alt="Card image cap" />
                    </div>

                    <div class="card-body text-center">
                        <h5 class="card-title">هذا النص هو مثال ....</h5>
                        <h5>70 جنيه</h5>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="position-relative">
                        <div class="position-absolute w-100 p-3 item-assets">
                            <div class="badge product-label badge-primary px-3 py-2 rounded-0">
                                متميز
                            </div>
                            <ul class="list-unstyled position-absolute">
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

                            <button class="add-to-cart btn py-1 px-2">
                                أضف إلى العربة
                            </button>
                        </div>
                        <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" alt="Card image cap" />
                    </div>

                    <div class="card-body text-center">
                        <h5 class="card-title">هذا النص هو مثال ....</h5>
                        <h5>70 جنيه</h5>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="position-relative">
                        <div class="position-absolute w-100 p-3 item-assets">
                            <div class="badge product-label badge-success px-3 py-2 rounded-0">
                                الأكثر
                            </div>
                            <ul class="list-unstyled position-absolute">
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

                            <button class="add-to-cart btn py-1 px-2">
                                أضف إلى العربة
                            </button>
                        </div>
                        <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" alt="Card image cap" />
                    </div>

                    <div class="card-body text-center">
                        <h5 class="card-title">هذا النص هو مثال ....</h5>
                        <h5>70 جنيه</h5>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="position-relative">
                        <div class="position-absolute w-100 p-3 item-assets">
                            <div class="badge product-label badge-diff1 px-3 py-2 rounded-0">
                                30%
                            </div>
                            <ul class="list-unstyled position-absolute">
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

                            <button class="add-to-cart btn py-1 px-2">
                                أضف إلى العربة
                            </button>
                        </div>
                        <img class="card-img-top" src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" alt="Card image cap" />
                    </div>

                    <div class="card-body text-center">
                        <h5 class="card-title">هذا النص هو مثال ....</h5>
                        <h5>70 جنيه</h5>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    </div>

    </div>

    <div class="d-flex justify-content-center mt-5 pt-3">
        <nav aria-label=" Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link rounded-circle mx-1" href="#">
                        <i class="fas fa-chevron-right"></i>
                    </a></li>
                <li class="page-item active"><a class="page-link rounded-circle mx-1" href="#">1</a></li>
                <li class="page-item"><a class="page-link rounded-circle mx-1" href="#">2</a></li>
                <li class="page-item"><a class="page-link rounded-circle mx-1" href="#">3</a></li>
                <li class="page-item"><a class="page-link rounded-circle mx-1" href="#">
                        <i class="fas fa-chevron-left"></i>
                    </a></li>
            </ul>
        </nav>
    </div>

    </div>


    @endsection
