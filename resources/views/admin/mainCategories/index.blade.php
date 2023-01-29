@extends('layouts.admin.app')
@section('title')
الاقسام الرئيسية
@endsection
@section('content')
<main class="app sidebar-mini rtl">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> الاقسام الرئيسية </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a></li>
            <li class="breadcrumb-item active"><a href="{{ route('mainCategories.index') }}" title="الاقسام الرئيسية">الاقسام الرئيسية</a></li>
        </ul>
    </div>
    @can('mainCategories.create')
    <div>
        <a class="btn btn-primary btn-sm" href="{{ route('mainCategories.create') }}" title="انشاء قسم رئيسي">انشاء قسم رئيسي</a>
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
                                <th>العمليات</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mainCategories as $mainCategory)
                            <tr>

                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mainCategory->name }}</td>
                                <td>
                                    @can('mainCategories.edit')
                                    <a class="btn btn-sm btn-dark" href="{{ route('mainCategories.edit', ['id' => $mainCategory->id]) }}" title="تعديل">تعديل</a>
                                    @endcan
                                    @can('mainCategories.destroy')
                                    <form action="{{ route('mainCategories.destroy', $mainCategory->id) }}" title="حذف" method="post" style="display: inline-block">
                                        @csrf
                                        @method('GET')
                                        <button type="'submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i>حذف</button>

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
