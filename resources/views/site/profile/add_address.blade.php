@extends('layouts.site.app')

@section('title')

- أضف عنوان جديد

@endsection

@section('content')

<div class="container text-right mt-5">
    <button type="submit" class="btn-style bg-light text-dark border">الرجوع للعناوين</button>
    <div class="titles mb-4 mt-4">
        أضف عنوان جديد
    </div>
    <hr>
    <form class="px-4" action="{{route('site.profile.storeAddress',auth()->user()->id)}}" method="POST">
        @csrf

        <input name="id" value="{{ auth()->user()->id }}" type="hidden">

        <div class="form-row">
            <div class="form-group col-md-12 offset-md-1 mb-4">
                <label for="inputName">الإسم بالكامل</label>
                <span class="text-danger">*</span>
                <input type="text" class="form-control ml-5 py-4 input-background mt-2" id="inputName" disabled value="{{auth()->user()->firstName}} {{auth()->user()->lastName}}">
            </div>

            <div class="form-group col-md-6">
                <label for="inputPhone">يرجى كتابة رقم الهاتف بالإنجليزى</label>
                <span class="text-danger">*</span>
                <input type="text" class="form-control ml-5 py-4 input-background mt-2" disabled id="inputName" value="{{auth()->user()->phone}}">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPhone">
                    رقم هاتف أخر (اختيارى)
                </label>
                <span class="text-danger">*</span>
                <input type="text" class="form-control ml-5 py-4 input-background mt-2" name="Phone_2" value="{{old('Phone_2')}}" id="inputName" placeholder="يرجى كتابة رقم الهاتف بالإنجليزى">
            </div>

            <div class="form-group col-md-12 offset-md-1 mb-4">
                <label for="inputName">الرمز البريدى</label>
                <span class="text-danger">*</span>
                <input type="text" class="form-control ml-5 py-4 input-background mt-2" name="postal_code" value="{{old('postal_code')}}" id="inputName" placeholder="مثال 13621">
            </div>

            <div class="form-group col-md-12 offset-md-1 mb-4">
                <label for="inputName">العنوان بالتفصيل</label>
                <span class="text-danger">*</span>
                <input type="text" class="form-control ml-5 py-4 input-background mt-2" name="address_details" value="{{old('address_details')}}" id="inputName" placeholder="برجى كتابة عنوانك بالتفصيل">
            </div>

            <div class="form-group col-md-6">
                <label for="inputPhone">المحافطة</label>
                <span class="text-danger">*</span>
                <select name="governorate_id" id="governorate" class="form-control input-background mt-2">
                    <option disabled>أختر محافظتك</option>
                    @if ($governorates && $governorates->count() > 0)
                    @foreach ($governorates as $governorate)
                    <option value="{{ $governorate->id }}">{{ $governorate->name }}</option>
                    @endforeach
                    @endif

                </select>

            </div>
            <div class="form-group col-md-6">
                <label for="inputPhone">المدينة</label>
                <span class="text-danger">*</span>
                <select name="city_id" id="city" class="form-control input-background mt-2">
                    <option disabled>أختر المدينه</option>
                    {{-- @if ($cities && $cities->count() > 0)
                    @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                    @endif --}}

                </select>
            </div>

            <div class="form-group col-md-6 mb-4">
                <label for="inputName">
                    رقم مبنى / فبلا
                </label>
                <span class="text-danger">*</span>
                <input type="text" name="building_no" value="{{old('building_no')}}" class="form-control ml-5 py-4 input-background mt-2" id="inputName" placeholder="مثال : عمارة رقم 8">
            </div>

            <div class="form-group col-md-6 mb-4">
                <label for="inputName">
                    رقم الطابق
                </label>
                <span class="text-danger">*</span>
                <input type="text" name="flat_no" value="{{old('flat_no')}}" class="form-control ml-5 py-4 input-background mt-2" id="inputName" placeholder="مثال : الدور الثانى">
            </div>


            <div class="form-group col-md-6 mb-4">
                <label for="inputName">
                    رقم الشقة
                </label>
                <span class="text-danger">*</span>
                <input type="text" name="apartment_no" value="{{old('apartment_no')}}" class="form-control ml-5 py-4 input-background mt-2" id="inputName" placeholder="مثال : شقة رقم 3">
            </div>

            <div class="form-group col-md-6 mb-4">
                <label for="inputName">
                    علامة مميزة
                </label>
                <span class="text-danger">*</span>
                <input type="text" name="special_mark" value="{{old('special_mark')}}" class="form-control ml-5 py-4 input-background mt-2" id="inputName" placeholder="مثال :  مساجد أو فرع فودافون">
            </div>
        </div>

        <button type="submit" class="btn d-block w-100 my-4 mx-0">حفظ العنوان</button>

    </form>
</div>


@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('select[name="governorate_id"]').on('change', function() {
            var governorate_id = $(this).val();
            if (governorate_id) {
                $.ajax({
                    url: "{{ URL::to('Site/cities') }}/" + governorate_id
                    , type: "GET"
                    , dataType: "json"
                    , success: function(data) {
                        $('select[name="city_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                , });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });

</script>
@endpush
