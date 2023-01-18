@extends('layouts.site.app')

@section('title')

- طلب استرجاع او استبدال
@endsection

@section('content')


<div class="container mt-4 mb-5">
    <div class="page-nav row">
        <a href="/" class="text-dark pl-2">
            <i class="fa-solid fa-house-chimney"></i>
        </a>
        <a href="#" class="text-dark">
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
            عمل طلب إستبدال وأرجاع
        </a>
    </div>
</div>

<div class="container text-right">
    <div class="info w-75 mx-auto bg-light p-4 pt-5 pb-5 border-top">
        <h2>عمل طلب إستبدال وأرجاع</h2>
        <h4 class="text-danger mt-3">الرجاء الانتباه</h4>
        <ol class="mt-4 pr-4">
            <li class="h6">
                يجب التأكد بأن البائع متاح لديه خدمة الاستبدال أو الاسترجاع
            </li>
            <li class="h6 my-4">
                يجب الاحتفاظ بوصل الشحن وارفق صورة منها
            </li>
            <li class="h6">
                يجب تصوير فيديو بسيط لايتعدى الدقيقة الواحدة واظهار فيه سبب الطلب
            </li>
        </ol>
    </div>
</div>


<form class=" px-4 p-4 rounded bg-light mb-5" action="{{ route('exchange.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container text-right mt-5 ">
        <div class="py-3 h5">
            تفاصيل الطلب
        </div>
        <div class=" form-row">
            <div class="form-group col-md-6 mb-4">
                <label for="inputName" class="font-weight-bold">الإسم الأول</label>
                <span class="text-danger">*</span>
                <input type="text" name="firstName" required class="form-control ml-5 py-4 mt-2 border-bottom border-top-0 border-right-0 border-left-0 rounded-0" id="inputName" placeholder="أجابتك">
            </div>

            <div class="form-group col-md-6 mb-4">
                <label for="inputName" class="font-weight-bold">الإسم الأخير</label>
                <span class="text-danger">*</span>
                <input type="text" name="lastName" required class="form-control ml-5 py-4 mt-2 border-bottom border-top-0 border-right-0 border-left-0 rounded-0" id="inputName" placeholder="أجابتك">
            </div>

            <div class="form-group col-md-6 mb-4">
                <label for="inputName" class="font-weight-bold">عنوان البريد الإلكترونى</label>
                <span class="text-danger">*</span>
                <input type="email" name="email" required class="form-control ml-5 py-4 mt-2 border-bottom border-top-0 border-right-0 border-left-0 rounded-0" id="inputName" placeholder="أجابتك">
            </div>

            <div class="form-group col-md-6 mb-4">
                <label for="inputName" class="font-weight-bold">رقم التليفون</label>
                <span class="text-danger">*</span>
                <input type="number" name="phone" required class="form-control ml-5 py-4 mt-2 border-bottom border-top-0 border-right-0 border-left-0 rounded-0" id="inputName" placeholder="أجابتك">

                <div class="mt-3 d-flex">
                    <label for="inputName" class="font-weight-bold">هل مربوط بالواتس</label>
                    <div class="mr-3 d-flex">
                        <div class="d-flex align-items-center">
                            <input type="radio" value="1" name="whatsApp" />
                            <label class="mr-2">نعم</label>
                        </div>
                        <div class="d-flex align-items-center mr-4">
                            <input type="radio" value="0" name="whatsApp" />
                            <label class="mr-2">لا</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-6 mb-4">
                <label for="inputName" class="font-weight-bold">رقم الطلب</label>
                <span class="text-danger">*</span>
                <input type="text" name="order_number" required class="form-control ml-5 py-4 mt-2 border-bottom border-top-0 border-right-0 border-left-0 rounded-0" id="inputName" placeholder="أجابتك">
            </div>

            <div class="form-group col-md-6 mb-4">
                <label for="inputName" class="font-weight-bold">تاريخ الطلب</label>
                <span class="text-danger">*</span>
                <input type="date" name="order_date" required class="form-control ml-5 py-4 mt-2 border-bottom border-top-0 border-right-0 border-left-0 rounded-0" id="inputName" placeholder="أجابتك">
            </div>

            <div class="form-group col-md-6 mb-4">
                <label for="inputName" class="font-weight-bold">رقم الشحنة</label>
                <label for="inputName" class="font-weight-bold d-block">إذا كان رقمك يحتوى على أكثر من شحنة
                    <span class="text-danger">*</span>
                </label>

                <input type="text" name="package_number" required class="form-control ml-5 py-4 mt-2 border-bottom border-top-0 border-right-0 border-left-0 rounded-0" id="inputName" placeholder="أجابتك">
            </div>


            <div class="form-group col-md-6 mb-4">
                <label for="inputName" class="font-weight-bold">البائع</label>
                <label for="inputName" class="font-weight-bold d-block">
                    رجاء تحديد البائع
                    <span class="text-danger">*</span>
                </label>

                <select name="vendor_id" required class="form-control input-background mt-3 border-0 ">
                    @if ($vendors && $vendors->count() > 0)
                    @foreach ($vendors as $vendor)
                    <option value="{{ $vendor->id }}">{{ $vendor->vendor_name }}</option>
                    @endforeach
                    @endif
                </select>
            </div>
        </div>
    </div>

    <div class="container text-right mt-5 ">
        <div class="py-3 h5">
            معلومات عن المنتج
        </div>
        <div class="px-4 p-4 form-row rounded bg-light">
            <div class="form-group col-md-6 mb-4">
                <label for="inputName" class="font-weight-bold">
                    إسم المنتج
                </label>
                <span class="text-danger">*</span>
                <input type="text" name="product_name" required class="form-control ml-5 py-4 mt-2 border-bottom border-top-0 border-right-0 border-left-0 rounded-0" id="inputName" placeholder="أجابتك">
            </div>

            <div class="form-group col-md-6 mb-4">
                <label for="inputName" class="font-weight-bold">نوع المنتج</label>
                <span class="text-danger">*</span>
                <input type="text" name="product_type" required class="form-control ml-5 py-4 mt-2 border-bottom border-top-0 border-right-0 border-left-0 rounded-0" id="inputName" placeholder="أجابتك">
            </div>



            <div class="form-group col-md-6 mb-4">
                <label for="inputName" class="font-weight-bold">رابط المنتج </label>
                <span class="text-danger">*</span>
                <input type="string" name="product_link" required  class="form-control ml-5 py-4 mt-2 border-bottom border-top-0 border-right-0 border-left-0 rounded-0" id="inputName" placeholder="أجابتك">
            </div>

            <div class="form-group col-md-6 mb-4">
                <label for="inputName" class="font-weight-bold">الكمية</label>
                <span class="text-danger">*</span>
                <input type="number" name="prouct_quantity" required class="form-control ml-5 py-4 mt-2 border-bottom border-top-0 border-right-0 border-left-0 rounded-0" id="inputName" placeholder="أجابتك">

            </div>

            <div class="form-group col-md-6 mb-4">
                <label for="inputName" class="font-weight-bold">
                    بوليصة الشحن
                </label>
                <span class="text-danger">*</span>
                <input type="file" name="bill_of_lading" required class="ml-5 d-block mt-2" id="inputName" placeholder="أجابتك">
            </div>

            <div class="form-group col-md-6 mb-4">
                <label for="inputName" class="font-weight-bold">
                    الفيديو
                </label>
                <span class="text-danger">*</span>
                <input type="file" name="product_video" required class="ml-5 d-block mt-2" id="inputName" placeholder="أجابتك">
            </div>

            <div class="mt-3 d-flex col-md-6">
                <label for="inputName" class="font-weight-bold">
                    نوع الطلب
                </label>
                <div class="mr-3 d-flex">
                    <div class="d-flex align-items-center">
                        <input type="radio" value="0" name="order_type" />
                        <label class="mr-2">استبدال</label>
                    </div>
                    <div class="d-flex align-items-center mr-4">
                        <input type="radio" value="1" name="order_type" />
                        <label class="mr-2">استرجاع</label>
                    </div>
                </div>
            </div>

            <div class="mt-3 d-flex col-md-12">
                <label for="inputName" class="font-weight-bold">
                    سبب استبدال او استرجاع
                </label>
                <div class="mr-3">
                    <select name="reason" required class="select2 form-control">
                        <optgroup label="من فضلك أختر  ">
                            <option value="استلمت منتج بالخطأ">استلمت منتج بالخطأ</option>
                            <option value="المنتج وصلنى به تلف">المنتج وصلنى به تلف</option>
                            <option value="منتج غير مطابق للمطلوب">منتج غير مطابق للمطلوب</option>
                            <option value="يوجد خلل الرجاء التوضيح">يوجد خلل الرجاء التوضيح</option>
                            <option value="أخرى الرجاء التوضيح">أخرى الرجاء التوضيح</option>
                        </optgroup>
                    </select>
{{--
                    <div class="d-flex align-items-center">
                        <input type="radio" name="reason" />
                        <label class="mr-2">استلمت منتج بالخطأ</label>
                    </div>
                    <div class="d-flex align-items-center">
                        <input type="radio" name="reason" />
                        <label class="mr-2">المنتج وصلنى به تلف</label>
                    </div>
                    <div class="d-flex align-items-center">
                        <input type="radio" name="reason" />
                        <label class="mr-2">منتج غير مطابق للمطلوب</label>
                    </div>
                    <div class="d-flex align-items-center">
                        <input type="radio" name="reason" />
                        <label class="mr-2">يوجد خلل الرجاء التوضيح</label>
                    </div>
                    <div class="d-flex align-items-center">
                        <input type="radio" name="reason" />
                        <label class="mr-2">أخرى الرجاء التوضيح</label>
                    </div> --}}

                </div>
            </div>


            <div class="form-group col-md-6 my-4">
                <label for="inputName" class="font-weight-bold">تفاصيل أو عيوب أخرى</label>
                <span class="text-danger">*</span>
                <input type="text" name="details" required class="form-control ml-5 py-4 mt-2 border-bottom border-top-0 border-right-0 border-left-0 rounded-0" id="inputName" placeholder="أجابتك">
            </div>

        </div>
        <div class="d-flex align-items-center mt-3">
            <input type="checkbox" />
            <label class="mr-2 mb-0">
                لقد قرأت ووافقت على
                <a href="#" class="font-weight-bold text-style">
                    سياسة الاستبدال والاسترجاع
                </a>
            </label>
        </div>
        <button type="submit" class="btn btn-style my-4 mx-0">
            إرسال
        </button>

    </div>
</form>


@endsection
