@extends('layouts.admin.app')
@section('title')
انشاء محافظه او مدينه
@endsection
@section('content')
<main class="app sidebar-mini rtl">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> انشاء محافظه او مدينه </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a></li>
            <li class="breadcrumb-item"><a href="{{ route('governorate.index') }}" title="المحافظات و المدن">المحافظات والمدن</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('governorate.create') }}" title="انشاء محافظه او مدينه"> انشاء محافظه</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="tile">
                <div class="tile-body">
                    <div class="col-lg-6">
                        <form action="{{ route('governorate.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">اسم المحافظه او المدينه </label>
                                <input class="form-control" id="exampleInputEmail1" name="name" value="{{ old('name') }}" type="text" placeholder="اسم المحافظه او المدينه">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"></label>
                                <input class="form-control" id="price" name="price" value="{{ old('price') }}" type="number" placeholder=" سعر الشحن ">
                                @error('price')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row" style="display:none" id="gov_list">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="projectinput1">
                                            المحافظه
                                        </label>
                                        <select name="parent_id" class="select2 form-group">
                                            <optgroup label="اختر المحافظه">
                                                @if ($governorates && $governorates->count() > 0)
                                                @foreach ($governorates as $governorate)
                                                <option value="{{ $governorate->id }}">
                                                    {{ $governorate->name }}</option>
                                                @endforeach
                                                @endif

                                            </optgroup>
                                        </select>
                                        @error('parent_id')
                                        <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mt-1">
                                    <input type="radio" name="type" value="1" class="switchery" data-color="success" />
                                    <label class="card-title ml-1">المحافظه </label>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mt-1">
                                    <input type="radio" name="type" value="2" class="switchery" data-color="success" />
                                    <label class="card-title ml-1"> المدينه </label>
                                </div>
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
    $('input:radio[name="type"]').change(
        function() {
            if (this.checked && this.value == '2') { // 1 if main cat - 2 if related cat
                $('#gov_list').css('display', 'block');
                $('#price').css('display', 'none');
            } else {
                $('#gov_list').css('display', 'none');
            }
    });

</script>
<script>
    $('input:radio[name="type"]').change(
        function() {
            if (this.checked && this.value == '1') { // 1 if main cat - 2 if related cat
                $('#price').css('display', 'block');
            }
    });

</script>
@endpush
