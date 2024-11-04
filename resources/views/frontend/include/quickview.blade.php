@foreach($products as $product)
<div class="modal fade custom-modal" id="quickViewModal{{ $product->id }}" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="detail-gallery">
                            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                            <!-- MAIN SLIDES -->
                            <div class="product-image-slider">
                                <figure class="border-radius-10">
                                    <img src="{{asset($product->featured_image)}}" width="100%">
                                </figure>
                                @if($product->productGallery->isNotEmpty())
                                    @foreach($product->productGallery as $images)
                                        <figure class="border-radius-10">
                                            <img src="{{asset($images->images)}}" width="100%">
                                        </figure>
                                    @endforeach
                                @endif

                            </div>
                            <!-- THUMBNAILS -->
                            <div class="slider-nav-thumbnails pl-15 pr-15">
                                <div><img src="{{asset($product->featured_image)}}" width="100%"></div>
                                @if($product->productGallery->isNotEmpty())
                                    @foreach($product->productGallery as $images)
                                        <figure class="border-radius-10">
                                            <div><img src="{{asset($images->images)}}" width="100%"></div>
                                        </figure>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- End Gallery -->
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="detail-info">
                            <h2 class="title-detail">{{ $product->name }}</h2>
                            <div class="product-detail-rating">
                                <div class="pro-details-brand">
                                    <span> Brands: <a href="shop-grid-right.html">{{ $product->brand->name }}</a></span>
                                </div>
                                <div class="product-rate-cover text-end">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width:90%">
                                        </div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (25 reviews)</span>
                                </div>
                            </div>
                            <div class="clearfix product-price-cover">
                                <div class="product-price primary-color float-left">
                                    <ins><span class="text-brand">${{ $product->price }}</span></ins>
                                    @if(isset($product->compare_price))
                                        <ins><span class="old-price font-md ml-15">{{ $product->compare_price }}</span></ins>
                                        <span class="save-price  font-md color3 ml-15">{{ round((($product->compare_price - $product->price) / $product->compare_price) * 100) }}% Off</span>
                                    @endif
                                </div>
                            </div>
                            <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                            <div class="short-desc mb-30">
                                <p>{{ $product->short_desc }}</p>
                            </div>
                            <div class="product_sort_info font-xs mb-30">
                                <ul>
                                    <li class="mb-10"><i class="fi-rs-crown mr-5"></i> 1 Year AL Jazeera Brand Warranty</li>
                                    <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> 30 Day Return Policy</li>
                                    <li><i class="fi-rs-credit-card mr-5"></i> Cash on Delivery available</li>
                                </ul>
                            </div>
                            <form method="POST" action="{{ route('addToCart', $product->id) }}" id="addToCartForm">
                                @csrf
                                @if(isset($colors) && !empty($colors))
                                    <div class="attr-detail attr-color mb-15">
                                        <strong class="mr-10">Color</strong>
                                        <ul class="list-filter color-filter">
                                            @foreach($colors as $color)
                                                <li>
                                                    <label class="color-option">
                                                        <input type="radio" name="color" value="{{ $color }}" style="display: none">
                                                        <i class="bi bi-circle-fill colors" style="color: {{ $color }}; font-size: 25px; cursor: pointer;"></i>
                                                        <div class="selection-dot"></div>
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if(isset($sizes) && !empty($sizes))
                                    <div class="attr-detail attr-size">
                                        <strong class="mr-10">Size</strong>
                                        <ul class="list-filter size-filter font-small">
                                            @foreach($sizes as $size)
                                                <li>
                                                    <input type="radio" id="size{{$size}}" name="size" value="{{ $size }}" style="display: none">
                                                    <label for="size{{$size}}" class="size-label">
                                                        <p style="margin-bottom: 0px !important;padding: 1px 8px; border: 1px solid lightgrey; border-radius: 5px; cursor: pointer;">{{ $size }}</p>
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                <div class="detail-extralink">
                                    <div  style="width:12%">
                                        <input type="number" class="form-control" name="quantity" value="1" min="1">
                                    </div>

                                    <div class="product-extra-link2">
                                        <button type="button" onclick="submitForm(this)" class="button button-add-to-cart">Add to cart</button>
                                        <a
                                            @if(auth()->check())
                                            @if( $product->wishlist->where('user_id', $userId)->first())
                                            aria-label="Remove from Wishlist"
                                            @else
                                            aria-label="Add To Wishlist"
                                            @endif
                                            @else
                                            @if(in_array($product->id, session()->get('wishlist', [])))
                                            aria-label="Remove from Wishlist"
                                            @else
                                            aria-label="Add To Wishlist"
                                            @endif
                                            @endif
                                            onclick="addToWishlist({{$product->id}})" class="action-btn hover-up" href="javascript:void(0)">
                                            <!-- Check if product is in wishlist -->
                                            @if(auth()->check())
                                                @if( $product->wishlist->where('user_id', $userId)->first())
                                                    <i id="wishlist-icon-{{$product->id}}" class="bi bi-heart-fill"></i>
                                                @else
                                                    <i id="wishlist-icon-{{$product->id}}" class="bi bi-heart"></i>
                                                @endif
                                            @else
                                                @if(in_array($product->id, session()->get('wishlist', [])))
                                                    <i id="wishlist-icon-{{$product->id}}" class="bi bi-heart-fill"></i>
                                                @else
                                                    <i id="wishlist-icon-{{$product->id}}" class="bi bi-heart"></i>
                                                @endif
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            </form>


                            <ul class="product-meta font-xs color-grey mt-50">
                                <li class="mb-5">SKU:{{ $product->sku }} <a href="#"></a></li>
                                <li>Availability:<span class="in-stock text-success ml-5">{{$product->qty}} Items In Stock</span></li>
                                <div class="social-icons single-share mt-2">
                                    <ul class="text-grey-5 d-inline-block">
                                        <li><strong class="mr-10">Share this:</strong></li>
                                        <li class="social-facebook"><a href="#"><img src="{{asset('frontend-assets')}}/imgs/theme/icons/icon-facebook.svg" alt=""></a></li>
                                        <li class="social-twitter"> <a href="#"><img src="{{asset('frontend-assets')}}/imgs/theme/icons/icon-twitter.svg" alt=""></a></li>
                                        <li class="social-instagram"><a href="#"><img src="{{asset('frontend-assets')}}/imgs/theme/icons/icon-instagram.svg" alt=""></a></li>
                                        <li class="social-linkedin"><a href="#"><img src="{{asset('frontend-assets')}}/imgs/theme/icons/icon-pinterest.svg" alt=""></a></li>
                                    </ul>
                                </div>
                            </ul>
                        </div>
                        <!-- Detail Info -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
