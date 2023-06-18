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

                        <div class="col"><img src=" {{ asset('website_assets/imgs/icons/shop.png') }}" alt>{{
                            $product->vendor_name }}</div>

                        <div class="col"><img src="{{ asset('website_assets/imgs/icons/output-onlinepngtools.png') }}"
                                alt> التوصيل في
                            خلال {{$product->delivery_days ?? $product->vendor_name }} أيام عمل
                        </div>

                    </div>

                    <!-- cart item -->
                    <?php
                    $productSubTotal = 0;
                    ?>
                    @foreach ($product->carts as $cart)
                    <div class="row mt-3 mx-3 cart-item rounded">
                        <div class="col-12 col-lg-2 no-gutters  d-flex justify-content-start"><img class="product-img"
                                src="{{ $cart->products->images[1]->photo ? asset($cart->products->images[1]->photo) : asset('images/default.png') }}"
                                width="120" height="120" alt="{{ $cart->products->name }}">
                        </div>
                        <div class="col-12 col-lg-7 text-start cart-item-details d-flex flex-column text-large">
                            <span class="py-2 ">

                                <a href="{{ route('Site.product',$cart->products->name ) }}">{{ $cart->products->name
                                    }}</a>
                            </span>
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
                                <img src="../imgs/icons/product-return.png" alt>
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
                    $productSubTotal += ($cart->price ?? $cart->products->new_price ?? $cart->products->old_price) * $cart->quantity;
                    ?>
                    @endforeach
                    <?php
                    $subTotal += $productSubTotal;
                    ?>


                    <hr class>
                    <!-- cost & shipping-->
                    <div class="d-flex flex-column justify-content-between mx-3 rounded text-large">

                        <div class="d-flex flex-row justify-content-between ">
                            <span class=" d-block align-self-start ">المجموع الفرعي اللشحنة
                            </span>
                            <div id="subtotal" class="col col-md-2 text-start">
                                <span>{{ $subTotal }}</span>
                                <span>جنية</span>

                            </div>

                        </div>

                        <div class="d-flex flex-row justify-content-between ">

                            <div>رسوم التوصيل </div>
                            <div class="col col-md-2 no-gutters text-start deliveryFee">

                                @guest
                                <span><a href="{{route('login')}}">حسب العنوان</a></span>
                                @else
                                <span>{{ $deliveryFee }}</span>

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

                                <span id="total" class="d-flex flex-row text-large"> المجموع الكلي للشحنة
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

                        <div class="input-group input-group-lg defualt-raduis my-3 ">
                            <input type="text" class="form-control -start alert defualt-raduis-start" name="code"
                                placeholder="اضف الكوبون هنا">
                            <div class="input-group-prepend -end defualt-raduis-end">
                                <button class="bg-main-color px-2 -end defualt-raduis-end" type="submit">تفعيل</button>
                            </div>
                        </div>
                    </form>
                    @endif


                    <div class="text-large text-bold py-1">عدد الشحنات : {{ $countProdcts }}</div>

                    @php
                    $total = 0;
                    @endphp
                    @foreach ($cart_products as $product)
                    <div data-price="{{ $product['total'] }}">
                        <span> إجمالي شحنة </span>
                        <span id="summary" class="px-1" oninput="calculateTotal()">
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
                        <div class="text-large text-bold" id="total"> المجموع الكلي : {{ $total }} </div>

                </div>

                </span>
                @else
                <div class="text-large text-bold" id="total"> المجموع الكلي : {{ $total }} </div>

                @endif



                <div class> يتم التوصيل الي </div>
                <div class=" py-1"><a class="main-color border-bottom border-main-color"
                        href="{{ route('site.profile', auth()->user()->id) }}"> <i
                            class="fa-solid fa-location-dot px-1 "></i>
                        أضف
                        العنوان</a>
                </div>

                @guest
                <div class="d-flex justify-content-center my-3">
                    <button type="button" disabled
                        class="bg-add-to-cart text-white text-larger text-center col-8 my-2 py-3 px-5 rounded justify-self-center">
                        اتمام الشراء
                    </button>
                </div>
                @else
                <form action="{{ route('site.checkout.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="total" value="{{ $total }}">
                    <div class="d-flex justify-content-center my-3">
                        <button type="submit"
                            class="bg-add-to-cart text-white text-larger text-center col-8 my-2 py-3 px-5 rounded justify-self-center">
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
        function updateTotalValue() {
                // Calculate the new total value based on the updated quantity
                var totalQuantity = 0;
                $('.quantity-count').each(function() {
                    var quantity = parseInt($(this).text(), 10);
                    totalQuantity += isNaN(quantity) ? 0 : quantity;
                });
                var totalDeliveryFee = 0;
                $('.deliveryFee').each(function() {
                    var deliveryFee = parseInt($(this).text(), 10);
                    totalDeliveryFee += isNaN(deliveryFee) ? 0 : deliveryFee;
                });
                var newTotal = totalQuantity * ({{ $cart->price ?? $cart->products->new_price ?? $cart->products->old_price }}) + totalDeliveryFee ;

                // Update the total value
                $('#total').text('المجموع الكلي للشحنة  ' + newTotal);
                $('#summary').text(newTotal);

            }
    </script>
    <script>
        function calculateTotal() {
            var total = 0;
            var summaryElement = document.getElementById('summary');
            total += parseInt(summaryElement.innerText);
            document.getElementById('total').innerText = 'المجموع الكلي : ' + total;
        }

        calculateTotal();
    </script>

    @endpush
