@extends('layouts.admin.app')
@section('title')
    تعديل مقاس منتج
@endsection
@section('content')
    <main class="app sidebar-mini rtl">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> مقاسات المنتجات </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a></li>
                <li class="breadcrumb-item"><a href="{{ route('sizes.index') }}"  title="مقاسات المنتجات">مقاسات المنتجات</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('sizes.edit', $size->id) }}"  title="تعديل على مقاس منتج">تعديل على مقاس منتج -
                        {{ $size->name }}</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="tile">
                    <div class="tile-body">
                        <div class="col-lg-6">
                            <form action="{{ route('sizes.update', $size->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <input name="id" value="{{ $size->id }}" type="hidden">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">الاسم</label>
                                    <input class="form-control" id="exampleInputEmail1" name="name"
                                        value="{{ $size->name }}" type="text" placeholder="اكتب الاسم">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="projectinput1"> اختر المنتج
                                    </label>
                                    <select name="product_id" class="select2 form-control" >
                                        <optgroup label="من فضلك أختر المنتج ">
                                            @if($products && $products -> count() > 0)
                                                @foreach($products as $product)
                                                    <option
                                                        value="{{$product -> id }}"
                                                        @if($product ->id == $size ->product_id) selected @endif
                                                    >{{$product ->name}}</option>
                                                @endforeach
                                            @endif
                                        </optgroup>
                                    </select>
                                    @error('product_id')
                                    <span class="text-danger"> {{$message}}</span>
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
