@extends('layouts.site.app')

@section('title')
- سلة المشتريات
@endsection

@section('content')

<!-- my Cart -->

<section class="page-nav container-fluid text-start py-5 px-4 mt5 ">

    <a href="/" class="text-dark pl-2">
        <i class="fa-solid fa-house-chimney"></i>
    </a>
    <a href="#" class="text-dark">
        <i class="fa fa-chevron-right" aria-hidden="true"></i>
        عربة التسوق
    </a>

    @if ($cart_products && $cart_products->count() > 0)



    <section id="my-cart" class=" container-fluid px-4 mt-5">
        @if ($countProdcts > 1)
        <div class="col-12 d-flex flex-wrap justify-content-center justify-content-lg-between my-2">
            <div class="alert py-1 p-2 py-3  col-12 col-lg-8 no-gutters d-flex justify-content-between text-large">
                <div> <i class="fa-solid text-xlarge   fa-circle-info main-color px-2"></i>
                    <span>المنتجات المضافة من اكثر من بائع, لذلك سيتم تجزئة الطلب اكثر
                        من شحنة</span>
                </div>
            </div>
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

                        <div class="col"><img src="{{ asset('website_assets/imgs/icons/delivery-truck.png') }}"> شحنه
                            {{ $loop->iteration }}
                            من
                            {{ $countProdcts }}</div>

                        <div class="col"><img src="{{ asset('website_assets/imgs/icons/shop.png') }}">
                            {{ $product->vendor_name }}
                        </div>

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
                                src="{{ isset($cart->products->images[1]) ? asset($cart->products->images[1]->photo) : asset('images/default.png') }}"
                                width="120" height="120" alt="{{ $cart->products->name }}">
                        </div>
                        <div class="col-12 col-lg-7 text-start cart-item-details d-flex flex-column text-large">
                            <span class="py-2 ">{{ $cart->products->name }}</span>
                            <span class>اللون :
                                {{ $cart->color ?? '--' }}
                            </span>
                            <span class>المقاس :
                                {{ $cart->size ?? '--' }}
                            </span>
                            <form action="{{ route('cart.destroy', $cart->products->id) }}" method="POST"
                                style="color: rgb(31, 27, 27)">
                                @csrf
                                @method('GET')
                                <button type="submit" style="color: rgb(24, 20, 20)"><i
                                        class="fa-solid fa-trash-can px-1"></i>حذف</button>

                            </form>

                            <span class="main-color">
                                <i class="fa-solid fa-arrow-rotate-left px-1"></i>
                                <span>{{ $cart->products->anotherInformation }}</span>
                            </span>
                        </div>
                        <div
                            class="col-12 col-lg-3 d-flex  flex-lg-column  justify-content-between justify-content-lg-start">
                            <span class="mb-4 mt-5 text-center text-large">
                                {{$cart->price ?? $cart->products->new_price ?? $cart->products->old_price }} جنيه
                            </span>

                            <div
                                class=" quantity-counter d-flex flex-nowrap justify-content-center align-items-center ">
                                <input type="hidden" class="product_id" value="{{ $cart->product_id }}">

                                <a class="changQuantity decrement-btn {{ $cart->quantity <= 1 ? 'deactive-btn' : '' }}">
                                    <i class="fa-solid fa-circle-minus "></i></a>

                                <div name="quantity" class="quantity-count text-large text-bold px-2"
                                    value="{{ $cart->quantity }}">{{ $cart->quantity }}</div>

                                <a
                                    class="changQuantity increment-btn {{ $cart->quantity >= 10 ? 'deactive-btn' : '' }}">
                                    <i class="fa-solid fa-circle-plus "></i></a>
                            </div>
                        </div>
                    </div>
                    <?php
                    $subTotal += ($cart->price ?? $cart->products->new_price ?? $cart->products->old_price) * $cart->quantity;
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

                                if (isset($deliveryFee)) {
                                $product['total'] = $subTotal + (float) $deliveryFee;
                                } else {
                                $product['total'] = $subTotal;
                                }

                                @endphp

                                <span class="d-flex flex-row text-large"> المجموع الكلي للشحنة
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
                    @if (session()->has('message'))
                    <p class="text-danger">{{ session()->get('message') }}...!</p>
                    @endif

                    <div class="text-larger text-simi-bold mb-2">ملخص الطلبية </div>

                    @if (!session()->has('code', 'value'))
                    <form action="{{ route('site.coupon.store') }}" method="POST">
                        @csrf
                        <div class="input-group defualt-raduis">
                            <input type="text" class="form-control defualt-raduis-start" name="code"
                                placeholder="اضف الكوبون هنا">
                            <div class="input-group-prepend defualt-raduis-end">
                                <button class="bg-main-color px-2 defualt-raduis-end" type="submit">تفعيل</button>
                            </div>
                        </div>
                    </form>
                    @endif


                    <div class="text-large text-bold py-1">عدد الشحنات : {{ $countProdcts }}</div>


                    @php
                    $total = 0;
                    @endphp
                    @foreach ($cart_products as $product)
                    <div class="">
                        <span> إجمالي شحنة </span>
                        <span class="px-1">{{ $loop->iteration }}هو
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


                    {{-- <div class> يتم التوصيل الي </div>
                    <div class=" py-1"><a href="{{ route('site.profile', auth()->user()->id) }}"
                            class="main-color border-bottom border-main-color">
                            <i class="fa-solid fa-location-dot px-1 "></i>
                            أضف العنوان</a>
                    </div> --}}


                    @guest
                    <div class=" py-1"><a href="{{route('login')}}"
                            class="main-color border-bottom border-main-color">
                            <i class="fa-solid fa-location-dot px-1 "></i>
                            أضف العنوان</a>
                    </div>
                    @else
                    <div class=" py-1"><a href="{{ route('site.profile', auth()->user()->id) }}"
                            class="main-color border-bottom border-main-color">
                            <i class="fa-solid fa-location-dot px-1 "></i>
                            أضف العنوان</a>
                    </div>
                    @endguest

                    @guest
                    <div class="d-flex justify-content-center my-3">
                        <button type="button" disabled
                            class="bg-add-to-cart text-white text-larger text-center col-8 my-2 py-3 px-5 rounded justify-self-center">
                            <a href="{{route('login')}}">اتمام الشراء</a>
                        </button>
                    </div>
                    @else
                    <form action="{{ route('site.checkout.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="total" value="{{ $total }}">

                        @foreach ($cart_products as $product)
                        @php
                        // Get the vendor's ID
                        $vendorId = $product->id;

                        $deliveryPrice = \App\Models\DeliveryPrice::where('governorate_id',
                        $user_address->governorate_id)
                        ->where('vendor_id', $vendorId)
                        ->select('price')
                        ->first();

                        // Retrieve the delivery price for the vendor, or set it to null if not found
                        $deliveryFee = $deliveryPrice ? $deliveryPrice->price : null;
                        @endphp

                        <input type="hidden" name="deliveryFee[]" value="{{ $deliveryFee }}">
                        @endforeach

                        <div class="d-flex justify-content-center my-3">
                            <button type="submit"
                                class="bg-add-to-cart text-white text-larger text-center col-8 my-2 py-3 px-5 rounded justify-self-center"
                                {{ $disableButton ? 'disabled' : '' }}>
                                اتمام الشراء
                            </button>
                        </div>
                    </form>
                    @endguest
                </div>

            </div>
        </div>

        <!-- samiler products -->

    </section>

    @else
    <!-- my Cart -->
    <section id="cart" class="py-5 container my-5">
        <div class="page-nav row">
            <a href="/" class="text-dark pl-2">
                <i class="fa-solid fa-house-chimney"></i>
            </a>
            <a href="#" class="text-dark">
                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                عربةالتسوق
            </a>
        </div>

        <div class="d-flex flex-column justify-content-center text-center align-items-center my-5 py-5">
            <div>
                <img src="{{ asset('website_assets/imgs/cart/Empty cart cartoon.svg') }}" class="img-fluid"
                    alt="Empty Cart" />
            </div>
            <h4>المنتج غير موجود</h4>
            <p class="col-md-6 justify-self-center">
                أسف... لم يتم العثور على منتجات داخل عربة التسوق الخاصه بك!
            </p>
            <button type="button" class="btn btn-dark my-4">استمرار التسوق</button>
        </div>
    </section>


    @endif

    @endsection


    @push('scripts')

    <script>
        function activate_deactivate_btn(increase, decrease, value) {
            if (value >= 10) {
                increase.addClass("deactive-btn")
                decrease.removeClass("deactive-btn")
            } else if (value <= 1) {
                decrease.addClass("deactive-btn")
                increase.removeClass("deactive-btn")
            } else {
                decrease.removeClass("deactive-btn")
                increase.removeClass("deactive-btn")
            }
        }

        $(document).ready(function() {
            $('.increment-btn').click(function(e) {
                e.preventDefault();
                var inc_value = $(this).parents('.quantity-counter').find('.quantity-count').text();
                var value = parseInt(inc_value, 10);
                value = isNaN(value) ? 0 : value;
                if (value < 10) {
                    value++;
                    $(this).parents('.quantity-counter').find('.quantity-count').text(value);
                }
                activate_deactivate_btn($(this), $(this).parents('.quantity-counter').find(
                    '.decrement-btn'), value)
            });
            $('.decrement-btn').click(function(e) {
                e.preventDefault();
                var dec_value = $(this).parents('.quantity-counter').find('.quantity-count').text();
                var value = parseInt(dec_value, 10);
                value = isNaN(value) ? 0 : value;
                if (value > 1) {
                    value--;
                    dec_value = $(this).parents('.quantity-counter').find('.quantity-count').text(value);
                }
                activate_deactivate_btn($(this).parents('.quantity-counter').find('.increment-btn'), $(
                    this), value)
            });

            $('.changQuantity').click(function(e) {
                e.preventDefault();
                var product_id = $(this).parents('.quantity-counter').find('.product_id').val();
                var quantity = $(this).parents('.quantity-counter').find('.quantity-count').text();
                data = {
                    'product_id': product_id,
                    'quantity': quantity
                }
                console.log(data)
                $.ajax({
                    method: 'POST',
                    url: "{{ Route('cart.update') }}",
                    data: data,
                    success: function(response) {
                        console.log(response)
                        location.reload();
                    }
                });
            });
        });

    </script>

    @endpush
