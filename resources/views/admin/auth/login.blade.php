<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/css/main.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>تسجيل الدخول - كيان</title>
</head>

<body>
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <section class="login-content">
        <div class="logo">
            <h1>MonLand</h1>
        </div>
        @include('admin.partials.success')
        @include('admin.partials.error')
        <div class="login-box">
            {{-- login form --}}
            <form class="login-form" action="{{ route('admin.post.login') }}" method="post">
                @csrf

                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>تسجيل الدخول</h3>
                <div class="form-group">
                    <label class="control-label"> البريد الإلكتروني او رقم الهاتف</label>
                    <input class="form-control" name="login" value="{{ old('login') }}" type="text"
                        placeholder="البريد الإلكتروني او رقم الهاتف" autofocus>
                    @error('login')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="control-label">الرقم الســـري</label>
                    <input class="form-control" name="password" type="password" placeholder="الرقم السري">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="utility">
                        <div class="animated-checkbox">
                            <label>
                                <input type="checkbox" name="remember" id="remember-me"><span
                                    class="label-text">تذكرني</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group btn-container">
                    <button type="submit" class="btn btn-primary btn-block"><i
                            class="fa fa-sign-in fa-lg fa-fw"></i>تسجيل الدخول</button>
                </div>
            </form>
            <form class="forget-form" action="{{ route('admin.forget.password.post') }}" method="post">
                @csrf

                {{-- forget password form --}}
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>هل نسيت كلمة المرور</h3>
                <div class="form-group">
                    <label class="control-label">البريد الإلكتروني</label>
                    <input class="form-control" name="email" type="text" placeholder="البريد الإلكتروني" required autofocus>
                    @if ($errors->has('email'))
                      <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group btn-container">
                    <button type="submit"  title=" إعادة ضبط كلمة المرور" class="btn btn-primary btn-block" >
                        <i class="fa fa-unlock fa-lg fa-fw"></i>
                        إعادة ضبط كلمة المرور
                    </button>
                </div>
                <div class="form-group mt-3">
                    <p class="semibold-text mb-0">
                        <a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i>
                             الرجوع الى صفحة تسجيل الدخول
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('admin_assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/main.js') }}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ asset('admin_assets/js/plugins/pace.min.js') }}"></script>
    <script type="text/javascript">
        // Login Page Flipbox control
        $('.login-content [data-toggle="flip"]').click(function() {
            $('.login-box').toggleClass('flipped');
            return false;
        });
    </script>
</body>

</html>
