@extends('layouts.site.app')

@section('title')
- الصفحة الشخصية
@endsection

@section('content')

<!-- my Account -->
<section id="account" class="py-5 container my-5 ">
    <div class="page-nav  ">
        <a href="/" class="text-dark pl-2 ">
            <i class="fa-solid fa-house-chimney"></i>

        </a>
        <a href="{{ route('site.profile', auth()->user()->id) }}" class="text-dark ">
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
            حسابي
        </a>

    </div>

    <div class=" row  my-4 ">
        <div class=" col-md-3 ">
            <div class="titles mb-5 mx-4 px-3">مرحبا {{ auth()->user()->firstName }}</div>
            <div class="tab nav  flex-column align-items-center">
                <li><button class="tablinks" id="tab0"><i class="fa-solid fa-user-large px-1"></i>
                        الملف
                        الشخصي</button></li>
                <li> <button class="tablinks" id="tab1">
                        <i class="fa-solid fa-paper-plane px-1"></i>
                        الطلبات</button></li>

                <li><button class="tablinks" id="tab2">
                        <i class="fa-solid fa-location-dot px-1"></i>
                        سجل العناوين</button></li>

                <li>
                    <button class="tablinks">
                        <i class=" fa-solid fa-heart px-1"></i>
                        <a href="{{ route('wishlist.products.index') }}">المفضلة</a>
                    </button>
                </li>

                <li><button class="tablinks" id="tab4">
                        <i class=" fa fa-exchange px-1"></i>
                        <a href="{{ route('compare.products.index') }}">قارن</a>
                    </button></li>

            </div>
        </div>
        <div class=" col-12 col-md-9 tabscontent ">

            <div id="tab0-content" class="tabcontent">
                <div class="titles mb-5 mx-4 px-3">الملف الشخصي</div>
                <form class="border p-5" action="{{ route('site.profile.update', auth()->user()->id) }}" method="POST">
                    @csrf

                    <input name="id" value="{{ auth()->user()->id }}" type="hidden">
                    <div class="form-row">
                        <div class="form-group col-md-5 offset-md-1">
                            <label for="inputName">الاسم الاول</label>
                            <input type="text" class="form-control ml-5" id="inputName" name="firstName"
                                value="{{ auth()->user()->firstName }}">
                        </div>
                        <div class="form-group col-md-6 ">
                            <label for="inputName">الاسم الثاني</label>
                            <input type="text" class="form-control ml-5" id="inputName" name="lastName"
                                value="{{ auth()->user()->lastName }}">
                        </div>
                        <div class="form-group col-md-5 offset-md-1">
                            <label for="inputEmail">البريد الألكتروني</label>
                            <input type="email" class="form-control" id="inputEmail" name="email"
                                value="{{ auth()->user()->email }}">
                        </div>
                        <div class="form-group col-md-6 ">
                            <label for="inputPhone">رقم الهاتف</label>
                            <input type="text" class="form-control" id="inputPhone" name="phone"
                                value="{{ auth()->user()->phone }}">
                        </div>
                    </div>
                    <button type="submit" class="btn ">حفظ التغيرات</button>
                    <button type="button" class="btn details-btn" data-toggle="modal" data-target="#exampleModal"
                        data-whatever="@mdo" id="change-password">تغير كلمة المرور</button>

                </form>

            </div>

            <div id="tab1-content" class="tabcontent">
                <div class="titles  mb-5 mx-4 px-3">الطلبات</div>
                @foreach ($orders as $order)
                <div class="card my-3">
                    <div class="card-body d-flex flex-row flex-wrap  align-items-center">

                        <div class="col-12 col-lg row card-content">
                            <div class="order-img "> <i class="fa-solid fa-file-invoice-dollar "></i>
                            </div>
                            <div class=" col">
                                <div class="my-1"> طلب رقم #{{ $order->id }}</div>
                            </div>
                        </div>
                        <div class="my-2  col-12  col-lg-5 d-flex flex-row justify-content-end px-0">

                            <a class="btn active-btn  ">{{ $order->status }}</a>
                            <a href="{{ route('order.show', $order->id) }}" class="btn details-btn">عرض التفاصيل</a>
                        </div>

                    </div>
                </div>
                @endforeach

            </div>


            <div id="tab2-content" class="tabcontent">
                <div class="titles  mb-5 mx-4 px-3">سجل العناوين</div>
                <div class="row row-cols-2 row-cols-md-3 ">
                    @if($addresses)
                    @foreach ($addresses as $address)
                    <div class="col-md-4 m-3">
                        <div class="py-2 d-flex align-items-center justify-content-center">
                            <div class="checkbox_border_bottom text-center ml-2">
                                <label class="main">
                                    <input type="checkbox" class="default-address-checkbox"
                                        data-address-id="{{ $address->id }}" {{ $address->is_default == 1 ?
                                    'checked="checked"' : '' }}>

                                    <span class="geekmark"></span>
                                </label>
                            </div>
                            <span class="text-larger"> العنوان الأساسي</span>
                        </div>

                        <div class="address-card text-larger p-2">
                            <div class="title border-bottom  px-0 py-2">
                                <div class="col-10 inline-flex px-0">
                                    <i class="fa-solid fa-location-dot border-bottom border-main-color text-xlarge"></i>
                                    <span class="card-title inline-block  text-xlarge"> منزل</span>
                                </div>
                                <div class="col-2 ">
                                    <form action="{{ route('site.profile.destroyAddress', $address->id) }}" title="حذف"
                                        method="post">
                                        @csrf
                                        @method('GET')
                                        <button class="bg-transparent" type="submit">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class=" flex-column mb-2 item-col">
                                <p class="item-title">العنوان</p>
                                <p class="item-info">{{ $address->address_details }}</p>
                            </div>
                            <div class=" flex-column mb-2 item-col">
                                <p class="item-title">رقم مبني/فيلا </p>
                                <p class="item-info">{{ $address->building_no }}</p>
                            </div>
                            <div class="d-flex justify-content-between">

                                <div class=" flex-column mb-2 item-col">
                                    <p class="item-title">رقم الطابق </p>
                                    <p class="item-info">{{ $address->flat_no }}</p>
                                </div>
                                <div class=" flex-column mb-2 text-center item-col">
                                    <p class="item-title">رقم الشقة </p>
                                    <p class="item-info">{{ $address->apartment_no }}</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">

                                <div class=" flex-column mb-2 item-col">
                                    <p class="item-title">المحافظه</p>
                                    <p class="item-info">{{ $address->governorate->name }}</p>
                                </div>
                                <div class=" flex-column mb-2 text-center item-col">
                                    <p class="item-title">المدينه</p>
                                    <p class="item-info">{{ $address->city->name }}</p>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">

                                <div class=" flex-column mb-2 item-col">
                                    <p class="item-title">رقم الأتصال </p>
                                    <p class="item-info">{{ auth()->user()->phone }}</p>
                                </div>
                                <div class=" flex-column mb-2 text-center item-col">
                                    <p class="item-title">رقم أخر </p>
                                    <p class="item-info">{{ $address->Phone_2 }}</p>
                                </div>
                            </div>


                        </div>
                    </div>
                    @endforeach
                    @endif

                    <div class="card col-md-5 m-3">
                        <button class="btn h-100 ">
                            <div class="card-body add-address d-flex flex-column ">
                                <a href="{{ route('site.profile.address', auth()->user()->id) }}">
                                    <i class="fa-solid fa-circle-plus"></i>
                                    <div class="text-dark" disabled>
                                        أضف عنوان جديد
                                    </div>
                                </a>
                            </div>
                        </button>
                    </div>
                </div>
            </div>


        </div>

    </div>

    </div>

</section>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog py-5" role="document">
        <div class="modal-content">
            <div class="modal-header flex-column">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <p class="text-center align-self-center">تغير كلمة المرور</p>
            </div>
            <div class="modal-body px-5">

                <form action="{{ route('site.profile.password.update', auth()->user()->id) }}" method="POST">
                    @csrf

                    <input name="id" value="{{ auth()->user()->id }}" type="hidden">

                    <div class="form-group col-md-12 ">
                        <label for="inputOldPassword">كلمة المرور الحالية</label>
                        <div class=" password-input row align-items-center">
                            <input type="password" class="form-control col-11" id="inputOldPassword" name="old_password"
                                placeholder="ادخل كلمة المرور القديمة">
                            <i class="fa-regular fa-eye toggle-password" toggle="#inputOldPassword"></i>
                        </div>
                    </div>

                    <div class="form-group col-md-12 ">
                        <label for="inputNewPassword">كلمة المرور الحالية</label>
                        <div class="password-input row align-items-center">
                            <input type="password" class="form-control col-11" id="inputNewPassword" name="password"
                                placeholder="ادخل كلمة المرور الجديدة">
                            <i class="fa-regular fa-eye toggle-password" toggle="#inputNewPassword"></i>
                        </div>
                    </div>
                    <div class="row justify-content-center ">
                        <button type="submit" class="btn my-5 col-4">تغير كلمةالمرور</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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
