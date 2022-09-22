@extends('layouts.admin.app')
@section('title')
    تعديل مشرف
@endsection
@section('content')
    <main class="app sidebar-mini rtl">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> المشرفين </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a></li>
                <li class="breadcrumb-item"><a href="{{ route('admins.index') }}">المشرفين</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('admins.edit',$admin->id) }}">تعديل على مشرف - {{$admin->name}}</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                
                <div class="tile">
                    <div class="tile-body">
                        <div class="col-lg-6">
                            <form action="{{route('admins.update',$admin->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <input name="id" value="{{$admin->id}}" type="hidden">

                              <div class="form-group">
                                <label for="exampleInputEmail1">الاسم بالكامل</label>
                                <input class="form-control" id="exampleInputEmail1" name="name" value="{{$admin->name}}" type="text" placeholder="اكتب الاسم بالكامل">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">البريد الالكتروني</label>
                                <input class="form-control" id="exampleInputPassword1" name="email" value="{{$admin->email}}" type="email" placeholder="اكتب البريد الالكتروني">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">الرقم السري</label>
                                <input class="form-control" id="exampleInputPassword1" name="password" value="**************" type="password" placeholder="الرقم السري">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">رقم الهاتف</label>
                                <input class="form-control" id="exampleInputPassword1" name="phone" type="text" value="{{$admin->phone}}" placeholder="اكتب رقم الهاتف">
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
