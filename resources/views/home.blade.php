@extends('layouts.site.app')

@section('content')
<!-- Start Slider And Aside -->
<div class="slider-aside py-4">
    <div class="container">
        <div class="row">

            <div class="col-3 ">
                <div class="aside-header d-flex justify-content-between align-items-center py-3 px-2">
                    <h4>التصنيفات</h4>
                    <a href="#" class="text-white text-decoration-none">
                        إظهار الكل
                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                    </a>
                </div>

                <div class="bg-light py-3 px-2 text-right">
                    <ul class="list-unstyled">
                        <li class="my-2">
                            <a href="#" class="text-dark">
                                فئة
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                            </a>
                        </li>

                        <li class="my-3">
                            <a href="#" class="text-dark">
                                فئة
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                            </a>
                        </li>

                        <li class="my-3">
                            <a href="#" class="text-dark">
                                فئة
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                            </a>
                        </li>

                        <li class="my-3">
                            <a href="#" class="text-dark">
                                فئة
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                            </a>
                        </li>

                        <li class="my-3">
                            <a href="#" class="text-dark">
                                فئة
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                            </a>
                        </li>

                        <li class="my-3">
                            <a href="#" class="text-dark">
                                فئة
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                            </a>
                        </li>

                        <li class="my-3">
                            <a href="#" class="text-dark">
                                فئة
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                            </a>
                        </li>

                        <li class="my-3">
                            <a href="#" class="text-dark">
                                فئة
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                            </a>
                        </li>

                        <li class="my-3">
                            <a href="#" class="text-dark">
                                فئة
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                            </a>
                        </li>

                        <li class="my-3">
                            <a href="#" class="text-dark">
                                فئة
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                            </a>
                        </li>


                        <li class="my-3">
                            <a href="#" class="text-dark">
                                فئة
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                            </a>
                        </li>


                        <li class="my-3">
                            <a href="#" class="text-dark">
                                فئة
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                            </a>
                        </li>


                        <li class="my-3">
                            <a href="#" class="text-dark">
                                فئة
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-9">
                <div id="carouselExampleControls" style="height: auto !important" class="carousel slide">
                    <div class="carousel-inner h-100">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div id="owl-demo" class="owl-carousel owl-theme position-relative">

                    <div class="item">
                        <img src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" class="w-100 h-100" />
                        <h5 class="mt-2">ملابس</h5>
                    </div>
                    <div class="item">
                        <img src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" class="w-100 h-100" />
                        <h5 class="mt-2">ملابس</h5>
                    </div>
                    <div class="item">
                        <img src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" class="w-100 h-100" />
                        <h5 class="mt-2">ملابس</h5>
                    </div>
                    <div class="item">
                        <img src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" class="w-100 h-100" />
                        <h5 class="mt-2">ملابس</h5>
                    </div>
                    <div class="item">
                        <img src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" class="w-100 h-100" />
                        <h5 class="mt-2">ملابس</h5>
                    </div>
                    <div class="item">
                        <img src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" class="w-100 h-100" />
                        <h5 class="mt-2">ملابس</h5>
                    </div>
                    <div class="item">
                        <img src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" class="w-100 h-100" />
                        <h5 class="mt-2">ملابس</h5>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- End Slider And Aside -->

<!-- Start Ads -->
<div class="ads py-5">
    <div class="container">
        <div class="grid">
            <div>
                <img src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" class="w-100" />
                <img src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" class="w-100" />
            </div>

            <div>
                <img src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" class="w-100 h-100" />
            </div>

            <div>
                <img src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" class="w-100" />
                <img src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" class="w-100" />
            </div>
        </div>
    </div>
</div>
<!-- End Ads -->

<!-- Start Collections -->
<div class="collections py-5">
    <div class="container">
        <ul class="nav nav-tabs justify-content-center border-0" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active border-0" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">وصلنا حديثا</a>
            </li>
            <li class="nav-item">
                <a class="nav-link border-0" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">الأكثر مبيعا</a>
            </li>
            <li class="nav-item">
                <a class="nav-link border-0" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">التخفيضات</a>
            </li>
            <li class="nav-item">
                <a class="nav-link border-0" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">متميز</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">

                    <div class="col-12">
                        <div class="card-deck d-flex flex-wrap">

                            <div class="card mt-5 position-relative">
                                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                                    <ul class="list-unstyled">
                                        <li>
                                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                                        </li>
                                    </ul>

                                    <div class="w-100 align-self-end text-center">
                                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                    </div>
                                    <div class="badge badge-success px-3 py-2 rounded-0">
                                        جديد
                                    </div>


                                </div>
                                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                                <div class="card-body text-center">
                                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                                    <h5>70 جنيه</h5>

                                </div>
                            </div>

                            <div class="card mt-5 position-relative">
                                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                                    <ul class="list-unstyled">
                                        <li>
                                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                                        </li>
                                    </ul>

                                    <div class="w-100 align-self-end text-center">
                                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                    </div>

                                    <div class="badge badge-primary px-3 py-2 rounded-0">
                                        متميز
                                    </div>
                                </div>
                                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                                <div class="card-body text-center">
                                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                                    <h5>70 جنيه</h5>

                                </div>
                            </div>

                            <div class="card mt-5 position-relative">
                                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                                    <ul class="list-unstyled">
                                        <li>
                                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                                        </li>
                                    </ul>

                                    <div class="w-100 align-self-end text-center">
                                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                    </div>

                                    <div class="badge badge-success px-3 py-2 rounded-0">
                                        الأكثر
                                    </div>
                                </div>
                                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                                <div class="card-body text-center">
                                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                                    <h5>70 جنيه</h5>

                                </div>
                            </div>

                            <div class="card mt-5 position-relative">
                                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                                    <ul class="list-unstyled">
                                        <li>
                                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                                        </li>
                                    </ul>

                                    <div class="w-100 align-self-end text-center">
                                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                    </div>

                                    <div class="d-flex flex-column">
                                        <div class="badge badge-diff1 text-white px-3 py-2 rounded-0">
                                            30%
                                        </div>

                                        <div class="badge badge-diff2 text-white px-3 py-2 rounded-0 mt-3">
                                            <i class="fa fa-exchange" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                                <div class="card-body text-center">
                                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                                    <h5>70 جنيه</h5>

                                </div>
                            </div>

                            <div class="card mt-5 position-relative">
                                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                                    <ul class="list-unstyled">
                                        <li>
                                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                                        </li>
                                    </ul>

                                    <div class="w-100 align-self-end text-center">
                                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                    </div>

                                    <div class="badge badge-success px-3 py-2 rounded-0">
                                        جديد
                                    </div>
                                </div>
                                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                                <div class="card-body text-center">
                                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                                    <h5>70 جنيه</h5>

                                </div>
                            </div>

                            <div class="card mt-5 position-relative">
                                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                                    <ul class="list-unstyled">
                                        <li>
                                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                                        </li>
                                    </ul>

                                    <div class="w-100 align-self-end text-center">
                                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                    </div>

                                    <div class="badge badge-primary px-3 py-2 rounded-0">
                                        متميز
                                    </div>
                                </div>
                                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                                <div class="card-body text-center">
                                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                                    <h5>70 جنيه</h5>

                                </div>
                            </div>

                            <div class="card mt-5 position-relative">
                                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                                    <ul class="list-unstyled">
                                        <li>
                                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                                        </li>
                                    </ul>

                                    <div class="w-100 align-self-end text-center">
                                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                    </div>

                                    <div class="badge badge-success px-3 py-2 rounded-0">
                                        الأكثر
                                    </div>
                                </div>
                                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                                <div class="card-body text-center">
                                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                                    <h5>70 جنيه</h5>

                                </div>
                            </div>

                            <div class="card mt-5 position-relative">
                                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                                    <ul class="list-unstyled">
                                        <li>
                                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                                        </li>
                                    </ul>

                                    <div class="w-100 align-self-end text-center">
                                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                    </div>

                                    <div class="d-flex flex-column">
                                        <div class="badge badge-diff1 text-white px-3 py-2 rounded-0">
                                            30%
                                        </div>

                                        <div class="badge badge-diff2 text-white px-3 py-2 rounded-0 mt-3">
                                            <i class="fa fa-exchange" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                                <div class="card-body text-center">
                                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                                    <h5>70 جنيه</h5>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">

                    <div class="col-12">
                        <div class="card-deck d-flex flex-wrap">

                            <div class="card mt-5 position-relative">
                                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                                    <ul class="list-unstyled">
                                        <li>
                                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                                        </li>
                                    </ul>

                                    <div class="w-100 align-self-end text-center">
                                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                    </div>
                                    <div class="badge badge-success px-3 py-2 rounded-0">
                                        جديد
                                    </div>


                                </div>
                                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png' ) }}" alt="Card image cap">
                                <div class="card-body text-center">
                                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                                    <h5>70 جنيه</h5>

                                </div>
                            </div>

                            <div class="card mt-5 position-relative">
                                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                                    <ul class="list-unstyled">
                                        <li>
                                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                                        </li>
                                    </ul>

                                    <div class="w-100 align-self-end text-center">
                                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                    </div>

                                    <div class="badge badge-primary px-3 py-2 rounded-0">
                                        متميز
                                    </div>
                                </div>
                                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                                <div class="card-body text-center">
                                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                                    <h5>70 جنيه</h5>

                                </div>
                            </div>

                            <div class="card mt-5 position-relative">
                                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                                    <ul class="list-unstyled">
                                        <li>
                                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                                        </li>
                                    </ul>

                                    <div class="w-100 align-self-end text-center">
                                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                    </div>

                                    <div class="badge badge-success px-3 py-2 rounded-0">
                                        الأكثر
                                    </div>
                                </div>
                                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                                <div class="card-body text-center">
                                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                                    <h5>70 جنيه</h5>

                                </div>
                            </div>

                            <div class="card mt-5 position-relative">
                                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                                    <ul class="list-unstyled">
                                        <li>
                                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                                        </li>
                                    </ul>

                                    <div class="w-100 align-self-end text-center">
                                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                    </div>

                                    <div class="d-flex flex-column">
                                        <div class="badge badge-diff1 text-white px-3 py-2 rounded-0">
                                            30%
                                        </div>

                                        <div class="badge badge-diff2 text-white px-3 py-2 rounded-0 mt-3">
                                            <i class="fa fa-exchange" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png' ) }}" alt="Card image cap">
                                <div class="card-body text-center">
                                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                                    <h5>70 جنيه</h5>

                                </div>
                            </div>

                            <div class="card mt-5 position-relative">
                                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                                    <ul class="list-unstyled">
                                        <li>
                                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                                        </li>
                                    </ul>

                                    <div class="w-100 align-self-end text-center">
                                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                    </div>

                                    <div class="badge badge-success px-3 py-2 rounded-0">
                                        جديد
                                    </div>
                                </div>
                                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png')}}" alt="Card image cap">
                                <div class="card-body text-center">
                                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                                    <h5>70 جنيه</h5>

                                </div>
                            </div>

                            <div class="card mt-5 position-relative">
                                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                                    <ul class="list-unstyled">
                                        <li>
                                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                                        </li>
                                    </ul>

                                    <div class="w-100 align-self-end text-center">
                                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                    </div>

                                    <div class="badge badge-primary px-3 py-2 rounded-0">
                                        متميز
                                    </div>
                                </div>
                                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                                <div class="card-body text-center">
                                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                                    <h5>70 جنيه</h5>

                                </div>
                            </div>

                            <div class="card mt-5 position-relative">
                                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                                    <ul class="list-unstyled">
                                        <li>
                                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                                        </li>
                                    </ul>

                                    <div class="w-100 align-self-end text-center">
                                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                    </div>

                                    <div class="badge badge-success px-3 py-2 rounded-0">
                                        الأكثر
                                    </div>
                                </div>
                                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png ') }}" alt="Card image cap">
                                <div class="card-body text-center">
                                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                                    <h5>70 جنيه</h5>

                                </div>
                            </div>

                            <div class="card mt-5 position-relative">
                                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                                    <ul class="list-unstyled">
                                        <li>
                                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                                        </li>
                                    </ul>

                                    <div class="w-100 align-self-end text-center">
                                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                    </div>

                                    <div class="d-flex flex-column">
                                        <div class="badge badge-diff1 text-white px-3 py-2 rounded-0">
                                            30%
                                        </div>

                                        <div class="badge badge-diff2 text-white px-3 py-2 rounded-0 mt-3">
                                            <i class="fa fa-exchange" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <img class="card-img-top" src="{{ asset('website_assets./Design/Finished/404-ar.png' ) }}" alt="Card image cap">
                                <div class="card-body text-center">
                                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                                    <h5>70 جنيه</h5>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row">

                    <div class="col-12">
                        <div class="card-deck d-flex flex-wrap">

                            <div class="card mt-5 position-relative">
                                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                                    <ul class="list-unstyled">
                                        <li>
                                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                                        </li>
                                    </ul>

                                    <div class="w-100 align-self-end text-center">
                                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                    </div>
                                    <div class="badge badge-success px-3 py-2 rounded-0">
                                        جديد
                                    </div>


                                </div>
                                <img class="card-img-top" src="{{ asset('website_assetsv/Design/Finished/404-ar.png' ) }}" alt="Card image cap">
                                <div class="card-body text-center">
                                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                                    <h5>70 جنيه</h5>

                                </div>
                            </div>

                            <div class="card mt-5 position-relative">
                                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                                    <ul class="list-unstyled">
                                        <li>
                                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                                        </li>
                                    </ul>

                                    <div class="w-100 align-self-end text-center">
                                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                    </div>

                                    <div class="badge badge-primary px-3 py-2 rounded-0">
                                        متميز
                                    </div>
                                </div>
                                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                                <div class="card-body text-center">
                                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                                    <h5>70 جنيه</h5>

                                </div>
                            </div>

                            <div class="card mt-5 position-relative">
                                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                                    <ul class="list-unstyled">
                                        <li>
                                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                                        </li>
                                    </ul>

                                    <div class="w-100 align-self-end text-center">
                                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                    </div>

                                    <div class="badge badge-success px-3 py-2 rounded-0">
                                        الأكثر
                                    </div>
                                </div>
                                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png' ) }}" alt="Card image cap">
                                <div class="card-body text-center">
                                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                                    <h5>70 جنيه</h5>

                                </div>
                            </div>

                            <div class="card mt-5 position-relative">
                                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                                    <ul class="list-unstyled">
                                        <li>
                                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                                        </li>
                                    </ul>

                                    <div class="w-100 align-self-end text-center">
                                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                    </div>

                                    <div class="d-flex flex-column">
                                        <div class="badge badge-diff1 text-white px-3 py-2 rounded-0">
                                            30%
                                        </div>

                                        <div class="badge badge-diff2 text-white px-3 py-2 rounded-0 mt-3">
                                            <i class="fa fa-exchange" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}') }}" alt="Card image cap">
                                <div class="card-body text-center">
                                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                                    <h5>70 جنيه</h5>

                                </div>
                            </div>

                            <div class="card mt-5 position-relative">
                                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                                    <ul class="list-unstyled">
                                        <li>
                                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                                        </li>
                                    </ul>

                                    <div class="w-100 align-self-end text-center">
                                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                    </div>

                                    <div class="badge badge-success px-3 py-2 rounded-0">
                                        جديد
                                    </div>
                                </div>
                                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}') }}" alt="Card image cap">
                                <div class="card-body text-center">
                                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                                    <h5>70 جنيه</h5>

                                </div>
                            </div>

                            <div class="card mt-5 position-relative">
                                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                                    <ul class="list-unstyled">
                                        <li>
                                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                                        </li>
                                    </ul>

                                    <div class="w-100 align-self-end text-center">
                                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                    </div>

                                    <div class="badge badge-primary px-3 py-2 rounded-0">
                                        متميز
                                    </div>
                                </div>
                                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                                <div class="card-body text-center">
                                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                                    <h5>70 جنيه</h5>

                                </div>
                            </div>

                            <div class="card mt-5 position-relative">
                                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                                    <ul class="list-unstyled">
                                        <li>
                                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                                        </li>
                                    </ul>

                                    <div class="w-100 align-self-end text-center">
                                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                    </div>

                                    <div class="badge badge-success px-3 py-2 rounded-0">
                                        الأكثر
                                    </div>
                                </div>
                                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                                <div class="card-body text-center">
                                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                                    <h5>70 جنيه</h5>

                                </div>
                            </div>

                            <div class="card mt-5 position-relative">
                                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                                    <ul class="list-unstyled">
                                        <li>
                                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                                        </li>

                                        <li>
                                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                                        </li>
                                    </ul>

                                    <div class="w-100 align-self-end text-center">
                                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                                    </div>

                                    <div class="d-flex flex-column">
                                        <div class="badge badge-diff1 text-white px-3 py-2 rounded-0">
                                            30%
                                        </div>

                                        <div class="badge badge-diff2 text-white px-3 py-2 rounded-0 mt-3">
                                            <i class="fa fa-exchange" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                                <div class="card-body text-center">
                                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                                    <h5>70 جنيه</h5>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Collections -->


<!-- Today Deal -->
<div class="today-deal py-4 bg-light pb-5">
    <h2 class="text-center">صفقة اليوم</h2>
    <div class="container">
        <div class="owl-carousel owl-theme todayDeal mt-4">
            <div class="card mt-5 position-relative today-deal-item">
                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                    <ul class="list-unstyled">
                        <li>
                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                        </li>
                    </ul>

                    <div class="w-100 align-self-end text-center">
                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                    </div>
                    <div class="badge badge-success px-3 py-2 rounded-0">
                        جديد
                    </div>


                </div>
                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                <div class="card-body text-center">
                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>

                </div>
            </div>

            <div class="card mt-5 position-relative today-deal-item">
                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                    <ul class="list-unstyled">
                        <li>
                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                        </li>
                    </ul>

                    <div class="w-100 align-self-end text-center">
                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                    </div>
                    <div class="badge badge-success px-3 py-2 rounded-0">
                        جديد
                    </div>


                </div>
                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                <div class="card-body text-center">
                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>

                </div>
            </div>

            <div class="card mt-5 position-relative today-deal-item">
                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                    <ul class="list-unstyled">
                        <li>
                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                        </li>
                    </ul>

                    <div class="w-100 align-self-end text-center">
                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                    </div>
                    <div class="badge badge-success px-3 py-2 rounded-0">
                        جديد
                    </div>


                </div>
                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                <div class="card-body text-center">
                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>

                </div>
            </div>

            <div class="card mt-5 position-relative today-deal-item">
                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                    <ul class="list-unstyled">
                        <li>
                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                        </li>
                    </ul>

                    <div class="w-100 align-self-end text-center">
                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                    </div>
                    <div class="badge badge-success px-3 py-2 rounded-0">
                        جديد
                    </div>


                </div>
                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                <div class="card-body text-center">
                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Today Deal -->


<div class="men-more-sections p-5">

    <div class="p-2 px-3 main-back-color d-flex align-items-center justify-content-between">
        <div class=" card-deck-title">
            <p class=" text-white text-right px-3 py-2 h5 mb-0">
                أزياء الرجال
            </p>
        </div>

        <a href="#" class="secondary-color">
            عرض الكل
            <i class="fas fa-chevron-down"></i>
        </a>

    </div>

    <div class="px-3">

        <div class="card-deck d-flex flex-wrap bg-light px-3 py-4">

            <div class="card position-relative">
                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                    <ul class="list-unstyled">
                        <li>
                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                        </li>
                    </ul>

                    <div class="w-100 align-self-end text-center">
                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                    </div>

                    <div class="badge badge-primary px-3 py-2 rounded-0">
                        متميز
                    </div>
                </div>
                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                <div class="card-body text-center">
                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>

                </div>
            </div>

            <div class="card position-relative">
                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                    <ul class="list-unstyled">
                        <li>
                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                        </li>
                    </ul>

                    <div class="w-100 align-self-end text-center">
                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                    </div>

                    <div class="d-flex flex-column">
                        <div class="badge badge-diff1 text-white px-3 py-2 rounded-0">
                            30%
                        </div>

                        <div class="badge badge-diff2 text-white px-3 py-2 rounded-0 mt-3">
                            <i class="fa fa-exchange" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                <div class="card-body text-center">
                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>

                </div>
            </div>

            <div class="card position-relative">
                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                    <ul class="list-unstyled">
                        <li>
                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                        </li>
                    </ul>

                    <div class="w-100 align-self-end text-center">
                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                    </div>

                    <div class="badge badge-success px-3 py-2 rounded-0">
                        جديد
                    </div>
                </div>
                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                <div class="card-body text-center">
                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>

                </div>
            </div>

            <div class="card position-relative">
                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                    <ul class="list-unstyled">
                        <li>
                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                        </li>
                    </ul>

                    <div class="w-100 align-self-end text-center">
                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                    </div>

                    <div class="badge badge-primary px-3 py-2 rounded-0">
                        متميز
                    </div>
                </div>
                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                <div class="card-body text-center">
                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>

                </div>
            </div>

            <div class="card position-relative">
                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                    <ul class="list-unstyled">
                        <li>
                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                        </li>
                    </ul>

                    <div class="w-100 align-self-end text-center">
                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                    </div>

                    <div class="badge badge-primary px-3 py-2 rounded-0">
                        متميز
                    </div>
                </div>
                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                <div class="card-body text-center">
                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>

                </div>
            </div>

            <div class="card position-relative">
                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                    <ul class="list-unstyled">
                        <li>
                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                        </li>
                    </ul>

                    <div class="w-100 align-self-end text-center">
                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                    </div>

                    <div class="d-flex flex-column">
                        <div class="badge badge-diff1 text-white px-3 py-2 rounded-0">
                            30%
                        </div>

                        <div class="badge badge-diff2 text-white px-3 py-2 rounded-0 mt-3">
                            <i class="fa fa-exchange" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                <div class="card-body text-center">
                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>

                </div>
            </div>

        </div>
    </div>

</div>

<div class="women-more-sections p-5">

    <div class="p-2 px-3 main-back-color d-flex align-items-center justify-content-between">
        <div class=" card-deck-title">
            <p class=" text-white text-right px-3 py-2 h5 mb-0">
                أزياء النساء
            </p>
        </div>

        <a href="#" class="secondary-color">
            عرض الكل
            <i class="fas fa-chevron-down"></i>
        </a>

    </div>

    <div class="px-3">

        <div class="card-deck d-flex flex-wrap bg-light px-3 py-4">

            <div class="card position-relative">
                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                    <ul class="list-unstyled">
                        <li>
                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                        </li>
                    </ul>

                    <div class="w-100 align-self-end text-center">
                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                    </div>

                    <div class="badge badge-primary px-3 py-2 rounded-0">
                        متميز
                    </div>
                </div>
                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                <div class="card-body text-center">
                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>

                </div>
            </div>

            <div class="card position-relative">
                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                    <ul class="list-unstyled">
                        <li>
                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                        </li>
                    </ul>

                    <div class="w-100 align-self-end text-center">
                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                    </div>

                    <div class="d-flex flex-column">
                        <div class="badge badge-diff1 text-white px-3 py-2 rounded-0">
                            30%
                        </div>

                        <div class="badge badge-diff2 text-white px-3 py-2 rounded-0 mt-3">
                            <i class="fa fa-exchange" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                <div class="card-body text-center">
                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>

                </div>
            </div>

            <div class="card position-relative">
                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                    <ul class="list-unstyled">
                        <li>
                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                        </li>
                    </ul>

                    <div class="w-100 align-self-end text-center">
                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                    </div>

                    <div class="badge badge-success px-3 py-2 rounded-0">
                        جديد
                    </div>
                </div>
                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                <div class="card-body text-center">
                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>

                </div>
            </div>

            <div class="card position-relative">
                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                    <ul class="list-unstyled">
                        <li>
                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                        </li>
                    </ul>

                    <div class="w-100 align-self-end text-center">
                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                    </div>

                    <div class="badge badge-primary px-3 py-2 rounded-0">
                        متميز
                    </div>
                </div>
                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                <div class="card-body text-center">
                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>

                </div>
            </div>

            <div class="card position-relative">
                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                    <ul class="list-unstyled">
                        <li>
                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                        </li>
                    </ul>

                    <div class="w-100 align-self-end text-center">
                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                    </div>

                    <div class="badge badge-primary px-3 py-2 rounded-0">
                        متميز
                    </div>
                </div>
                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                <div class="card-body text-center">
                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>

                </div>
            </div>

            <div class="card position-relative">
                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                    <ul class="list-unstyled">
                        <li>
                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                        </li>
                    </ul>

                    <div class="w-100 align-self-end text-center">
                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                    </div>

                    <div class="d-flex flex-column">
                        <div class="badge badge-diff1 text-white px-3 py-2 rounded-0">
                            30%
                        </div>

                        <div class="badge badge-diff2 text-white px-3 py-2 rounded-0 mt-3">
                            <i class="fa fa-exchange" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                <div class="card-body text-center">
                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>

                </div>
            </div>

        </div>
    </div>

</div>

<div class="women-more-sections p-5">

    <div class="p-2 px-3 main-back-color">
        <div class=" card-deck-title">
            <p class="text-center text-white text-right px-3 py-2 h3 mb-0">
                عروض على كل حاجة
            </p>
        </div>
    </div>

    <div class="bg-light py-4 px-4">

        <div class="card-deck d-flex flex-wrap">

            <div class="card position-relative my-2">
                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                    <ul class="list-unstyled">
                        <li>
                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                        </li>
                    </ul>

                    <div class="w-100 align-self-end text-center">
                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                    </div>

                    <div class="badge badge-primary px-3 py-2 rounded-0">
                        متميز
                    </div>
                </div>
                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                <div class="card-body text-center">
                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>

                </div>
            </div>

            <div class="card position-relative my-2">
                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                    <ul class="list-unstyled">
                        <li>
                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                        </li>
                    </ul>

                    <div class="w-100 align-self-end text-center">
                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                    </div>

                    <div class="d-flex flex-column">
                        <div class="badge badge-diff1 text-white px-3 py-2 rounded-0">
                            30%
                        </div>

                        <div class="badge badge-diff2 text-white px-3 py-2 rounded-0 mt-3">
                            <i class="fa fa-exchange" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                <div class="card-body text-center">
                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>

                </div>
            </div>

            <div class="card position-relative my-2">
                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                    <ul class="list-unstyled">
                        <li>
                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                        </li>
                    </ul>

                    <div class="w-100 align-self-end text-center">
                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                    </div>

                    <div class="badge badge-success px-3 py-2 rounded-0">
                        جديد
                    </div>
                </div>
                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                <div class="card-body text-center">
                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>

                </div>
            </div>

            <div class="card position-relative my-2">
                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                    <ul class="list-unstyled">
                        <li>
                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                        </li>
                    </ul>

                    <div class="w-100 align-self-end text-center">
                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                    </div>

                    <div class="badge badge-primary px-3 py-2 rounded-0">
                        متميز
                    </div>
                </div>
                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                <div class="card-body text-center">
                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>

                </div>
            </div>

            <div class="card position-relative my-2">
                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                    <ul class="list-unstyled">
                        <li>
                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                        </li>
                    </ul>

                    <div class="w-100 align-self-end text-center">
                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                    </div>

                    <div class="badge badge-primary px-3 py-2 rounded-0">
                        متميز
                    </div>
                </div>
                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                <div class="card-body text-center">
                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>

                </div>
            </div>

            <div class="card position-relative my-2">
                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                    <ul class="list-unstyled">
                        <li>
                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                        </li>
                    </ul>

                    <div class="w-100 align-self-end text-center">
                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                    </div>

                    <div class="d-flex flex-column">
                        <div class="badge badge-diff1 text-white px-3 py-2 rounded-0">
                            30%
                        </div>

                        <div class="badge badge-diff2 text-white px-3 py-2 rounded-0 mt-3">
                            <i class="fa fa-exchange" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                <div class="card-body text-center">
                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>

                </div>
            </div>

            <div class="card position-relative my-2">
                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                    <ul class="list-unstyled">
                        <li>
                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                        </li>
                    </ul>

                    <div class="w-100 align-self-end text-center">
                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                    </div>

                    <div class="badge badge-primary px-3 py-2 rounded-0">
                        متميز
                    </div>
                </div>
                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                <div class="card-body text-center">
                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>

                </div>
            </div>

            <div class="card position-relative my-2">
                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                    <ul class="list-unstyled">
                        <li>
                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                        </li>
                    </ul>

                    <div class="w-100 align-self-end text-center">
                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                    </div>

                    <div class="d-flex flex-column">
                        <div class="badge badge-diff1 text-white px-3 py-2 rounded-0">
                            30%
                        </div>

                        <div class="badge badge-diff2 text-white px-3 py-2 rounded-0 mt-3">
                            <i class="fa fa-exchange" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                <div class="card-body text-center">
                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>

                </div>
            </div>

            <div class="card position-relative my-2">
                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                    <ul class="list-unstyled">
                        <li>
                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                        </li>
                    </ul>

                    <div class="w-100 align-self-end text-center">
                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                    </div>

                    <div class="badge badge-success px-3 py-2 rounded-0">
                        جديد
                    </div>
                </div>
                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                <div class="card-body text-center">
                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>

                </div>
            </div>

            <div class="card position-relative my-2">
                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                    <ul class="list-unstyled">
                        <li>
                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                        </li>
                    </ul>

                    <div class="w-100 align-self-end text-center">
                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                    </div>

                    <div class="badge badge-primary px-3 py-2 rounded-0">
                        متميز
                    </div>
                </div>
                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                <div class="card-body text-center">
                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>

                </div>
            </div>

            <div class="card position-relative my-2">
                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                    <ul class="list-unstyled">
                        <li>
                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                        </li>
                    </ul>

                    <div class="w-100 align-self-end text-center">
                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                    </div>

                    <div class="badge badge-primary px-3 py-2 rounded-0">
                        متميز
                    </div>
                </div>
                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                <div class="card-body text-center">
                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>

                </div>
            </div>

            <div class="card position-relative my-2">
                <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                    <ul class="list-unstyled">
                        <li>
                            <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                        </li>

                        <li>
                            <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                        </li>
                    </ul>

                    <div class="w-100 align-self-end text-center">
                        <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                    </div>

                    <div class="d-flex flex-column">
                        <div class="badge badge-diff1 text-white px-3 py-2 rounded-0">
                            30%
                        </div>

                        <div class="badge badge-diff2 text-white px-3 py-2 rounded-0 mt-3">
                            <i class="fa fa-exchange" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                <div class="card-body text-center">
                    <h5 class="card-title"> هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>

                </div>
            </div>

        </div>
    </div>

</div>

<div class="wafr-more-sections p-5">

    <div class="p-2 px-3 main-back-color d-flex align-items-center justify-content-between">
        <div class=" card-deck-title">
            <p class=" text-white text-right px-3 py-2 h5 mb-0">
                وفر أكثر مع كيان
            </p>
        </div>

        <a href="#" class="secondary-color">
            عرض الكل
            <i class="fas fa-chevron-down"></i>
        </a>

    </div>

    <div class="bg-light">
        <div class="owl-carousel owl-theme todayDeal p-3">
            <div class="card mt-2 position-relative today-deal-item border-0">

                <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                <div class="card-body text-center">
                    <h5 class="card-title"> ملابس</h5>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="child-more-sections p-5">

    <div class="p-2 px-3 main-back-color d-flex align-items-center justify-content-between">
        <div class=" card-deck-title">
            <p class=" text-white text-right px-3 py-2 h5 mb-0">
                الأطفال
            </p>
        </div>

        <a href="#" class="secondary-color">
            عرض الكل
            <i class="fas fa-chevron-down"></i>
        </a>

    </div>

    <div class="py-4 px-4 bg-light">

        <div class="card-deck d-flex flex-wrap">
            <div class="card">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets">
                        <div class="badge product-label badge-success px-3 py-2 rounded-0">
                            الأكثر
                        </div>
                        <ul class="list-unstyled position-absolute">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                        <button class="add-to-cart btn py-1 px-2">
                            أضف إلى العربة
                        </button>
                    </div>
                    <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap" />
                </div>

                <div class="card-body text-center">
                    <h5 class="card-title">هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>
                </div>
            </div>

            <div class="card">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets">
                        <div class="badge product-label badge-success px-3 py-2 rounded-0">
                            الأكثر
                        </div>
                        <ul class="list-unstyled position-absolute">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                        <button class="add-to-cart btn py-1 px-2">
                            أضف إلى العربة
                        </button>
                    </div>
                    <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap" />
                </div>

                <div class="card-body text-center">
                    <h5 class="card-title">هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>
                </div>
            </div>

            <div class="card">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets">
                        <div class="badge product-label badge-success px-3 py-2 rounded-0">
                            الأكثر
                        </div>
                        <ul class="list-unstyled position-absolute">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                        <button class="add-to-cart btn py-1 px-2">
                            أضف إلى العربة
                        </button>
                    </div>
                    <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap" />
                </div>

                <div class="card-body text-center">
                    <h5 class="card-title">هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>
                </div>
            </div>

            <div class="card">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets">
                        <div class="badge product-label badge-primary px-3 py-2 rounded-0">
                            متميز
                        </div>
                        <ul class="list-unstyled position-absolute">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                        <button class="add-to-cart btn py-1 px-2">
                            أضف إلى العربة
                        </button>
                    </div>
                    <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap" />
                </div>

                <div class="card-body text-center">
                    <h5 class="card-title">هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>
                </div>
            </div>

            <div class="card">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets">
                        <div class="badge product-label badge-success px-3 py-2 rounded-0">
                            الأكثر
                        </div>
                        <ul class="list-unstyled position-absolute">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                        <button class="add-to-cart btn py-1 px-2">
                            أضف إلى العربة
                        </button>
                    </div>
                    <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap" />
                </div>

                <div class="card-body text-center">
                    <h5 class="card-title">هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>
                </div>
            </div>

            <div class="card">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets">
                        <div class="badge product-label badge-diff1 px-3 py-2 rounded-0">
                            30%
                        </div>
                        <ul class="list-unstyled position-absolute">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                        <button class="add-to-cart btn py-1 px-2">
                            أضف إلى العربة
                        </button>
                    </div>
                    <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap" />
                </div>

                <div class="card-body text-center">
                    <h5 class="card-title">هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="flash-more-sections p-3">

    <div class="main-back-color pt-2 pb-5">
        <div class="p-2 px-3 d-flex align-items-center justify-content-between">
            <div class="card-deck-title d-flex">
                <p class="text-white text-right px-3 py-2 h5 mb-0">
                    عروض فلاش
                </p>
                <p>
                <div id="countdown" class="d-flex flex-row-reverse">
                    <div id="days" class="timer mx-1 px-3 py-2 text-white rounded font-weight-bold"> </div>
                    <div id="hours" class="timer mx-1 px-3 py-2 text-white rounded font-weight-bold"> </div>
                    <div id="minutes" class="timer mx-1 px-3 py-2 text-white rounded font-weight-bold"> </div>
                    <div id="seconds" class="timer mx-1 px-3 py-2 text-white rounded font-weight-bold"> </div>
                </div>
                </p>
            </div>
        </div>

        <div class="row  px-5">
            <div class="owl-carousel owl-theme todayDeal mt-4">
                <div class="card position-relative today-deal-item border-0">
                    <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                            </li>

                            <li>
                                <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                            </li>

                            <li>
                                <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                            </li>
                        </ul>

                        <div class="w-100 align-self-end text-center">
                            <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                        </div>
                        <div class="badge badge-success px-3 py-2 rounded-0">
                            جديد
                        </div>


                    </div>
                    <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                    <div class="card-body text-center">
                        <h5 class="card-title"> هذا النص هو مثال ....</h5>
                        <h5>70 جنيه</h5>

                    </div>
                </div>

                <div class="card position-relative today-deal-item border-0">
                    <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                            </li>

                            <li>
                                <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                            </li>

                            <li>
                                <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                            </li>
                        </ul>

                        <div class="w-100 align-self-end text-center">
                            <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                        </div>
                        <div class="badge badge-success px-3 py-2 rounded-0">
                            جديد
                        </div>


                    </div>
                    <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                    <div class="card-body text-center">
                        <h5 class="card-title"> هذا النص هو مثال ....</h5>
                        <h5>70 جنيه</h5>

                    </div>
                </div>

                <div class="card position-relative today-deal-item border-0">
                    <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                            </li>

                            <li>
                                <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                            </li>

                            <li>
                                <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                            </li>
                        </ul>

                        <div class="w-100 align-self-end text-center">
                            <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                        </div>
                        <div class="badge badge-success px-3 py-2 rounded-0">
                            جديد
                        </div>


                    </div>
                    <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                    <div class="card-body text-center">
                        <h5 class="card-title"> هذا النص هو مثال ....</h5>
                        <h5>70 جنيه</h5>

                    </div>
                </div>

                <div class="card position-relative today-deal-item border-0">
                    <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                        <ul class="list-unstyled">
                            <li>
                                <button class="add-to-fav"><i class="fa fa-heart" aria-hidden="true"></i></button>
                            </li>

                            <li>
                                <button><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                            </li>

                            <li>
                                <button><i class="fa fa-exchange" aria-hidden="true"></i></button>
                            </li>
                        </ul>

                        <div class="w-100 align-self-end text-center">
                            <button class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                        </div>
                        <div class="badge badge-success px-3 py-2 rounded-0">
                            جديد
                        </div>


                    </div>
                    <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap">
                    <div class="card-body text-center">
                        <h5 class="card-title"> هذا النص هو مثال ....</h5>
                        <h5>70 جنيه</h5>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<div class="banners py-5">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100 h-100" />
            </div>
            <div class="col-4">
                <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100 h-100" />
            </div>
            <div class="col-4">
                <img src="{{ asset('website_assets/imgs/fav/fav-card-img.jpg') }}" class="w-100 h-100" />
            </div>
        </div>
    </div>
</div>

<div class="electronics-more-sections p-5">

    <div class="p-2 px-3 main-back-color d-flex align-items-center justify-content-between">
        <div class=" card-deck-title">
            <p class=" text-white text-right px-3 py-2 h5 mb-0">
                إلكترونيات
            </p>
        </div>

        <a href="#" class="secondary-color">
            عرض الكل
            <i class="fas fa-chevron-down"></i>
        </a>

    </div>

    <div class="py-4 px-4 bg-light">

        <div class="card-deck d-flex flex-wrap">
            <div class="card">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets">
                        <div class="badge product-label badge-success px-3 py-2 rounded-0">
                            الأكثر
                        </div>
                        <ul class="list-unstyled position-absolute">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                        <button class="add-to-cart btn py-1 px-2">
                            أضف إلى العربة
                        </button>
                    </div>
                    <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap" />
                </div>

                <div class="card-body text-center">
                    <h5 class="card-title">هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>
                </div>
            </div>

            <div class="card">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets">
                        <div class="badge product-label badge-success px-3 py-2 rounded-0">
                            الأكثر
                        </div>
                        <ul class="list-unstyled position-absolute">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                        <button class="add-to-cart btn py-1 px-2">
                            أضف إلى العربة
                        </button>
                    </div>
                    <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap" />
                </div>

                <div class="card-body text-center">
                    <h5 class="card-title">هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>
                </div>
            </div>

            <div class="card">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets">
                        <div class="badge product-label badge-success px-3 py-2 rounded-0">
                            الأكثر
                        </div>
                        <ul class="list-unstyled position-absolute">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                        <button class="add-to-cart btn py-1 px-2">
                            أضف إلى العربة
                        </button>
                    </div>
                    <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap" />
                </div>

                <div class="card-body text-center">
                    <h5 class="card-title">هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>
                </div>
            </div>

            <div class="card">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets">
                        <div class="badge product-label badge-primary px-3 py-2 rounded-0">
                            متميز
                        </div>
                        <ul class="list-unstyled position-absolute">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                        <button class="add-to-cart btn py-1 px-2">
                            أضف إلى العربة
                        </button>
                    </div>
                    <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap" />
                </div>

                <div class="card-body text-center">
                    <h5 class="card-title">هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>
                </div>
            </div>

            <div class="card">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets">
                        <div class="badge product-label badge-success px-3 py-2 rounded-0">
                            الأكثر
                        </div>
                        <ul class="list-unstyled position-absolute">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                        <button class="add-to-cart btn py-1 px-2">
                            أضف إلى العربة
                        </button>
                    </div>
                    <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap" />
                </div>

                <div class="card-body text-center">
                    <h5 class="card-title">هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>
                </div>
            </div>

            <div class="card">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets">
                        <div class="badge product-label badge-diff1 px-3 py-2 rounded-0">
                            30%
                        </div>
                        <ul class="list-unstyled position-absolute">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                        <button class="add-to-cart btn py-1 px-2">
                            أضف إلى العربة
                        </button>
                    </div>
                    <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap" />
                </div>

                <div class="card-body text-center">
                    <h5 class="card-title">هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="electronics-more-sections p-5">

    <div class="p-2 px-3 main-back-color d-flex align-items-center justify-content-between">
        <div class=" card-deck-title">
            <p class=" text-white text-right px-3 py-2 h5 mb-0">
                الجمال
            </p>
        </div>

        <a href="#" class="secondary-color">
            عرض الكل
            <i class="fas fa-chevron-down"></i>
        </a>

    </div>

    <div class="py-4 px-4 bg-light">

        <div class="card-deck d-flex flex-wrap">
            <div class="card">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets">
                        <div class="badge product-label badge-success px-3 py-2 rounded-0">
                            الأكثر
                        </div>
                        <ul class="list-unstyled position-absolute">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                        <button class="add-to-cart btn py-1 px-2">
                            أضف إلى العربة
                        </button>
                    </div>
                    <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap" />
                </div>

                <div class="card-body text-center">
                    <h5 class="card-title">هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>
                </div>
            </div>

            <div class="card">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets">
                        <div class="badge product-label badge-success px-3 py-2 rounded-0">
                            الأكثر
                        </div>
                        <ul class="list-unstyled position-absolute">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                        <button class="add-to-cart btn py-1 px-2">
                            أضف إلى العربة
                        </button>
                    </div>
                    <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap" />
                </div>

                <div class="card-body text-center">
                    <h5 class="card-title">هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>
                </div>
            </div>

            <div class="card">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets">
                        <div class="badge product-label badge-success px-3 py-2 rounded-0">
                            الأكثر
                        </div>
                        <ul class="list-unstyled position-absolute">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                        <button class="add-to-cart btn py-1 px-2">
                            أضف إلى العربة
                        </button>
                    </div>
                    <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap" />
                </div>

                <div class="card-body text-center">
                    <h5 class="card-title">هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>
                </div>
            </div>

            <div class="card">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets">
                        <div class="badge product-label badge-primary px-3 py-2 rounded-0">
                            متميز
                        </div>
                        <ul class="list-unstyled position-absolute">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                        <button class="add-to-cart btn py-1 px-2">
                            أضف إلى العربة
                        </button>
                    </div>
                    <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap" />
                </div>

                <div class="card-body text-center">
                    <h5 class="card-title">هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>
                </div>
            </div>

            <div class="card">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets">
                        <div class="badge product-label badge-success px-3 py-2 rounded-0">
                            الأكثر
                        </div>
                        <ul class="list-unstyled position-absolute">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                        <button class="add-to-cart btn py-1 px-2">
                            أضف إلى العربة
                        </button>
                    </div>
                    <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap" />
                </div>

                <div class="card-body text-center">
                    <h5 class="card-title">هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>
                </div>
            </div>

            <div class="card">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets">
                        <div class="badge product-label badge-diff1 px-3 py-2 rounded-0">
                            30%
                        </div>
                        <ul class="list-unstyled position-absolute">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                        <button class="add-to-cart btn py-1 px-2">
                            أضف إلى العربة
                        </button>
                    </div>
                    <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap" />
                </div>

                <div class="card-body text-center">
                    <h5 class="card-title">هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="electronics-more-sections p-5">

    <div class="p-2 px-3 main-back-color d-flex align-items-center justify-content-between">
        <div class=" card-deck-title">
            <p class=" text-white text-right px-3 py-2 h5 mb-0">
                البيت والمطبخ
            </p>
        </div>

        <a href="#" class="secondary-color">
            عرض الكل
            <i class="fas fa-chevron-down"></i>
        </a>

    </div>

    <div class="py-4 px-4 bg-light">

        <div class="card-deck d-flex flex-wrap">
            <div class="card">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets">
                        <div class="badge product-label badge-success px-3 py-2 rounded-0">
                            الأكثر
                        </div>
                        <ul class="list-unstyled position-absolute">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                        <button class="add-to-cart btn py-1 px-2">
                            أضف إلى العربة
                        </button>
                    </div>
                    <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap" />
                </div>

                <div class="card-body text-center">
                    <h5 class="card-title">هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>
                </div>
            </div>

            <div class="card">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets">
                        <div class="badge product-label badge-success px-3 py-2 rounded-0">
                            الأكثر
                        </div>
                        <ul class="list-unstyled position-absolute">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                        <button class="add-to-cart btn py-1 px-2">
                            أضف إلى العربة
                        </button>
                    </div>
                    <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap" />
                </div>

                <div class="card-body text-center">
                    <h5 class="card-title">هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>
                </div>
            </div>

            <div class="card">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets">
                        <div class="badge product-label badge-success px-3 py-2 rounded-0">
                            الأكثر
                        </div>
                        <ul class="list-unstyled position-absolute">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                        <button class="add-to-cart btn py-1 px-2">
                            أضف إلى العربة
                        </button>
                    </div>
                    <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap" />
                </div>

                <div class="card-body text-center">
                    <h5 class="card-title">هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>
                </div>
            </div>

            <div class="card">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets">
                        <div class="badge product-label badge-primary px-3 py-2 rounded-0">
                            متميز
                        </div>
                        <ul class="list-unstyled position-absolute">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                        <button class="add-to-cart btn py-1 px-2">
                            أضف إلى العربة
                        </button>
                    </div>
                    <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap" />
                </div>

                <div class="card-body text-center">
                    <h5 class="card-title">هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>
                </div>
            </div>

            <div class="card">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets">
                        <div class="badge product-label badge-success px-3 py-2 rounded-0">
                            الأكثر
                        </div>
                        <ul class="list-unstyled position-absolute">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                        <button class="add-to-cart btn py-1 px-2">
                            أضف إلى العربة
                        </button>
                    </div>
                    <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap" />
                </div>

                <div class="card-body text-center">
                    <h5 class="card-title">هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>
                </div>
            </div>

            <div class="card">
                <div class="position-relative">
                    <div class="position-absolute w-100 p-3 item-assets">
                        <div class="badge product-label badge-diff1 px-3 py-2 rounded-0">
                            30%
                        </div>
                        <ul class="list-unstyled position-absolute">
                            <li>
                                <button class="add-to-fav">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                </button>
                            </li>

                            <li>
                                <button>
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>

                        <button class="add-to-cart btn py-1 px-2">
                            أضف إلى العربة
                        </button>
                    </div>
                    <img class="card-img-top" src="{{ asset('website_assets/Design/Finished/404-ar.png') }}" alt="Card image cap" />
                </div>

                <div class="card-body text-center">
                    <h5 class="card-title">هذا النص هو مثال ....</h5>
                    <h5>70 جنيه</h5>
                </div>
            </div>
        </div>
    </div>



    <a href="./chat/chat.html" class="position-fixed chat rounded-circle d-flex justify-content-center align-items-center">
        <i class="fas fa-comments fa-lg"></i>
    </a>
</div>

@endsection