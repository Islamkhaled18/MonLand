@extends('layouts.admin.app')
@section('title')
    طلبات الاسترجاع او التبديل
@endsection
@section('content')
    <main class="app sidebar-mini rtl">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> طلبات الاسترجاع او التبديل </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a></li>
                <li class="breadcrumb-item active"><a href="{{ route('exchanges.index') }}"
                        title="طلبات الاسترجاع او التبديل">طلبات الاسترجاع او التبديل</a></li>
            </ul>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>البريد الالكتروني</th>
                                    <th> الهاتف</th>
                                    <th> لديه واتساب</th>
                                    <th> تاريخ الاوردر</th>
                                    <th> اسم المنتج</th>
                                    <th> السبب </th>
                                    <th> التفاصيل </th>
                                    <th>العمليات</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($exchanges as $exchange)
                                    <tr>

                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $exchange->firstName }} - {{ $exchange->lastName }}</td>
                                        <td>{{ $exchange->email }} </td>
                                        <td>{{ $exchange->phone }} </td>
                                        <td>{{ $exchange->getWhatsApp() }} </td>
                                        <td>{{ $exchange->order_date }} </td>
                                        <td>{{ $exchange->product_name }} </td>
                                        <td>{{ $exchange->reason }} </td>
                                        <td>{{ $exchange->details }} </td>

                                        <td>
                                            <a class="btn btn-sm btn-dark" title="التفاصيل"
                                                    href="{{ route('exchanges.show', ['id' => $exchange->id]) }}">التفاصيل</a>
                                            <form action="{{ route('exchanges.destroy', $exchange->id) }}" method="post"
                                                style="display: inline-block">
                                                @csrf
                                                @method('GET')
                                                <button type="'submit" title="حذف"
                                                    class="btn btn-danger delete btn-sm"><i
                                                        class="fa fa-trash"></i>حذف</button>

                                            </form>

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
                a = s.createElement(o), m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-72504830-1', 'auto');
            ga('send', 'pageview');
        }
    </script>
@endpush
