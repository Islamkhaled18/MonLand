@extends('layouts.admin.app')
@section('title')
تعديل صورة مقاس
@endsection
@section('content')
<main class="app sidebar-mini rtl">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> تعديل صورة مقاس </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a></li>
            <li class="breadcrumb-item"><a href="{{ route('size.index') }}" title="صور المقاسات">صور المقاسات</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('size.edit', $size->id) }}" title="تعديل على صورة مقاسات">تعديل على صورة مقاسات -
                    </a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="col-lg-6">
                        <form action="{{ route('size.update', $size->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input name="id" value="{{ $size->id }}" type="hidden">

                            <div class="form-group">
                                <label for="image" class="form-label">صورة المقاسات</label>
                                <td><img src="{{ $size->image_url }}" class="d-block" width="120" height="120"></td>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" id="image" name="image">
                                @error('file')
                                <span class="invalid-feedback">{{ $message }}</span>
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
