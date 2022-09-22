<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>

<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div>
            <p class="app-sidebar__user-name">{{auth()->user()->name}}</p>
            <p class="app-sidebar__user-designation">{{auth()->user()->email}}</p>
        </div>
    </div>

    <ul class="app-menu">

        <li><a class="app-menu__item" href="{{ route('admin.dashboard') }}"><i class="app-menu__icon fa fa-home"></i> <span class="app-menu__label">الرئيسية</span></a></li>
 
        <li><a class="app-menu__item" href="{{route('admins.index')}}"><i class="app-menu__icon fa fa-user"></i> <span class="app-menu__label">المشرفين</span></a></li>
        <li><a class="app-menu__item" href="{{route('brands.index')}}"><i class="app-menu__icon fa fa-user"></i> <span class="app-menu__label">الماركات</span></a></li>
        <li><a class="app-menu__item" href="{{route('categories.index')}}"><i class="app-menu__icon fa fa-user"></i> <span class="app-menu__label">الاقسام</span></a></li>
        

    </ul>
</aside>