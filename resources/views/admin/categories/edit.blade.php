@extends('layouts.admin.app')
@section('title')
تعديل قسم
@endsection
@section('content')
<main class="app sidebar-mini rtl">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> الاقسام </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a></li>
            <li class="breadcrumb-item"><a href="{{ route('categories.index') }}" title="الاقسام">الاقسام</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('categories.edit', $category->id) }}" title="تعديل على قسم">تعديل على قسم -
                    {{ $category->name }}</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="tile">
                <div class="tile-body">
                    <div class="col-lg-6">
                        <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input name="id" value="{{ $category->id }}" type="hidden">

                            <div class="form-group">
                                <label for="exampleInputEmail1">الاسم</label>
                                <input class="form-control" id="exampleInputEmail1" name="name" value="{{ $category->name }}" type="text" placeholder="الاسم">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row" style="display:none" id="cats_list">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="projectinput1">
                                            القسم التابع
                                        </label>
                                        <select class="form-control" id="parent_id" name="parent_id">
                                            <option disabled>Select Parent</option>
                                            @foreach ($categories as $parent)
                                            <option value="{{ $parent->id }}" @if ($parent->id == $category->parent_id) selected @endif>
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
                            <div class="form-group">
                                <label for="image" class="form-label">صورة القسم</label>
                                <td><img src="{{ $category->image_url }}" class="d-block" width="60" height="60" alt=""></td>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" id="image" name="image">
                                @error('file')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mt-1">
                                    <input type="radio" name="type" value="1" class="switchery" data-color="success" />
                                    <label class="card-title ml-1">القسم الرئيسي</label>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mt-1">
                                    <input type="radio" name="type" value="2" class="switchery" data-color="success" />
                                    <label class="card-title ml-1">القسم التابع</label>
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
                $('#cats_list').css('display', 'block');
            } else {
                $('#cats_list').css('display', 'none');
            }
        });

</script>
@endpush
