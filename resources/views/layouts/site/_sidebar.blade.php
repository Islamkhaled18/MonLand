<!-- start sidebar -->
<div class="sidebar position-fixed bg-white px-5 py-2 text-right">
    <button class="close-sidebar-btn"><i class="fa-solid fa-xmark fa-lg"></i></button>
    @guest
    <a class=" btn bg-main text-white text-bold mx-2 my-3 py-2 px-4" href="{{route('login')}}">
        تسجيل الدخول
    </a>
    @endguest

    <ul class="list-unstyled mobile-list">

        <li class="font-weight-bold">
            <i class="fa fa-user ml-2"></i>
            @guest
            <a href="{{route('login')}}"> الملف الشخصى</a>
            @else
            <a href="{{ route('site.profile', auth()->user()->id) }}"> الملف الشخصى</a>
            @endguest
        </li>


        <li class="font-weight-bold">
            <i class="fa-solid fa-paper-plane ml-2"></i>
            @guest
            <a href="{{route('login')}}"> الطلبات </a>
            @else
            <a href="{{ route('site.profile', auth()->user()->id) }}"> الطلبات </a>
            @endguest
        </li>
        <li class="font-weight-bold">
            <i class="fa-solid fa-location-dot ml-2"></i>
            @guest
            <a href="{{route('login')}}"> سجل العناوين</a>
            @else
            <a href="{{ route('site.profile', auth()->user()->id) }}"> سجل العناوين</a>
            @endguest
        </li>

    </ul>

    <h5>عامة</h5>
    <ul class="list-unstyled">
        <li>
            <a href="{{route('site.terms.index')}}" class="py-2 " style="font-weight: 400"> الشروط والاحكام</a>
        </li>
        <li>
            <a href="{{route('site.DeliveryPolicy.index')}}" class="py-2 " style="font-weight: 400">سياسة الشحن </a>
        </li>
        <li>
            <a href="{{route('Site.contactUs')}}" class="py-2 " style="font-weight: 400">تواصل معنا </a>
        </li>
        <li>
            <a href="{{route('sizeTable')}}" class="py-2 " style="font-weight: 400">جدول المقاسات</a>
        </li>
    </ul>

    {{-- <h5>الأكثر شيوعا</h5>
    <ul class="list-unstyled">
        <li>
            <a href="#" class="py-2 " style="font-weight: 400">الأكثر مبيعا</a>
        </li>
        <li>
            <a href="#" class="py-2 " style="font-weight: 400">جديدنا </a>
        </li>
        <li>
            <a href="#" class="py-2 " style="font-weight: 400">عروضنا </a>
        </li>
    </ul> --}}

    <h5> الأقسام</h5>
    <ul id="mainCategoriesList" class="list-unstyled">
        @foreach ($mainCategoriesSideBar as $mainCategory)
        <li>
            <a href="{{ route('mainCategory.products', $mainCategory->name) }}" class="py-2" style="font-weight: 400">
                {{ $mainCategory->name }}</a>
        </li>
        @endforeach
    </ul>

    <a id="loadMoreCategories" class="main-color h6" href="{{ route('Site.allCategory') }}">
        المزيد من الأقسام
        <i class="fa-solid fa-caret-down"></i>
    </a>



</div>
<!-- end sidebar -->
