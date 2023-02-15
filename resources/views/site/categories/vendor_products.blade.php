@extends('layouts.site.app')

@section('title')

- منتجات البائع
@endsection

@section('content')


{{-- منتجات البائع اللى هيتعمل فيها فلترز --}}


<!-- samiler products -->
<section id="semilar-products" class="container">
    <div class="row my-5 pt-5">
        <div class="col-12">
            <div class="p-2 text-white card-deck-title text-right">
                <p>مزيد من المنتجات من هذا البائع</p>
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

        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-3 text-right pr-0">
                <div>
                    <h6 class="font-weight-bold">عرض</h6>
                    <hr />
                    <form>
                        <div class="d-flex align-items-center">
                            <input type="radio" name="offers" id="all-products" class="position-relative" />
                            <label for="all-products" class="mr-2">كل المنتجات</label>
                        </div>
                        <div class="d-flex align-items-center">
                            <input type="radio" name="offers" id="all-offers" />
                            <label for="all-offers" class="mr-2">العروض فقط</label>

                        </div>
                    </form>
                </div>

                <div class="my-4">
                    <h6 class="font-weight-bold">السعر</h6>
                    <hr />
                    <form class="multi-range-field my-2">
                        <input id="multi" class="multi-range" type="range" min="0" max="100" value="0" />
                        <div class="mt-2">
                            <span>السعر</span>
                            <span id="price">0</span>
                        </div>
                    </form>
                </div>

                <div>
                    <h6 class="font-weight-bold">اللون</h6>
                    <hr />
                    <div class="d-flex available-colors flex-nowrap">
                        @foreach($productColors as $pc)
                        <div data-color="{{$pc->name}}" class="pcColor" style="background-color: {{$pc->name}}"></div>
                        @endforeach
                    </div>
                </div>

                <div class="my-4">
                    <h6 class="font-weight-bold">المقاس</h6>
                    <hr />
                    <form>
                        <div class="row align-items-center">
                            @foreach ($productSizes as $pz)
                                    
                                
                            <div class="col-6 d-flex align-items-center">
                                <input type="radio" value="{{$pz->name}}" name="size" id="sizes" class="position-relative size" />
                                <label for="sizes" class="mr-2 mb-0">{{$pz->name}}</label>
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
                            <input type="radio" name="brand" id="brandId" value="{{ $brand->id }}"
                                class="brandloop" />
                            <label for="brand-1" class="mr-2">{{ $brand->name }}</label>
                        </div>
                    @endforeach
                    </form>
                </div>

                <div class="my-4">
                    <h6 class="font-weight-bold">تقييم المنتج</h6>
                    <hr />
                    <form>
                        <div class="d-flex align-items-center">
                            <input value="5" type="radio" name="brand" id="five-stars" class="position-relative stars" />
                            <label for="four-stars" class="mr-2 d-flex justify-content-between">
                                <div class="star-rating ml-3">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <span>أو أعلى</span>
                            </label>
                        </div>
                        <div class="d-flex align-items-center">
                            <input value="4" type="radio" name="brand" id="four-stars" class="position-relative stars" />
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
                            <input value="3" type="radio" name="brand" id="three-stars" class="position-relative stars" />
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
                            <input value="2" type="radio" name="brand" id="two-stars" class="position-relative stars" />
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
                            <input value="1" type="radio" name="brand" id="one-stars" class="position-relative stars" />
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
            </div>



            <div class="col-9">
                <div class="row">
                    <div class="col-12">
                        <div class="row p-2 text-white card-deck-title">
                            <a class="text-white" href="{{route('Site.getVendor',$vendor->id)}}">

                                <p>معلومات اكتر عن التاجر ومنتجاته واراء العملاء</p>
                            </a>
                        </div>

                        <div class="card-deck2 d-flex flex-wrap searchProduct">

                          @include('site.categories.vendor_filter_products')


                        </div>
                    </div>
                </div>
    </div>

    </div>

    <div class="d-flex justify-content-center mt-5 pt-3">
        {{$vendors_products->links('vendor.pagination.default')}}
    </div>

    </div>


    @endsection



   
    @push('scripts')


    <script>
        $(function() {
            // Price Slider
            $("#multi").change(function(e) {
                document.getElementById("price").innerHTML = `${e.target.value}`
            });
        })
    </script>


<script>
    $(document).on('click', '.quick-view', function() {
        $('.quickview-modal-product-details-' + $(this).attr('data-product-id')).css("display", "block");
    });
    $(document).on('click', '.close', function() {
        $('.quickview-modal-product-details-' + $(this).attr('data-product-id')).css("display", "none");
    });
</script>

<script>
    $(document).ready(function(e) {
        $('.multi-range').on('change', function() {
            var multi = $('#multi').val();
            $.ajax({
                url: "{{ route('Site.vendor.price.products', $vendor->id) }}",
                type: 'GET',
                data: {
                    multi: multi
                },
                success: function(res) {
                    $('.searchProduct').empty();
                    $('.searchProduct').html(res);
                }
            });
        });
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
    });


    $('.pcColor').on('click' ,function(){

       let color =  $(this).data('color')
       
       $.ajax({
          url:"{{ route('Site.vendor.search.color' , $vendor->id) }}",
          method:"GET",
          data:{color:color},

          success: function(res) {
                    $('.searchProduct').empty();
                    $('.searchProduct').html(res);
                }

       })

    })

    $('.size').on('click' , function(){

        let size = $(this).val();

        $.ajax({
            url:"{{ route('Site.vendor.search.size' , $vendor->id) }}",
            method:"GET",
            data:{size:size},
            
            success: function(res) {
                    $('.searchProduct').empty();
                    $('.searchProduct').html(res);
                }

        })
    })

    $('.stars').on('click' , function(){
        let star_rating = $(this).val();

        $.ajax({
            url:"{{ route('Site.vendor.search.review' , $vendor->id) }}",
            method:"GET",
            data:{rating : star_rating},

            success: function(res) {
                console.log("oer");
                    $('.searchProduct').empty();
                    $('.searchProduct').html(res);
                }
        })
    })
</script>

        
    @endpush
