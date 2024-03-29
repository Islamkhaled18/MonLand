@extends('layouts.site.app')

@section('title')
- مقارنة المنتجات
@endsection

@section('content')

<!-- my Cart -->
@if ($compare_products && $compare_products->count() > 0 && $compare_products->count() <= 1) <div
    class="container mt-4 mb-5">
    <div class="page-nav row">
        <a href="/" class="text-dark pl-2">
            <i class="fa-solid fa-house-chimney"></i>
        </a>
        <a href="#" class="text-dark">
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
            قارن
        </a>
    </div>


    <div class="text-center">


        <div class="container">
            @foreach ($compare_products as $compare )
            @php
            $product = $compare->products;
            $reviewsCount = $product->reviews()->count();
            $averageStarRating = $product->reviews()->avg('star_rating');
            $averageStarRating = round($averageStarRating, 2);

            @endphp
            <table class="table table-bordered font-weight-bold">
                <thead>
                    <tr>
                        <td>المنتج</td>
                        <td class="p-4"><img
                                src="{{ isset($product->images[0]) ? asset($product->images[0]->photo) : asset('images/default.png') }}"
                                alt="{{ $product->name }}" title="{{ $product->name }}" class="w-50" /> </td>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>الوصف</td>
                        <td>{!! $product->description !!}</td>

                    </tr>
                    <tr>
                        <td>السعر</td>
                        <td>{{ $product->new_price ?? $product->old_price }} جنيه</td>

                    </tr>
                    <tr>
                        <td>العربة</td>
                        <td>
                            {{-- <button class="btn btn-dark w-75 py-2">أضف الى العربة</button> --}}
                            @if ($product->colors->count() > 0 || $product->sizes->count() > 0)

                            <button class="btn btn-dark w-75 py-2">

                                <a href="{{ route('Site.product',$product->name) }}">اضف الى العربه</a>
                            </button>
                            @else

                            <button class="btn btn-dark w-75 py-2 addToCart" data-product-id="{{ $product->id }}">
                                أضف إلى العربة
                            </button>
                            @endif
                        </td>




                    </tr>
                    {{-- <tr>
                        <td>التقييم</td>
                        <td>
                            <?php
                                    $fullStars = floor($average);
                                    $halfStar = $average - $fullStars >= 0.5;
                                    ?>

                            <div class="star-rating">
                                <?php for ($i = 0; $i < 5; $i++): ?>
                                <?php if ($i < $fullStars): ?>
                                <i class="fa-solid fa-star"></i>
                                <?php elseif ($halfStar): ?>
                                <i class="fa-solid fa-star-half-stroke"></i>
                                <?php $halfStar = false; ?>
                                <?php else: ?>
                                <i class="fa-light fa-star"></i>
                                <?php endif; ?>
                                <?php endfor; ?>

                            </div>
                        </td>

                    </tr> --}}
                    <tr>
                        <td>حذف</td>
                        <td><a class="removeFromcomparelist" href="#" data-product-id="{{ $product->id }}"><i
                                    class="fas fa-trash-alt"></a></i></td>
                    </tr>
                </tbody>
            </table>
            @endforeach
        </div>

    </div>
    @elseif ($compare_products && $compare_products->count() > 1 && $compare_products->count() <= 2) <div
        class="container">
        <table class="table table-bordered font-weight-bold">
            <thead>
                <tr>
                    <td>المنتج</td>
                    <td class="p-4"><img
                            src="{{ isset($compare_products[0]->products->images[0]) ? asset($compare_products[0]->products->images[0]->photo) : asset('images/default.png') }}"
                            alt="{{ $compare_products[0]->products->name }}"
                            title="{{ $compare_products[0]->products->name }}" class="w-50" /> </td>

                    <td class="p-4"><img
                            src="{{ isset($compare_products[1]->products->images[0]) ? asset($compare_products[1]->products->images[0]->photo) : asset('images/default.png') }}"
                            alt="{{ $compare_products[1]->products->name }}"
                            title="{{ $compare_products[1]->products->name }}" class="w-50" /> </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>الوصف</td>
                    <td>{!! $compare_products[0]->products->description !!}</td>
                    <td>{!! $compare_products[1]->products->description !!}</td>
                </tr>
                <tr>
                    <td>السعر</td>
                    <td>{{ $compare_products[0]->products->new_price ?? $compare_products[0]->products->old_price }}
                        جنيه</td>
                    <td>{{ $compare_products[1]->products->new_price ?? $compare_products[1]->products->old_price }}
                        جنيه</td>

                </tr>
                <tr>
                    <td>العربة</td>
                    <td>
                        <form action="{{ route('site.cart.store') }}" method="POST">
                            @csrf

                            <button type="submit" name="product_id" value="{{ $compare_products[0]->products->id }}"
                                class="btn btn-dark w-75 py-2">أضف إلى العربة</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('site.cart.store') }}" method="POST">
                            @csrf

                            <button type="submit" name="product_id" value="{{ $compare_products[1]->products->id }}"
                                class="btn btn-dark w-75 py-2">أضف إلى العربة</button>
                        </form>
                    </td>

                </tr>
                {{--  <tr>
                    <td>التقييم</td>
                    @php
                    $reviewsCount_one = $product->reviews()->count();
                    $averageStarRating_one = $product->reviews()->avg('star_rating');
                    $averageStarRating_one = round($averageStarRating, 2);
                    @endphp


                    <td>
                        <div class="star-rating">
                            <i class="fa-solid fa-star-half-stroke"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>

                        </div>
                    </td>
                    <td>
                        <div class="star-rating">
                            <i class="fa-solid fa-star-half-stroke"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>

                        </div>
                    </td>
                </tr>  --}}
                <tr>
                    <td>حذف</td>
                    <td><a class="removeFromcomparelist" href="#"
                            data-product-id="{{ $compare_products[0]->products->id }}"><i
                                class="fas fa-trash-alt"></a></i></td>
                    <td><a class="removeFromcomparelist" href="#"
                            data-product-id="{{ $compare_products[1]->products->id }}"><i
                                class="fas fa-trash-alt"></a></i></td>
                </tr>
            </tbody>
        </table>


        @else
        <!-- my Cart -->
        <section id="cart" class="py-5 container my-5">
            <div class="page-nav row">
                <a href="{{ route('home') }}" class="text-dark pl-2">
                    <i class="fa-solid fa-house-chimney"></i>
                </a>
                <a href="{{ route('compare.products.index') }}" class="text-dark">
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    المقارنه
                </a>
            </div>

            <div class="d-flex flex-column justify-content-center text-center align-items-center my-5 py-5">
                <div>
                    <img src="{{ asset('website_assets/imgs/cart/Empty cart cartoon.svg') }}" class=" img-fluid"
                        alt="Empty Cart" />

                </div>
                <h4>المنتج غير موجود</h4>
                <p class="col-md-6 justify-self-center">
                    أسف... لم يتم العثور على اي منتج داخل قائمة المقارنه بك!
                </p>
                <button type="button" class="btn btn-dark my-4"><a href="{{ route('Site.allCategory') }}">استمرار
                        التسوق</a></button>
            </div>
        </section>
        @endif

        {{-- //favorites --}}
        @include('site.includes.first_add_to_favorite_modal')
        @include('site.includes.exist_same_product_in_favorites_modal')

        {{-- //carts --}}
        @include('site.includes.first_add_to_cart_modal')
        @include('site.includes.exist_same_product_in_carts_modal')


        @endsection
