@extends('layouts.site.app')

@section('title')
    - البحث
@endsection

@section('content')
    <!-- my Cart -->
    <section id="product-details" class="py-5 container">
        <!-- Page Navigation -->
        <div class="page-nav row">
            <a href="/" class="text-dark pl-2">
                <i class="fa-solid fa-house-chimney"></i>
            </a>
            <a href="#" class="text-dark">
                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                {{ $product->name }}
            </a>
        </div>

        <div id="content-wrapper" class="row d-flex py-5">
            <div id="imgs-section" class="col-md-4 no-gutters">
                <div class="=row">
                    <img id="featured" class="w-100"
                        src="{{ $product->images[0]->photo ? asset($product->images[0]->photo) : asset('images/default.png') }}"
                        alt="{{ $product->name }}" />
                </div>
                <!-- Slider Nav imgs -->
                <div id="slide" class="d-flex justify-content-between flex-wrap mt-2">
                    <img class="thumbnail active"
                        src="{{ $product->images[0]->photo ? asset($product->images[0]->photo) : asset('images/default.png') }}"
                        alt="{{ $product->name }}" />
                    <img class="thumbnail"
                        src="{{ $product->images[1]->photo ? asset($product->images[1]->photo) : asset('images/default.png') }}"
                        alt="{{ $product->name }}" />
                    <img class="thumbnail"
                        src="{{ $product->images[2]->photo ? asset($product->images[2]->photo) : asset('images/default.png') }}"
                        alt="{{ $product->name }}" />
                    <img class="thumbnail"
                        src="{{ $product->images[3]->photo ? asset($product->images[3]->photo) : asset('images/default.png') }}"
                        alt="{{ $product->name }}" />
                    <img class="thumbnail"
                        src="{{ $product->images[4]->photo ? asset($product->images[4]->photo) : asset('images/default.png') }}"
                        alt="{{ $product->name }}" />
                    <img class="thumbnail"
                        src="{{ $product->images[5]->photo ? asset($product->images[5]->photo) : asset('images/default.png') }}"
                        alt="{{ $product->name }}" />



                </div>
                {{-- <!-- Link -->
                <div class="d-flex flex-column text-start text-large text-bold mt-2">
                    <p>مشاركة هذا المنتج</p>
                    <p>
                        انسخ الرابط
                        <a href="#"> <i class="fa-solid fa-link"></i> </a>
                    </p>
                </div> --}}
            </div>

            <div id="text-section" class="col-md-8 px-md-5">
                <h3 id="product-title">
                    {{ $product->description }}
                </h3>
                <!-- Rating Start-->
                <?php
                $fullStars = floor($average);
                $halfStar = $average - $fullStars >= 0.5;
                ?>
                <div class="d-flex my-3">
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
                    {{-- <span id="product-review-count" class="mx-4">(اراء العملاء 180)</span> --}}
                    @if ($product && $product->qty <= 20)
                        <!-- Rating End-->
                        <div class="col d-inline-flex justify-content-end">
                            <div class="px-5 mr-2 text-center text-white bg-main text-bold text-xlarge">
                                العدد المتبقى - {{ $product->qty }}
                            </div>

                        </div>
                    @endif

                </div>
                {{-- <div class="d-flex  flex-wrap">
                <h4 id="product-price">{{$product->price }} جنية</h4>
                <div class="col d-inline-flex justify-content-end">
                    <div class="px-3 mr-2 text-center text-white bg-main text-bold text-xlarge">
                        <i class="fa-regular fa-clock"></i>
                        العرض علي وشك النفاذ
                    </div>

                </div>
            </div> --}}

                <!-- Quantity -->
                {{-- <div class="d-flex my-3 flex-wrap">
                <span class="normal-text">الكمية</span>
                <div id="quantity-counter" class="row flex-nowrap mx-5 align-items-center">
                    <i class="fa-solid fa-circle-minus"></i>
                    <div id="quantity-count" class="">1</div>
                    <i class="fa-solid fa-circle-plus"></i>
                </div>

                <div class="col d-inline-flex justify-content-end">
                    <div class="p-2 mr-2 text-warning bg-main text-bold text-larger">00</div>
                    <div class="p-2 mr-2 text-warning bg-main text-bold text-larger">14</div>
                    <div class="p-2 mr-2 text-warning bg-main text-bold text-larger">42</div>
                    <div class="p-2 mr-2 text-warning bg-main text-bold text-larger">35</div>
                </div>
            </div> --}}
                <!-- Colors -->
                <div id="color-section " class="my-4">
                    <div class="normal-text my-2 subheader">الوان</div>
                    <div class="d-flex available-colors flex-nowrap">
                        @foreach ($product_colors as $color)
                            <div style="background:{{ $color->name }}"></div>
                        @endforeach

                    </div>
                </div>
                <!-- Sizes -->
                <div id="size-section " class="my-4">
                    <div class="normal-text my-2 subheader d-flex justify-content-between">
                        المقاس
                        <a href="{{ route('sizeTable') }}" class="under-line text-dark"><u>جدول المقاسات</u></a>
                    </div>
                    <div class="d-flex available-sizes flex-nowrap">
                        @foreach ($product_sizes as $size)
                            <div class="available-size active">{{ $size->name }}</div>
                        @endforeach


                    </div>
                </div>
                <!-- Add To Fav ans Compare -->
                <div class="d-flex">
                    <a href="#" class="addToWishlist">
                        <i class="fa fa-heart" aria-hidden="true"></i><span class="px-2">أضف للمفضلة</span>
                    </a>

                    <a href="#" class="mx-4 addTocomparelist">
                        <i class="fa fa-exchange" aria-hidden="true"></i>
                        <span class="px-2">أضف للمقارنة</span></a>
                </div>
            </div>
            <!-- Add to card button -->
            <div class="d-flex col-lg-10 my-3 mx-2 mx-lg-5 px-md-5 justify-content-end">
                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    <button type="submit" name="product_id" value="{{ $product->id }}"
                        class="d-flex bg-add-to-cart text-larger align-items-center">
                        <div class="icon p-2">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>
                        <span class="col-10">أضف الي العربة</span>
                    </button>
                </form>
            </div>
        </div>
    </section>
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
