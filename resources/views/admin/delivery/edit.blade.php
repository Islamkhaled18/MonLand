@extends('layouts.admin.app')
@section('title')
    تعديل محافظه وسعر شحن جديد
@endsection
@section('content')
    <main class="app sidebar-mini rtl">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> المحافظات واسعار الشحن </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a></li>
                <li class="breadcrumb-item"><a href="{{ route('delivery.index') }}" title="المحافظات واسعار الشحن">المحافظات واسعار الشحن</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('delivery.edit', $delivery->id) }}" title="تعديل على محافظه وسعر شحن">تعديل على محافظه او سعر الشحن -
                        {{ $delivery->governorate_name }}</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="tile">
                    <div class="tile-body">
                        <div class="col-lg-6">
                            <form action="{{ route('delivery.update', $delivery->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <input name="id" value="{{ $delivery->id }}" type="hidden">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">المحافظه</label>
                                    <input class="form-control" id="exampleInputEmail1" name="governorate_name"
                                        value="{{ $delivery->governorate_name }}" type="text">
                                    @error('governorate_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">سعر الشحن</label>
                                    <input class="form-control" id="exampleInputEmail1" name="delivery_price"
                                        value="{{ $delivery->delivery_price }}" type="text">
                                    @error('delivery_price')
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
