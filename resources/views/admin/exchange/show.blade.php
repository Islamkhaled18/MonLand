@extends('layouts.admin.app')
@section('title')
 تفاصيل طلب الاسترجاع الاو الاستبدال
@endsection
@section('content')
<main class="app sidebar-mini rtl">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> طلبات الاسترجاع او الاستبدال </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a></li>
            <li class="breadcrumb-item"><a href="{{ route('brands.index') }}" title="طلبات الاسترجاع او الاستبدال">طلبات الاسترجاع او الاستبدال</a></li>

        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="col-lg-6">
                        <form action="{{ route('exchanges.show', $exchange->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input name="id" value="{{ $exchange->id }}" type="hidden">

                            <div class="form-group">
                                <label for="exampleInputEmail1">الاسم  </label>
                                <input class="form-control" id="exampleInputEmail1" disabled value="{{ $exchange->firstName }} - {{ $exchange->lastName }}">
                           
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">البريد الالكتروني</label>
                                <input class="form-control" id="exampleInputEmail1" disabled  value="{{ $exchange->email }}">
                               
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">الهاتف </label>
                                <input class="form-control" id="exampleInputEmail1" disabled  value="{{ $exchange->phone }}">
                               
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">لدية واتساب </label>
                                <input class="form-control" id="exampleInputEmail1" disabled  value="{{ $exchange->getWhatsApp() }}">
                               
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> اسم البائع </label>
                                <input class="form-control" id="exampleInputEmail1" disabled  value="{{ $exchange->vendor->vendor_name }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> رقم الاودر  </label>
                                <input class="form-control" id="exampleInputEmail1" disabled  value="{{ $exchange->order_number }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> تاريخ الاوردر   </label>
                                <input class="form-control" id="exampleInputEmail1" disabled  value="{{ $exchange->order_date }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> عدد الشحنات </label>
                                <input class="form-control" id="exampleInputEmail1" disabled  value="{{ $exchange->package_number }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> اسم المنتج </label>
                                <input class="form-control" id="exampleInputEmail1" disabled  value="{{ $exchange->product_name }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> نوع المنتج </label>
                                <input class="form-control" id="exampleInputEmail1" disabled  value="{{ $exchange->product_type }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> لينك المنتج </label>
                                <input class="form-control" id="exampleInputEmail1" disabled  value="{{ $exchange->product_link }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">  العدد </label>
                                <input class="form-control" id="exampleInputEmail1" disabled  value="{{ $exchange->prouct_quantity }}">
                            </div>
                            <div class="form-group">
                                <label for="image" class="form-label"> بوليصة الشحن</label>
                                <td><img src="{{ $exchange->image_url }}" class="d-block" width="400" height="400" alt=""></td>
                              
                            </div>
                            <div class="form-group">
                                <label for="image" class="form-label">فيديو المنتج</label>
                                <td><img src="{{ $exchange->video_url }}" class="d-block" width="400" height="400" alt=""></td>
                              
                            </div>
                            <div class="form-group">
                                <label for="image" class="form-label"> نوع الطلب</label>
                                <input class="form-control" id="exampleInputEmail1" disabled  value="{{ $exchange->getOrder_type() }}">
                              
                            </div>
                            <div class="form-group">
                                <label for="image" class="form-label"> السبب </label>
                                <input class="form-control" id="exampleInputEmail1" disabled  value="{{ $exchange->reason }}">
                              
                            </div>
                            <div class="form-group">
                                <label for="image" class="form-label"> التفاصيل </label>
                                <input class="form-control" id="exampleInputEmail1" disabled  value="{{ $exchange->details }}">
                              
                            </div>

                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection
