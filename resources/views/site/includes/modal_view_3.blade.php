<div id="modal_view_3" class="modal fade quickview in quickview-modal-product-details-{{$related_product ->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-product-id="{{$related_product ->id}}" data-dismiss="modal" aria-label="Close"><i class="material-icons close">close</i></button>
            </div>
            <div class="modal-body">
                <div class="row no-gutters">
                    <div class="col-md-5 col-sm-5 divide-right">
                        <div class="images-container bottom_thumb">
                            <div class="product-cover">
                                <img class="js-qv-product-cover img-fluid" src="{{$related_product ->images[0] ->photo ?? ''}}" alt="{{$related_product->name}}" title="{{$related_product->name}}" style="width:100%;" itemprop="image">
                                <div class="layer hidden-sm-down" data-toggle="modal" data-target="#product-modal">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-7">
                        <h1 class="product-name">{{$related_product ->name}}</h1>

                        <div class="product-prices">
                            <div class="product-price " itemprop="offers" itemscope="" itemtype="https://schema.org/Offer">
                                <div class="current-price">
                                    <span itemprop="price" class="price">السعر :{{$related_product ->special_price ?? $related_product ->price }}</span>

                                </div>
                            </div>
                        </div>

                        <div id="product-description-short" itemprop="description">
                            <p> {!! $related_product ->description !!}</p>
                        </div>
                        <div class="product-actions">
                            <form action="" method="post" id="add-to-cart-or-refresh">
                                @csrf
                                <input type="hidden" name="id_product" value="{{$related_product ->id }}" id="product_page_product_id">
                                <div class="product-add-to-cart in_border">
                                    <div class="add">
                                        <button class="btn btn-primary add-to-cart" data-button-action="add-to-cart" type="submit">
                                            <div class="icon-cart">
                                                <i class="shopping-cart"></i>
                                            </div>
                                            <span>Add to cart</span>
                                        </button>
                                    </div>

                                    <a class="addToWishlist  wishlistProd_22" href="#" data-product-id="{{$related_product ->id}}">
                                        <i class="fa fa-heart"></i>
                                        <span>Add to Wishlist</span>
                                    </a>

                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
