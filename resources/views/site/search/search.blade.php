@extends('layouts.site.app')

@section('title')
    - البحث
@endsection

@section('content')
        <div class="col-12">
            <div class="card-deck d-flex flex-wrap">
                <div class="card mt-5 position-relative">
                    <div class="position-absolute item-assets d-flex justify-content-between w-100 align-items-start p-3">
                        <ul class="list-unstyled">
                            <li>
                                <button>
                                    <a class="addToWishlist  add-to-fav" href="#" data-product-id="{{ $product->id }}">
                                        <i class="fa fa-heart" aria-hidden="true"></i>
                                    </a>
                                </button>
                            </li>

                            <li>
                                <button data-toggle="modal" data-target="#show{{ $product->id }}"><i
                                        class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                            </li>

                            <li>
                                <button>
                                    <a class="addTocomparelist  add-to-fav" href="#"
                                        data-product-id="{{ $product->id }}">
                                        <i class="fa fa-exchange" aria-hidden="true"></i>
                                    </a>
                                </button>
                            </li>
                        </ul>

                        <div class="w-100 align-self-end text-center">
                            <form action="{{ route('cart.store') }}" method="POST">
                                @csrf

                                <button type="submit" name="product_id" value="{{ $product->id }}"
                                    class="add-to-cart btn bg-light py-1 px-2 ">أضف إلى العربة</button>
                            </form>
                        </div>

                    </div>
                    <img class="card-img-top" width="40" height="40" src="{{ $product->images[0]->photo ? asset($product->images[0]->photo) : asset('images/default.png') }}"
                        alt="{{ $product->name }}">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $product->short_description }}</h5>
                        <h5>{{ $product->price }} جنيه</h5>

                    </div>
                </div>
                @include('site.includes.product_detail')

        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click', '.addTocomparelist', function(e) {

            e.preventDefault();
            @guest()
                $('.not-loggedin-modal').css('display', 'block');
            @endguest
            $.ajax({
                type: 'post',
                url: "{{ Route('compare.store') }}",
                data: {
                    'productId': $(this).attr('data-product-id'),
                },
                success: function(data) {

                    console.log('ssssss');
                    location.reload();
                    if (data.compared)

                        $('.alert-modal').css('display', 'block');

                    else
                        $('.alert-modal2').css('display', 'block');
                }
            });
        });
        $(document).on('click', '.addToWishlist', function(e) {
            e.preventDefault();
            @guest()
                $('.not-loggedin-modal').css('display', 'block');
            @endguest
            $.ajax({
                type: 'post',
                url: "{{ Route('wishlist.store') }}",
                data: {
                    'productId': $(this).attr('data-product-id'),
                },
                success: function(data) {
                    location.reload();
                    if (data.wished)
                        $('.alert-modal').css('display', 'block');
                    else
                        $('.alert-modal2').css('display', 'block');
                }
            });
        });
    </script>
@endpush