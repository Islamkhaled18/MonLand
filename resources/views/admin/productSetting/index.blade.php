@extends('layouts.admin.app')
@section('title')
اعدادات المنتجات
@endsection
@section('content')
<main class="app sidebar-mini rtl">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> اعدادات المنتجات </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a>
            </li>
            <li class="breadcrumb-item active"><a href="{{ route('productSetting.index') }} "
                    title="اعدادات المنتجات">اعدادات المنتجات</a></li>
        </ul>
    </div>
    <!--@can('products.create')-->
    <!--<div>-->
    <!--    <a class="btn btn-primary btn-sm" title="انشاء اعدادات منتج جديد"-->
    <!--        href="{{ route('productSetting.create') }}">انشاء اعدادات منتج جديد</a>-->
    <!--</div>-->
    <!--@endcan-->

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>طلب سريع</th>
                                <th> الاجراءات </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productSettings as $productSetting)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $productSetting->getQuickRequest() }}</td>

                                <td>
                                    @can('products.edit')

                                    <a class="btn btn-sm btn-dark"
                                        href="{{ route('productSetting.edit', ['id' => $productSetting->id]) }}"
                                        title="تعديل">تعديل
                                    </a>
                                    @endcan


                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
