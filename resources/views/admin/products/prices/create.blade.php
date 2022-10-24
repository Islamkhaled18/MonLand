@extends('layouts.admin.app')
@section('title')
    انشاء منتج
@endsection
@section('content')
    <main class="app sidebar-mini rtl">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> المنتجات </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a></li>
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}" title="المنتجات">المنتجات</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('products.general.create') }}" title="انشاء منتج جديد">إانشاء منتج جديد</a></li>

            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="tile">
                    <div class="tile-body">
                        <div class="col-lg-6">
                            <form action="{{ route('products.price.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="product_id" value="{{ $id }}">

                                <div class="form-body">
                                    <h4 class="form-section"><i class="ft-home"></i> البيانات الاساسية للمنتج </h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1"> سعر المنتج
                                                </label>
                                                <input type="number" id="price" class="form-control" placeholder="  سعر المنتج "
                                                    value="{{ old('price') }}" name="price">
                                                @error('price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1"> سعر خاص
                                                </label>
                                                <input type="number" class="form-control" placeholder=" سعر خاص "
                                                    value="{{ old('special_price') }}" name="special_price">
                                                @error('special_price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="projectinput1">نوع السعر
                                                </label>
                                                <select name="special_price_type" class="select2 form-control" multiple>
                                                    <optgroup label="من فضلك أختر النوع ">
                                                        <option value="percent">precent</option>
                                                        <option value="fixed">fixed</option>
                                                    </optgroup>
                                                </select>
                                                @error('special_price_type')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1"> تاريخ البداية
                                                </label>

                                                <input type="date" id="price" class="form-control" placeholder="  "
                                                    value="{{ old('special_price_start') }}" name="special_price_start">

                                                @error('special_price_start')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1"> تاريخ البداية
                                                </label>
                                                <input type="date" id="price" class="form-control" placeholder="  "
                                                    value="{{ old('special_price_end') }}" name="special_price_end">

                                                @error('special_price_end')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
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
