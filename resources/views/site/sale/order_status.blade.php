@extends('layouts.site.app')

@section('title')
    - متابعة حالة الطلب
@endsection

@section('content')
    @if (

            $order->status == 'تم استلام الطلبيه والعمل عليها' ||
            $order->status == 'تم الالغاء بواسطتنا' ||
            $order->status == 'تم الالغاء من العميل')

        <section id="my-cart" class=" container mt-5">
            <!-- stepper -->
            @if ($order->status == 'تم استلام الطلبيه والعمل عليها')
                <div class=" d-flex flex-column align-items-center">
                    <div class="wizard-list ">
                        <div class="rounded-circle wizard-circle active align-self-center">1</div>
                        <div class="col bg-main border-bottom border-main-color "> </div>
                        <div class="rounded-circle wizard-circle ">2</div>
                    </div>
                    <div class="wizard-list justify-content-between py-2">
                        <div>تأكيد الطلب</div>
                        <div class="mx-4">تم</div>
                    </div>
                </div>
                <div class="d-flex flex-column align-items-center">
                    <div class="rounded-circle wizard-circle  text-xlarge mb-2">
                        <i class="fa-solid fa-check"></i>

                    </div>
                    <span>شكرا علي اتمام طلبك</span>
                </div>
            @endif

            <div class="col-12 d-flex justify-content-start  mt-2 mb-5 pb-5   text-large">
                <div class="">
                    طلب رقم
                </div>
                <div class="order-number">
                    #{{ $order->id }}
                </div>
            </div>

            <!-- Start Here -->
            <div class="col-12 d-flex flex-wrap justify-content-center justify-content-lg-between my-2">

                <div
                    class="alert py-1 p-2 col-12 col-lg-9 no-gutters d-flex justify-content-between defualt-raduis  text-large">

                    @if ($order->status == 'تم استلام الطلبيه والعمل عليها')
                        <div class="text-muted text-xlarge text-center mb-3  order-recived-text">
                            تم استلام طلبك بنجاح وجاري العمل عليه
                        </div>
                    @elseif ($order->status == 'تم الالغاء من العميل')
                        <div class="text-muted text-xlarge text-center mb-3  order-recived-text">
                            تم الالغاء من العميل
                        </div>
                    @elseif ($order->status == 'تم الالغاء بواسطتنا')
                        <div class="text-muted text-xlarge text-center mb-3  order-recived-text">
                            خارج نطاق التطغية حاليا - تم الالغاء بواسطتنا
                        </div>
                    @endif

                </div>

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

                                    <div class="col"><i class="fas fa-shipping-fast"></i> شحنة {{ $loop->iteration }} من
                                        {{ $countProdcts }}</div>

                                    <div class="col"><i class="fas fa-store"></i>{{ $product->vendor_name }}</div>

                                    <div class="col-6"><i class="fa-solid fa-motorcycle"></i> التوصيل في خلال 5 أيام عمل
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
                                            {{-- <span class="">اللون : أسود</span>
                                            <span class="">المقاس : XL</span> --}}

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
                                                <input type="hidden" class="product_id" value="{{ $cart->product_id }}">

                                                {{-- <a class="changQuantity decrement-btn {{ $cart->quantity <=1 ? 'deactive-btn' : '' }}"> <i class="fa-solid fa-circle-minus "></i></a> --}}

                                                <div name="quantity" class="quantity-count text-large text-bold px-2"
                                                    value="{{ $cart->quantity }}">{{ $cart->quantity }}</div>

                                                {{-- <a class="changQuantity increment-btn {{ $cart->quantity >= 10 ? 'deactive-btn' : '' }}"> <i class="fa-solid fa-circle-plus "></i></a> --}}
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
                        <div class="text-larger text-simi-bold mb-2">ملخص الطلبية </div>

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
                            {{ $addresses->address_details }} </div>

                    </div>

                </div>
            </div>
        </section>
    @else
        <section id="my-cart" class="container mt-5">
            <!-- stepper -->
            <div class="d-flex flex-column align-items-center">
                <div class="wizard-list">
                    <div class="rounded-circle wizard-circle active align-self-center">
                        1
                    </div>
                    <div class="col bg-main border-bottom border-main-color"></div>
                    <div class="rounded-circle wizard-circle">2</div>
                </div>
                <div class="wizard-list justify-content-between py-2">
                    <div>تأكيد الطلب</div>
                    <div class="mx-4">تم</div>
                </div>
            </div>
            <!-- thanks for order -->
            <div class="d-flex flex-column align-items-center">
                <div class="rounded-circle wizard-circle text-xlarge mb-2">
                    <i class="fa-solid fa-check"></i>
                </div>
                <span>شكرا علي اتمام طلبك</span>
            </div>

            <!-- order number -->
            <div class="col-12 d-flex justify-content-start mt-2 mb-5 pb-5 text-bold text-large">
                <div class="">طلب رقم</div>
                <div class="order-number">#{{ $order->id }}</div>
            </div>
            <!-- status text -->
            <div class="order-status d-flex flex-column align-items-center text-muted text-xlarge text-center mb-3">
                <i class="fa-solid fa-bag-shopping text-success text-xxxlarge"></i>
                <div class="d-flex">
                    <div class="">تم تسليم الشحنة</div>
                </div>
            </div>

            <!-- Start Here -->
            <div class="d-flex flex-wrap justify-content-around pb-3 pt-5">
                <div class="col-12 col-lg-8 mb-4 no-gutters cart">
                    <!-- cart list -->
                    <div class="cart-list pb-2">


                        <!-- order-box -->
                        <div class="order-box mb-5">
                            <?php
                            $subTotal = 0;
                            ?>
                            @if ($products)
                                @foreach ($products as $product)
                                    <!-- cart-box -->
                                    <div class="border-with-raduis ">
                                        <div
                                            class="d-flex flex-row align-items-center text-start main-color border-bottom border-dark py-2">
                                            <div class="col">
                                                <i class="fas fa-shipping-fast"></i>شحنة {{ $loop->iteration }} من
                                                {{ $countProdcts }}
                                            </div>

                                            <div class="col"><i class="fas fa-store"></i> {{ $product->vendor_name }}
                                            </div>

                                            <div class="col-6">
                                                <i class="fa-solid fa-motorcycle"></i> التوصيل في خلال 5 أيام
                                                عمل
                                            </div>
                                        </div>
                                        <!-- cart item -->
                                        <?php
                                        $subTotal = 0;
                                        ?>
                                        @foreach ($product->carts as $cart)
                                            <div class="row mt-3 mx-3 cart-item rounded">
                                                <div class="col-12 col-lg-2 no-gutters d-flex justify-content-start">
                                                    <img class="product-img img-fluid"
                                                        src="../imgs/fav/fav-card-img.jpg" />
                                                </div>
                                                <div
                                                    class="col-12 col-lg-7 text-start cart-item-details d-flex flex-column text-large">
                                                    <span class="py-2"> {{ $cart->products->name }}</span>
                                                    <span class="">اللون : أسود</span>
                                                    <span class="">المقاس : XL</span>
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
                                                    class="col-12 col-lg-3 d-flex flex-column justify-content-between  no-gutters pb-3 ">
                                                    <span
                                                        class="mb-4 mt-4 text-end text-large">{{ $cart->products->price }}
                                                        جنيه</span>
                                                    <div
                                                        class=" quantity-counter d-flex flex-nowrap justify-content-center align-items-center ">
                                                        <input type="hidden" class="product_id"
                                                            value="{{ $cart->product_id }}">

                                                        {{-- <a class="changQuantity decrement-btn {{ $cart->quantity <=1 ? 'deactive-btn' : '' }}"> <i class="fa-solid fa-circle-minus "></i></a> --}}

                                                        <div name="quantity"
                                                            class="quantity-count text-large text-bold px-2"
                                                            value="{{ $cart->quantity }}">{{ $cart->quantity }}</div>

                                                        {{-- <a class="changQuantity increment-btn {{ $cart->quantity >= 10 ? 'deactive-btn' : '' }}"> <i class="fa-solid fa-circle-plus "></i></a> --}}
                                                    </div>

                                                    <button data-toggle="modal"
                                                        data-target="#showmodal"
                                                        data-product="{{$cart->products->id}}"
                                                        class="bg-main text-warning px-3 py-2 w-100  text-larger align-self-end product">
                                                        اكتب تقيم المنتج
                                                    </button>

                                                    

                                                </div>
                                            </div>
                                            <?php
                                            $subTotal += $cart->products->price * $cart->quantity;
                                            ?>
                                        @endforeach

                                        <hr />
                                        <!-- cost & shipping-->
                                        <div class="d-flex flex-column justify-content-between mx-3 rounded">
                                            <div class="d-flex flex-row justify-content-between text-large">
                                                <span class="font-weight-bold d-block align-self-start">المجموع الفرعي
                                                    اللشحنة
                                                </span>
                                                <div class="col col-md-2 text-start">
                                                    <span>{{ $subTotal }}</span>
                                                    <span>جنية</span>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row justify-content-between">
                                                <div>رسوم التوصيل</div>
                                                <div class="col col-md-2 no-gutters text-start">
                                                    @php
                                                        $address_fees = 0;
                                                    @endphp
                                                    <span>{{ $address_fees += $product->vendor_price ?? 0 }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr />
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
                                    </div>

                                    <button  class="col-6 bg-main text-warning px-3 py-2 align-self-end vendor"
                                         data-toggle="modal" data-vendorid="{{$product->id}}"  data-target="#seemodal">
                                        اكتب تقيم للبائع
                                    </button>

                                    
                                @endforeach
                            @endif
                        </div>

                    </div>
                </div>

                <div class="modal fade" id="seemodal" tabindex="-1" role="dialog"
                                        aria-labelledby="11" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div
                                                    class="modal-header flex-row-reverse align-items-center bg-main text-white">

                                                    <h5 class="modal-title text-center w-100" id="11">مراجعة البائع
                                                    </h5>
                                                    <button type="button" class="close m-0 p-0" data-dismiss="modal">
                                                        <span class="text-white">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="row">
                                                        <!-- ratings -->
                                                        <div class="d-flex flex-row flex-wrap px-4 pt-3 col-12">


                                                            <div
                                                                class="col-12 col-lg-9 no-gutters d-flex flex-row flex-wrap my-3">
                                                                <h3 class="w-100 text-right">
                                                                    البائع
                                                                </h3>
                                                                <div class="col no-gutters">
                                                                    <div class="d-flex">5
                                                                        <div class="bar-container m-1 ">
                                                                            <div class="bar-5"></div>
                                                                        </div>
                                                                        (127)
                                                                    </div>
                                                                    <div class="d-flex">4
                                                                        <div class="bar-container m-1 ">
                                                                            <div class="bar-4"></div>
                                                                        </div>
                                                                        (73)
                                                                    </div>
                                                                    <div class="d-flex">3
                                                                        <div class="bar-container m-1 ">
                                                                            <div class="bar-3"></div>
                                                                        </div>
                                                                        (13)
                                                                    </div>
                                                                    <div class="d-flex">2
                                                                        <div class="bar-container m-1 ">
                                                                            <div class="bar-2"></div>
                                                                        </div>
                                                                        (50)
                                                                    </div>
                                                                    <div class="d-flex">1
                                                                        <div class="bar-container m-1 ">
                                                                            <div class="bar-1"></div>
                                                                        </div>
                                                                        (43)
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div
                                                                class="col-12 col-lg-3 no-gutters d-flex flex-column align-items-center ">
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
                                                                            <i
                                                                                class="fa-solid fa-star position-absolute "></i>
                                                                            <div class="position-absolute total-rate">4.2
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <form id="form-review-vendor" method="post"
                                                            action="{{ route('review.store') }}">
                                                            @csrf
                                                        
                                                            <input type="hidden" name="vendor_id"
                                                                value="{{ $product->id }}">
                                                            <div class="col-12 d-flex align-items-center my-4">
                                                                <h4>
                                                                    قييم البائع
                                                                </h4>
                                                                <div class="rate mx-2">
                                                                    <input type="radio" id="star10"
                                                                        name="star_rating" value="5" />
                                                                    <label for="star10" title="text">5 stars</label>
                                                                    <input type="radio" id="star9"
                                                                        name="star_rating" value="4" />
                                                                    <label for="star9" title="text">4 stars</label>
                                                                    <input type="radio" id="star8"
                                                                        name="star_rating" value="3" />
                                                                    <label for="star8" title="text">3 stars</label>
                                                                    <input type="radio" id="star7"
                                                                        name="star_rating" value="2" />
                                                                    <label for="star7" title="text">2 stars</label>
                                                                    <input type="radio" id="star6"
                                                                        name="star_rating" value="1" />
                                                                    <label for="star6" title="text">1 star</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <textarea name="comments" class=" p-2 form-control" placeholder="أضف تعليق (اختيارى)" rows="5"></textarea>

                                                               
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer border-0">
                                                    
                                                    <button type="button" data-dismiss="modal" class="btn btn-dark">إلغاء</button>
                                                    <button  type="submit"
                                                        class="btn btn-secondary BV mx-1 bg-main button-review-vendor"
                                                        data-dismiss="modal">إرسال
                                                    </button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>



                            <div class="modal fade" id="showmodal"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div
                                                                    class="modal-header flex-row-reverse align-items-center bg-main text-white">
                                                                    <h5 class="modal-title text-center w-100"
                                                                        id="exampleModalLabel">مراجعة المنتج</h5>
                                                                    <button type="button" class="close m-0 p-0"
                                                                        data-dismiss="modal">
                                                                        <span class="text-white">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="row">
                                                                        <!-- ratings -->
                                                                        <div
                                                                            class="d-flex flex-row flex-wrap px-4 pt-3 col-12">


                                                                            <div
                                                                                class="col-12 col-lg-9 no-gutters d-flex flex-row flex-wrap my-3">
                                                                                <h3 class="w-100 text-right">
                                                                                    المنتج
                                                                                </h3>
                                                                                <div class="col no-gutters">
                                                                                    <div class="d-flex">5
                                                                                        <div class="bar-container m-1 ">
                                                                                            <div class="bar-5"></div>
                                                                                        </div>
                                                                                        (127)
                                                                                    </div>
                                                                                    <div class="d-flex">4
                                                                                        <div class="bar-container m-1 ">
                                                                                            <div class="bar-4"></div>
                                                                                        </div>
                                                                                        (73)
                                                                                    </div>
                                                                                    <div class="d-flex">3
                                                                                        <div class="bar-container m-1 ">
                                                                                            <div class="bar-3"></div>
                                                                                        </div>
                                                                                        (13)
                                                                                    </div>
                                                                                    <div class="d-flex">2
                                                                                        <div class="bar-container m-1 ">
                                                                                            <div class="bar-2"></div>
                                                                                        </div>
                                                                                        (50)
                                                                                    </div>
                                                                                    <div class="d-flex">1
                                                                                        <div class="bar-container m-1 ">
                                                                                            <div class="bar-1"></div>
                                                                                        </div>
                                                                                        (43)
                                                                                    </div>

                                                                                </div>
                                                                            </div>

                                                                            <div
                                                                                class="col-12 col-lg-3 no-gutters d-flex flex-column align-items-center ">
                                                                                <span class="text-larger">التقيم
                                                                                    العام</span>


                                                                                <div class="circle-wrap">
                                                                                    <div class="circle">
                                                                                        <div class="mask full">
                                                                                            <div class="fill"></div>
                                                                                        </div>
                                                                                        <div class="mask half">
                                                                                            <div class="fill"></div>
                                                                                        </div>
                                                                                        <div class="inside-circle ">
                                                                                            <i
                                                                                                class="fa-solid fa-star position-absolute "></i>
                                                                                            <div
                                                                                                class="position-absolute total-rate">
                                                                                                4.2</div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <form id="form-review" method="post"
                                                                            action="{{ route('review.store') }}">
                                                                            @csrf
                                                                            <input type="hidden" name="product_id"
                                                                                value="{{ $cart->products->id }}">
                                                                            <div
                                                                                class="col-12 d-flex align-items-center my-4">
                                                                                <h4>
                                                                                    قييم المنتج
                                                                                </h4>
                                                                                <div class="rate mx-2">
                                                                                    <input type="radio" id="star5"
                                                                                        name="star_rating"
                                                                                        value="5" />
                                                                                    <label for="star5" title="text">5
                                                                                        stars</label>
                                                                                    <input type="radio" id="star4"
                                                                                        name="star_rating"
                                                                                        value="4" />
                                                                                    <label for="star4" title="text">4
                                                                                        stars</label>
                                                                                    <input type="radio" id="star3"
                                                                                        name="star_rating"
                                                                                        value="3" />
                                                                                    <label for="star3" title="text">3
                                                                                        stars</label>
                                                                                    <input type="radio" id="star2"
                                                                                        name="star_rating"
                                                                                        value="2" />
                                                                                    <label for="star2" title="text">2
                                                                                        stars</label>
                                                                                    <input type="radio" id="star1"
                                                                                        name="star_rating"
                                                                                        value="1" />
                                                                                    <label for="star1" title="text">1
                                                                                        star</label>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-12">
                                                                                <textarea class=" p-2 form-control" name="comments" placeholder="أضف تعليق (اختيارى)" rows="5"></textarea>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer border-0">
                                                                    <button type="button" type="submit"
                                                                        class="btn btn-secondary mx-1 bg-main button-review"
                                                                        data-dismiss="modal">إرسال
                                                                    </button>
                                                                    <button type="button"
                                                                        class="btn btn-dark">إلغاء</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>



                  

                <!-- cart summary  -->
                <div class="cart-summary col-12 pr-4 col-lg-4 align-self-start align-content-start text-start ">
                    <div class="payment-info p-3 border-with-raduis mb-5">
                        <div class="text-larger text-simi-bold mb-2">ملخص الطلبية </div>

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
                            {{ $addresses->address_details }} </div>


                    </div>


                    <button class="w-100 bg-main text-warning px-3 py-2 align-self-end mb-4">
                        <a href="{{ route('exchange.create') }}">
                            عمل طلب استبدال او استرجاع
                        </a>
                    </button>

                    <div class="main-color">
                        <i class="fa-solid fa-circle-exclamation  text-xlarge"></i>
                        <span class="text-small">
                            الرجاء التأكد بأن البائع متاح لديه استبدال او ارجاع
                        </span>
                    </div>

                </div>



            </div>
        </section>


    @endif


@endsection
@push('scripts')
    <script>
        $('.button-review').on('click', function(e) {
            e.preventDefault()
            $("#form-review").submit()
        })
        $('.button-review-vendor').on('click', function(e) {
            e.preventDefault()
            $("#form-review-vendor").submit()
        })
    </script>

    <script>
       $(".vendor").on('click' , function(){
        
        let id =  $(this).data('vendorid');
          
        $("#form-review-vendor  input[name=vendor_id]").val(id);


       })

    </script>

    <script>
        
        $(".product").on("click" , function(){
               
               
               
               $("#form-review input[name=product_id]").val($(this).data("product"));
           })
    </script>


  <script>
   
     
  </script>
@endpush
