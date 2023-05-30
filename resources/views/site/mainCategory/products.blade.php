@extends('layouts.site.app')

@section('title')

- {{ $mainCategory->name }}
@endsection

@section('content')


<div class="container mt-4 mb-5">
    <div class="page-nav row">
        <a href="/" class="text-dark pl-2">
            <i class="fa-solid fa-house-chimney"></i>
        </a>
        <a href="#" class="text-dark">
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
            {{ $mainCategory->name }}
        </a>
    </div>
</div>

<div class="first-banner container-fluid px-5 mt-5">
    <div class="row">
        @if($banners)
        @foreach ($banners as $banner)

        <div class="col-md-4 col-12">
            <img src="{{ $banner->image_url }}" class="w-100" />
        </div>
        @endforeach
        @endif

    </div>
</div>

<div class="row container-fluid px-5 mt-5">
    @if($electronics_products_photos)
    @foreach ($electronics_products_photos as $electronics_products_photo)

    <div class="col-md-4 col-12">
        <img src="{{ $electronics_products_photo->images[0]->photo ? asset($electronics_products_photo->images[0]->photo) : asset('images/default.png') }}"
            alt="{{ $electronics_products_photo->name }}" title="{{ $electronics_products_photo->name }}" height="250"
            class="w-100">
    </div>
    @endforeach
    @endif

</div>

<div class="first-banner row container-fluid px-5 mt-5">
    <div class="col-12">
        <img src="{{ $brand_slide->image_url }}" class="w-100" />
    </div>
</div>

<div class="row container-fluid px-5 mt-5">
    @if($all_offers)
    @foreach ($all_offers as $all_offer)

    <div class="col-md-4 col-12">
        <img src="{{ $all_offer->image_url }}" height="200" class="w-100" />
    </div>
    @endforeach
    @endif
</div>

<div class="first-banner row container-fluid px-5 mt-5">
    @if($weekend_offers)
    @foreach ($weekend_offers as $weekend_offer)

    <div class="col-md-4 col-12">
        <img src="{{ $weekend_offer->image_url }}" height="200" class="w-100" />
    </div>
    @endforeach
    @endif
</div>

<div class="first-banner row container-fluid px-5 mt-5">
    @if($buy_your_mind_is_frees)
    @foreach ($buy_your_mind_is_frees as $buy_your_mind_is_free)

    <div class="col-md-4 col-12">
        <img src="{{ $buy_your_mind_is_free->image_url }}" height="200" class="w-100" />
    </div>
    @endforeach
    @endif
</div>

<div class="container pt-5 px-5 d-md-none">
    <div class="row justify-content-center">
        <button
            class="btn filter-btn bg-transparent border text-danger text-white text-bold mx-2 mb-2  py-1 px-2 w-100">
            <i class="fa-solid fa-filter"></i>
            تصنيف
        </button>
    </div>
</div>
<!-- samiler products -->
<section id="semilar-products" class="container-fluid mt-5 px-5">

    <div class="row">
        <div class="col-12 col-md-3 tasnef-filter text-right pr-0 ">

            <div class="d-md-none d-flex justify-content-end">
                <button class="bg-transparent border rounded close-filter"><i
                        class="fa-solid fa-xmark fa-xl "></i></button>

            </div>
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
                <div>
                    <ul class="list-unstyled">
                        <li>
                            <i class="fa-solid fa-chevron-left"></i>
                            ملابس

                            <ul class="pr-4 list-unstyled">
                                <li>
                                    <i class="fa-solid fa-chevron-left"></i>
                                    رجال

                                    <ul class="list-unstyled pr-4">
                                        <li><a href="#" class="text-muted">أحذية</a></li>
                                        <li><a href="#" class="text-muted">حقائب يد وحقائب كتف</a></li>
                                        <li><a href="#" class="text-muted">ساعات</a></li>
                                        <li><a href="#" class="text-muted">مجوهرات</a></li>
                                        <li><a href="#" class="text-muted">ملابس</a></li>
                                        <li><a href="#" class="text-muted">ملحقات</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="my-4">
                <h6 class="font-weight-bold">السعر</h6>
                <hr />
                <div class="d-flex">
                    <div class="d-flex align-items-center">
                        <span>من </span>
                        <input type="number" min="0" class="form-control mr-2" />
                    </div>

                    <div class="d-flex pr-3 align-items-center">
                        <span>إلى </span>
                        <input type="number" min="0" class="form-control mr-2" />
                    </div>

                </div>
                <div class="d-flex justify-content-end">
                    <button class=" btn bg-main text-white text-bold mx-2 mt-4 rounded-0 py-2 px-4">
                        تطبيق
                    </button>
                </div>
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
                        <div class="col-6 d-flex align-items-center rad-btn">
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
        <div class="col-12 col-md-9">
            <div class="row">

                <div class="p-2 col-12  text-right justify-content-between d-none d-md-flex">
                    <div>

                        <p class="mt-2">
                            إجمالى المنتجات {{ $products_count }}
                        </p>
                    </div>

                    <div class="d-flex align-items-center">
                        ترتيب حسب :
                        <select class="form-control w-auto mr-3">
                            <option>العربية</option>
                            <option>English</option>
                        </select>
                    </div>

                </div>

                <div class="col-12">
                    <div class="card-deck2 d-flex flex-wrap">
                        @if($mainCategoryProducts)
                        @foreach ($mainCategoryProducts as $product )

                        <div class="card mt-4 text-start">
                            <div class="position-relative">
                                <div class="position-absolute w-100 p-3 item-assets ">

                                    <ul class="list-unstyled">
                                        <li>
                                            <button class="add-to-fav">
                                                <i class="fa fa-heart addToWishlist"
                                                    data-product-id="{{ $product->id }}" aria-hidden="true"></i>
                                            </button>
                                        </li>

                                        <li>
                                            <button>
                                                <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                            </button>
                                        </li>

                                        <li>
                                            <button>
                                                <i class="fa fa-exchange addTocomparelist"
                                                    data-product-id="{{ $product->id }}" aria-hidden="true"></i>
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

                                <p class="card-title">
                                    {{ $product->name }}
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
                                        <span id="save-quantity">{{ number_format((($product->old_price -
                                            $product->new_price) /
                                            $product->old_price) * 100, 2, '.', '') }}</span>
                                        <span>%</span>
                                    </div>
                                </div>

                                <div class="  border-dotted p-2 text-bold">

                                    {{ $product->created_at->diffInDays(now()) < 10 ? 'جديد' : 'موجود منذ فتره' }}
                                        </div>
                                </div>
                                <button class=" btn bg-main text-white text-bold mx-2 mb-2  py-1 px-2">
                                    أضف إلى العربة
                                </button>
                            </div>
                            @endforeach

                            @endif



                        </div>
                    </div>
                </div>

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
</section>


//favorites
@include('site.includes.first_add_to_favorite_modal')
@include('site.includes.exist_same_product_in_favorites_modal')
//compares
@include('site.includes.first_add_to_compare_modal')
@include('site.includes.exist_same_product_in_compares_modal')
@include('site.includes.max_products_in_compares')



@endsection
