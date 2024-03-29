@extends('layouts.admin.app')
@section('title')
    انشاء بائع وسعر شحن
@endsection
@section('content')
    <main class="app sidebar-mini rtl">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> الصفات </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a></li>
                <li class="breadcrumb-item"><a href="{{ route('vendors.index') }}" title="البائعين واسعار الشحن">البائعين وسعر الشحن</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('vendors.create') }}" title="اضافة بائع وسعر شحن جديد"> انشاء بائع وسعر شحن</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="tile">
                    <div class="tile-body">
                        <div class="col-lg-6">
                            <form action="{{ route('vendors.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="exampleInputEmail1">اسم البائع </label>
                                    <input class="form-control" id="exampleInputEmail1" name="vendor_name"
                                        value="{{ old('vendor_name') }}" type="text" placeholder="اسم البائع">
                                    @error('vendor_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> بلد البائع </label>
                                    <input class="form-control" id="exampleInputEmail1" name="country"
                                        value="{{ old('country') }}" type="text" placeholder="بلد البائع ">
                                    @error('country')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">  موعد توصيل منتجاته </label>
                                    <input class="form-control" id="exampleInputEmail1" name="delivery_time"
                                        value="{{ old('delivery_time') }}" type="text" placeholder="موعد توصيل منتجاته">
                                    @error('delivery_time')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1"> حالة الاستبدال او الاسترجاع </label>
                                    <input class="form-control" id="exampleInputEmail1" name="exhange_status"
                                        value="{{ old('exhange_status') }}" type="text" placeholder=" حالة الاستبدال او الاسترجاع">
                                    @error('exhange_status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> حالة توصيل الطلب </label>
                                    <input class="form-control" id="exampleInputEmail1" name="delivery_status"
                                        value="{{ old('delivery_status') }}" type="text" placeholder=" ">
                                    @error('delivery_status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="tile-footer">
                                    <button class="btn btn-primary" type="submit">حفظ</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
