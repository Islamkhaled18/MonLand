@extends('layouts.admin.app')
@section('title')
انشاء مقاس منتج
@endsection
@section('content')
<main class="app sidebar-mini rtl">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> انشاء مقاس منتج </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a></li>
            <li class="breadcrumb-item"><a href="{{ route('sizes.index') }}" title="انشاء مقاس منتج">انشاء مقاس منتج</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('sizes.create') }}" title="انشاء مقاس منتج">انشاء مقاس منتج</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="tile">
                <div class="tile-body">
                    <div class="col-lg-6">
                        <form action="{{route('sizes.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">المقاس </label>
                                <input class="form-control" id="exampleInputEmail1" name="name" value="{{old('name')}}" type="text" placeholder="اكتب الاسم ">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">السعر </label>
                                <input class="form-control" id="exampleInputEmail1" name="price" value="{{old('price')}}" type="text" placeholder="اكتب الاسم ">
                                @error('price')
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
