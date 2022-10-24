@extends('layouts.admin.app')
@section('title')
    انشاء اوامر وصلاحيات جديده
@endsection
@section('content')
    <main class="app sidebar-mini rtl">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> الصفات </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a></li>
                <li class="breadcrumb-item"><a href="{{ route('roles.index') }}" title="الاوامر والصلاحيات">الاوامر والصلاحيات</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('roles.create') }}" title="انشاء اوامر وصلاحيات جديده"> انشاء اوامر وصلاحيات جديده</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="tile">
                    <div class="tile-body">
                        <div class="col-lg-6">
                            <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="exampleInputEmail1">الاسم </label>
                                    <input class="form-control" id="exampleInputEmail1" name="name"
                                        value="{{ old('name') }}" type="text" placeholder="الاسم">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <h3>Permissions</h3>
                                    @foreach (config('permissions') as $code => $label)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $code }}">
                                            <label class="form-check-label">
                                                {{ $label }}
                                            </label>
                                        </div>
                                    @endforeach
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
