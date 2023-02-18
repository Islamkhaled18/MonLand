<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale= 1">
    <title>إستعادة كلمة المرور</title>

    <link rel="stylesheet" href="{{ asset('website_assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/pages-css/passwordRecovery.css') }}" />
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
                        إستعادة كلمة المرور
                    </h4>

                    <div class="text-center my-5">
                        <i class="fa fa-check-circle fa-7x"></i>
                    </div>
                    <p class="text-right mr-3 font-weight-bold text-muted mb-5">
                        مت استعادة كلمة المرور بنجاح
                    </p>

                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('website_assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('website_assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('website_assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('website_assets/js/script.js') }}"></script>
</body>

</html>
