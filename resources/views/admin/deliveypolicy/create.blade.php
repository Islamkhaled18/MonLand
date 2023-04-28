@extends('layouts.admin.app')
@section('title')
انشاء سياسة شحن جديده
@endsection
@section('content')
<main class="app sidebar-mini rtl">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i>انشاء سياسة شحن جديده </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('DeliveryPolicy.index') }}" title="سياسة الشحن">سياسة
                    الشحن</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('DeliveryPolicy.create') }}"
                    title="  انشاء سياسة شحن جديده">إانشاء سياسة شحن جديده</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="tile">
                <div class="tile-body">
                    <div class="col-lg-6">
                        <form action="{{route('DeliveryPolicy.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">محتوى سياسة الشحن </label>
                                <textarea class="form-control" id="editor" name="policy"></textarea>
                                @error('policy')
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
