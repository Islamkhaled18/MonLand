@extends('layouts.admin.app')
@section('title')
انشاء مشرف
@endsection
@section('content')
<main class="app sidebar-mini rtl">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> المشرفين </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a></li>
            <li class="breadcrumb-item"><a href="{{ route('admins.index') }}" title="المشرفين">المشرفين</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admins.create') }}" title="انشاء مشرف">إانشاء مشرف</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="tile">
                <div class="tile-body">
                    <div class="col-lg-6">
                        <form action="{{ route('admins.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">الاسم بالكامل</label>
                                <input class="form-control" id="exampleInputEmail1" name="name" value="{{ old('name') }}" type="text" placeholder="اكتب الاسم بالكامل">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">البريد الالكتروني</label>
                                <input class="form-control" id="exampleInputPassword1" name="email" value="{{ old('email') }}" type="email" placeholder="اكتب البريد الالكتروني">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">الرقم السري</label>
                                <input class="form-control" id="exampleInputPassword1" name="password" value="{{ old('password') }}" type="password" placeholder="الرقم السري">
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">رقم الهاتف</label>
                                <input class="form-control" id="exampleInputPassword1" name="phone" type="text" value="{{ old('phone') }}" placeholder="اكتب رقم الهاتف">
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="projectinput1"> اختار الدور الخاص به
                                </label>
                                <select name="role_id" class="select2 form-control">
                                    <optgroup label="من فضلك أختر الدور">
                                        @if ($roles && $roles->count() > 0)
                                        @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">
                                            {{ $role->name }}
                                        </option>
                                        @endforeach
                                        @endif
                                    </optgroup>
                                </select>
                                @error('role_id')
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