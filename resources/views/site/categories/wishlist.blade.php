@extends('layouts.site.app')

@section('title')

- المنتجات المفضله
@endsection

@section('content')

<!-- my Cart -->
@if ($products && $products->count() > 0)

<section id="cart" class="py-5 container my-5">
    <div class="page-nav row">
        <a href="{{route('home')}}" class="text-dark pl-2">
            <i class="fa-solid fa-house-chimney"></i>
        </a>
        <a href="{{route('wishlist.products.index')}}" class="text-dark">
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
            المفضلة
        </a>
    </div>

    <div class="row my-5 py-5" id="fav-list">
        <!-- card list  -->
        @foreach ( $products as $product )


        <div class="card my-2 w-100 mb-3">
            <div class="row no-gutters">
                <div class="col-12 col-lg-2 position-relative">
                    <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                        <ul class="list-unstyled">
                            <li>
                                {{-- <button class="btn bg-light">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button> --}}
                                <a class="removeFromWishlist btn bg-light" href="#" data-product-id="{{$product->id}}">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </li>

                            <li>
                                <button class="btn bg-light">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </li>

                            <li>
                                <button class="btn bg-light">
                                    <i class="fa-solid fa-arrow-right-arrow-left"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                    

                    <img src="{{$product ->images[0]->photo ? asset($product ->images[0]->photo) : asset('images/default.png')}}" class="card-img img-fluid" alt="{{ $product->name}}" />
                </div>
                <div class="col-lg-10">
                    <div class="fav-card-body px-2 pt-2">
                        <h5 class="card-title">
                            {{$product->short_description}}
                        </h5>
                        <p class="price card-text">
                            <span class="old-price"> {{$product->price}}جنية</span>

                            {{-- <span class="new-price px-2"> {{$product->special_price}}جنية</span> --}}
                        </p>
                        <div class="row">
                            <p class="card-text col-lg-7">
                                {{$product->description}}
                            </p>
                            <div class="col-12 col-lg-5 button-col d-flex flex-column justify-content-end">
                                <div class="row">
                                    <button type="button" class="btn btn-dark my-1 col-5 col-lg-7">
                                        نظرة سريعة
                                    </button>
                                </div>
                                <div class="row">
                                    <button type="button" class="btn btn-dark my-1 col-5 col-lg-7">
                                        اضف الي العربة
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach


    </div>
</section>
@else

<!-- my Cart -->
<section id="cart" class="py-5 container my-5">
    <div class="page-nav row">
        <a href="{{route('home')}}" class="text-dark pl-2">
            <i class="fa-solid fa-house-chimney"></i>
        </a>
        <a href="{{route('wishlist.products.index')}}" class="text-dark">
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
            المفضلة
        </a>
    </div>

    <div class="d-flex flex-column justify-content-center text-center align-items-center my-5 py-5">
        <div>
            <img src="{{ asset('website_assets/imgs/cart/Empty cart cartoon.svg' ) }}" class=" img-fluid" alt="Empty Cart" />

        </div>
        <h4>المنتج غير موجود</h4>
        <p class="col-md-6 justify-self-center">
            أسف... لم يتم العثور على اي منتج داخل قائمة المفضلة بك!
        </p>
        <button type="button" class="btn btn-dark my-4"><a href="{{route('Site.allCategory')}}">استمرار التسوق</a></button>
    </div>
</section>

@endif


@endsection

{{-- @push('scripts')

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click', '.removeFromWishlist', function(e) {
        e.preventDefault();
        @guest()
        $('.not-loggedin-modal').css('display', 'block');
        @endguest
        $.ajax({
            type: 'delete'
            , url: "{{Route('wishlist.destroy')}}"
            , data: {
                'productId': $(this).attr('data-product-id')
            , }
            , success: function(data) {
                location.reload();
            }
        });
    });

</script>

@endpush --}}
