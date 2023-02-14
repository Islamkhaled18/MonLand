@extends('layouts.admin.app')
@section('title')
    تعديل على الشروط والحكام
@endsection
@section('content')
    <main class="app sidebar-mini rtl">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> الشروط والاحكام  </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a></li>
                <li class="breadcrumb-item"><a href="{{ route('terms.index') }}"  title="الشروط والاحكام ">الشروط والاحكام </a></li>
                <li class="breadcrumb-item active"><a href="{{ route('terms.edit', $term->id) }}"  title="تعديل على الشروط والاحكام ">تعديل على سياسة الشحن -
                        {{ $term->name }}</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="tile">
                    <div class="tile-body">
                        <div class="col-lg-6">
                            <form action="{{ route('terms.update', $term->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <input name="id" value="{{ $term->id }}" type="hidden">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">محتوى سياسة الشحن</label>
                                    <textarea class="form-control" id="exampleInputEmail1" value="{{ $term->name }}" name="name"></textarea>
                                    
                                    @error('name')
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
