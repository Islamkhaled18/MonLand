@extends('layouts.site.app')

@section('title')
- تأكيد طلب الشراء
@endsection

@section('content')
<section class="page-nav container-fluid text-start py-5 px-4 mt5 ">

    <a href="/" class="text-dark pl-2">
        <i class="fa-solid fa-house-chimney"></i>
    </a>
    <a href="#" class="text-dark">
        <i class="fa fa-chevron-right" aria-hidden="true"></i>
        عربة التسوق
    </a>

</section>
<section id="my-cart" class=" container-fluid mt-5">
    <!-- stepper -->


    <div class="col-12 d-flex justify-content-between my-2">
        <div class="py-1 p-2 col-9 no-gutters text-larger text-bold text-start">
            الدفع بواسطة
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog text-center" role="document">
            <div class="modal-content">
                <div class="text-center text-xlarge p-4 pb-0">
                    <i class="fa-solid fa-circle-info main-color fa-2x"></i>
                    </button>
                </div>
                <div class="modal-body pt-0">
                    <div>انت علي وشك اتمام عملية الشراء من <span class="main-color">كيان</span></div>
                    <div>قد تختلف مصاريف الشحن من منطقة للاخري</div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" type="submit"
                        class="col-5 bg-main text-white text-large py-2 border-with-raduis border-main-color btn-checkout-order">تأكيد
                        الطلب</button>
                    <button type="button"
                        class="col-5 bg-transparent text-large py-2 border-with-raduis border-main-color"
                        data-dismiss="modal">الغاء</button>

                </div>
            </div>
        </div>
    </div>
    <!-- Start Here -->

    <div class="col-12 col-md-8 d-flex flex-column justify-content-start align-items-start text-start mb-5">
        <div class="mb-4 px-4 py-3 payment-bg text-xlarge main-color border d-flex   w-100">

            <img src="{{ asset('website_assets/imgs/icons/cash.png') }}">
            <span class="mx-4">
                الدفع عند التسليم
            </span>
        </div>
        <form id="form-checkout-updateOrder" action="{{ route('checkout.updateOrder') }}" class="w-100" method="post">
            @csrf
            <input type="hidden" name="order_id" value="{{ Request::get('order') }}">
            <p><label for="notes" class="text-xlarge mb-3">ملاحظة التوصيل</label></p>
            <textarea class="py-2 px-3 w-100 border-main-color border" id="notes" name="note" rows="4" cols="50"
                placeholder="اضف اي ملاحظة (اختياري)"></textarea>
            <br>
            {{-- <div class="d-flex align-items-center">
                <input type="checkbox" id="terms" name="terms" value="true" class="terms-check">
                <label for="terms" class="text-large">
                    لقد قرأت ووافقت على
                    <a class="main-color text-underline py-1 " href="#">سياسات الشحن</a>
                    <a class="main-color text-underline py-1" href="#">و سياسة الاستبدال والاسترجاع</a>
                </label>
            </div> --}}
            <br>
            <button type="button" class="bg-main border-with-raduis text-white text-xlarge w-100 py-2"
                data-toggle="modal" data-target="#exampleModal">
                تأكيد الطلب
            </button>

        </form>
    </div>


    @if ($cart_products && $cart_products->count() > 0)



    <section id="my-cart" class=" container-fluid px-4 mt-5">
        @if ($countProdcts > 1)
        <div class="col-12 d-flex flex-wrap justify-content-center justify-content-lg-between my-2">

            <div class="alert py-1 p-2 py-3  col-12 col-lg-8 no-gutters d-flex justify-content-between   text-large">
                <div>
                    <i class="fa-solid text-xlarge   fa-circle-info main-color px-2"></i>
                    <span>المنتجات المضافة من اكثر من بائع, لذلك سيتم تجزئة الطلب اكثر
                        من شحنة</span>
                </div>
                {{-- <button class="bg-transparent text-normal px-2"> <i class="fa-solid fa-x"></i></button> --}}
            </div>
            <button
                class="bg-transparent text-normal px-2 mt-2 py-2 my-lg-0 justify-self-end border-main-color defualt-raduis">
                <a href="{{ route('home') }}">تابع التسوق</a>

                </i></button>


        </div>
        @endif
        <!-- Start Here -->
        <div class=" d-flex flex-wrap justify-content-around py-3">
            <!-- cart list -->

            <div class="col-12 col-lg-8 mb-4 no-gutters cart">
                <!-- card box -->
                <?php
                $subTotal = 0;
                ?>
                @if ($cart_products)
                @foreach ($cart_products as $product)
                <div class=" border border-secondary mb-4">
                    <div
                        class="cart-item-card d-flex flex-row align-items-center text-start main-color border-bottom border-dark py-2">

                        <div class="col"><img src="{{ asset('website_assets/imgs/icons/delivery-truck.png') }}" alt>
                            شحنة {{ $loop->iteration }} من {{ $countProdcts }}</div>

                        <div class="col"><img src="{{ asset('website_assets/imgs/icons/shop.png') }}" alt>{{
                            $product->vendor_name }}</div>

                        <div class="col"><img src="{{ asset('website_assets/imgs/icons/output-onlinepngtools.png') }}"
                                alt> التوصيل في
                            خلال {{$product->delivery_time ?? $product->vendor_name }} أيام عمل
                        </div>

                    </div>

                    <!-- cart item -->
                    <?php
                    $subTotal = 0;
                    ?>
                    @foreach ($product->carts as $cart)
                    <div class="row mt-3 mx-3 cart-item rounded">
                        <div class="col-12 col-lg-2 no-gutters  d-flex justify-content-start"><img class="product-img"
                                src="{{ $cart->products->images[1]->photo ? asset($cart->products->images[1]->photo) : asset('images/default.png') }}"
                                width="120" height="120" alt="{{ $cart->products->name }}">
                        </div>
                        <div class="col-12 col-lg-7 text-start cart-item-details d-flex flex-column text-large">
                            <span class="py-2 "> {{ $cart->products->name }}</span>
                            <span class>اللون :
                                {{ $cart->color ?? '--' }}

                            </span>
                            <span class>المقاس :
                                {{ $cart->size ?? '--' }}
                            </span>

                            <span class="main-color">
                                <img src="{{ asset('website_assets/imgs/icons/product-return.png') }}" alt>
                                <span>{{ $cart->products->anotherInformation }}</span>
                            </span>
                        </div>
                        <div
                            class="col-12 col-lg-3 d-flex  flex-lg-column  justify-content-between justify-content-lg-start">
                            <span class="mb-4 mt-5 text-center text-large">{{$cart->price ?? $cart->products->new_price
                                ??
                                $cart->products->old_price }} جنيه</span>
                            <div
                                class=" quantity-counter d-flex flex-nowrap justify-content-center align-items-center ">

                                <input type="hidden" class="product_id" value="{{ $cart->product_id }}">


                                <div name="quantity" class="quantity-count text-large text-bold px-2"
                                    value="{{ $cart->quantity }}">{{ $cart->quantity }}</div>

                            </div>
                        </div>
                    </div>

                    <?php
                        $subTotal += ($cart->price ??  $cart->products->new_price ?? $cart->products->old_price) * $cart->quantity;
                    ?>
                    @endforeach


                    <hr class>
                    <!-- cost & shipping-->
                    <div class="d-flex flex-column justify-content-between mx-3 rounded text-large">

                        <div class="d-flex flex-row justify-content-between ">
                            <span class=" d-block align-self-start ">المجموع الفرعي اللشحنة
                            </span>
                            <div class="col col-md-2 text-start">
                                <span>{{ $subTotal }}</span>
                                <span>جنية</span>

                            </div>

                        </div>

                        <div class="d-flex flex-row justify-content-between ">

                            <div>رسوم التوصيل </div>
                            <div class="col col-md-2 no-gutters text-start">
                                @guest
                                <span><a href="{{route('login')}}">حسب العنوان</a></span>
                                @else
                                @php
                                // Get the vendor's ID
                                $vendorId = $product->id;


                                $deliveryPrice = \App\Models\DeliveryPrice::where('governorate_id',
                                $user_address->governorate_id)
                                ->where('vendor_id', $vendorId)
                                ->select('price')
                                ->first();

                                // Retrieve the delivery price for the vendor, or set it to 0 if not found
                                if ($deliveryPrice) {
                                $deliveryFee = $deliveryPrice->price;
                                $disableButton = false;
                                } else {
                                $deliveryFee = null;
                                $errorMessage = 'البائع لا يقوم بالتوصيل لهذه المنطقة حتى الان برجاء حذفه';
                                $disableButton = true;
                                }
                                @endphp

                                @if ($deliveryFee)
                                <span>{{ $deliveryFee }}</span>
                                @else
                                <span class="bg-yellow" style="background-color: yellow; padding: 5px;">{{ $errorMessage
                                    }}</span>
                                @endif

                                @endguest
                            </div>
                        </div>

                    </div>
                    <hr>
                    <!-- total-->
                    <div class="d-flex justify-content-between align-items-center mx-3 pb-3 rounded">
                        <div class="d-flex flex-row">

                            <div class="ml-2">
                                @php

                                $product['total'] = $subTotal + (float) $deliveryFee;

                                @endphp

                                <span class="d-flex flex-row text-large"> المجموع الكلي للشحنة 1
                                    {{ $product['total'] }}</span>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
                @endif


            </div>




            <!-- cart summary  -->
            <div class="cart-summary col-12 pr-4 col-lg-4 align-self-start align-content-start text-start ">
                <div class="payment-info p-3 border border-secondary mb-5">



                    <div class="text-large text-bold py-1">عدد الشحنات : {{ $countProdcts }}</div>

                    @php
                    $total = 0;
                    @endphp
                    @foreach ($cart_products as $product)
                    <div>
                        <span> إجمالي شحنة </span>
                        <span class="px-1">
                            {{ $loop->iteration }}هو
                            {{ $product['total'] }}
                            @php

                            $total += $product['total'];
                            @endphp
                        </span>
                    </div>
                    @endforeach

                    @if (session()->get('code'))
                    <div class="text-large text-bold py-1">الخصم: ({{ session()->get('value') }})
                    </div>


                    <form action="{{ route('site.coupon.destroy') }}" method="POST" style="color: green">
                        @csrf
                        {{ method_field('delete') }}
                        <button type="submit" style="color: rgb(24, 20, 20)">حذف</button>
                    </form>
                    @endif


                    <div class="border border-dark mx-3 my-3"></div>

                    @if (session()->has('value'))
                    <span>
                        @php
                        $total = $total - session()->get('value');

                        @endphp
                        <div class="text-large text-bold"> المجموع الكلي : {{ $total }}
                        </div>

                    </span>
                    @else
                    <div class="text-large text-bold"> المجموع الكلي : {{ $total }} </div>
                    @endif



                    <div class> يتم التوصيل الي </div>
                    <div class=" py-1"><a class="main-color border-bottom border-main-color"
                            href="#"> <i
                                class="fa-solid fa-location-dot px-1 "></i>
                            عنوانك الذي قمت بتسجيله مسبقا
                            </a>
                    </div>


                </div>

            </div>
        </div>

        <!-- samiler products -->

    </section>

    @endif
    <!-- samiler products -->

</section>


@endsection

@push('scripts')
<script>
    $('.btn-checkout-order').on('click', function(e) {
            e.preventDefault()
            $("#form-checkout-updateOrder").submit()
        })
</script>
@endpush
