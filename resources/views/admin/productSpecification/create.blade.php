@extends('layouts.admin.app')
@section('title')
خصائص منتج
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

        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="tile">
                <div class="tile-body">
                    <div class="col-lg-6">
                        <form action="{{ route('productSpecification.store', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <input name="product_id" value="{{ $product->id }}" type="hidden">

                            <div class="form-group">
                                <label for="exampleInputEmail1">الصفه</label>
                                <input class="form-control" id="exampleInputEmail1" name="spec_key"
                                    value="{{ $product->spec_key ?? '' }}" type="text" placeholder="الصفه">
                                @error('spec_key')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="projectinput1">القيمه
                                </label>
                                <input type="text" class="form-control" placeholder="القيمه "
                                    value="{{ $product->spec_value ?? '' }}" name="spec_value">
                                @error('spec_value')
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
