@extends('layouts.site.app')

@section('title')

- منتجات القسم {{ $category->name }}
@endsection

@section('content')


<div class="container mt-4 mb-5">
    <div class="page-nav row">
        <a href="{{ route('home') }}" class="text-dark pl-2">
            <i class="fa-solid fa-house-chimney"></i>
        </a>
        <a href="{{route('Site.category',$category->name)}}" class="text-dark">
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
            {{ $category->name }}
        </a>
    </div>
</div>

<div class="first-banner container-fluid px-5 mt-5">
    <img src="{{$category->image_url}}" class="w-100" alt="{{$category->name}}" />
</div>

<div class="container-fluid px-5 my-5">
    <div class="row px-3">
        <div class="col-12 px-0">
            <div class="p-2 text-white card-deck-title text-center">
                <p class="secondary-color">الأقسام</p>
            </div>

            <div class="card-deck2 d-flex flex-wrap bg-light px-3 pb-4">
                @foreach ($allCategories as $all_category)

                <div class="card mt-4 border-0">
                    <div class="position-relative">
                        <img class="card-img-top" src="{{$all_category->image_url}}" alt="{{$all_category->name}}" />
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">{{$all_category->name}}</h5>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>

<div class="second-banner container-fluid px-5 mt-5">
    @foreach ($ads as $ad)
    <img id="ad" src="{{$ad->image_url}}" class="w-100 ad_image" />
    @endforeach
</div>

<div class="container-fluid px-5 my-5">
    <div class="row px-3">
        <div class="col-12">
            <div class="row p-2 text-white card-deck-title">
                <p>{{ $category ->name }} | أحدث ما وصل</p>
            </div>

            <div class="card-deck d-flex flex-wrap bg-light pb-4 px-2">

                @foreach ($products as $product)

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

                                    <button data-toggle="modal" data-target="#modal_view_1">
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

                        <img class="card-img-top" src="{{asset($product->images[0]->photo)}}" alt="{{$product->name}}" />

                    </div>

                    <div class="card-body text-center">
                        <h5 class="card-title"><a href="{{route('Site.product',$product->name)}}">{{$product->name}}</a></h5>
                        <h5>{{ $product->price }} جنيه</h5>
                    </div>


                    {{-- Modal --}}

                    @include('site.includes.modal_view_1',$product)


                </div>


                @endforeach


            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        @foreach ($allCategories as $all_category )

        <div class="col-3 second-banner">
            <img class="w-100" src="{{$all_category->image_url}}" />
        </div>
        @endforeach
        {{-- <div class="col-4 second-banner">
            <img class="w-100" src="../imgs/fav/fav-card-img.jpg" />
        </div>
        <div class="col-4 second-banner">
            <img class="w-100" src="../imgs/fav/fav-card-img.jpg" />
        </div> --}}
    </div>
    <br>
    <br>

    {{-- <div class="row mt-4">
        <div class="col-4 second-banner">
            <img class="w-100" src="../imgs/fav/fav-card-img.jpg" />
        </div>
        <div class="col-4 second-banner">
            <img class="w-100" src="../imgs/fav/fav-card-img.jpg" />
        </div>
        <div class="col-4 second-banner">
            <img class="w-100" src="../imgs/fav/fav-card-img.jpg" />
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-4 second-banner">
            <img class="w-100" src="../imgs/fav/fav-card-img.jpg" />
        </div>
        <div class="col-8 second-banner">
            <img class="w-100" src="../imgs/fav/fav-card-img.jpg" />
        </div>

    </div>

    <div class="row my-4">
        <div class="col-8 second-banner">
            <img class="w-100" src="../imgs/fav/fav-card-img.jpg" />
        </div>
        <div class="col-4 second-banner">
            <img class="w-100" src="../imgs/fav/fav-card-img.jpg" />
        </div>

    </div> --}}
</div>

<!-- samiler products -->
<section id="semilar-products" class="container">
    <div class="container">
        <div class="row">
            <div class="col-3 text-right pr-0">
                <div>
                    <h6 class="font-weight-bold">عرض</h6>
                    <hr />
                    <form>
                        <div class="d-flex align-items-center">
                            <input type="radio" name="offers" id="all_products" class="position-relative" />
                            <label for="all_products" class="mr-2">كل المنتجات</label>
                        </div>
                        <div class="d-flex align-items-center">
                            <input type="radio" name="offers" id="all_offers" />
                            <label for="all_offers" class="mr-2">
                                العروض فقط
                            </label>

                        </div>
                    </form>
                </div>


                <div class="my-4">
                    <h6 class="font-weight-bold">السعر</h6>
                    <hr />
                    <form class="multi-range-field my-2">
                        <input id="multi" class="multi-range" type="range" min="0" max="200" value="0" />
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

                        <?php $brands = DB::table('brands')->orderby('name','ASC')->get(); ?>

                        @foreach ( $brands as $brand )

                        <div class="d-flex align-items-center">
                            <input type="radio" name="brand" id="brandId" value="{{$brand->id}}" class="brandloop" />
                            <label for="brand-1" class="mr-2">{{$brand->name}}</label>
                        </div>
                        @endforeach


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
                    <div class="col-12 bg-light">

                        <div class="row align-items-center">
                            <div class="col-6 text-right pt-3">
                                <h5>ملابس</h5>
                                <h5 class="mt-2">
                                    أجمالى
                                    المنتجات
                                    {{count($products)}}
                                </h5>

                            </div>
                            <div class="col-6 d-flex justify-content-end align-items-center">
                                <h5 class="ml-3 mb-0"> ترتيب حسب :</h5>
                                <select name="sort_by" id="sort_by">
                                    <option value="">ترتيب حسب</option>
                                    <option value="sort_by">وصلنا حديثا</option>
                                </select>

                            </div>
                        </div>
                        @if($products && count($products) >= 1)
                        <div class="card-deck2 d-flex flex-wrap">
                            @foreach ($products as $product)

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

                                                <button data-toggle="modal" data-target="#modal_view_2">
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
                                    <img class="card-img-top" src="{{asset($product->images[0]->photo)}}" alt="{{$product->name}}" />
                                </div>

                                <div class="card-body text-center">
                                    <h5 class="card-title">{{$product->small_description}}</h5>
                                    <h5>{{$product->price }} جنيه</h5>
                                </div>
                                @include('site.includes.modal_view_2',$product)
                            </div>
                            @endforeach

                            {{-- <div class="card mt-4">
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
                                            <img class="card-img-top" src="../imgs/fav/fav-card-img.jpg" alt="Card image cap" />
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
                                            <img class="card-img-top" src="../imgs/fav/fav-card-img.jpg" alt="Card image cap" />
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
                                            <img class="card-img-top" src="../imgs/fav/fav-card-img.jpg" alt="Card image cap" />
                                        </div>

                                        <div class="card-body text-center">
                                            <h5 class="card-title">هذا النص هو مثال ....</h5>
                                            <h5>70 جنيه</h5>
                                        </div>
                                    </div> --}}
                        </div>
                        @else
                        <div class="col-6 d-flex justify-content-end align-items-center">
                            <h5> لا يوجد منتجات</h5>

                        </div>

                        @endif
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
                                    <img class="card-img-top" src="../imgs/fav/fav-card-img.jpg" alt="Card image cap" />
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
                                    <img class="card-img-top" src="../imgs/fav/fav-card-img.jpg" alt="Card image cap" />
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
                                    <img class="card-img-top" src="../imgs/fav/fav-card-img.jpg" alt="Card image cap" />
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
                                    <img class="card-img-top" src="../imgs/fav/fav-card-img.jpg" alt="Card image cap" />
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
                                    <img class="card-img-top" src="../imgs/fav/fav-card-img.jpg" alt="Card image cap" />
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
                                    <img class="card-img-top" src="../imgs/fav/fav-card-img.jpg" alt="Card image cap" />
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
                                    <img class="card-img-top" src="../imgs/fav/fav-card-img.jpg" alt="Card image cap" />
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
                                    <img class="card-img-top" src="../imgs/fav/fav-card-img.jpg" alt="Card image cap" />
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
                                    <img class="card-img-top" src="../imgs/fav/fav-card-img.jpg" alt="Card image cap" />
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
                                    <img class="card-img-top" src="../imgs/fav/fav-card-img.jpg" alt="Card image cap" />
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
                                    <img class="card-img-top" src="../imgs/fav/fav-card-img.jpg" alt="Card image cap" />
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
                                    <img class="card-img-top" src="../imgs/fav/fav-card-img.jpg" alt="Card image cap" />
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
                                    <img class="card-img-top" src="../imgs/fav/fav-card-img.jpg" alt="Card image cap" />
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
                                    <img class="card-img-top" src="../imgs/fav/fav-card-img.jpg" alt="Card image cap" />
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
                                    <img class="card-img-top" src="../imgs/fav/fav-card-img.jpg" alt="Card image cap" />
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
                                    <img class="card-img-top" src="../imgs/fav/fav-card-img.jpg" alt="Card image cap" />
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
                                    <img class="card-img-top" src="../imgs/fav/fav-card-img.jpg" alt="Card image cap" />
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
                                    <img class="card-img-top" src="../imgs/fav/fav-card-img.jpg" alt="Card image cap" />
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
                                    <img class="card-img-top" src="../imgs/fav/fav-card-img.jpg" alt="Card image cap" />
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
                                    <img class="card-img-top" src="../imgs/fav/fav-card-img.jpg" alt="Card image cap" />
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


</section>



@endsection

@push('scripts')

<script>
    $(function() {
        // Price Slider
        $("#multi").change(function(e) {
            document.getElementById("price").innerHTML = `${e.target.value}`
        });
    })

</script>

<script>
    $(document).on('click', '.quick-view', function() {
        $('.quickview-modal-product-details-' + $(this).attr('data-product-id')).css("display", "block");
    });
    $(document).on('click', '.close', function() {
        $('.quickview-modal-product-details-' + $(this).attr('data-product-id')).css("display", "none");

    });

</script>



<script>
    $(document).ready(function(e) {

        $('.multi-range').on('change', function() {
            var multi = $('#multi').val();
            $.ajax({
                url: "{{ route('search.products',$category->name) }}"
                , type: 'POST'
                , data: {
                    multi: multi
                }
                , success: function(res) {

                    $('.search-result').html(res);
                }
            });
        });


        $('#sort_by').on('change', function() {
            var sort_by = $('#sort_by').val();
            $.ajax({
                url: "{{ route('sort.products',$category->name) }}"
                , method: "POST"
                , data: {
                    sort_by: sort_by
                }
                , success: function(res) {
                    $('.search-result').html(res);
                }
            });
        });

        $('#all_products').on('click', function() {
            var sort_by = $('#all_products').val();
            $.ajax({
                url: "{{ route('all_products.search',$category->name) }}"
                , method: "POST"
                , data: {
                    sort_by: sort_by
                }
                , success: function(res) {
                    $('.search-result').html(res);
                }
            });
        });

        $('#all_offers').on('click', function() {
            var sort_by = $('#all_offers').val();
            $.ajax({
                url: "{{ route('all_offers.search',$category->name) }}"
                , method: "POST"
                , data: {
                    sort_by: sort_by
                }
                , success: function(res) {
                    $('.search-result').html(res);
                }
            });
        });



        $('.brandloop').on('click', function() {

            var brand = [];
            $('.brandloop').each(function() {
                if ($(this).is(":checked")) {

                    brand.push($(this).val());
                }

            });

            allBrand = brand.toString();
            $.ajax({
                url: "{{ route('brands.sort',$category->name) }}"
                , method: "POST"
                , data: "brand=" + allBrand

                , success: function(res) {
                    $('.search-result').html(res);
                }
            });


        });




    });

</script>


@endpush


