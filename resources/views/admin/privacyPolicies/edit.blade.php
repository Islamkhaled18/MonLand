@extends('layouts.admin.app')
@section('title')
تعديل على سياسة خصوصية
@endsection
@section('content')
<main class="app sidebar-mini rtl">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> سياسة الخصوصية </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('privacyPolicy.index') }}" title=" سياسة الخصوصية "> سياسة الخصوصية
                </a></li>
            <li class="breadcrumb-item active"><a href="{{ route('privacyPolicy.edit', $privacyPolicy->id) }}"
                    title="سياسة الخصوصية ">سياسة الخصوصية -
                    {{ $privacyPolicy->text }}</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="tile">
                <div class="tile-body">
                    <div class="col-lg-6">
                        <form action="{{ route('privacyPolicy.update', $privacyPolicy->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <input name="id" value="{{ $privacyPolicy->id }}" type="hidden">

                            <div class="form-group">
                                <label for="exampleInputEmail1">محتوى سياسة الخصوصية</label>
                                <textarea class="form-control" id="editor_one" value="{{ $privacyPolicy->text }}"
                                    name="text"></textarea>

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
