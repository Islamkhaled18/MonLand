@extends('layouts.admin.app')
@section('title')
انشاء بيانات عن المنظمه
@endsection
@section('content')
<main class="app sidebar-mini rtl">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i>انشاء بيانات عن المنظمه </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('about_us.index') }}" title="عن المنظمة">عن المنظمة
                    </a></li>
            <li class="breadcrumb-item active"><a href="{{ route('about_us.create') }}"
                    title="  انشاء بيانات عن المنظمه">إانشاء بيانات عن المنظمه</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="tile">
                <div class="tile-body">
                    <div class="col-lg-6">
                        <form action="{{route('about_us.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1"> انشاء بيانات عن المنظمه </label>
                                <textarea class="form-control" id="editor" name="text"></textarea>
                                @error('text')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="tile-footer">
                                <button class="btn btn-primary" type="submit">حفظ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection

@push('scripts')
<script>
    ClassicEditor
		.create( document.querySelector( '#editor' ) )
		.catch( error => {
			console.error( error );
		} );
</script>
@endpush
