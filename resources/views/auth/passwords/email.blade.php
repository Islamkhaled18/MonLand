<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale= 1">
    <title>كيـان - استعادة كلمة المرور
    </title>
    <link rel="stylesheet" href="{{ asset('website_assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/css/style.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('website_assets/pages-css/register/passwordRecovery.css') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('website_assets/pages-css/register/passwordRecovery.css') }}" />
    {{-- <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"> --}}

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

                    <div class="d-flex mt-5 mb-4">
                        <i class="fa fa-exclamation-circle fa-lg mt-1"></i>
                        <p class="text-right mr-2 font-weight-bold text-muted">
                            الرجاء إدخال البريد الإلكترونى الخاص بحسابك على كيان سنرسل لك رابط لإستعادة كلمة المرور
                        </p>

                    </div>

                    {{-- <form class="text-right px-4"> --}}
                    <form class="text-right px-4" action="{{ route('password.email') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="font-weight-bold">البريد الإلكترونى</label>
                            <input type="email" name="email" class="form-control mt-4" id="email">

                        </div>
                        <button type="submit" class="btn d-block w-100 my-5 text-white font-weight-bold py-2">إستعادة
                            كلمة
                            المرور</button>
                    </form>
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
