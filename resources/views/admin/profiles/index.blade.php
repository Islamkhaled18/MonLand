@extends('layouts.admin.app')
@section('title')
    الصفحة الشخصيه
@endsection
@section('content')
    <main class="app sidebar-mini rtl">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> الصفحة الشخصيه </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a></li>
                <li class="breadcrumb-item"><a href="{{ route('adminsProfile.edit',$profileId->id) }}" title="الصفحه الشخصيه">الصفحة الشخصيه</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="tile">
                    <div class="tile-body">
                        <div class="col-lg-6">
                            <form action="{{ route('adminsProfile.update', $profileId->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <input name="id" value="{{ $profile->id }}" type="hidden">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">الاسم بالكامل</label>
                                    <input class="form-control" id="exampleInputEmail1" name="name"
                                        value="{{ $profile->admin->name }}" type="text" placeholder="اكتب الاسم بالكامل">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">البريد الالكتروني</label>
                                    <input class="form-control" id="exampleInputPassword1" name="email"
                                        value="{{ $profile->admin->email }}" type="email" placeholder="اكتب البريد الالكتروني">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="old_password">الرقم السري القديم</label>
                                    <input class="form-control" id="old_password"  name="old_password"
                                        type="password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">الرقم السري الجديد</label>
                                    <input class="form-control" id="password"  name="password"
                                        type="password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">رقم الهاتف</label>
                                    <input class="form-control" id="exampleInputPassword1" name="phone" type="text"
                                        value="{{$profile->admin->phone }}" placeholder="اكتب رقم الهاتف">
                                    @error('phone')
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
