@if($vendors_products)
@foreach ($vendors_products as $product )
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
                        src="{{ isset($product->images[0]) ? asset($product->images[0]->photo) : asset('images/default.png') }}"
                        alt="{{ $product->name }}" title="{{ $product->name }}" />

                </div>
                <div class="carousel-item">
                    <img class="card-img-top"
                        src="{{ isset($product->images[1]) ? asset($product->images[1]->photo) : asset('images/default.png') }}"
                        alt="{{ $product->name }}" title="{{ $product->name }}" />

                </div>
                <div class="carousel-item">
                    <img class="card-img-top"
                        src="{{ isset($product->images[2]) ? asset($product->images[2]->photo) : asset('images/default.png') }}"
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
