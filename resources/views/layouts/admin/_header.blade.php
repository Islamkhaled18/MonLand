<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" style="font-family: 'Cairo', 'sans-serif';"
        href="{{ route('admin.dashboard') }}">Kayan</a>

    <!-- Sidebar toggle button-->
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>

    <!-- Navbar Right Menu-->
    <ul class="app-nav">



        {{-- notification --}}
        <li class="dropdown" id="notifications">
            {{-- <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"
                style="position:relative;">
                <i class="fa fa-bell-o fa-lg"></i>
                <span class="badge badge-danger" id="unread-notifications-count"
                    style="position:absolute; top: 10px; right: 5px;">10</span>
            </a> --}}

            <ul class="app-notification dropdown-menu dropdown-menu-right">

                <div class="app-notification__content">


                    <li>
                        <a class="app-notification__item" href="#">
                            <span class="app-notification__icon">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                    <i class="fa fa-address-book fa-stack-1x fa-inverse"></i>
                                </span>
                            </span>
                            <div>
                                <p class="app-notification__message">Notification title</p>
                                <p class="app-notification__meta">2 mins ago</p>
                            </div>
                        </a>
                    </li>

                </div>

                <li class="app-notification__footer"><a href="#">@lang('site.all') @lang('notifications.notifications')</a></li>
            </ul>
        </li>
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown"
                aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="{{route('adminsProfile.edit',auth()->user()->id)}}"><i class="fa fa-user fa-lg"></i> الصفحه الشخصيه</a></li>
                <li>
                    <a class="dropdown-item" href="page-login.html" href="{{ route('admin.logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out fa-lg"></i>
                        تسجيل الخروج
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="get"
                            style="display: none;">
                            @csrf
                        </form>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</header>
