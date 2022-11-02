<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale= 1">
    <title>كيان -إنشاء حساب جديد </title>
    <link rel="stylesheet" href="{{ asset('website_assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('website_assets/pages-css/register/completeFile.css') }}">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <div class="mt-5 mx-auto">
        <div class="modal-dialog px-4">
            <div class="modal-content">
                <!-- <div class="modal-header d-flex align-items-center pl-3 pr-1 border-0">
                    <button class="btn" onclick="history.back()">
                        <span aria-hidden="true">
                            <i class="fa fa-arrow-right text-dark fa-lg"></i>
                        </span>
                    </button>

                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>العربية</option>
                        <option>English</option>
                    </select>
                </div> -->
                <div class="modal-body">
                    <h4 class="text-center">
                        إنشاء حساب جديد
                    </h4>


                    <form method="POST" action="{{ route('register') }}" class="text-right px-4">
                        @csrf

                        <div class="form-group mt-4">
                            <label class="font-weight-bold text-muted">الإسم الأول</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control mt-4 @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName" autofocus>
                            @error('firstName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label class="font-weight-bold text-muted">الإسم الثانى</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control mt-4 @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" autofocus>
                            @error('lastName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label class="font-weight-bold text-muted">البريد الإلكترونى</label>
                            <span class="text-danger">*</span>
                            <input type="email" class="form-control mt-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <label class="font-weight-bold text-muted">كلمة المرور</label>
                            <span class="text-danger">*</span>
                            <input type="password" class="form-control mt-4 @error('password') is-invalid @enderror" name="password" required>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <label class="font-weight-bold text-muted">رقم الهاتف (إختيارى)</label>
                            <input type="text" class="form-control mt-4 @error('phone') is-invalid @enderror" name="phone" >

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-group mt-4 d-flex">
                            <label class="font-weight-bold text-muted">النوع : </label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="male">
                                <label class="form-check-label mr-1">ذكر</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="female">
                                <label class="form-check-label mr-1">أنثى</label>
                            </div>
                        </div>

                        <!-- <div class="form-group mt-4 d-flex align-items-center">
                            <input type="checkbox">
                            <label class="font-weight-bold text-muted mr-2">أوافق على
                                <a href="#" class="diff-color">
                                    الشروط والأحكام
                                </a>
                            </label>
                        </div> -->

                        <button type="submit" class="btn d-block w-100 my-4 text-white font-weight-bold py-2">
                            إنشاء الحساب
                        </button>

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