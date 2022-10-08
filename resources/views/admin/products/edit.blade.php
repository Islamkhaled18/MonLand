@extends('layouts.admin.app')
@section('title')
    تعديل منتج
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
                <li class="breadcrumb-item active"><a href="{{ route('products.edit', $product->id) }}">تعديل على منتج -
                        {{ $product->name }}</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="tile">
                    <div class="tile-body">
                        <div class="col-lg-6">
                            <form action="{{ route('products.update', $product->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <input name="id" value="{{ $product->id }}" type="hidden">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">اسم المنتج</label>
                                    <input class="form-control" id="exampleInputEmail1" name="name"
                                        value="{{ $product->name }}" type="text" placeholder="اسم المنتج">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="projectinput1"> اسم بالرابط
                                    </label>
                                    <input type="text" class="form-control" placeholder=" اسم بالرابط "
                                        value="{{ $product->slug }}" name="slug">
                                    @error('slug')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="projectinput1"> وصف المنتج
                                    </label>
                                    <textarea name="description" id="description" class="form-control" placeholder="  ">{{ $product->description }}</textarea>

                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="projectinput1"> الوصف المختصر
                                    </label>
                                    <textarea name="short_description" id="short-description" class="form-control" placeholder="">{{ $product->short_description }}</textarea>

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
                                                    <option
                                                        value="{{ $brand->id }}"@if ($brand->id == $product->brand_id) selected @endif>
                                                        {{ $brand->name }}
                                                    </option>
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
                                        value="{{ $product->anotherInformation }}" type="text"
                                        placeholder='معلومات اخرى'>
                                    @error('anotherInformation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mt-1">
                                    <input type="checkbox" value="{{ $product->is_active }}" name="is_active"
                                        id="switcheryColor4" class="switchery" data-color="success" checked />
                                    <label for="switcheryColor4" class="card-title ml-1">الحالة </label>

                                    @error('is_active')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-body">
                                    <h4 class="form-section"><i class="ft-home"></i> البيانات الاساسية للمنتج </h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1"> سعر المنتج
                                                </label>
                                                <input type="number" id="price" class="form-control"
                                                    placeholder="  سعر المنتج " value="{{ $product->price }}" name="price">
                                                @error('price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1"> سعر خاص
                                                </label>
                                                <input type="number" class="form-control" placeholder=" سعر خاص "
                                                    value="{{  $product->special_price }}" name="special_price">
                                                @error('special_price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="projectinput1">نوع السعر
                                                </label>
                                                <select name="special_price_type" class="select2 form-control" multiple>
                                                    <optgroup label="من فضلك أختر النوع ">
                                                        <option value="percent">precent</option>
                                                        <option value="fixed">fixed</option>
                                                    </optgroup>
                                                </select>
                                                @error('special_price_type')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1"> تاريخ البداية
                                                </label>

                                                <input type="date" id="price" class="form-control"
                                                    placeholder="  " value="{{ $product->special_price_start }}"
                                                    name="special_price_start">

                                                @error('special_price_start')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1"> تاريخ البداية
                                                </label>
                                                <input type="date" id="price" class="form-control"
                                                    placeholder="  " value="{{ $product->special_price_end }}"
                                                    name="special_price_end">

                                                @error('special_price_end')
                                                    <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h4 class="form-section"><i class="ft-home"></i> اداره المستودع </h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1"> كود المنتج
                                                </label>
                                                <input type="text" id="sku" class="form-control" placeholder="  "
                                                    value="{{ $product->sku }}" name="sku">
                                                @error('sku')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

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
                                                    value="{{ $product->qty }}" name="qty">
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
                                                    <option value="{{ $vendor->id }}"@if ($vendor->id == $product->vendor_id) selected @endif>{{ $vendor->vendor_name }}</option>
                                                @endforeach
                                            @endif
                                        </optgroup>
                                    </select>
                                    @error('vendor_id')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="photo" class="form-label">صورة المنتج</label>
                                    
                                    <input type="file" class="form-control @error('photo') is-invalid @enderror"
                                        value="{{ old('photo') }}" id="photo" name="photo[]" multiple accept="image/*">
                                    @error('file')
                                        <span class="invalid-feedback">{{ $message }}</span>
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

