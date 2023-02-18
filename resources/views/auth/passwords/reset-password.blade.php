<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale= 1">
    <title>إستعادة كلمة المرور</title>

    <link rel="stylesheet" href="{{ asset('website_assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/pages-css/registernewPass.css') }}" />
</head>

<body>
    <div class="mt-5 mx-auto">
        <div class="modal-dialog px-4">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center pl-3 pr-1 border-0">
                    <button class="btn" onclick="history.back()">
                        <span aria-hidden="true">
                            <i class="fa fa-arrow-right text-dark fa-lg"></i>
                        </span>
                    </button>

                    {{-- <select class="form-control" id="exampleFormControlSelect1">
                        <option>العربية</option>
                        <option>English</option>
                    </select> --}}
                </div>
                <div class="modal-body">
                    <h4 class="text-center">
                        إنشاء كلمة مرور جديدة
                    </h4>


                    <form class="text-right px-4 my-5" action="{{ route('password.update') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold">كود التأكيد</label>

                            <div class="d-flex justify-content-between flex-row-reverse">
                                <input type="text" name="verification_code" class="form-control mt-4" maxlength="1">
                                <input type="text" name="verification_code" class="form-control mt-4" maxlength="1">
                                <input type="text" name="verification_code" class="form-control mt-4" maxlength="1">
                                <input type="text" name="verification_code" class="form-control mt-4" maxlength="1">
                                <input type="text" name="verification_code" class="form-control mt-4" maxlength="1">
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <label class="font-weight-bold text-muted">كلمة المرور الجديدة</label>
                            <input type="password" name="password" class="form-control mt-4">
                        </div>
                        <button type="submit" class="btn d-block w-100 my-5 text-white font-weight-bold py-2">إنشاء
                            كلمة
                            مرور جديدة</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('website_assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('website_assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('website_assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('website_assets/js/script.js') }}"></script>
    <script src="{{ asset('website_assets/pages-js/newPass.js') }}"></script>


</body>

</html>
