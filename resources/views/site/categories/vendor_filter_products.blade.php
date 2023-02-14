
    @foreach ( $vendors_products as $product )

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

                <form action="{{route('cart.store')}}" method="POST">
                    @csrf

                    <button type="submit" name="product_id" value="{{$product->id}}" class="add-to-cart btn py-1 px-2">
                        أضف إلى العربة
                    </button>
                </form>
            </div>
            <img class="card-img-top" src="{{$product ->images[0]->photo ?? asset('images/default.png')}}" alt="{{$product->name}}" />
        </div>

        <div class="card-body text-center">
            <h5 class="card-title">{{$product->name}}</h5>
            <h5>{{$product->price }} جنيه</h5>
        </div>
    </div>
    @endforeach