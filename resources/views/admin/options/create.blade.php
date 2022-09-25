@extends('layouts.admin.app')
@section('title')
    انشاء خصائص صفه جديده
@endsection
@section('content')
    <main class="app sidebar-mini rtl">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> الصفات </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a></li>
                <li class="breadcrumb-item"><a href="{{ route('options.index') }}">خصائص الصفات</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('options.create') }}"> انشاء خصائص صفه جديده</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="tile">
                    <div class="tile-body">
                        <div class="col-lg-6">
                            <form action="{{ route('options.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="exampleInputEmail1">الاسم </label>
                                    <input class="form-control" id="exampleInputEmail1" name="name"
                                        value="{{ old('name') }}" type="text" placeholder="اكتب الاسم ">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput1"> السعر
                                        </label>
                                        <input type="text" id="price" class="form-control" placeholder=" السعر "
                                            value="{{ old('price') }}" name="price">
                                        @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput1"> اختر ألمنتج
                                        </label>
                                        <select name="product_id" class="select2 form-control">
                                            <optgroup label="من فضلك أختر المنتج ">
                                                @if ($products && $products->count() > 0)
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                    @endforeach
                                                @endif
                                            </optgroup>
                                        </select>
                                        @error('product_id')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1"> اختر خاصيه
                                            </label>
                                            <select name="attribute_id" class="select2 form-control">
                                                <optgroup label="من فضلك أختر قيمه">
                                                    @if ($attributes && $attributes->count() > 0)
                                                        @foreach ($attributes as $attribute)
                                                            <option value="{{ $attribute->id }}">
                                                                {{ $attribute->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </optgroup>
                                            </select>
                                            @error('attribute_id')
                                                <span class="text-danger"> {{ $message }}</span>
                                            @enderror
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
