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
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}" title="المنتجات">المنتجات</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('products.general.create') }}" title="انشاء منتج جديد">إانشاء منتج جديد</a></li>

            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="tile">
                    <div class="tile-body">
                        <div class="col-lg-6">
                            <form action="{{ route('products.stock.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="product_id" value="{{ $id }}">
                                <div class="form-body">

                                    <h4 class="form-section"><i class="ft-home"></i> اداره المستودع </h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1"> كود المنتج
                                                </label>
                                                <input type="text" id="sku" class="form-control" placeholder="  "
                                                    value="{{ old('sku') }}" name="sku">
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
    </script>
@endpush
