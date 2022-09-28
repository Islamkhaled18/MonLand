@extends('layouts.admin.app')
@section('title')
    محافظات الشحن والتوصيل
@endsection
@section('content')
    <main class="app sidebar-mini rtl">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> محافظات الشحن والتوصيل </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a></li>
                <li class="breadcrumb-item active"><a href="{{ route('delivery.index') }}">محافظات الشحن والتوصيل</a></li>
            </ul>
        </div>
        @can('delivery.create')
            <div>
                <a class="btn btn-primary btn-sm" href="{{ route('delivery.create') }}">انشاء محافظه وسعر توصيل جديد</a>
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
                                    <th>المحافظه</th>
                                    <th>سعر التوصيل</th>
                                    <th>العمليات</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($deliveries as $delivery)
                                    <tr>

                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $delivery->governorate_name }}</td>
                                        <td>{{ $delivery->delivery_price }}</td>
                                        <td>
                                            @can('delivery.edit')
                                                <a class="btn btn-sm btn-dark"
                                                    href="{{ route('delivery.edit', ['id' => $delivery->id]) }}">تعديل</a>
                                            @endcan
                                            @can('delivery.destroy')
                                                <form action="{{ route('delivery.destroy', $delivery->id) }}" method="post"
                                                    style="display: inline-block">
                                                    @csrf
                                                    @method('GET')
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
