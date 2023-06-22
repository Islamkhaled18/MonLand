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
                <h6 class="font-weight-bold">الاقسام الرئيسية</h6>
                <hr />
                <div>
                    <ul class="list-unstyled">
                        <li>
                            <i class="fa-solid fa-chevron-left"></i>
                            ملابس

                            <ul class="pr-4 list-unstyled">
                                <li>
                                    <i class="fa-solid fa-chevron-left"></i>
                                    جميع الاقسام

                                    <ul class="list-unstyled pr-4">
                                        @foreach ($mainCategories as $mainCategory)
                                        <li><a href="{{ route('mainCategory.products', $mainCategory->name) }}"
                                                class="text-muted">{{ $mainCategory->name }}</a></li>
                                        @endforeach
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
                        <input type="number" min="0" class="form-control mr-2" id="minPriceInput" />

                    </div>

                    <div class="d-flex pr-3 align-items-center">
                        <span>إلى </span>
                        <input type="number" min="0" class="form-control mr-2" id="maxPriceInput" />

                    </div>

                </div>
                <div class="d-flex justify-content-end">
                    <button class=" btn bg-main text-white text-bold mx-2 mt-4 rounded-0 py-2 px-4 priceRange">
                        تطبيق
                    </button>
                </div>
            </div>

            <div>
                <h6 class="font-weight-bold">اللون</h6>
                <hr />
                <div class="d-flex available-colors flex-nowrap">
                    @if($productColors)

                    @foreach($productColors as $pc)
                    <div data-color="{{$pc->name}}" class="pcColor" style="background-color: {{$pc->name}}">
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>


            <div class="my-4">
                <h6 class="font-weight-bold">المقاس</h6>
                <hr />
                <form>
                    <div class="row align-items-center">
                        @foreach ($productSizes as $pz)
                        <div class="col-6 d-flex align-items-center">

                            <input type="radio" value="{{$pz->name}}" name="size" id="size-{{$pz->name}}"
                                class="position-relative" />

                            <label for="size-{{$pz->name}}" class="mr-2 mb-0">{{$pz->name}}</label>

                        </div>
                        @endforeach
                    </div>

                </form>
            </div>

            <div>
                <h6 class="font-weight-bold">الماركة</h6>
                <hr />
                <form>

                    <?php $brands = DB::table('brands')
                            ->orderby('name', 'ASC')
                            ->get(); ?>

                    @foreach ($brands as $brand)
                    <div class="d-flex align-items-center">
                        <input type="radio" name="brand" id="brandId" value="{{ $brand->id }}" class="brandloop" />
                        <label for="brand-1" class="mr-2">{{ $brand->name }}</label>
                    </div>
                    @endforeach


                </form>
            </div>

            <div class="my-4">
                <h6 class="font-weight-bold">التقييم</h6>
                <hr />
                <form>
                    <div class="d-flex align-items-center">
                        <input value="5" type="radio" name="rating" id="five-stars" class="position-relative starsMain rating-input" />
                        <label for="five-stars" class="mr-2 d-flex justify-content-between">
                            <div class="star-rating ml-3">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <span>أو أعلى</span>
                        </label>
                    </div>
                    <div class="d-flex align-items-center">
                        <input value="4" type="radio" name="rating" id="four-stars" class="position-relative starsMain rating-input" />
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
                        <input value="3" type="radio" name="rating" id="three-stars" class="position-relative starsMain rating-input" />
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
                        <input value="2" type="radio" name="rating" id="two-stars" class="position-relative starsMain rating-input" />
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
                        <input value="1" type="radio" name="rating" id="one-stars" class="position-relative starsMain rating-input" />
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


        </div>
        <div class="col-12 col-md-9">
            <div class="row">

                <div class="p-2 col-12  text-right justify-content-between d-none d-md-flex">
                    <div>

                        <p class="mt-2">
                            إجمالى المنتجات {{ $mainCategoryProductsCount }}
                        </p>
                    </div>

                    <div class="d-flex align-items-center">
                        ترتيب حسب :
                        <select name="sort_by" id="sort_by" class="form-control w-auto mr-3">
                            <option value="">ترتيب حسب</option>
                            <option value="sort_by">وصلنا حديثا</option>
                        </select>
                    </div>

                </div>

                <div class="col-12">
                    <div class="card-deck2 d-flex flex-wrap">
                        @if($mainCategoryProducts)
                        @foreach ($mainCategoryProducts as $product )
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
                                    <a href="{{ route('Site.product',$product->name ) }}">{{ $product->name }}</a>
                                </p>
                                <div class="d-flex row no-gutters justify-content-between">
                                    <span class="px-1 text-bold"><a
                                            href="{{ route('Site.product',$product->name ) }}">{{ $product->new_price
                                            }}</a> جنيه</span>
                                    <div class="d-flex justify-content-end ">
                                        <div class="star-rating d-flex align-items-center  text-small">
                                            <span id="rating-score">{{ $averageStarRating }}</span>
                                            <i class="fa-solid text-smaller fa-star"></i>
                                        </div>
                                        <span id="product-review-count" class="mx-1">({{ $reviewsCount }})</span>
                                    </div>
                                </div>


                                <div id="before-price" class=" my-3 row">
                                    <span class="text-crossed  px-1"><a
                                            href="{{ route('Site.product',$product->name ) }}">
                                            {{ $product->old_price }}</a> جنيه</span>

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


                                @if ($product->colors->count() > 0 || $product->sizes->count() > 0)

                                <button class=" btn bg-main text-white text-bold mx-2 mb-2  py-1 px-2">

                                    <a href="{{ route('Site.product',$product->name) }}">اضف الى العربه</a>
                                </button>
                                @else

                                <button class=" btn bg-main text-white text-bold mx-2 mb-2  py-1 px-2 addToCart"
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

        </div>

        {{--  <div class="d-flex justify-content-center mt-5 pt-3">
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
        </div>  --}}
</section>


{{-- favorites --}}
@include('site.includes.first_add_to_favorite_modal')
@include('site.includes.exist_same_product_in_favorites_modal')
{{-- compares --}}
@include('site.includes.first_add_to_compare_modal')
@include('site.includes.exist_same_product_in_compares_modal')
@include('site.includes.max_products_in_compares')



@endsection



@push('scripts')

<script>
    $(document).ready(function(e) {
        $('#sort_by').on('change', function() {
            var sort_by = $('#sort_by').val();
            $.ajax({
                url: "{{ route('mainCategory.sort.products', $mainCategory->name) }}",
                method: "GET",
                data: {
                    sort_by: sort_by
                },
                success: function(res) {
                    $('.search-result').empty();
                    $('.search-result').html(res);
                }
            });
        });

        $('#all_products').on('click', function() {
            var sort_by = $('#all_products').val();
            $.ajax({
                url: "{{ route('mainCategory.all_products.search', $mainCategory->name) }}",
                method: "GET",
                data: {
                    sort_by: sort_by
                },
                success: function(res) {
                    $('.search-result').empty();
                    $('.search-result').html(res);
                }
            });
        });
        $('#all_offers').on('click', function() {
            var sort_by = $('#all_offers').val();
            $.ajax({
                url: "{{ route('mainCategory.all_offers.search', $mainCategory->name) }}",
                method: "GET",
                data: {
                    sort_by: sort_by
                },
                success: function(res) {
                    $('.search-result').empty();
                    $('.search-result').html(res);
                }
            });
        });


        $('.priceRange').on('click', function() {
            var minPrice = $('#minPriceInput').val();
            var maxPrice = $('#maxPriceInput').val();

            $.ajax({
                url: "{{ route('mainCategory.search.products', $mainCategory->name) }}",
                type: 'GET',
                data: {
                    minPrice: minPrice,
                    maxPrice: maxPrice
                },
                success: function(res) {
                    $('.search-result').empty();
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
                url: "{{ route('mainCategory.brands.sort', $mainCategory->name) }}",
                method: "GET",
                data: "brand=" + allBrand,
                success: function(res) {
                    $('.search-result').empty();
                    $('.search-result').html(res);
                }
            });
        });


        $('.pcColor').on('click' ,function(){

            let color =  $(this).data('color')

            $.ajax({
                url:"{{ route('mainCategory.search.color' , $mainCategory->name) }}",
                method:"GET",
                data:{color:color},

                success: function(res) {
                        $('.search-result').empty();
                        $('.search-result').html(res);
                    }

            })

        })

        $('input[name="size"]').on('click', function() {
            let size = $(this).val();

            $.ajax({
                url: "{{ route('mainCategory.search.size', $mainCategory->name) }}",
                method: "GET",
                data: { size: size },
                success: function(res) {
                    $('.search-result').empty();
                    $('.search-result').html(res);
                }
            });
        });

        $('.starsMain').on('click' , function(){
            let star_rating = $(this).val();

            $.ajax({
                url:"{{ route('mainCategory.search.review.product' , $mainCategory->name) }}",
                method:"GET",
                data:{rating : star_rating},

                success: function(res) {
                    console.log("oer");
                        $('.search-result').empty();
                        $('.search-result').html(res);
                    }
            })
        });
    });
</script>
@endpush
