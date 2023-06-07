@extends('layouts.site.app')

@section('title')
- المنتجات المفضله
@endsection

@section('content')

<!-- my Cart -->
<section id="cart" class="py-5 container my-5">
    <div class="page-nav row">
        <a href="/" class="text-dark pl-2">
            <i class="fa-solid fa-house-chimney"></i>
        </a>
        <a href="#" class="text-dark">
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
            المفضلة
        </a>
    </div>

    @if($favorite_products && count($favorite_products) > 0)

    <div class="row my-5 py-5" id="fav-list">
        <!-- card list  -->

        @foreach ( $favorite_products as $wishlist )
        @php
        $product = $wishlist->products;
        @endphp


        <div class="card my-2 w-100 mb-3">
            <div class="row no-gutters">
                <div class="col-12 col-lg-2 position-relative">
                    <div
                        class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                        <ul class="list-unstyled">
                            <li>
                                <button class="btn bg-light removeFromWishlist">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </li>

                            <li>
                                <button class="btn bg-light">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </li>

                            <li>
                                <button class="btn bg-light addTocomparelist">
                                    <i class="fa-solid fa-arrow-right-arrow-left"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                    <img src="{{ $product->images[0]->photo ? asset($product->images[0]->photo) : asset('images/default.png') }}"
                        alt="{{ $product->name }}" title="{{ $product->name }}" class="card-img img-fluid" />
                </div>
                <div class="col-lg-10">
                    <div class="fav-card-body px-2 pt-2">
                        <h5 class="card-title">
                            {{ $product->name }}
                        </h5>
                        <div class="price card-text d-flex">
                            <span class="old-price text-success">{{ $product->old_price }}جنية</span>

                            <span class="new-price px-2">{{ $product->new_price }}جنية</span>
                            <div class=" px-2 saving-bage ">
                                <span>خصم</span>
                                <span id="save-quantity">{{ number_format((($product->old_price -
                                    $product->new_price) /
                                    $product->old_price) * 100, 2, '.', '') }}</span>
                                <span>%</span>
                            </div>
                        </div>
                        <div class="row">
                            <p class="card-text col-lg-7">
                                {{ $product->description }}
                            </p>
                            <div class="col-12 col-lg-5 button-col d-flex flex-column justify-content-end">
                                <div class="row">
                                    <button type="button"
                                        class="btn bg-main-color btn-dark my-1 col-5 col-lg-7 addTocomparelist">
                                        نظرة سريعة
                                    </button>
                                </div>
                                <div class="row">

                                    @if ($product->colors->count() > 0 || $product->sizes->count() > 0)

                                    <button class="btn bg-main-color btn-dark my-1 col-5 col-lg-7">

                                        <a href="{{ route('Site.product',$product->name) }}">اضف الى العربه</a>
                                    </button>
                                    @else

                                    <button class="btn bg-main-color btn-dark my-1 col-5 col-lg-7 addToCart"
                                        data-product-id="{{ $product->id }}">
                                        أضف إلى العربة
                                    </button>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach


    </div>
    @else
    <!-- my Cart -->
    <section id="cart" class="py-5 container my-5">


        <div class="d-flex flex-column justify-content-center text-center align-items-center my-5 py-5">
            <div>
                <img src="{{ asset('website_assets/imgs/cart/Empty cart cartoon.svg') }}" class="img-fluid"
                    alt="Empty Cart" />
            </div>
            <h4>الصنف غير موجود</h4>
            <p class="col-md-6 justify-self-center">
                أسف... لم يتم العثور على عنصر داخل قائمة المفضلة بك!
            </p>
            <button type="button" class="btn btn-dark my-4">
                <a href="{{ route('home') }}">استمرار التسوق</a>
            </button>
        </div>
    </section>

    @endif
</section>

{{-- compares --}}
@include('site.includes.first_add_to_compare_modal')
@include('site.includes.exist_same_product_in_compares_modal')
@include('site.includes.max_products_in_compares')


@endsection

@push('scripts')
<script>
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



</script>
@endpush
