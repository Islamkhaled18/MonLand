@extends('layouts.admin.app')
@section('title')
    البائعين واسعار الشحن
@endsection
@section('content')
    <main class="app sidebar-mini rtl">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> البائعين واسعار الشحن </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a></li>
                <li class="breadcrumb-item active"><a href="{{ route('vendors.index') }}" title="البائعين واسعار الشحن">البائعين واسعار الشحن</a></li>
            </ul>
        </div>
        @can('vendors.create')
            <div>
                <a class="btn btn-primary btn-sm" href="{{ route('vendors.create') }}" title="انشاء بائع وسعر شحن جديد">انشاء بائع وسعر شحن جديد</a>
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
                                    <th>البائع</th>
                                    <th>موعد توصيل منتجاته</th>
                                    <th>العمليات</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vendors as $vendor)
                                    <tr>

                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $vendor->vendor_name }}</td>
                                        <td>{{ $vendor->delivery_time }}</td>
                                        <td>
                                            @can('vendors.edit')
                                                <a class="btn btn-sm btn-dark" title="تعديل"
                                                    href="{{ route('vendors.edit', ['id' => $vendor->id]) }}">تعديل</a>
                                            @endcan
                                            @can('vendors.destroy')
                                                <form action="{{ route('vendors.destroy', $vendor->id) }}" method="post"
                                                    style="display: inline-block">
                                                    @csrf
                                                    @method('GET')
                                                    <button type="'submit" title="حذف" class="btn btn-danger delete btn-sm"><i
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
