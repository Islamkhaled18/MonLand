@extends('layouts.admin.app')
@section('title')
    انشاء منتج
@endsection
@section('content')
    <main class="app sidebar-mini rtl">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> المنتجات </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a></li>
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">المنتجات</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('products.general.create') }}">إانشاء منتج جديد</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="tile">
                    <div class="tile-body">
                        <div class="col-lg-6">
                            <form action="{{ route('products.general.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="exampleInputEmail1">اسم المنتج</label>
                                    <input class="form-control" id="exampleInputEmail1" name="name"
                                        value="{{ old('name') }}" type="text" placeholder="اسم المنتج">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="projectinput1"> اسم بالرابط
                                    </label>
                                    <input type="text" class="form-control" placeholder=" اسم بالرابط "
                                        value="{{ old('slug') }}" name="slug">
                                    @error('slug')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="projectinput1"> وصف المنتج
                                    </label>
                                    <textarea name="description" id="description" class="form-control" placeholder="  ">{{ old('description') }}</textarea>

                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="projectinput1"> الوصف المختصر
                                    </label>
                                    <textarea name="short_description" id="short-description" class="form-control" placeholder="">{{ old('short_description') }}</textarea>

                                    @error('short_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="projectinput1"> اختر القسم
                                    </label>
                                    <select name="categories[]" class="select2 form-control" multiple>
                                        <optgroup label="من فضلك أختر القسم ">
                                            @if ($categories && $categories->count() > 0)
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </optgroup>
                                    </select>
                                    @error('categories.0')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="projectinput1"> اختر ألماركة
                                    </label>
                                    <select name="brand_id" class="select2 form-control">
                                        <optgroup label="من فضلك أختر الماركة ">
                                            @if ($brands && $brands->count() > 0)
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach
                                            @endif
                                        </optgroup>
                                    </select>
                                    @error('brand_id')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1"> معلومات اخرى عن المنتج</label>
                                    <input class="form-control" id="exampleInputEmail1" name="anotherInformation"
                                        value="{{ old('anotherInformation') }}" type="text" placeholder='معلومات اخرى'>
                                    @error('anotherInformation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="photo" class="form-label">صور المنتج</label>
                                    
                                    <input type="file" class="form-control @error('photo') is-invalid @enderror"
                                        value="{{ old('photo') }}" id="photo" name="photo[]" multiple accept="image/*">
                                    @error('file')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mt-1">
                                    <input type="checkbox" value="1" name="is_active" id="switcheryColor4"
                                        class="switchery" data-color="success" checked />
                                    <label for="switcheryColor4" class="card-title ml-1">الحالة </label>

                                    @error('is_active')
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
