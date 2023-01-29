@extends('layouts.admin.app')
@section('title')
    انشاء محافظه وسعر شحن
@endsection
@section('content')
    <main class="app sidebar-mini rtl">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> الصفات </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a></li>
                <li class="breadcrumb-item"><a href="{{ route('delivery.index') }}">المحافظات وسعر الشحن</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('delivery.create') }}"> انشاء محافظه وسعر شحن</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="tile">
                    <div class="tile-body">
                        <div class="col-lg-6">
                            <form action="{{ route('delivery.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="exampleInputEmail1">المحافظه </label>
                                    <input class="form-control" id="exampleInputEmail1" name="governorate_name"
                                        value="{{ old('governorate_name') }}" type="text" placeholder="المحافظه">
                                    @error('governorate_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">سعر الشحن </label>
                                    <input class="form-control" id="exampleInputEmail1" name="delivery_price"
                                        value="{{ old('delivery_price') }}" type="text" placeholder="سعر الشحن">
                                    @error('delivery_price')
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
