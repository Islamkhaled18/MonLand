@extends('layouts.admin.app')
@section('title')
تعديل منتج
@endsection
@section('content')
<main class="app sidebar-mini rtl">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> المنتجات </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}" title="المنتجات">المنتجات</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('products.edit', $productSetting->id) }}"
                    title="تعديل على حالة الطلب على السريع لكل المنتجات">تعديل على حالة الطلب على السريع لكل المنتجات -
                    {{ $productSetting->name }}</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="tile">
                <div class="tile-body">
                    <div class="col-lg-6">
                        <form action="{{ route('productSetting.update', $productSetting->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <input name="id" value="{{ $productSetting->id }}" type="hidden">


                            <div class="form-group mt-1">
                                <input type="checkbox" value="{{ $productSetting->quick_request }}" name="quick_request"
                                    id="switcheryColor4" class="switchery" data-color="success" checked />

                                {{--  <input type="checkbox" value="{{ $productSetting->quick_request }}" name="quick_request"
                                    id="switcheryColor4" class="switchery" data-color="success" />  --}}

                                <label for="switcheryColor4" class="card-title ml-1">طلب سريع </label>

                                @error('quick_request')
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
