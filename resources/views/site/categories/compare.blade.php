@extends('layouts.site.app')

@section('title')
    - مقارنة المنتجات
@endsection

@section('content')

    <!-- my Cart -->
    @if ($products && $products->count() == 0)
        <div class="container mt-4 mb-5">
            <div class="page-nav row">
                <a href="/" class="text-dark pl-2">
                    <i class="fa-solid fa-house-chimney"></i>
                </a>
                <a href="#" class="text-dark">
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    قارن
                </a>
            </div>
        </div>

        <div class="text-center">


            <div class="container">
                @foreach ($products as $product)
                    <table class="table table-bordered font-weight-bold">
                        <thead>
                            <tr>
                                <td>المنتج</td>
                                <td class="p-4"><img src="{{ $product->images[0]->photo }}" alt="{{ $product->name }}"
                                        title="{{ $product->name }}" class="w-50" /> </td>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>الوصف</td>
                                <td>{{ $product->description }}</td>

                            </tr>
                            <tr>
                                <td>السعر</td>
                                <td>{{ $product->price }} جنيه</td>

                            </tr>
                            <tr>
                                <td>العربة</td>
                                <td>
                                    <button class="btn btn-dark w-75 py-2">أضف الى العربة</button>
                                </td>

                            </tr>
                            <tr>
                                <td>التقييم</td>
                                <td>
                                    <div class="star-rating">
                                        <i class="fa-solid fa-star-half-stroke"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>

                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>حذف</td>
                                <td><a class="removeFromcomparelist" href="#" data-product-id="{{ $product->id }}"><i
                                            class="fas fa-trash-alt"></a></i></td>
                            </tr>
                        </tbody>
                    </table>
                @endforeach
            </div>

        </div>
    @elseif ($products && $products->count() == 2)
        <div class="container">
            <table class="table table-bordered font-weight-bold">
                <thead>
                    <tr>
                        <td>المنتج</td>
                        <td class="p-4"><img src="{{ $products[0]->images[0]->photo }}" alt="{{ $products[0]->name }}"
                                title="{{ $products[0]->name }}" class="w-50" /> </td>

                        <td class="p-4"><img src="{{ $products[1]->images[0]->photo }}" alt="{{ $products[1]->name }}"
                                title="{{ $products[1]->name }}" class="w-50" /> </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>الوصف</td>
                        <td>{{ $products[0]->description }}</td>
                        <td>{{ $products[1]->description }}</td>
                    </tr>
                    <tr>
                        <td>السعر</td>
                        <td>{{ $products[0]->price }} جنيه</td>
                        <td>{{ $products[1]->price }} جنيه</td>

                    </tr>

                    <tr>
                        <td>العربة</td>
                        <td>
                            <form action="{{ route('cart.store') }}" method="POST">
                                @csrf

                                <button type="submit" name="product_id" value="{{ $products[0]->id }}"
                                    class="btn btn-dark w-75 py-2">أضف إلى العربة</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('cart.store') }}" method="POST">
                                @csrf

                                <button type="submit" name="product_id" value="{{ $products[1]->id }}"
                                    class="btn btn-dark w-75 py-2">أضف إلى العربة</button>
                            </form>
                        </td>

                    </tr>
                    <tr>
                        <td>التقييم</td>
                        <td>
                            <div class="star-rating">
                                <i class="fa-solid fa-star-half-stroke"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>

                            </div>
                        </td>
                        <td>
                            <div class="star-rating">
                                <i class="fa-solid fa-star-half-stroke"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>حذف</td>
                        <td><a class="removeFromcomparelist" href="#" data-product-id="{{ $products[0]->id }}"><i
                                    class="fas fa-trash-alt"></a></i></td>
                        <td><a class="removeFromcomparelist" href="#" data-product-id="{{ $products[1]->id }}"><i
                                    class="fas fa-trash-alt"></a></i></td>
                    </tr>
                </tbody>
            </table>

        </div>
    @else
        <!-- my Cart -->
        <section id="cart" class="py-5 container my-5">
            <div class="page-nav row">
                <a href="{{ route('home') }}" class="text-dark pl-2">
                    <i class="fa-solid fa-house-chimney"></i>
                </a>
                <a href="{{ route('compare.products.index') }}" class="text-dark">
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    المقارنه
                </a>
            </div>

            <div class="d-flex flex-column justify-content-center text-center align-items-center my-5 py-5">
                <div>
                    <img src="{{ asset('website_assets/imgs/cart/Empty cart cartoon.svg') }}" class=" img-fluid"
                        alt="Empty Cart" />

                </div>
                <h4>المنتج غير موجود</h4>
                <p class="col-md-6 justify-self-center">
                    أسف... لم يتم العثور على اي منتج داخل قائمة المقارنه بك!
                </p>
                <button type="button" class="btn btn-dark my-4"><a href="{{ route('Site.allCategory') }}">استمرار
                        التسوق</a></button>
            </div>
        </section>
    @endif


@endsection
