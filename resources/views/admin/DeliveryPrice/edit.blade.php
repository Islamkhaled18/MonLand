@extends('layouts.admin.app')
@section('title')
تعديل سعر توصيل للمحافظات
@endsection
@section('content')
<main class="app sidebar-mini rtl">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> تعديل سعر توصيل للمحافظات
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('deliveryPrice.index') }}"
                    title="اسعار التوصيل للمحافظات">اسعار التوصيل للمحافظات</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('deliveryPrice.edit', $delivery_price->id) }}"
                    title="تعديل على سعر توصيل للمحافظات">تعديل على سعر توصيل للمحافظات -
                    {{ $delivery_price->name }}</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="tile">
                <div class="tile-body">
                    <form action="{{ route('deliveryPrice.update', $delivery_price->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <input name="id" value="{{ $delivery_price->id }}" type="hidden">

                        <div class="col-md-6">
                            <label for="projectinput1">اختار اسم البائع
                            </label>
                            <select name="vendor_id" class="select2 form-control">
                                <optgroup label="من فضلك أختر اسم البائع ">
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
                            <label for="projectinput1"> اختر المحافظه
                            </label>
                            <select name="governorate_id" class="select2 form-control">
                                <optgroup label="من فضلك أختر المحافظه ">
                                    @if ($governorates && $governorates->count() > 0)
                                    @foreach ($governorates as $governorate)
                                    <option value="{{ $governorate->id }}">{{ $governorate->name }}
                                    </option>
                                    @endforeach
                                    @endif
                                </optgroup>
                            </select>
                            @error('governorate_id')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">سعر التوصيل</label>
                                    <input class="form-control" id="exampleInputEmail1" name="price"
                                        value="{{ $delivery_price->price }}" type="text" placeholder='سعر التوصيل'>
                                    @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
