@extends('layouts.site.app')

@section('title')
    - سلة المشتريات
@endsection

@section('content')

    @if ($products && $products->count() > 0)

        <!-- my Cart -->

        <section class="page-nav container text-start py-5 mt5 ">

            <a href="/" class="text-dark pl-2">
                <i class="fa-solid fa-house-chimney"></i>
            </a>
            <a href="#" class="text-dark">
                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                عربة التسوق
            </a>

        </section>

        @if ($vendors_cart_count > 0 && $vendors_cart_count <= 1)

            <section id="my-cart" class=" container mt-5">

                <div class="col-12 d-flex flex-wrap justify-content-center justify-content-lg-between my-2">
                    @if ($countProdcts > 1)
                        <div
                            class="alert py-1 p-2 col-12 col-lg-9 no-gutters d-flex justify-content-between defualt-raduis  text-large">

                            <div> <i class="fa-solid fa-circle-info main-color px-2"></i>
                                <span>المنتجات المضافة من اكثر من بائع, لذلك سيتم تجزئة الطلب اكثر من شحنة</span>
                            </div>

                            {{-- <button class="bg-transparent text-normal px-2"> <i class="fa-solid fa-x"></i></button> --}}
                        </div>
                    @endif

                    <button
                        class="bg-transparent text-normal px-2 mt-2 py-2 my-lg-0 justify-self-end border-main-color defualt-raduis">
                        <a href="{{ route('home') }}">تابع التسوق</a>

                        </i></button>
                </div>
                <!-- Start Here -->
                <div class=" d-flex flex-wrap justify-content-around py-3">
                    <!-- cart list -->


                    <div class="col-12 col-lg-8 mb-4 no-gutters cart product_data">
                        <!-- card box -->
                        <?php
                        $subTotal = 0;
                        ?>
                        @if ($products)
                            @foreach ($products as $product)
                                <div class=" border-with-raduis mb-4">
                                    <div
                                        class="d-flex flex-row align-items-center text-start main-color border-bottom border-dark py-2">

                                        <div class="col"><i class="fas fa-shipping-fast"></i> شحنة {{ $loop->iteration }}
                                            من
                                            {{ $countProdcts }}</div>

                                        <div class="col"><i class="fas fa-store"></i>{{ $product->vendor_name }}</div>

                                        <div class="col-6"><i class="fa-solid fa-motorcycle"></i> التوصيل في خلال 5 أيام
                                            عمل
                                        </div>

                                    </div>
                                    <!-- cart item -->
                                    <?php
                                    $subTotal = 0;
                                    ?>
                                    @foreach ($product->carts as $cart)
                                        <div class="row mt-3 mx-3 cart-item rounded">
                                            <div class="col-12 col-lg-2 no-gutters  d-flex justify-content-start">
                                                <img
                                                    class="product-img"
                                                    src="{{ $cart->products->images[1]->photo ? asset($cart->products->images[1]->photo) : asset('images/default.png') }}"
                                                    width="120" height="120" alt="{{ $cart->products->name }}">
                                            </div>
                                            <div
                                                class="col-12 col-lg-7 text-start cart-item-details d-flex flex-column text-large">
                                                <span class="py-2 "> {{ $cart->products->name }}</span>
                                                <span class="">اختر اللون:</span>
                                                <select class="custom-select " onchange="getColorVal(this);">
                                                    <option disabled selected>الالوان</option>
                                                    @foreach ($cart->products->colors as $color)
                                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                                    @endforeach

                                                </select>
                                                <span class="">اختر المقاس:</span>

                                                <select class="custom-select" onchange="getSizeVal(this);">
                                                    <option disabled selected>المقاسات</option>
                                                    @foreach ($cart->products->sizes as $size)
                                                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                                                    @endforeach

                                                </select>


                                                <form action="{{ route('cart.destroy', $cart->products->id) }}"
                                                    method="POST" style="color: rgb(31, 27, 27)">
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

                                                <span class="mb-4 mt-5 text-center text-large">{{ $cart->products->price }}
                                                    جنيه</span>
                                                <div
                                                    class=" quantity-counter d-flex flex-nowrap justify-content-center align-items-center ">
                                                    <input type="hidden" class="product_id"
                                                        value="{{ $cart->product_id }}">

                                                    <a
                                                        class="changQuantity decrement-btn {{ $cart->quantity <= 1 ? 'deactive-btn' : '' }}">
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
                                        $subTotal += $cart->products->price * $cart->quantity;
                                        ?>
                                    @endforeach

                                    <hr>
                                    <!-- cost & shipping-->
                                    <div class="d-flex flex-column justify-content-between mx-3 rounded">

                                        <div class="d-flex flex-row justify-content-between text-large">
                                            <span class="font-weight-bold d-block align-self-start ">المجموع الفرعي اللشحنة
                                            </span>
                                            <div class="col col-md-2 text-start">
                                                <span>{{ $subTotal }}</span>
                                                <span>جنية</span>

                                            </div>

                                        </div>

                                        <div class="d-flex flex-row justify-content-between ">

                                            <div>رسوم التوصيل </div>
                                            <div class="col col-md-2 no-gutters text-start">
                                                @php
                                                    $address_fees = 0;
                                                @endphp
                                                <span>{{ $address_fees += $delivery_fees->price ?? 0 }}</span>
                                            </div>
                                        </div>

                                    </div>
                                    <hr>
                                    <!-- total-->
                                    <div class="d-flex justify-content-between align-items-center mx-3 pb-3 rounded">
                                        <div class="d-flex flex-row">

                                            <div class="ml-2">

                                                @php

                                                    $product['total'] = $subTotal + $address_fees;

                                                @endphp
                                                <span class="d-flex flex-row text-large"> المجموع الكلي للشحنة
                                                    {{ $product['total'] }}</span>
                                            </div>

                                        </div>
                                    </div>
                                </div> <!-- card box -->
                            @endforeach
                        @endif
                    </div>






                    <!-- cart summary  -->
                    <div class="cart-summary col-12 pr-4 col-lg-4 align-self-start align-content-start text-start ">
                        <div class="payment-info p-3 border-with-raduis mb-5">
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
                                            <button class="bg-main-color px-2 defualt-raduis-end"
                                                type="submit">تفعيل</button>
                                        </div>
                                    </div>
                                </form>
                            @endif


                            <div class="text-large text-bold py-1">عدد الشحنات : {{ $countProdcts }}</div>

                            @php
                                $total = 0;
                            @endphp
                            @foreach ($products as $product)
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

                            <hr class=" ">

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

                            <div class="text-small"> يتم التوصيل الي </div>
                            <div class="text-small main-color">
                                {{ isset($addresses->address_details) ? $addresses->address_details : '--' }} </div>

                            @if (isset($addresses->address_details))
                                <form action="{{ route('checkout.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="total" value="{{ $total }}">
                                    <input type="hidden" name="pickedColor[]"value="">
                                    <input type="hidden" name="pickedSize[]" value="">
                                    <div class="d-flex justify-content-center">
                                        <button type="submit"
                                            class=" bg-add-to-cart defualt-raduis text-white text-larger text-center my-2 py-2 px-4 rounded justify-self-center">
                                            اتمام الشراء
                                        </button>
                                    </div>
                                </form>
                            @else
                                <div class="d-flex justify-content-center">
                                    <button type="submit" disabled
                                        class=" bg-add-to-cart defualt-raduis text-white text-larger text-center my-2 py-2 px-4 rounded justify-self-center">
                                        اتمام الشراء
                                    </button>
                                </div>
                            @endif

                        </div>

                    </div>
                </div>


                <!-- samiler products -->

            </section>
        @else
            <section id="my-cart" class=" container mt-5">

                <div class="col-12 d-flex flex-wrap justify-content-center justify-content-lg-between my-2">
                    @if ($countProdcts > 1)
                        <div
                            class="alert py-1 p-2 col-12 col-lg-9 no-gutters d-flex justify-content-between defualt-raduis  text-large">

                            <div> <i class="fa-solid fa-circle-info main-color px-2"></i>
                                <span>المنتجات المضافة من اكثر من بائع, لذلك سيتم تجزئة الطلب اكثر من شحنة</span>
                            </div>

                            {{-- <button class="bg-transparent text-normal px-2"> <i class="fa-solid fa-x"></i></button> --}}
                        </div>
                    @endif

                    <button
                        class="bg-transparent text-normal px-2 mt-2 py-2 my-lg-0 justify-self-end border-main-color defualt-raduis">
                        <a href="{{ route('home') }}">تابع التسوق</a>

                        </i></button>
                </div>
                <!-- Start Here -->
                <div class=" d-flex flex-wrap justify-content-around py-3">
                    <!-- cart list -->


                    <div class="col-12 col-lg-8 mb-4 no-gutters cart product_data">
                        <!-- card box -->
                        <?php
                        $subTotal = 0;
                        ?>
                        
                        @if ($products)
                            @foreach ($products as $product)
                                <div class=" border-with-raduis mb-4">
                                    <div
                                        class="d-flex flex-row align-items-center text-start main-color border-bottom border-dark py-2">

                                        <div class="col"><i class="fas fa-shipping-fast"></i> شحنة
                                            {{ $loop->iteration }}
                                            من
                                            {{ $countProdcts }}</div>

                                        <div class="col"><i class="fas fa-store"></i>{{ $product->vendor_name }}</div>

                                        <div class="col-6"><i class="fa-solid fa-motorcycle"></i> التوصيل في خلال 5 أيام
                                            عمل
                                        </div>

                                    </div>
                                    <!-- cart item -->
                                    <?php
                                    $subTotal = 0;
                                    ?>
                                    @foreach ($product->carts as $cart)
                                        <div class="row mt-3 mx-3 cart-item rounded">
                                            <div class="col-12 col-lg-2 no-gutters  d-flex justify-content-start"><img
                                                    class="product-img"
                                                    src="{{ $cart->products->images[1]->photo ? asset($cart->products->images[1]->photo) : asset('images/default.png') }}"
                                                    width="120" height="120" alt="{{ $cart->products->name }}">
                                            </div>
                                            <div
                                                class="col-12 col-lg-7 text-start cart-item-details d-flex flex-column text-large">
                                                <span class="py-2 "> {{ $cart->products->name }}</span>
                                                <span class="">اختر اللون:</span>
                                                <select class="custom-select " onchange="getColorVal(this);">
                                                    <option disabled selected>الالوان</option>
                                                    @foreach ($cart->products->colors as $color)
                                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                                    @endforeach

                                                </select>
                                                <span class="">اختر المقاس:</span>

                                                <select class="custom-select" onchange="getSizeVal(this);">
                                                    <option disabled selected>المقاسات</option>
                                                    @foreach ($cart->products->sizes as $size)
                                                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                                                    @endforeach

                                                </select>


                                                <form action="{{ route('cart.destroy', $cart->products->id) }}"
                                                    method="POST" style="color: rgb(31, 27, 27)">
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

                                                <span
                                                    class="mb-4 mt-5 text-center text-large">{{ $cart->products->price }}
                                                    جنيه</span>
                                                <div
                                                    class=" quantity-counter d-flex flex-nowrap justify-content-center align-items-center ">
                                                    <input type="hidden" class="product_id"
                                                        value="{{ $cart->product_id }}">

                                                    <a
                                                        class="changQuantity decrement-btn {{ $cart->quantity <= 1 ? 'deactive-btn' : '' }}">
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
                                        $subTotal += $cart->products->price * $cart->quantity;
                                        ?>
                                    @endforeach

                                    <hr>
                                    <!-- cost & shipping-->
                                    <div class="d-flex flex-column justify-content-between mx-3 rounded">

                                        <div class="d-flex flex-row justify-content-between text-large">
                                            <span class="font-weight-bold d-block align-self-start ">المجموع الفرعي اللشحنة
                                            </span>
                                            <div class="col col-md-2 text-start">
                                                <span>{{ $subTotal }}</span>
                                                <span>جنية</span>

                                            </div>

                                        </div>

                                        <div class="d-flex flex-row justify-content-between ">

                                            <div>رسوم التوصيل </div>
                                            <div class="col col-md-2 no-gutters text-start">
                                                @php
                                                    $address_fees = 0;
                                                @endphp
                                                <span>{{ $address_fees += $product->vendor_price ?? 0 }}</span>
                                            </div>
                                        </div>



                                    </div>
                                    <hr>
                                    <!-- total-->
                                    <div class="d-flex justify-content-between align-items-center mx-3 pb-3 rounded">
                                        <div class="d-flex flex-row">

                                            <div class="ml-2">

                                                @php

                                                    $product['total'] = $subTotal + $address_fees;

                                                @endphp
                                                <span class="d-flex flex-row text-large"> المجموع الكلي للشحنة
                                                    {{ $product['total'] }}</span>
                                            </div>

                                        </div>
                                    </div>
                                </div> <!-- card box -->
                            @endforeach
                        @endif
                    </div>


                    <!-- cart summary  -->
                    <div class="cart-summary col-12 pr-4 col-lg-4 align-self-start align-content-start text-start ">
                        <div class="payment-info p-3 border-with-raduis mb-5">
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
                                            <button class="bg-main-color px-2 defualt-raduis-end"
                                                type="submit">تفعيل</button>
                                        </div>
                                    </div>
                                </form>
                            @endif


                            <div class="text-large text-bold py-1">عدد الشحنات : {{ $countProdcts }}</div>

                            @php
                                $total = 0;
                            @endphp
                            @foreach ($products as $product)
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

                            <hr class=" ">

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

                            <div class="text-small"> يتم التوصيل الي </div>
                            <div class="text-small main-color">
                                {{ isset($addresses->address_details) ? $addresses->address_details : '--' }} </div>

                            @if (isset($addresses->address_details))
                                <form action="{{ route('checkout.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="total" value="{{ $total }}">
                                    <input type="hidden" name="pickedColor[]"value="">
                                    <input type="hidden" name="pickedSize[]" value="">
                                    <div class="d-flex justify-content-center">
                                        <button type="submit"
                                            class=" bg-add-to-cart defualt-raduis text-white text-larger text-center my-2 py-2 px-4 rounded justify-self-center">
                                            اتمام الشراء
                                        </button>
                                    </div>
                                </form>
                            @else
                                <div class="d-flex justify-content-center">
                                    <button type="submit" disabled
                                        class=" bg-add-to-cart defualt-raduis text-white text-larger text-center my-2 py-2 px-4 rounded justify-self-center">
                                        اتمام الشراء
                                    </button>
                                </div>
                            @endif

                        </div>

                    </div>
                </div>


                <!-- samiler products -->

            </section>
        @endif
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

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
    let colors = [];
    let sizes = [];

    function getColorVal(sel) {


        $('input[name="pickedColor[]"]').each(function() {

            colors.push(sel.value);
        });



        $('input[name="pickedColor[]"]').val(colors);

    }



    function getSizeVal(sel) {
        $('input[name="pickedSize[]"]').each(function() {

            sizes.push(sel.value);
        });

        $('input[name="pickedSize[]"]').val(sizes);

    }
</script>
