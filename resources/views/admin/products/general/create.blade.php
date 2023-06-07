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
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}" title="المنتجات">المنتجات</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('products.general.create') }}"
                    title="انشاء منتج جديد">إانشاء منتج جديد</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="tile">
                <div class="tile-body">
                    <div class="col-lg-12">
                        <form action="{{ route('products.general.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">اسم المنتج</label>
                                        <input class="form-control" id="exampleInputEmail1" name="name"
                                            value="{{ old('name') }}" type="text" placeholder="اسم المنتج">
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="projectinput1"> اسم بالرابط
                                        </label>
                                        <input type="text" class="form-control" placeholder=" اسم بالرابط "
                                            value="{{ old('slug') }}" name="slug">
                                        @error('slug')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="projectinput1"> وصف المنتج
                                        </label>
                                        <textarea name="description" id="editor_four" class="form-control"
                                            placeholder="  "></textarea>

                                        @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="col-md-6">
                                        <label for="projectinput1"> الوصف المختصر
                                        </label>
                                        <textarea name="short_description" id="editor_short" class="form-control"
                                            placeholder=""></textarea>

                                        @error('short_description')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
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
                                    <div class="col-md-6">
                                        <label for="projectinput1">اختار القسم الرئيسي
                                        </label>
                                        <select name="mainCategory_id" class="select2 form-control">
                                            <optgroup label="من فضلك أختر القسم ">
                                                @if ($mainCategories && $mainCategories->count() > 0)
                                                @foreach ($mainCategories as $mainCategory)
                                                <option value="{{ $mainCategory->id }}">{{ $mainCategory->name }}
                                                </option>
                                                @endforeach
                                                @endif
                                            </optgroup>
                                        </select>
                                        @error('mainCategory_id')
                                        <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
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
                                </div>
                            </div>
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1"> معلومات اخرى عن المنتج</label>
                                        <input class="form-control" id="exampleInputEmail1" name="anotherInformation"
                                            value="{{ old('anotherInformation') }}" type="text"
                                            placeholder='معلومات اخرى'>
                                        @error('anotherInformation')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="col-md-6">
                                        <label for="photo" class="form-label">صور المنتج</label>

                                        <input type="file" class="form-control @error('photo') is-invalid @enderror"
                                            value="{{ old('photo') }}" id="photo" name="photo[]" multiple
                                            accept="image/*">
                                        @error('photo[]')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1"> المقاس </label>
                                        <input class="form-control" id="exampleInputEmail1" name="weight"
                                            value="{{ old('weight') }}" type="text" placeholder='المقاس '>
                                        @error('weight')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1"> الابعاد </label>
                                        <input class="form-control" id="exampleInputEmail1" name="dimension"
                                            value="{{ old('dimension') }}" type="text" placeholder='الابعاد '>
                                        @error('dimension')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1"> المواد المصنوعه </label>
                                        <input class="form-control" id="exampleInputEmail1" name="material"
                                            value="{{ old('material') }}" type="text" placeholder=' المواد المصنوعه'>
                                        @error('material')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <br>
                                        <input type="checkbox" value="1" name="is_active" id="switcheryColor4"
                                            class="switchery" data-color="success" checked />
                                        <label for="switcheryColor4" class="card-title ml-1">الحالة </label>

                                        @error('is_active')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <br>
                                        <input type="checkbox" value="1" name="featured" id="switcheryColor4"
                                            class="switchery" data-color="success" checked />
                                        <label for="switcheryColor4" class="card-title ml-1">مميز </label>

                                        @error('featured')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <br>
                                        <input type="checkbox" value="1" name="deal_of_the_day" id="switcheryColor4"
                                            class="switchery" data-color="success" checked />
                                        <label for="switcheryColor4" class="card-title ml-1">عروض اليوم </label>

                                        @error('deal_of_the_day')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="checkbox" value="1" name="flash_sale" id="switcheryColor4"
                                            class="switchery" data-color="success" checked />
                                        <label for="switcheryColor4" class="card-title ml-1">عروض فلاش </label>

                                        @error('flash_sale')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <input type="checkbox" value="1" name="quick_request" id="switcheryColor4"
                                            class="switchery" data-color="success" checked />
                                        <label for="switcheryColor4" class="card-title ml-1">طلب سريع </label>

                                        @error('quick_request')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-home"></i> سعر المنتج وما يتعلق بالسعر</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1"> السعر القديم للمنتج
                                            </label>
                                            <input type="text" id="old_price" class="form-control"
                                                placeholder="السعر القديم للمنتج" value="{{ old('old_price') }}"
                                                name="old_price">
                                            @error('old_price')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1">سعر المنتج الجديد
                                            </label>
                                            <input type="text" id="new_price" class="form-control"
                                                placeholder="سعر المنتج الجديد " value="{{ old('new_price') }}"
                                                name="new_price">
                                            @error('new_price')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="form-body">

                                <h4 class="form-section"><i class="ft-home"></i> اداره المستودع </h4>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1">تتبع المستودع
                                            </label>
                                            <select name="manage_stock" class="select2 form-control" id="manageStock">
                                                <optgroup label="من فضلك أختر النوع ">
                                                    <option value="1">اتاحة التتبع</option>
                                                    <option value="0" selected>عدم اتاحه التتبع</option>
                                                </optgroup>
                                            </select>
                                            @error('manage_stock')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- QTY  -->

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1">حالة المنتج
                                            </label>
                                            <select name="in_stock" class="select2 form-control">
                                                <optgroup label="من فضلك أختر  ">
                                                    <option value="1">متاح</option>
                                                    <option value="0">غير متاح </option>
                                                </optgroup>
                                            </select>
                                            @error('in_stock')
                                            <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6" style="display:none" id="qtyDiv">
                                        <div class="form-group">
                                            <label for="projectinput1">الكمية
                                            </label>
                                            <input type="text" id="sku" class="form-control" placeholder="  "
                                                value="{{ old('qty') }}" name="qty">
                                            @error('qty')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="projectinput1"> اختر البائع
                                </label>
                                <select name="vendor_id" class="select2 form-control">
                                    <optgroup label="من فضلك أختر البائع ">
                                        @if ($vendors && $vendors->count() > 0)
                                        @foreach ($vendors as $vendor)
                                        <option value="{{ $vendor->id }}">{{ $vendor->vendor_name }}</option>
                                        @endforeach
                                        @endif
                                    </optgroup>
                                </select>
                                @error('vendor_id')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="cover_image">صورة غلاف المنتج </label>
                                <input class="form-control @error('cover_image') is-invalid @enderror" id="cover_image"
                                    name="cover_image" type="file">
                                @error('file')
                                <span class="invalid-feedback">{{ $message }}</span>
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
    $(document).on('change', '#manageStock', function() {
        if ($(this).val() == 1) {
            $('#qtyDiv').css('display', 'block');
        } else {
            $('#qtyDiv').css('display', 'none');
        }
    });


    ClassicEditor
		.create( document.querySelector( '#editor_four' ) )
		.catch( error => {
			console.error( error );
		} );
    ClassicEditor
		.create( document.querySelector( '#editor_short' ) )
		.catch( error => {
			console.error( error );
		} );
</script>



@endpush
