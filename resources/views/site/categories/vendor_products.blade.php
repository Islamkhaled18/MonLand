@extends('layouts.site.app')

@section('title')
- منتجات البائع
@endsection

@section('content')
<!-- samiler products -->

<!-- samiler products -->
<section id="semilar-products" class="container">
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
                    <div class="secondary-color">
                        <a href="{{ route('Site.vendor.getVendor',$vendor->id) }}">مشاهدة الملف الشخصى</a>
                    </div>
                    {{--  <div class="d-flex align-items-center">
                        <p>
                            3556 المتابعين
                        </p>
                        <button class="mt-2 mx-3 text-white px-3 special-btn-style  rounded">
                            تابع
                        </button>
                    </div>  --}}
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
                            {{--  <a href="#" class="main-color font-weight-bold">معرفه المزيد</a>  --}}
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

    <div class="container">
        <div class="row">
            <div class="col-3 text-right pr-0 d-none d-md-block">
                <div>
                    <h6 class="font-weight-bold">عرض</h6>
                    <hr />
                    <form>
                        <div class="d-flex align-items-center">
                            <input type="radio" name="offers" id="all_products" class="position-relative" />
                            <label for="all_products" class="mr-2">كل المنتجات</label>
                        </div>
                        <div class="d-flex align-items-center">
                            <input type="radio" name="offers" id="all_offers" />
                            <label for="all_offers" class="mr-2">
                                العروض فقط
                            </label>

                        </div>
                    </form>
                </div>

                <div class="my-4">
                    <h6 class="font-weight-bold">الاقسام الرئيسية</h6>
                    <hr />
                    <div>
                        <ul class="list-unstyled">
                            <li>
                                <i class="fa-solid fa-chevron-left"></i>


                                <ul class="pr-4 list-unstyled">
                                    <li>
                                        <i class="fa-solid fa-chevron-left"></i>
                                        جميع الاقسام

                                        <ul class="list-unstyled pr-4">
                                            @foreach ($mainCategories as $mainCategory)
                                            <li><a href="{{ route('mainCategory.products', $mainCategory->name) }}"
                                                    class="text-muted">{{ $mainCategory->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>


                <div class="my-4">
                    <h6 class="font-weight-bold">السعر</h6>
                    <hr />
                    <div class="d-flex">
                        <div class="d-flex align-items-center">
                            <span>من </span>
                            <input type="number" min="0" class="form-control mr-2" id="minPriceInput" />

                        </div>

                        <div class="d-flex pr-3 align-items-center">
                            <span>إلى </span>
                            <input type="number" min="0" class="form-control mr-2" id="maxPriceInput" />

                        </div>

                    </div>
                    <div class="d-flex justify-content-end">
                        <button class=" btn bg-main text-white text-bold mx-2 mt-4 rounded-0 py-2 px-4 priceRange">
                            تطبيق
                        </button>
                    </div>
                </div>



                <div>
                    <h6 class="font-weight-bold">اللون</h6>
                    <hr />
                    <div class="d-flex available-colors flex-nowrap">
                        @if($productColors)

                        @foreach($productColors as $pc)
                        <div data-color="{{$pc->name}}" class="pcColor" style="background-color: {{$pc->name}}">
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="my-4">
                    <h6 class="font-weight-bold">المقاس</h6>
                    <hr />
                    <form>
                        <div class="row align-items-center">
                            @foreach ($productSizes as $pz)
                            <div class="col-6 d-flex align-items-center">

                                <input type="radio" value="{{$pz->name}}" name="size" id="size-{{$pz->name}}"
                                    class="position-relative" />

                                <label for="size-{{$pz->name}}" class="mr-2 mb-0">{{$pz->name}}</label>

                            </div>
                            @endforeach
                        </div>

                    </form>
                </div>
                <div>
                    <h6 class="font-weight-bold">الماركة</h6>
                    <hr />
                    <form>

                        <?php $brands = DB::table('brands')
                                ->orderby('name', 'ASC')
                                ->get(); ?>

                        @foreach ($brands as $brand)
                        <div class="d-flex align-items-center">
                            <input type="radio" name="brand" id="brandId" value="{{ $brand->id }}" class="brandloop" />
                            <label for="brand-1" class="mr-2">{{ $brand->name }}</label>
                        </div>
                        @endforeach


                    </form>
                </div>

                <div class="my-4">
                    <h6 class="font-weight-bold">التقييم</h6>
                    <hr />
                    <form>
                        <div class="d-flex align-items-center">
                            <input type="radio" name="brand" id="four-stars" class="position-relative" />
                            <label for="four-stars" class="mr-2 d-flex justify-content-between">
                                <div class="star-rating ml-3">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star text-light2"></i>
                                </div>
                                <span>أو أعلى</span>
                            </label>
                        </div>

                        <div class="d-flex align-items-center">
                            <input type="radio" name="brand" id="three-stars" class="position-relative" />
                            <label for="three-stars" class="mr-2 d-flex justify-content-between">
                                <div class="star-rating ml-3">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star text-light2"></i>
                                    <i class="fa-solid fa-star text-light2"></i>
                                </div>
                                <span>أو أعلى</span>
                            </label>
                        </div>

                        <div class="d-flex align-items-center">
                            <input type="radio" name="brand" id="two-stars" class="position-relative" />
                            <label for="two-stars" class="mr-2 d-flex justify-content-between">
                                <div class="star-rating ml-3">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star text-light2"></i>
                                    <i class="fa-solid fa-star text-light2"></i>
                                    <i class="fa-solid fa-star text-light2"></i>
                                </div>
                                <span>أو أعلى</span>
                            </label>
                        </div>

                        <div class="d-flex align-items-center">
                            <input type="radio" name="brand" id="one-stars" class="position-relative" />
                            <label for="one-stars" class="mr-2 d-flex justify-content-between">
                                <div class="star-rating ml-3">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star text-light2"></i>
                                    <i class="fa-solid fa-star text-light2"></i>
                                    <i class="fa-solid fa-star text-light2"></i>
                                    <i class="fa-solid fa-star text-light2"></i>
                                </div>
                                <span>أو أعلى</span>
                            </label>
                        </div>

                    </form>
                </div>

                <div>
                    <h6 class="font-weight-bold">نسبة الخصم</h6>
                    <hr />
                    <form>
                        <div class="d-flex align-items-center">
                            <input type="radio" name="brand" id="all-dis" class="position-relative" />
                            <label for="all-dis" class="mr-2">الكل </label>
                        </div>

                        <div class="d-flex align-items-center">
                            <input type="radio" name="brand" id="five-dis" class="position-relative" />
                            <label for="five-dis" class="mr-2">50% أو أكثر </label>
                        </div>

                        <div class="d-flex align-items-center">
                            <input type="radio" name="brand" id="four-dis" class="position-relative" />
                            <label for="four-dis" class="mr-2">40% أو أكثر </label>
                        </div>

                        <div class="d-flex align-items-center">
                            <input type="radio" name="brand" id="twenty-dis" class="position-relative" />
                            <label for="twenty-dis" class="mr-2">20% أو أكثر </label>
                        </div>

                        <div class="d-flex align-items-center">
                            <input type="radio" name="brand" id="ten-dis" class="position-relative" />
                            <label for="ten-dis" class="mr-2">10% أو أكثر </label>
                        </div>

                    </form>
                </div>

                <div class="my-4">
                    <h6 class="font-weight-bold">تقييم البائع </h6>
                    <hr />
                    <form>
                        <div class="d-flex align-items-center">
                            <input type="radio" name="brand" id="all-seller-rates" class="position-relative" />
                            <label for="all-seller-rates" class="mr-2">الكل </label>
                        </div>

                        <div class="d-flex align-items-center">
                            <input type="radio" name="brand" id="eight-rates" class="position-relative" />
                            <label for="eight-rates" class="mr-2">80% أو أكثر </label>
                        </div>

                        <div class="d-flex align-items-center">
                            <input type="radio" name="brand" id="six-rates" class="position-relative" />
                            <label for="six-rates" class="mr-2">60% أو أكثر </label>
                        </div>

                        <div class="d-flex align-items-center">
                            <input type="radio" name="brand" id="four-rates" class="position-relative" />
                            <label for="four-rates" class="mr-2">40% أو أكثر </label>
                        </div>

                        <div class="d-flex align-items-center">
                            <input type="radio" name="brand" id="twenty-rates" class="position-relative" />
                            <label for="twenty-rates" class="mr-2">20% أو أكثر </label>
                        </div>

                    </form>
                </div>
            </div>
            <div class="col-12 col-md-9">
                <div class="row">

                    <div class="p-2 col-12  text-right d-flex justify-content-between">
                        <div>
                            <p>
                                إسم البائع : {{ $vendor->vendor_name }}
                            </p>
                          
                        </div>

                        <div class="d-flex align-items-center">
                            ترتيب حسب :
                            <select name="sort_by" id="sort_by" class="form-control w-auto mr-3">
                                <option value="">ترتيب حسب</option>
                                <option value="sort_by">وصلنا حديثا</option>
                            </select>
                        </div>

                    </div>

                    <div class="col-12">

                        <div class="card-deck2 d-flex flex-wrap searchProduct">

                            @include('site.categories.vendor_filter_products')

                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="d-flex justify-content-center mt-5 pt-3">
            {{ $vendors_products->links('vendor.pagination.default') }}
        </div>

    </div>

    {{-- favorites --}}
    @include('site.includes.first_add_to_favorite_modal')
    @include('site.includes.exist_same_product_in_favorites_modal')
    {{-- compares --}}
    @include('site.includes.first_add_to_compare_modal')
    @include('site.includes.exist_same_product_in_compares_modal')
    @include('site.includes.max_products_in_compares')




</section>

@endsection




@push('scripts')

<script>
    $(document).ready(function(e) {
        $('#sort_by').on('change', function() {
            var sort_by = $('#sort_by').val();
            $.ajax({
                url: "{{ route('Site.vendor.sort.products', $vendor->id) }}",
                method: "GET",
                data: {
                    sort_by: sort_by
                },
                success: function(res) {
                    $('.searchProduct').empty();
                    $('.searchProduct').html(res);
                }
            });
        });



        $('.priceRange').on('click', function() {
            var minPrice = $('#minPriceInput').val();
            var maxPrice = $('#maxPriceInput').val();

            $.ajax({
                url: "{{ route('Site.vendor.price.products', $vendor->id) }}",
                type: 'GET',
                data: {
                    minPrice: minPrice,
                    maxPrice: maxPrice
                },
                success: function(res) {
                    $('.searchProduct').empty();
                    $('.searchProduct').html(res);
                }
            });
        });





        $('#all_products').on('click', function() {
            var sort_by = $('#all_products').val();
            $.ajax({
                url: "{{ route('Site.vendor.all_products.search', $vendor->id) }}",
                method: "GET",
                data: {
                    sort_by: sort_by
                },
                success: function(res) {
                    $('.searchProduct').empty();
                    $('.searchProduct').html(res);
                }
            });
        });
        $('#all_offers').on('click', function() {
            var sort_by = $('#all_offers').val();
            $.ajax({
                url: "{{ route('Site.vendor.all_offers.search', $vendor->id) }}",
                method: "GET",
                data: {
                    sort_by: sort_by
                },
                success: function(res) {
                    $('.searchProduct').empty();
                    $('.searchProduct').html(res);
                }
            });
        });
        $('.brandloop').on('click', function() {
            var brand = [];
            $('.brandloop').each(function() {
                if ($(this).is(":checked")) {
                    brand.push($(this).val());
                }
            });
            allBrand = brand.toString();
            $.ajax({
                url: "{{ route('Site.vendor.brands.sort', $vendor->id) }}",
                method: "GET",
                data: "brand=" + allBrand,
                success: function(res) {
                    $('.searchProduct').empty();
                    $('.searchProduct').html(res);
                }
            });
        });

        $('.pcColor').on('click', function() {

            let color = $(this).data('color')

            $.ajax({
                url: "{{ route('Site.vendor.search.color', $vendor->id) }}",
                method: "GET",
                data: {
                    color: color
                },

                success: function(res) {
                    $('.searchProduct').empty();
                    $('.searchProduct').html(res);
                }

            })

        })

        $('.size').on('click', function() {

            let size = $(this).val();

            $.ajax({
                url: "{{ route('Site.vendor.search.size', $vendor->id) }}",
                method: "GET",
                data: {
                    size: size
                },

                success: function(res) {
                    $('.searchProduct').empty();
                    $('.searchProduct').html(res);
                }

            })
        })

        $('.stars').on('click', function() {
            let star_rating = $(this).val();

            $.ajax({
                url: "{{ route('Site.vendor.search.review', $vendor->id) }}",
                method: "GET",
                data: {
                    rating: star_rating
                },

                success: function(res) {
                    console.log("oer");
                    $('.searchProduct').empty();
                    $('.searchProduct').html(res);
                }
            })
        })
        });
</script>
@endpush
