@extends('layouts.site.app')

@section('title')
    - المنتج {{ $product->name }}
@endsection

@section('content')

    <body>

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
                            src="{{$product ->images[0]->photo ? asset($product ->images[0]->photo) : asset('images/default.png')}}"
                            alt="{{ $product->name }}" />
                    </div>
                    <!-- Slider Nav imgs -->
                    <div id="slide" class="d-flex justify-content-between flex-wrap mt-2">
                        <img class="thumbnail active" src="{{$product ->images[0]->photo ? asset($product ->images[0]->photo) : asset('images/default.png')}}"
                            alt="{{ $product->name }}" />
                        <img class="thumbnail" src="{{$product ->images[1]->photo ? asset($product ->images[1]->photo) : asset('images/default.png')}}"
                            alt="{{ $product->name }}" />
                        <img class="thumbnail" src="{{$product ->images[2]->photo ? asset($product ->images[2]->photo) : asset('images/default.png')}}"
                            alt="{{ $product->name }}" />
                        <img class="thumbnail" src="{{$product ->images[3]->photo ? asset($product ->images[3]->photo) : asset('images/default.png')}}"
                            alt="{{ $product->name }}" />
                        <img class="thumbnail" src="{{$product ->images[4]->photo ? asset($product ->images[4]->photo) : asset('images/default.png')}}"
                            alt="{{ $product->name }}" />
                        <img class="thumbnail" src="{{$product ->images[5]->photo ? asset($product ->images[5]->photo) : asset('images/default.png')}}"
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
                            <a href="{{route('sizeTable')}}" class="under-line text-dark"><u>جدول المقاسات</u></a>
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
                    <button class="d-flex col-md-8 col-lg-4 bg-add-to-cart text-larger align-items-center">
                        <div class="icon p-2">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>
                        <span class="col-10">أضف الي العربة</span>
                    </button>
                </div>
                <!-- info -->
                <div class="col-12 pl-md-5">
                    <div class="info-section border border-secondary border-top-0 d-flex flex-row  flex-wrap ">

                        <div class="col-6 col-md-3 no-gutters border-secondary border-top  py-1">
                            <div class="table-header text-larger text-center py-1">
                                <i class="fa-solid fa-shop main-color"> </i>
                            </div>
                            <div id="seller-info" class="border-top border-secondary d-flex text-start px-2">
                                <div class="col-7 no-gutters">
                                    <p class="text-large seller-name">{{ $vendor->vendor_name }}</p>
                                    {{-- <p class="seller-rate"><span class="number">70%</span> تقييم البائع</p>
                                    <p class="seller-subscribers"><span class="number">117525</span> المتابعين</p> --}}
                                </div>
                                {{-- <div class="col-5 justify-content-center d-flex  align-items-center">
                                    <button class="subscribe-btn">تابع</button>
                                </div> --}}
                            </div>
                        </div>

                        <div class="col-6 col-md-3 no-gutters border-secondary border-top py-1">
                            <div class="table-header text-larger text-center py-1">
                                <i class="fa-solid fa-rotate-left main-color"></i>
                            </div>
                            <div class="border-top border-secondary d-block text-start px-2">
                                <p>{{ $vendor->exhange_status }}</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-3 no-gutters border-secondary border-top py-1">
                            <div class="table-header text-larger text-center py-1">
                                <i class="fa-solid fa-truck-fast main-color"></i>
                            </div>
                            <div class="border-top border-secondary d-block text-start px-2">
                                <p class="text-large">شحن موثوق به</p>
                                <p>{{ $vendor->delivery_status }}</p>
                                {{-- <p>كل شحنه لها مصاريف شحن خاصة بها علي حسب عروض البائع</p> --}}
                                {{-- <a href="#">معرفه المزيد</a> --}}
                            </div>
                        </div>

                        <div class="col-6 col-md-3 no-gutters border-secondary border-top py-1">
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


            <!-- Tabs -->
            <div class="collections pt-5 text-start">
                <div class="container">
                    <ul class="nav nav-tabs justify-content-start border-bottom border-dark py-2 text-large"
                        id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link  border-0" id="description-tab" data-toggle="tab" href="#description"
                                role="tab" aria-controls="description" aria-selected="true">وصف</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  border-0" id="more-info-tab" data-toggle="tab" href="#more-info"
                                role="tab" aria-controls="more-info" aria-selected="false">معلومات اضافية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active border-0" id="reviwes-tab" data-toggle="tab" href="#reviwes"
                                role="tab" aria-controls="contact" aria-selected="false">المراجعات</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab">
                            <div id="description-text" class=" d-flex flex-wrap py-4 text-bold text-start">
                                {{ $product->description }}
                            </div>
                        </div>

                        <div class="tab-pane fade show " id="more-info" role="tabpanel" aria-labelledby="more-info-tab">
                            <div class=" d-flex flex-row flex-wrap py-4 text-bold text-large">
                                <div class="col-12 my-2 col-md-6 ">
                                    <div class="px-2">وزن:</div>
                                    <div class="weight px-2">{{ $product->weight }} </div>
                                    <div class="dimensions px-2">أبعاد:</div>
                                    <div class="px-2">{{ $product->dimension }}</div>
                                    <div class="materials px-2">مواد: </div>
                                    <div class="px-2">{{ $product->material }}</div>
                                    <div class="other-info px-2">معلومات اخري:</div>
                                    <div class="px-2">{{ $product->short_description }}</div>
                                </div>

                                {{-- <div class="col-12 my-2  col-md-6 ">
                                    <div class="px-2">وزن:</div>
                                    <div class="weight px-2">400 جرام</div>
                                    <div class="dimensions px-2">أبعاد:</div>
                                    <div class="px-2">10 x 10x 15 سم</div>
                                    <div class="materials px-2">مواد: </div>
                                    <div class="px-2">قطن بنسبة 60% /بولستر بنسب40%</div>
                                    <div class="other-info px-2">معلومات اخري:</div>
                                    <div class="px-2">هذا النص هو مثال لنص يمكن أن يستبدل</div>
                                </div> --}}




                            </div>
                        </div>

                        <div class="tab-pane fade show active py-5" id="reviwes" role="tabpanel"
                            aria-labelledby="reviwes-tab">
                            <div class=" d-flex flex-row flex-wrap pt-3 pb-5 text-bold text-large bg-light">
                                <!-- ratings -->
                                <div class="col-12 d-flex flex-row flex-wrap px-4 pt-3 col-md-6 ">
                                    <div class="col-12 col-lg-3 no-gutters d-flex flex-column align-items-center ">
                                        <span class="text-larger">التقيم العام</span>


                                        <div class="circle-wrap">
                                            <div class="circle">
                                                <div class="mask full">
                                                    <div class="fill"></div>
                                                </div>
                                                <div class="mask half">
                                                    <div class="fill"></div>
                                                </div>
                                                <div class="inside-circle ">
                                                    <i class="fa-solid fa-star position-absolute "></i>
                                                    <div class="position-absolute total-rate">{{ $average }}</div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-12 col-lg-9 no-gutters d-flex flex-row my-3">

                                        <div class="col no-gutters">
                                            <div class="d-flex">5
                                                <div class="bar-container m-1 ">
                                                    <div class="bar-5"></div>
                                                </div>
                                                ({{ $productsWithRatingFive }})
                                            </div>
                                            <div class="d-flex">4
                                                <div class="bar-container m-1 ">
                                                    <div class="bar-4"></div>
                                                </div>
                                                ({{ $productsWithRatingFour }})
                                            </div>
                                            <div class="d-flex">3
                                                <div class="bar-container m-1 ">
                                                    <div class="bar-3"></div>
                                                </div>
                                                ({{ $productsWithRatingThree }})
                                            </div>
                                            <div class="d-flex">2
                                                <div class="bar-container m-1 ">
                                                    <div class="bar-2"></div>
                                                </div>
                                                ({{ $productsWithRatingTwo }})
                                            </div>
                                            <div class="d-flex">1
                                                <div class="bar-container m-1 ">
                                                    <div class="bar-1"></div>
                                                </div>
                                                ({{ $productsWithRatingOne }})
                                            </div>

                                        </div>
                                    </div>


                                </div>
                                <!-- questions -->
                                <div class="col-12 my-2  pt-3  col-md-6 border-right ">
                                    <div class="question text-smaller main-color">أزاي اقيم المنتج ده؟</div>
                                    <div class="answer text-small">لو اشتريت منتج من كيان و ممكن تدخل علي "الطلبات" وبعدين
                                        تدوس علي
                                        "تقديم تقييم"</div>


                                    <div class="question text-smaller main-color">أزاي بتتحسب التقيمات؟</div>
                                    <div class="answer text-small">التقيمات من عملاء كيان الذين اشترو المنتج وكتبو تقييم
                                    </div>


                                </div>
                                @if (!$reviews)
                                    <button class=" text-warning py-1 px-2 mx-4 align-items-center">

                                        <span>لايوجد تعليق من العملاء.</span>
                                    </button>
                                @endif
                                <!-- reviews postes -->
                                @foreach ($review_details as $review_detail)
                                    <div class="w-100 text-normal">

                                        <div
                                            class=" d-flex flex-wrap d-flex review my-4 justify-content-center text-start  ">

                                            <div
                                                class="col-3 col-md-1 d-flex justify-content-center align-items-center mr-3">
                                                <img src="../imgs/productdetails/gir.jpg" alt=""
                                                    class="rounded-circle review-image">
                                            </div>
                                            <div class="col-12 col-md-7 px-3 align-content-center align-content-md-start">
                                                <div class="review-customer-name py-2 ">
                                                    {{ $review_detail->user->firstName }}</div>
                                                <div class="star-rating">
                                                    <?php
                                                    $star_rating = $review_detail->star_rating;
                                                    $star_html = '<i class="fa-solid fa-star"></i>';
                                                    $half_star_html = '<i class="fa-solid fa-star-half-stroke flip"></i>';
                                                    
                                                    $full_stars = intval($star_rating);
                                                    $half_star = $star_rating - $full_stars >= 0.5;
                                                    for ($i = 0; $i < $full_stars; $i++) {
                                                        echo $star_html;
                                                    }
                                                    
                                                    if ($half_star) {
                                                        echo $half_star_html;
                                                    }
                                                    
                                                    for ($i = 0; $i < 5 - $full_stars - intval($half_star); $i++) {
                                                        echo '<i class="fa-regular fa-star"></i>';
                                                    }
                                                    ?>
                                                </div>
                                                <div class="review-customer-review py-1">{{ $review_detail->comments }}
                                                </div>
                                                <div class="review-date text-muted text-xsmall">
                                                    {{ $review_detail->create_at }}</div>
                                            </div>
                                            {{-- <div class="col-12 col-md d-flex justify-content-end align-items-end">
                                                <div class="review-customer-name text-success ">
                                                    <i class="fa-solid fa-circle-check "></i>
                                                    طلبية مؤكدة
                                                </div>
                                            </div> --}}
                                        </div>

                                    </div>
                                @endforeach


                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Tabs -->
                <!-- fast order -->

                @if ($product->quick_request == true)
                    <div id="fast-order" class="container text-start">
                        <div class="d-flex flex-nowrap flex-row align-items-baseline mt-5 mb-1">

                            <p class="main-color text-bold text-larger pl-5">اطلب علي السريع</p>
                            <div class="col line "></div>
                        </div>
                        <h5>الأن يمكنك طلب المنتج عبر السوشيل ميديا</h5>
                        <div class="text-large py-1 d-flex align-items-centers">
                            <i class="fa-solid fa-circle-info main-color text-xlarge px-2"></i>
                            <h6>هذا الاختيار لطلب منتج واحد فقط</h6>
                        </div>
                        <div class="d-flex justify-content-center justify-content-md-start flex-wrap my-1">

                            <button
                                class="d-flex col-10 col-md-3 my-2 py-2 mx-md-5 bg-add-to-cart text-larger align-items-center">

                                <span class="col-9">اطلب عبر الفيسبوك</span>
                                <img src="../imgs/social media/facebook.svg" alt="" class="social-icon">
                            </button>
                            <button class="d-flex col-10 col-md-3 my-2 py-2 bg-add-to-cart text-larger align-items-center">

                                <span class="col-9">اطلب عبر الوتساب</span>

                                <img src="../imgs/social media/whatsapp.svg" alt="" class="social-icon">

                            </button>


                        </div>

                    </div>
                @endif



            </div>

        </section>


        <!-- samiler products -->
        <section id="semilar-products" class="container">
            <div class="row my-5 pt-5">
                <div class="col-12">
                    <div class="row p-2 text-white card-deck-title">
                        <a class="text-white" href="{{ route('Site.product.vendorProducts', $product->vendor_id) }}">
                            <p>مزيد من المنتجات من هذا البائع</p>
                        </a>
                    </div>

                    <div class="card-deck d-flex flex-wrap">
                        @foreach ($vendors_products as $vendor_product)
                            <div class="card mt-4">
                                <input type="hidden" name="product_id" value="{{ $vendor_product->id }}"
                                    id="product_page_product_id">
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
                                                <button data-toggle="modal" data-target="#modal_view_4">
                                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                                </button>
                                            </li>

                                            <li>
                                                <button>
                                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                                </button>
                                            </li>
                                        </ul>

                                        <form action="{{ route('cart.store') }}" method="POST">
                                            @csrf

                                            <button type="submit" name="product_id" value="{{ $vendor_product->id }}"
                                                class="add-to-cart btn py-1 px-2">
                                                أضف إلى العربة
                                            </button>
                                        </form>
                                    </div>

                                    <img class="card-img-top" src="{{$vendor_product ->images[0]->photo ? asset($vendor_product ->images[0]->photo) : asset('images/default.png')}}"
                                    alt="{{ $vendor_product->name }}" />

                                    
                                </div>

                                <div class="card-body text-center">
                                    <h5 class="card-title"><a
                                        href="{{ route('Site.product', $vendor_product->name) }}">{{ $vendor_product->name }}</a></h5>
                                    <h5>{{ $vendor_product->price }} جنيه</h5>
                                </div>
                                {{-- Modal --}}

                                {{-- @include('site.includes.modal_view_4',$vendor_product) --}}
                            </div>
                        @endforeach



                    </div>
                </div>
            </div>

            <div class="row my-5 pt-5">
                <div class="col-12">
                    <div class="row p-2 text-white card-deck-title">
                        <p>منتجات ذات صلة</p>
                    </div>

                    <div class="card-deck d-flex flex-wrap">
                        @foreach ($related_products as $related_product)
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
                                                <button data-toggle="modal" data-target="#modal_view_3">
                                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                                </button>
                                            </li>

                                            <li>
                                                <button>
                                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                                </button>
                                            </li>
                                        </ul>

                                        <form action="{{ route('cart.store') }}" method="POST">
                                            @csrf

                                            <button type="submit" name="product_id" value="{{ $related_product->id }}"
                                                class="add-to-cart btn py-1 px-2">
                                                أضف إلى العربة
                                            </button>
                                        </form>
                                    </div>
                                  

                                    <img class="card-img-top" src="{{$related_product ->images[0]->photo ? asset($related_product ->images[0]->photo) : asset('images/default.png')}}"
                                    alt="{{ $related_product->name }}" />
                                </div>

                                <div class="card-body text-center">
                                    <h5 class="card-title"><a
                                        href="{{ route('Site.product', $related_product->name) }}">{{ $related_product->name }}</a></h5>
                                    <h5>{{ $related_product->price }} جنيه</h5>
                                </div>
                                {{-- Modal --}}

                                {{-- @include('site.includes.modal_view_3',$related_product) --}}
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>

    </body>

    </html>
@endsection
