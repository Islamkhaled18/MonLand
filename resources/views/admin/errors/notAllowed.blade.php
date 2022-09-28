@extends('layouts.admin.app')
@section('title')
    خطأ
@endsection
@section('content')
    <main class="app-content">
        <div class="page-error tile">
            <h1><i class="fa fa-exclamation-circle"></i> خطأ !! ليس ليدك امكانيه الوصول </h1>
            <p>برجاء التأكد من صلاحيات الموقع اولا.</p>
            <p><a class="btn btn-primary" href="{{route('admin.dashboard')}}">Go Back</a></p>
        </div>
    </main>
@endsection
