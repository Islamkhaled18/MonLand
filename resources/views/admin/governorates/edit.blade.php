@extends('layouts.admin.app')
@section('title')
تعديل المحافظه
@endsection
@section('content')
<main class="app sidebar-mini rtl">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> تعديل المحافظه</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a></li>
            <li class="breadcrumb-item"><a href="{{ route('governorate.index') }}" title="المحافظات">المحافظات</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('governorate.edit', $governorate->id) }}" title="تعديل على محافظه">تعديل على محافظه -
                    {{ $governorate->name }}</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="tile">
                <div class="tile-body">
                    <div class="col-lg-6">
                        <form action="{{ route('governorate.update', $governorate->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input name="id" value="{{ $governorate->id }}" type="hidden">

                            <div class="form-group">
                                <label for="exampleInputEmail1">اسم المحافظه او المدينه</label>
                                <input class="form-control" id="exampleInputEmail1" name="name" value="{{ $governorate->name }}" type="text">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">سعر الشحن </label>
                                <input class="form-control" id="exampleInputEmail1" name="price" value="{{ $governorate->price }}" type="number">
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
                                        <select class="form-control" id="parent_id" name="parent_id">
                                            <option disabled>اختر </option>
                                            @foreach ($governorates as $parent)
                                            <option value="{{ $parent->id }}" @if ($parent->id == $governorate->parent_id) selected @endif>
                                                {{ $parent->name }}
                                            </option>
                                            @endforeach
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
                                    <label class="card-title ml-1"> المحافظه</label>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mt-1">
                                    <input type="radio" name="type" value="2" class="switchery" data-color="success" />
                                    <label class="card-title ml-1"> المدينه</label>
                                </div>
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
