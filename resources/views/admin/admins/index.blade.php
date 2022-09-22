@extends('layouts.admin.app')
@section('title')
    المشرفين
@endsection
@section('content')
    <main class="app sidebar-mini rtl">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> المشرفين </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a></li>
                <li class="breadcrumb-item active"><a href="{{ route('admins.index') }}">المشرفين</a></li>
            </ul>
        </div>
        <div>
            <a class="btn btn-primary btn-sm" href="{{route('admins.create')}}">انشاء مشرف جديد</a>
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
                                    <th>الهاتف</th>
                                    <th>تاريخ انشاء الحساب</th>
                                    <th>العمليات</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                    <tr>

                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $admin->name }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>{{ $admin->phone }}</td>
                                        <td>{{ $admin->created_at }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-dark" href="{{ route('admins.edit',['id'=>$admin->id]) }}">تعديل</a>
                                            <form action="{{route('admins.destroy', $admin->id)}}" method="post" style="display: inline-block">
                                                @csrf
                                                @method('GET')
                                                <button type="'submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i>حذف</button>

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
