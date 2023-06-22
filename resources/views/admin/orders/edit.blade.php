@extends('layouts.admin.app')
@section('title')
طلبيه
@endsection
@section('content')
<main class="app sidebar-mini rtl">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> الطبيه </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('order.index') }}" title="الطلبيه">الطلبيه</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('order.edit', $order->id) }}" title="طلبية عميل">طلبية
                    عميل
                </a></li>
        </ul>
    </div>
        <div class="col-md-12">

            <div class="tile">
                <div class="tile-body">
                    <div class="col-lg-6">
                        <form action="{{ route('order.update', $order->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <input name="id" value="{{ $order->id }}" type="hidden">

                            <div class="form-group">
                                <label for="exampleInputEmail1">اسم العميل</label>
                                <input class="form-control" id="exampleInputEmail1" name="user_id"
                                    value="{{ $order->user->firstName }}" type="text" disabled>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">رقم تليفون العميل </label>
                                <input class="form-control" id="exampleInputEmail1" value="{{ $order->user->phone }}"
                                    type="text" disabled>

                            </div>

                            @php
                            $defaultAddress = $order->user->addresses->firstWhere('is_default', 1);
                            @endphp

                            @if($defaultAddress )
                            {{-- @foreach ($defaultAddress as $address) --}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">رقم تليفون ثاني للعميل </label>
                                <input class="form-control" id="exampleInputEmail1"
                                    value="{{ $defaultAddress->Phone_2 }}" type="text" disabled>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> تفاصيل العنوان </label>
                                <input class="form-control" id="exampleInputEmail1"
                                    value="{{ $defaultAddress->address_details }}" type="text" disabled>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> رقم العماره </label>
                                <input class="form-control" id="exampleInputEmail1"
                                    value="{{ $defaultAddress->building_no }}" type="text" disabled>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> رقم الشقه </label>
                                <input class="form-control" id="exampleInputEmail1"
                                    value="{{ $defaultAddress->flat_no }}" type="text" disabled>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> المحافظة </label>
                                <input class="form-control" id="exampleInputEmail1"
                                    value="{{ $defaultAddress->governorate->name }}" type="text" disabled>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> رقم الطابق </label>
                                <input class="form-control" id="exampleInputEmail1"
                                    value="{{ $defaultAddress->apartment_no}}" type="text" disabled>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> علامه مميزه </label>
                                <input class="form-control" id="exampleInputEmail1"
                                    value="{{ $defaultAddress->special_mark}}" type="text" disabled>

                            </div>


                            {{-- @endforeach --}}
                            @endif

                            <div class="form-group">
                                <label for="exampleInputEmail1">مبلغ الطلبيه</label>
                                <input class="form-control" id="exampleInputEmail1" name="total"
                                    value="{{ $order->total }}" type="text" disabled>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">ملاحظات العميل </label>
                                <input class="form-control" id="exampleInputEmail1" name="note"
                                    value="{{ $order->note }}" type="text" disabled>
                            </div>

                            <div class="form-group">
                                <label for="projectinput1">حالة الطلبيه
                                </label>
                                <select name="status" class="select2 form-control">
                                    <optgroup label="من فضلك أختر  ">
                                        <option value="تم استلام الطلبيه والعمل عليها">تم الاستلام والمراجعه والعمل عليه
                                        </option>
                                        <option value="تم الالغاء من العميل">تم الالغاء من العميل</option>
                                        <option value="تم الالغاء بواسطتنا">تم الالغاء بواسطتنا</option>
                                        <option value="تم تسليمها للعميل">تم تسليمها للعميل</option>
                                    </optgroup>
                                </select>
                                @error('status')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="tile">
                                        <div class="tile-body">
                                            <table class="table table-hover table-bordered" id="sampleTable">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>اسم المنتج</th>
                                                        <th>الكمية المطلوبه</th>
                                                        <th>السعر</th>
                                                        <th>اللون</th>
                                                        <th>المقاس</th>
                                                        <th>صورة المنتج</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orders as $order)
                                                    @foreach ($order->items as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->product->name }}</td>
                                                        <td>{{ $item->quantity }}</td>
                                                        <td>{{ $item->price ?? $item->product->new_price ??
                                                            $item->product->old_price }}</td>
                                                        <td>{{ $item->product_color }}</td>
                                                        <td>{{ $item->product_size }}</td>
                                                        <td>
                                                            <div
                                                                class="col-12 col-lg-2 no-gutters  d-flex justify-content-start">
                                                                <img class="product-img"
                                                                    src="{{ $item->product->images[1]->photo ? asset($item->product->images[1]->photo) : asset('images/default.png') }}"
                                                                    width="60" height="60"
                                                                    alt="{{ $item->product->name }}">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tile-footer">
                                <button class="btn btn-primary" type="submit">تعديل</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>

</main>
@endsection
