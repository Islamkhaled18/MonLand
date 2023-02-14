@extends('layouts.site.app')

@section('title')
    - منتجات البائع
@endsection

@section('content')
    <section class="container">
        <div class="row my-5 pt-5">
            <div class="col-12">
                <div class="p-2 text-white card-deck-title text-right d-flex justify-content-between">
                    <div>
                        <p>
                            {{ $vendor->vendor_name }}
                        </p>
                        <p class="mt-2">
                            {{ $average }} هو متوسط تقييم البائع
                        </p>
                    </div>
                    {{-- <div class="d-flex align-items-end">
                        <p>
                            3556 المتابعين
                        </p>
                        <button class="mt-2 mx-3 text-danger px-3 special-btn-style rounded">
                            تابع
                        </button>
                    </div> --}}
                </div>


                <div class="bg-light pt-4">
                    <div class="info-section border border-secondary border-top-0 d-flex flex-row  flex-wrap ">

                        <div class="col-6 col-md-4 no-gutters border-secondary border-top py-1">
                            <div class="table-header text-larger text-center py-1">
                                <i class="fa-solid fa-rotate-left main-color"></i>
                            </div>
                            <div class="border-top border-secondary d-block text-start px-2">
                                <p>لا يمكن استبدال او ارجاع هذا المنتج</p>
                                <p></p>
                            </div>
                        </div>

                        <div class="col-6 col-md-4 no-gutters border-secondary border-top py-1">
                            <div class="table-header text-larger text-center py-1">
                                <i class="fa-solid fa-truck-fast main-color"></i>
                            </div>
                            <div class="border-top border-secondary d-block text-start px-2">
                                <p class="text-large">شحن موثوق به</p>
                                <p>كل شحنه لها مصاريف شحن خاصة بها علي حسب عروض البائع</p>
                                <a href="#" class="main-color font-weight-bold">معرفه المزيد</a>
                            </div>
                        </div>

                        <div class="col-6 col-md-4 no-gutters border-secondary border-top border-left-0 py-1">
                            <div class="table-header text-larger text-center py-1">
                                <i class="fa-solid fa-shield main-color"></i>
                            </div>
                            <div class="border-top border-secondary d-block text-start px-2">
                                <p class="text-large">تسوق امن</p>
                                <p class="">بياناتك محمية دائما</p>
                            </div>
                        </div>
                    </div>

                </div>



                <div class="row my-4 text-right">
                    <!--

                    <div class="card col-12 mt-3 col-md-6 border-0">
                    <div class="bg-light">
                    <h5 class="border-bottom p-4">
                        تقييم عام
                    </h5>

                    <ul class="list-unstyled px-3 py-2">
                        <li>
                        <i class="fa-solid fa-star star-rating"></i>
                        <span class="mr-1">
                            معدل سرعة توصيل الطلب :
                            <span class="font-weight-bold">ممتاز</span>
                        </span>
                        </li>
                        <li class="my-3">
                        <i class="fa-solid fa-star star-rating"></i>
                        <span class="mr-1">
                            تقييم الجودة :
                            <span class="font-weight-bold">ممتاز</span>
                        </span>
                        </li>
                        <li>
                        <i class="fa-solid fa-star star-rating"></i>
                        <span class="mr-1">
                            تقييم العملاء :
                            <span class="font-weight-bold">متوسط</span>
                        </span>
                        </li>
                    </ul>
                    </div>
                </div>
                -->

                    <div class="card col-12 mt-3 border-0">
                        <div class="bg-light">
                            <h5 class="border-bottom p-4">
                                معلومات البائع
                            </h5>

                            <ul class="list-unstyled px-3 py-2">
                                <li>
                                    <i class="fa-solid fa-star star-rating"></i>
                                    <span class="mr-1">
                                        البيع على كيان:

                                      
                                        <span>{{ \Carbon\Carbon::parse($vendor->created_at)->format('Y') }}</span>
                                    </span>
                                </li>
                                {{-- <li class="my-3">
                                    <i class="fa-solid fa-star star-rating"></i>
                                    <span class="mr-1">
                                        عدد المبيعات الناجحة:
                                        <span>+10000</span>
                                    </span>
                                </li> --}}
                                <li>
                                    <i class="fa-solid fa-star star-rating"></i>
                                    <span class="mr-1">
                                        بلد المنشأ:
                                        <span class="font-weight-bold">egypt</span>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="container">
            <div class="row">

                <div class="col-12">
                    <div class="row p-2 text-white card-deck-title">
                        <p>
                            تقييم العملاء
                            ({{$reviewsCount}})
                        </p>
                    </div>




                    <div class="row">
                        <div class="col-12 text-right">

                            <div class="card d-flex flex-row special-card border-0 my-3">
                                <img class="card-img-top" src="../imgs/fav/fav-card-img.jpg" alt="Card image cap" />
                                @foreach ( $productsWithReviews as $productsWithReview )
                                    
                                
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div>
                                        <h5>{{$productsWithReview->name}}</h5>
                                        <div class="star-rating my-3">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star text-light2"></i>
                                        </div>

                                        
                                            <p>{{$productsWithReview->description}}</p>
                                        
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <p class="date">
                                            12-5-2022 سارة
                                        </p>

                                        <p class="text-success">
                                            <i class="far fa-check-circle"></i>
                                            طلبية مؤكدة
                                        </p>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                       

                        </div>
                    </div>
                </div>

            </div>

            

        </div>

    </section>
@endsection
