@extends('layouts.admin.app')
@section('title')
انشاء سعر توصيل جديد للمحافظات
@endsection
@section('content')
<main class="app sidebar-mini rtl">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> انشاء سعر توصيل جديد للمحافظات
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('deliveryPrice.index') }}"
                    title="اسعار التوصيل للمحافظات">اسعار التوصيل للمحافظات</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('deliveryPrice.create') }}"
                    title="انشاء سعر توصيل للمحافظات جديد">إانشاء سعر توصيل للمحافظات جديد</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="tile">
                <div class="tile-body">
                    <div class="col-lg-12">
                        <form action="{{ route('deliveryPrice.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf


                            <div class="form-body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <label for="projectinput1">اختار اسم البائع</label>

                                        <select name="vendor_id" class="select2 form-control">
                                            <optgroup label="من فضلك أختر البائع ">
                                                @if ($vendors && $vendors->count() > 0)
                                                @foreach ($vendors as $vendor)
                                                <option value="{{ $vendor->id }}">{{ $vendor->vendor_name }}
                                                </option>
                                                @endforeach
                                                @endif
                                            </optgroup>
                                        </select>
                                        @error('vendor_id')
                                        <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="projectinput1"> اختار المحافظه
                                        </label>
                                        <select name="governorate_id" class="select2 form-control">
                                            <optgroup label="من فضلك أختر المحافظه ">
                                                @if ($governorates && $governorates->count() > 0)
                                                @foreach ($governorates as $governorate)
                                                <option value="{{ $governorate->id }}">{{ $governorate->name }}</option>
                                                @endforeach
                                                @endif
                                            </optgroup>
                                        </select>
                                        @error('governorate_id')
                                        <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">سعر التوصيل</label>
                                        <input class="form-control" id="exampleInputEmail1" name="price"
                                            value="{{ old('price') }}" type="text"
                                            placeholder='سعر التوصيل'>
                                        @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
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
