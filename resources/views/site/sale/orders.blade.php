@extends('layouts.site.app')

@section('title')

- تأكيد طلب الشراء
@endsection

@section('content')

<section id="my-cart" class=" container mt-5">

    <div class="col-12 d-flex justify-content-between my-2">
        <div class="py-1 p-2 col-9 no-gutters text-larger text-bold text-start">
            الدفع بواسطة
        </div>
        <a href="/cart/cart-page.html" class="main-color ">

            العوده الي عربية
            التسوق
            <i class="fa-solid fa-angle-left"></i></a>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <button type="button" type="submit" class="col-5 bg-main text-white text-large py-2 border-with-raduis border-main-color btn-checkout-order">تأكيد الطلب</button>
                    <button type="button" class="col-5 bg-transparent text-large py-2 border-with-raduis border-main-color" data-dismiss="modal">الغاء</button>

                </div>
            </div>
        </div>
    </div>
    <!-- Start Here -->
    <div class=" d-flex flex-wrap justify-content-around py-3">
        <div class="col-12 col-lg-8 mb-4 no-gutters cart">
            <div class="d-flex flex-column justify-content-start align-items-start text-start mb-5">
                <div class="mb-4 px-2 py-1 payment-bg text-xlarge main-color border-main-color border  w-100">
                    <i class="fa-solid fa-money-bill-1 pl-2"></i>
                    <span class="mb-2">
                        الدفع عند التسليم
                    </span>
                </div>
                <form id="form-checkout-updateOrder" action="{{route('checkout.updateOrder')}}" class="w-100" method="post">
                    @csrf
                    <input type="hidden" name="order_id" value="{{Request::get('order')}}">
                    <p><label for="notes" class="text-xlarge mb-3">ملاحظة التوصيل</label></p>
                    <textarea class="py-2 px-3 w-100 border-main-color border" id="notes" name="note" rows="4" cols="50" placeholder="اضف اي ملاحظة (اختياري)"></textarea>
                    <br>
                    <div class="d-flex align-items-center">
                        {{-- <input type="checkbox" id="terms" name="terms" value="true" class="terms-check"> --}}
                        <label for="terms" class="text-large">
                            لقد قرأت ووافقت على
                            <a class="main-color text-underline py-1 " href="#">سياسات الشحن</a>
                            <a class="main-color text-underline py-1" href="#">و سياسة الاستبدال والاسترجاع</a>
                        </label>
                    </div>
                    <br>
                    <button type="button" class="bg-main border-with-raduis text-white text-xlarge w-100 py-2" data-toggle="modal" data-target="#exampleModal">
                        تأكيد الطلب
                    </button>
                    <!-- <input type="submit" value="تأكيد الطلب" sdata-toggle="modal" data-target="#exampleModal"
              class="bg-main border-with-raduis text-white text-xlarge w-100 py-2"> -->
                </form>
            </div>
            <!-- cart list -->
            <div class="cart-list py-2">
                <p class="py-2 text-start text-bold my-3">عربة التسوق</p>
                <!-- card box -->
                <div class=" border-with-raduis mb-4">
                    <!-- card box -->
                    <?php
            $subTotal = 0;
            ?>
                    @if($products)

                    @foreach ($products as $product)

                    <div class=" border-with-raduis mb-4">
                        <div class="d-flex flex-row align-items-center text-start main-color border-bottom border-dark py-2">

                            <div class="col"><i class="fas fa-shipping-fast"></i> شحنة {{$loop->iteration}} من {{$countProdcts}}</div>

                            <div class="col"><i class="fas fa-store"></i>{{$product->vendor_name}}</div>

                            <div class="col-6"><i class="fa-solid fa-motorcycle"></i> التوصيل في خلال 5 أيام عمل </div>

                        </div>
                        <!-- cart item -->
                        <?php
                    $subTotal = 0;
                    ?>
                        @foreach($product->carts as $cart)
                        <div class="row mt-3 mx-3 cart-item rounded">
                            <div class="col-12 col-lg-2 no-gutters  d-flex justify-content-start"><img class="product-img" src="{{$cart->products->images[1]->photo ?? asset('images/default.png')}}" width="120" height="120" alt="{{$cart->products->name}}">
                            </div>
                            <div class="col-12 col-lg-7 text-start cart-item-details d-flex flex-column text-large">
                                <span class="py-2 "> {{$cart->products->name}}</span>
                                {{-- <span class="">اللون : {{$product->pro}}</span>
                                <span class="">المقاس : XL</span> --}}

                                {{-- <form action="{{ route('cart.destroy',$cart->products->id) }}" method="POST" style="color: rgb(31, 27, 27)">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" style="color: rgb(24, 20, 20)"><i class="fa-solid fa-trash-can px-1"></i>حذف</button>

                                </form> --}}


                                <span class="main-color">
                                    <i class="fa-solid fa-arrow-rotate-left px-1"></i>
                                    <span>{{$cart->products->anotherInformation}}</span>
                                </span>
                            </div>
                            <div class="col-12 col-lg-3 d-flex  flex-lg-column  justify-content-between justify-content-lg-start">

                                <span class="mb-4 mt-5 text-center text-large">{{$cart->products->price }} جنيه</span>
                                <div class=" quantity-counter d-flex flex-nowrap justify-content-center align-items-center ">
                                    <input type="hidden" class="product_id" value="{{ $cart->product_id }}">

                                    {{-- <a class="changQuantity decrement-btn {{ $cart->quantity <=1 ? 'deactive-btn' : '' }}"> <i class="fa-solid fa-circle-minus "></i></a> --}}

                                    <div name="quantity" class="quantity-count text-large text-bold px-2" value="{{ $cart->quantity }}">{{ $cart->quantity }}</div>

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
                                <span class="font-weight-bold d-block align-self-start ">المجموع الفرعي اللشحنة </span>
                                <div class="col col-md-2 text-start">
                                    <span>{{$subTotal }}</span>
                                    <span>جنية</span>

                                </div>

                            </div>

                            <div class="d-flex flex-row justify-content-between ">

                                <div>رسوم التوصيل </div>
                                <div class="col col-md-2 no-gutters text-start">
                                    @php
                                    $address_fees = 0;
                                    @endphp
                                    <span>{{$address_fees += $product->vendor_price ?? 0 }}</span>
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
                                    <span class="d-flex flex-row text-large"> المجموع الكلي للشحنة {{$product['total'] }}</span>
                                </div>

                            </div>
                        </div>
                    </div> <!-- card box -->
                    @endforeach
                    @endif
                </div>

            </div>
        </div>


        <!-- cart summary  -->
        <div class="cart-summary col-12 pr-4 col-lg-4 align-self-start align-content-start text-start ">
            <div class="payment-info p-3 border-with-raduis mb-5">
                <div class="text-larger text-simi-bold mb-2">ملخص الطلبية </div>



                {{-- @if (!session()->has('code', 'value'))
                <form action="{{ route('site.coupon.store') }}" method="POST">
                @csrf
                <div class="input-group defualt-raduis">
                    <input type="text" class="form-control defualt-raduis-start" name="code" placeholder="اضف الكوبون هنا">
                    <div class="input-group-prepend defualt-raduis-end">
                        <button class="bg-main-color px-2 defualt-raduis-end" type="submit">تفعيل</button>
                    </div>
                </div>
                </form>

                @endif --}}


                <div class="text-large text-bold py-1">عدد الشحنات : {{$countProdcts}}</div>

                @php
                $total = 0;
                @endphp
                @foreach ($products as $product)

                <div class="">
                    <span> إجمالي شحنة </span>
                    <span class="px-1">{{$loop->iteration}}هو
                        {{$product['total']}}
                        @php

                        $total += $product['total']
                        @endphp
                    </span>
                </div>

                @endforeach


                @if (session()->get('code'))

                <div class="text-large text-bold py-1">الخصم: ({{ session()->get('value') }})
                </div>


                {{-- <form action="{{ route('site.coupon.destroy') }}" method="POST" style="color: green">
                    @csrf
                    {{ method_field('delete') }}
                    <button type="submit" style="color: rgb(24, 20, 20)">حذف</button>
                </form> --}}
                @endif

                <hr class=" ">

                @if (session()->has('value'))
                <span>
                    @php
                    $total = $total - session()->get('value');

                    @endphp
                    <div class="text-large text-bold"> المجموع الكلي : {{$total}}
                    </div>

                </span>
                @else

                <div class="text-large text-bold"> المجموع الكلي : {{$total}} </div>
                @endif

                <div class="text-small"> يتم التوصيل الي </div>
                <div class="text-small main-color">
                    {{ $addresses->address_details}} </div>

                <form action="{{ route('checkout.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="total" value="{{$total}}">

                    {{-- <div class="d-flex justify-content-center">
                        <button type="submit" class=" bg-add-to-cart defualt-raduis text-white text-larger text-center my-2 py-2 px-4 rounded justify-self-center">
                            اتمام الشراء
                        </button>
                    </div> --}}
                </form>

            </div>

        </div>
    </div>


    <!-- samiler products -->

</section>
@endsection

@push('scripts')
    <script>
        $('.btn-checkout-order').on('click',function(e){
            e.preventDefault()
            $("#form-checkout-updateOrder").submit()
        })
    </script>
@endpush

