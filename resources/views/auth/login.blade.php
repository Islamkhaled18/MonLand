<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale= 1" />
    <title>كيـان - تسجيل الدخول</title>
    <link rel="stylesheet" href="{{ asset('website_assets/css/bootstrap.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('website_assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('website_assets/pages-css/register/registerNewAccount.css') }}" />
    <link rel="stylesheet" href="{{ asset('website_assets/css/all.min.css') }}" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" />
</head>

<body>
    <div class="my-5 mx-auto w-75 bg-white rounded reg-new-user">
        <div class="modal-header d-flex align-items-center pl-3 pr-1 border-0">
            <button class="btn">
                <span aria-hidden="true" onclick="history.back()">
                    <i class="fa fa-arrow-right text-dark fa-sm"></i>
                </span>
            </button>

            <select style="appearance: none; -webkit-appearance: none" class="form-control border-0"
                id="exampleFormControlSelect1">
                <option>العربية</option>
                <option>English</option>
            </select>
        </div>

        <div class="d-flex wrapper">
            <div class="card border-0 w-50 text-right px-4">
                <div class="card-body">
                    <h4 class="card-title text-center">تسجيل الدخول</h4>

                    <form class="mt-5" method="POST" action="{{ route('login') }}">
                        @csrf



                        <div class="form-group mt-3">
                            <label for="email" class="font-weight-bold text-muted">البريد الإلكترونى</label>
                            <input type="email" id="email"
                                class="form-control mt-4 @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>



                        <div class="form-group mt-4">
                            <label for="password" class="font-weight-bold text-muted">كلمة المرور</label>
                            <input type="password" id="password"
                                class="form-control mt-4 @error('password') is-invalid @enderror" name="password"
                                required autocomplete="current-password" />

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>




                        <div class="mt-4 d-flex justify-content-between">
                            <div class="d-flex align-items-center">

                                <input type="checkbox" class="ml-2" name="remember_token" id="remember_token" {{
                                    old('remember_token') ? 'checked' : '' }} />

                                <label for="remember_token" class="font-weight-bold text-muted"> تذكرنى </label>
                            </div>
                            <a href="{{route('password.email.send')}}" class="forget-pass"> هل نسيت كلمة المرور ؟ </a>
                        </div>

                        <button type="submit" class="btn d-block w-100 my-4 text-white font-weight-bold py-2">
                            تسجيل الدخول
                        </button>
                    </form>
                </div>
            </div>

            <div class="card border-0 w-50 text-right px-4 first-card my-4">
                <div class="card-body card-body-last d-flex flex-column justify-content-between">
                    <div>
                        <h4 class="card-title text-center">إنشاء حساب كيان</h4>

                        <p class="font-weight-bold mt-5">
                            قم بإنشاء حسابك الخاص على كيان بكل سهولة عن طريق الإيميل أو عن
                            طريق السوشيال ميديا
                        </p>
                    </div>

                    <ul class="list-unstyled social mt-5">
                        <li>
                            <a href="{{route('auth.provider.redirect' , 'google')}}" class="border">
                                إنشاء حساب بالبريد الإلكترونى
                                <i class="fa fa-envelope mr-1 fa-lg"></i>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('auth.provider.redirect' , 'facebook')}}" class="border">
                                Sign in with facebook
                                <i class="fa fa-facebook mr-1 fa-lg"></i>
                            </a>
                        </li>

                        {{-- <li>
                            <a href="#" class="border">
                                Sign in with apple
                                <i class="fa fa-apple mr-1 fa-lg"></i>
                            </a>
                        </li> --}}
                    </ul>
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
