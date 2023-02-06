@if ($products && count($products) >= 1)
<div class="card-deck2 d-flex flex-wrap">
    @foreach ($products as $product)
        <div class="card mt-4">
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

                            <button data-toggle="modal" data-target="#modal_view_2">
                                <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                            </button>
                        </li>

                        <li>

                            <button>
                                <i class="fa fa-exchange" aria-hidden="true"></i>
                            </button>
                        </li>
                    </ul>

                    <form action="{{ route('cart.store') }}" method="POST">
                        @csrf

                        <button type="submit" name="product_id"
                            value="{{ $product->id }}"
                            class="add-to-cart btn py-1 px-2">
                            أضف إلى العربة
                        </button>
                    </form>
                </div>
                <img class="card-img-top"
                    src="{{ asset($product->images[0]->photo) }}"
                    alt="{{ $product->name }}" />
            </div>

            <div class="card-body text-center">
                <h5 class="card-title">{{ $product->small_description }}</h5>
                <h5>{{ $product->price }} جنيه</h5>
            </div>
            {{-- @include('site.includes.modal_view_2', $product) --}}
        </div>
    @endforeach


</div>
@else
<div class="col-6 d-flex justify-content-end align-items-center">
    <h5> لا يوجد منتجات</h5>

</div>
@endif