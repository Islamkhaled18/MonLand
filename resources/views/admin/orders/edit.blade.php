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
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a></li>
            <li class="breadcrumb-item"><a href="{{ route('order.index') }}" title="الطلبيه">الطلبيه</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('order.edit', $order->id) }}" title="طلبية عميل">طلبية عميل
                </a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="tile">
                <div class="tile-body">
                    <div class="col-lg-6">
                        <form action="{{ route('order.update', $order->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input name="id" value="{{ $order->id }}" type="hidden">

                            <div class="form-group">
                                <label for="exampleInputEmail1">اسم العميل</label>
                                <input class="form-control" id="exampleInputEmail1" name="user_id" value="{{ $order->user->firstName }}" type="text" disabled>

                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">مبلغ الطلبيه</label>
                                <input class="form-control" id="exampleInputEmail1" name="total" value="{{ $order->total }}" type="text" disabled>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">ملاحظات العميل </label>
                                <input class="form-control" id="exampleInputEmail1" name="note" value="{{ $order->note }}" type="text" disabled>
                            </div>

                            <div class="form-group">
                                <label for="projectinput1">حالة الطلبيه
                                </label>
                                <select name="status" class="select2 form-control">
                                    <optgroup label="من فضلك أختر  ">
                                        <option value="تم استلام الطلبيه والعمل عليها">تم الاستلام والمراجعه والعمل عليه</option>
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
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orders as $order)
                                                    @foreach ($order->items as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->product->name }}</td>
                                                        <td>{{ $item->quantity }}</td>
                                                        <td>{{ $item->price }}</td>
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
    </div>

</main>
@endsection
