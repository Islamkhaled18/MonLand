@extends('layouts.admin.app')
@section('title')
    تعديل بائع وسعر شحن
@endsection
@section('content')
    <main class="app sidebar-mini rtl">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> البائعين واسعار الشحن </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a></li>
                <li class="breadcrumb-item"><a href="{{ route('vendors.index') }}" title="البائعين واسعار الشحن">البائعين
                        واسعار الشحن</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('vendors.edit', $vendor->id) }}"
                        title="تعديل على بائع وسعر الشحن الخاص به">تعديل على بائع او سعر الشحن -
                        {{ $vendor->vendor_name }}</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="tile">
                    <div class="tile-body">
                        <div class="col-lg-6">
                            <form action="{{ route('vendors.update', $vendor->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <input name="id" value="{{ $vendor->id }}" type="hidden">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">المحافظه</label>
                                    <input class="form-control" id="exampleInputEmail1" name="vendor_name"
                                        value="{{ $vendor->vendor_name }}" type="text">
                                    @error('vendor_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">سعر الشحن</label>
                                    <input class="form-control" id="exampleInputEmail1" name="vendor_price"
                                        value="{{ $vendor->vendor_price }}" type="text">
                                    @error('vendor_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1"> حالة الاستبدال او الاسترجاع </label>
                                    <input class="form-control" id="exampleInputEmail1" name="exhange_status"
                                        value="{{ $vendor->exhange_status }}" type="text"
                                        placeholder=" حالة الاستبدال او الاسترجاع">
                                    @error('exhange_status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> حالة توصيل الطلب </label>
                                    <input class="form-control" id="exampleInputEmail1" name="delivery_status"
                                        value="{{ $vendor->delivery_status }}" type="text" placeholder=" ">
                                    @error('delivery_status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
