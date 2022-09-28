@extends('layouts.admin.app')
@section('title')
    خصائص الصفات
@endsection
@section('content')
    <main class="app sidebar-mini rtl">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> خصائص الصفات </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a></li>
                <li class="breadcrumb-item active"><a href="{{ route('options.index') }}">خصائص الصفات</a></li>
            </ul>
        </div>
        @can('options.create')
            <div>
                <a class="btn btn-primary btn-sm" href="{{ route('options.create') }}">انشاء خصائص صفه جديده</a>
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
                                    <th>الاسم</th>
                                    <th>السعر</th>
                                    <th>المنتج</th>
                                    <th>اخصائص</th>
                                    <th>العمليات</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($options as $option)
                                    <tr>

                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $option->name }}</td>
                                        <td>{{ $option->price }}</td>
                                        <td>{{ $option->product->name }}</td>
                                        <td>{{ $option->attribute->name }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                @can('options.edit')
                                                    <a href="{{ route('options.edit', $option->id) }}"
                                                        class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>
                                                @endcan
                                                @can('options.destroy')
                                                    <form action="{{ route('options.destroy', $option->id) }}" method="post"
                                                        style="display: inline-block">
                                                        @csrf
                                                        @method('GET')
                                                        <button type="'submit" class="btn btn-danger delete btn-sm"><i
                                                                class="fa fa-trash"></i>حذف</button>

                                                    </form>
                                                @endcan
                                            </div>
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
