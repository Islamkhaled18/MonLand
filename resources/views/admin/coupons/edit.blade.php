@extends('layouts.admin.app')
@section('title')
    تعديل كوبون خصم
@endsection
@section('content')
    <main class="app sidebar-mini rtl">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> كوبونات الخصم </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a></li>
                <li class="breadcrumb-item"><a href="{{ route('coupon.index') }}"  title="كوبونات الخصم">كوبونات الخصم</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('coupon.edit', $coupon->id) }}"  title="تعديل على كوبون خصم">تعديل على كوبون خصم -
                        {{ $coupon->name }}</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="tile">
                    <div class="tile-body">
                        <div class="col-lg-6">
                            <form action="{{ route('coupon.update', $coupon->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <input name="id" value="{{ $coupon->id }}" type="hidden">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">الكود</label>
                                    <input class="form-control" id="exampleInputEmail1" name="code"
                                        value="{{ $coupon->code }}" type="text" placeholder="اكتب الكود">
                                    @error('code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">قيمة الخصم</label>
                                    <input class="form-control" id="exampleInputEmail1" name="value"
                                        value="{{ $coupon->value }}" type="text" placeholder="اكتب قيمة الخصم">
                                    @error('value')
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
