@extends('layouts.admin.app')
@section('title')
اعداد منتج منتج
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
            <li class="breadcrumb-item active"><a href="{{ route('products.general.create') }}"
                    title="انشاء منتج جديد">إانشاء منتج جديد</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="tile">
                <div class="tile-body">
                    <div class="col-lg-12">
                        <form action="{{ route('productSetting.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-body">
                                <div class="row">


                                    <div class="col-md-6">
                                        <input type="checkbox" value="1" name="quick_request" id="switcheryColor4"
                                            class="switchery" data-color="success" checked />
                                        <label for="switcheryColor4" class="card-title ml-1">الطلب على السريع لكل المنتجات</label>

                                        @error('quick_request')
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
