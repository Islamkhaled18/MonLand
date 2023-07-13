@extends('layouts.admin.app')
@section('title')
    تعديل على بيانات المنظمة
@endsection
@section('content')
    <main class="app sidebar-mini rtl">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i>  عن المنظمة </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a></li>
                <li class="breadcrumb-item"><a href="{{ route('about_us.index') }}"  title="عن المنظمة ">عن المنظمة </a></li>
                <li class="breadcrumb-item active"><a href="{{ route('about_us.edit', $about_us->id) }}"  title="تعديل على  بيانات المنظمة">تعديل على  بيانات المنظمة -
                        {{ $about_us->text }}</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="tile">
                    <div class="tile-body">
                        <div class="col-lg-6">
                            <form action="{{ route('about_us.update', $about_us->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <input name="id" value="{{ $about_us->id }}" type="hidden">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">محتوى عن المنظمة</label>
                                    <textarea class="form-control" id="editor_one"  value="{{ $about_us->text }}" name="text"></textarea>

                                    @error('text')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="tile-footer">
                                    <button class="btn btn-primary" type="submit">تعديل</button>
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
		.create( document.querySelector( '#editor_one' ) )
		.catch( error => {
			console.error( error );
		} );
</script>
@endpush
