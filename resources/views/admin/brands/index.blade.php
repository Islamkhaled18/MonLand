@extends('layouts.admin.app')
@section('title')
    الماركات
@endsection
@section('content')
    <main class="app sidebar-mini rtl">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> الماركات </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a></li>
                <li class="breadcrumb-item active"><a href="{{ route('brands.index') }}">الماركات</a></li>
            </ul>
        </div>
        @can('brands.create')
            <div>
                <a class="btn btn-primary btn-sm" href="{{ route('brands.create') }}">انشاء ماركه جديده</a>
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
                                    <th>صورة الماركه</th>
                                    <th>العمليات</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                    <tr>

                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $brand->name }}</td>
                                        <td><img src="{{ $brand->image_url }}" width="60" height="60" alt="">
                                        </td>

                                        <td>
                                            @can('brands.edit')
                                                <a class="btn btn-sm btn-dark"
                                                    href="{{ route('brands.edit', ['id' => $brand->id]) }}">تعديل</a>
                                            @endcan
                                            @can('brands.edit')
                                                <form action="{{ route('brands.destroy', $brand->id) }}" method="post"
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
