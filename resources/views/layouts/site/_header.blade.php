 <!-- Start Upper Header -->
 <header>
        <div class="container d-flex justify-content-between align-items-center">
            <ul class="list-unstyled m-0 d-none d-md-flex">
                <li>
                    <a href="#">عن المتجر</a>
                </li>
                <li>
                    <a href="#">سياسة الشحن </a>
                </li>
                <!-- <li>
                    <a href="#">سياسة الخصوصية </a>
                </li>
                <li>
                    <a href="#">الشروط والأحكام </a>
                </li> -->
            </ul>

            @guest
            <ul class="list-unstyled m-0 d-none d-md-flex">
                <li>
                    <a title="تسجيل الدخول" href="{{route('login')}}">تسجيل الدخول</a>
                </li>
                <li>
                    <a title="تسجيل حساب جديد" href="{{route('register')}}">تسجيل حساب جديد</a>
                </li>

            </ul>
            @else
            <ul class="list-unstyled m-0 d-none d-md-flex">
                <li>
                    <a title="تسجيل الخروج" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
            @endguest

            <!-- <select class="form-control mr-auto">
                <option>العربية</option>
                <option>English</option>
            </select> -->

        </div>
    </header>
    <!-- End Upper Header -->