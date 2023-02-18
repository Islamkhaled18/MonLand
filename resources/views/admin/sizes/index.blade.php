@extends('layouts.admin.app')
@section('title')
صور جدول المقاسات
@endsection
@section('content')
<main class="app sidebar-mini rtl">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> صور جدول المقاسات </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a></li>
            <li class="breadcrumb-item active"><a href="{{ route('sizes.index') }}" title="صور جدول المقاسات">صور جدول المقاسات</a></li>
        </ul>
    </div>
    {{-- @can('ads.create') --}}
    @if ($sizes && count($sizes) > 0)
    <h1>
        لا يمكن اضافة اكتر من جدول مقاسات برجاء حذف الموجود لاضافه جدول جديد او يمكنك التعديل عليه

    </h1>
    @else
    <div>
        <a class="btn btn-primary btn-sm" href="{{ route('size.create') }}" title="انشاء صورة جدول مقاسات جديده">انشاء صورة جدول مقاسات جديده</a>
    </div>
    @endif
    {{-- @endcan --}}

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>صورة جدول المقاسات</th>
                                <th>العمليات</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sizes as $size)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{ $size->image_url }}" title="{{ $size->name }}" alt="{{ $size->name }}" width="500" height="500">
                                </td>

                                <td>
                                    {{-- @can('ads.edit') --}}
                                    <a class="btn btn-sm btn-dark" title="تعديل" href="{{ route('size.edit', ['id' => $size->id]) }}">تعديل</a>
                                    {{-- @endcan --}}
                                    @can('ads.edit')
                                    <form action="{{ route('size.destroy', $size->id) }}" method="post" style="display: inline-block">
                                        @csrf
                                        @method('GET')
                                        <button type="'submit" title="حذف" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i>حذف</button>

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
            a = s.createElement(o)
                , m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
    }

</script>
@endpush
