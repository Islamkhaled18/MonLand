<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>

<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div>
            <p class="app-sidebar__user-name">{{ auth()->user()->name }}</p>
            <p class="app-sidebar__user-designation">{{ auth()->user()->email }}</p>
        </div>
    </div>

    <ul class="app-menu">

        <li><a class="app-menu__item" href="{{ route('admin.dashboard') }}"><i class="app-menu__icon fa fa-home"></i> <span
                    class="app-menu__label">الرئيسية</span></a></li>



        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                    class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label"> المشرفين وصلاحياتهم</span><i
                    class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">

                <li><a class="treeview-item" href="{{ route('admins.index') }}"><i
                            class="app-menu__icon fa fa-user"></i> <span class="app-menu__label">المشرفين</span></a>
                </li>

                <li><a class="treeview-item" href="{{ route('roles.index') }}"><i class="app-menu__icon fa fa-user"></i>
                        <span class="app-menu__label">اوامر وصلاحيات</span></a></li>

            </ul>
        </li>


        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                    class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label"> الاقسام</span><i
                    class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{ route('mainCategories.index') }}"><i
                            class="app-menu__icon fa fa-user"></i> <span class="app-menu__label">الاقسم
                            الرئيسيه</span></a></li>
                <li><a class="treeview-item" href="{{ route('categories.index') }}"><i
                            class="app-menu__icon fa fa-user"></i> <span class="app-menu__label">الاقسام</span></a></li>
            </ul>
        </li>

        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                    class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">المنتجات وخصائصها</span><i
                    class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{ route('products.index') }}"><i
                            class="icon fa fa-circle-o"></i>المنتجات</a></li>
                <li><a class="treeview-item" href="{{ route('colors.index') }}"><i class="icon fa fa-circle-o"></i>الوان
                        المنتجات</a></li>
                <li><a class="treeview-item" href="{{ route('sizes.index') }}"><i class="icon fa fa-circle-o"></i> مقاس
                        المنتجات </a></li>


                <li><a class="treeview-item" href="{{ route('size.index') }}"><i
                            class="app-menu__icon fa fa-user"></i> <span class="app-menu__label"> جدول المقاسات
                        </span></a></li>
            </ul>
        </li>

        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                    class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label"> الطلبات</span><i
                    class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">


                <li><a class="treeview-item" href="{{ route('order.index') }}"><i
                            class="app-menu__icon fa fa-user"></i>
                        <span class="app-menu__label">طلبات العملاء</span></a></li>
                <li><a class="treeview-item" href="{{ route('exchanges.index') }}"><i
                            class="app-menu__icon fa fa-user"></i>
                        <span class="app-menu__label">طلبات الاسترجاع</span></a>
                </li>


            </ul>
        </li>




        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                    class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label"> الاعدادات
                    والسياسات</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">



                <li><a class="treeview-item" href="{{ route('settings.index') }}"><i
                            class="app-menu__icon fa fa-user"></i>
                        <span class="app-menu__label">الاعدادات</span></a></li>



                <li><a class="treeview-item" href="{{ route('terms.index') }}"><i
                            class="app-menu__icon fa fa-user"></i>
                        <span class="app-menu__label">الشروط والاحكام </span></a></li>


                <li><a class="treeview-item" href="{{ route('DeliveryPolicy.index') }}"><i
                            class="app-menu__icon fa fa-user"></i> <span class="app-menu__label">سياسة
                            الشحن</span></a></li>
            </ul>
        </li>




        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                    class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label"> التواصل</span><i
                    class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">


                <li><a class="treeview-item" href="{{ route('emailUs.index') }}"><i
                            class="app-menu__icon fa fa-user"></i>
                        <span class="app-menu__label">ايميلات العملاء</span></a></li>


                @can('contactus')
                    <li><a class="treeview-item" href="{{ route('ContactUs.index') }}"><i
                                class="app-menu__icon fa fa-user"></i>
                            <span class="app-menu__label">رسائل المستخدمين او الزوار</span></a></li>
                @endcan

            </ul>
        </li>




        <li><a class="app-menu__item" href="{{ route('brands.index') }}"><i class="app-menu__icon fa fa-user"></i>
                <span class="app-menu__label">الماركات</span></a></li>


















        <li><a class="app-menu__item" href="{{ route('vendors.index') }}"><i class="app-menu__icon fa fa-user"></i>
                <span class="app-menu__label">البائعين واسعار الشحن </span></a></li>






        <li><a class="app-menu__item" href="{{ route('ads.index') }}"><i class="app-menu__icon fa fa-user"></i>
                <span class="app-menu__label">الاعلانات</span></a></li>

        <li><a class="app-menu__item" href="{{ route('governorate.index') }}"><i
                    class="app-menu__icon fa fa-user"></i>
                <span class="app-menu__label">المحافظات</span></a></li>
        <li><a class="app-menu__item" href="{{ route('coupon.index') }}"><i class="app-menu__icon fa fa-user"></i>
                <span class="app-menu__label">كوبونات الخصم</span></a></li>
















    </ul>
</aside>
