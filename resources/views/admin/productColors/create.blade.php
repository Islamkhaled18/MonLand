@extends('layouts.admin.app')
@section('title')
انشاء الوان منتج
@endsection
@section('content')
<main class="app sidebar-mini rtl">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> انشاء الوان منتج </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('colors.index') }}" title="انشاء الوان منتج">انشاء الوان
                    منتج</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('colors.create') }}" title="انشاء الوان منتج">انشاء
                    الوان منتج</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="tile">
                <div class="tile-body">
                    <div class="col-lg-6">
                        <form action="{{route('colors.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <p>لابد من تسجيل اللون باللغه الانجليزية</p>


                            <div class="form-group">
                                <label for="exampleInputEmail1">الاسم </label>
                                <input class="form-control" id="exampleInputEmail1" name="name" value="{{old('name')}}"
                                    type="text" placeholder="اكتب الاسم ">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="projectinput1"> اختر ألمنتج
                                </label>
                                <select name="product_id" class="select2 form-control">
                                    <optgroup label="من فضلك أختر المنتج ">
                                        @if ($allProducts && $allProducts->count() > 0)
                                        @foreach ($allProducts as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                        @endif
                                    </optgroup>
                                </select>
                                @error('product_id')
                                <span class="text-danger"> {{ $message }}</span>
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
