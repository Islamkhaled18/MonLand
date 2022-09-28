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
        
        
        
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">المنتجات وخصائصها</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="{{route('products.index')}}"><i class="icon fa fa-circle-o"></i>المنتجات</a></li>
              <li><a class="treeview-item" href="{{route('attributes.index')}}"><i class="icon fa fa-circle-o"></i>صفات المنتجات</a></li>
              <li><a class="treeview-item" href="{{route('options.index')}}"><i class="icon fa fa-circle-o"></i> خصائص الصفات </a></li>
            </ul>
        </li>

        <li><a class="app-menu__item" href="{{route('delivery.index')}}"><i class="app-menu__icon fa fa-user"></i> <span class="app-menu__label">المحافظات & اسعار الشحن</span></a></li>
        <li><a class="app-menu__item" href="{{route('settings.index')}}"><i class="app-menu__icon fa fa-user"></i> <span class="app-menu__label">الاعدادات</span></a></li>
        <li><a class="app-menu__item" href="{{route('roles.index')}}"><i class="app-menu__icon fa fa-user"></i> <span class="app-menu__label">اوامر وصلاحيات</span></a></li>
        

    </ul>
</aside>