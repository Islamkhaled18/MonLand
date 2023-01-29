@extends('layouts.admin.app')
@section('title')
    المنتجات
@endsection
@section('content')
    <main class="app sidebar-mini rtl">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> المنتجات </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a></li>
                <li class="breadcrumb-item active"><a href="{{ route('products.index') }} " title="المنتجات">المنتجات</a></li>
            </ul>
        </div>
        @can('products.create')
            <div>
                <a class="btn btn-primary btn-sm" title="انشاء منتج جديد" href="{{ route('products.general.create') }}">انشاء منتج جديد</a>
            </div>
        @endcan

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم </th>
                                    <th>الحالة</th>
                                    <th>مميز</th>
                                    <th>عروض اليوم</th>
                                    <th>فلاش</th>
                                    <th>طلب سريع</th>
                                    <th>السعر</th>
                                    <th> الاجراءات </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->getActive() }}</td>

                                        <td>{{ $product->getFeatured() }}</td>
                                        <td>{{ $product->getDealOfTheDay() }}</td>
                                        <td>{{ $product->getFlashSale() }}</td>
                                        <td>{{ $product->getQuickRequest() }}</td>

                                        <td>{{ $product->price }}</td>

                                        <td>
                                           @can('products.edit')

                                           <a class="btn btn-sm btn-dark"
                                           href="{{ route('products.edit', ['id' => $product->id]) }}" title="تعديل">تعديل</a>
                                           @endcan

                                            @can('products.destroy')
                                                <form action="{{ route('products.destroy', $product->id) }}" title="حذف" method="post"
                                                    style="display: inline-block">
                                                    @csrf
                                                    <button type="'submit" class="btn btn-danger delete btn-sm"><i
                                                            class="fa fa-trash"></i>حذف</button>
                                                </form>
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

@push('scripts')
    <script type="text/javascript">
        $('#sampleTable').DataTable();
    </script>
    <!-- Google analytics script-->
    <script type="text/javascript">
        if (document.location.hostname == 'pratikborsadiya.in') {
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-72504830-1', 'auto');
            ga('send', 'pageview');
        }
    </script>
@endpush
