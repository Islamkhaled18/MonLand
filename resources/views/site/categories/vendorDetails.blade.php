@extends('layouts.site.app')

@section('title')
- البائع
@endsection

@section('content')
<section class="container">
    <div class="row my-5 pt-5">
        <div class="col-12">
            <div class="p-2 text-white card-deck-title text-right d-flex justify-content-between">
                <div>
                    <p>
                        إسم البائع : {{ $vendor->vendor_name }}
                    </p>
                    <p class="mt-2">
                        {{ $average }}% تقييم البائع
                    </p>
                </div>
                <div class="d-flex align-items-end flex-column">

                    <div class="d-flex align-items-center">
                        <p>
                            3556 المتابعين
                        </p>
                        <button class="mt-2 mx-3 text-white px-3 special-btn-style  rounded">
                            تابع
                        </button>
                    </div>
                </div>
            </div>

            <div class="bg-light pt-4">
                <div class="info-section border-secondary border-top-0 d-flex flex-row  flex-wrap ">

                    <div class="col-12 col-md-4 no-gutters border-secondary border-left py-1">
                        <div class="table-header text-larger text-center py-1">
                            <img src="{{ asset('website_assets/imgs/icons/product-return.png')}}" />
                        </div>
                        <div class="border-top border-secondary d-block text-start p-3">
                            <p>{{ $vendor->exhange_status }}</p>
                        </div>

                    </div>

                    <div class="col-12 col-md-4 no-gutters border-secondary border-left py-1">
                        <div class="table-header text-larger text-center py-1">
                            <img src="{{ asset('website_assets/imgs/icons/delivery-truck.png')}}" />
                        </div>
                        <div class="border-top border-secondary d-block text-start p-3">
                            <p class="text-large">شحن موثوق به</p>
                            <p>{{ $vendor->delivery_status }}</p>
                            <a href="#" class="main-color font-weight-bold">معرفه المزيد</a>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 no-gutters border-secondary border-left-0 py-1">
                        <div class="table-header text-larger text-center py-1">
                            <img src="{{ asset('website_assets/imgs/icons/encrypted.png')}}" />

                        </div>
                        <div class="border-top border-secondary d-block text-start p-3">
                            <p class="text-large">تسوق امن</p>
                            <p class>بياناتك محمية دائما</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>


    <div class="row my-4 text-right">


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
                            <span>{{ \Carbon\Carbon::parse($vendor->created_at)->format('Y') }}  </span>
                        </span>
                    </li>
                    <li class="my-3">
                        <i class="fa-solid fa-star star-rating"></i>
                        <span class="mr-1">
                            عدد المبيعات الناجحة:
                            <span>+10000</span>
                        </span>
                    </li>
                    <li>
                        <i class="fa-solid fa-star star-rating"></i>
                        <span class="mr-1">
                            بلد المنشأ:
                            <span class="font-weight-bold">{{ $vendor->country ?? $vendor->vendor_name }}</span>
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
                        تقييمات العملاء
                        ({{ $reviewsCount }})
                    </p>
                </div>

                <div class="row">
                    <div id="users-review-details" class="col-12 text-right">

                     @include('site.partials.users_review_details_in_vendor')


                    </div>
                </div>
            </div>

        </div>

        <div class="d-flex  justify-content-center mt-5 pt-3">
            @if ($users_review_details->hasMorePages())
            <button id="load-more-btn" class="px-5 py-2 bg-transparent border">
                <i class="fas fa-chevron-right ml-2"></i>
                مشاهدة تقييمات اكثر
            </button>
            @endif
            {{--  <button class="mx-3 px-5 py-2  bg-transparent border">
                الصفحة الجاية
                <i class="fas fa-chevron-left mr-2"></i>
            </button>  --}}
        </div>

    </div>

</section>
@endsection

@push('scripts')
<script>
    // تحميل ريفيوهات اكتر في صفحة المنتج نفسه
    var nextPage = {{ $users_review_details->currentPage() + 1 }};
    var lastPage = {{ $users_review_details->lastPage() }};
    var loadMoreBtn = document.getElementById('load-more-btn');
    var usersReviewDetailsContainer = document.getElementById('users-review-details');

    loadMoreBtn.addEventListener('click', function() {
        if (nextPage <= lastPage) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '?page=' + nextPage, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var response = xhr.responseText;
                    var parser = new DOMParser();
                    var newContent = parser.parseFromString(response, 'text/html');
                    var newReviews = newContent.getElementById('users-review-details').innerHTML;
                    usersReviewDetailsContainer.innerHTML += newReviews;
                    nextPage++;
                    if (nextPage > lastPage) {
                        loadMoreBtn.style.display = 'none';
                    }
                }
            };
            xhr.send();
        }
    });
</script>
@endpush
