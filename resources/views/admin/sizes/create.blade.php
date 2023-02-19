@extends('layouts.admin.app')
@section('title')
انشاء صورة جدول مقاسات جديده
@endsection
@section('content')
<main class="app sidebar-mini rtl">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> انشاء صورة جدول مقاسات جديده </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a></li>
            <li class="breadcrumb-item"><a href="{{ route('size.index') }}" title="جدول المقاسات">جدول المقاسات</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('size.create') }}" title="انشاء صورة جدول مقاسات جديده">إانشاء صورة جدول مقاسات جديده</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="tile">
                <div class="tile-body">
                    <div class="col-lg-6">
                        <form action="{{route('size.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            
                            <div class="form-group">
                                <label for="image">صورة جدول المقاسات</label>
                                <input class="form-control @error('image') is-invalid @enderror" id="image" name="image" type="file">
                                @error('file')
                                <span class="invalid-feedback">{{ $message }}</span>
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
