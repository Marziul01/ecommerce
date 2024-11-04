@extends('frontend.master')

@section('title')
    {{ $siteSettings->title }} | WishList
@endsection


@section('content')

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow">Home</a>
                <span></span> Shop
                <span></span> Wishlist
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table shopping-summery text-center">
                            <thead>
                            <tr class="main-heading">
                                <th scope="col" colspan="2">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                                <th scope="col">Remove</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(auth()->check())
                                @if($wishlists->isNotEmpty())
                                    @foreach($wishlists as $wishlist)
                                        <tr>
                                            <td class="image product-thumbnail"><img src="{{ asset($wishlist->product->featured_image) }}" alt="#"></td>
                                            <td class="product-des product-name">
                                                <h5 class="product-name"><a href="{{ route('products', $wishlist->product->slug) }}">{{ $wishlist->product->name }}</a></h5>
                                                <p class="font-xs">{{ $wishlist->product->short_desc }}
                                                </p>
                                            </td>
                                            <td class="price" data-title="Price"><span>{{ $wishlist->product->price }} Tk</span></td>
                                            <td class="text-right" data-title="Cart">
                                                @if($wishlist->product->track_qty == 'YES')
                                                    @if($wishlist->product->qty > 0)
                                                        @if(!empty($wishlist->product->colors) || !empty($wishlist->product->sizes))
                                                            <a aria-label="Select options" class="btn btn-sm" href="{{ route('products', $wishlist->product->slug) }}"> <i class="fi-rs-shopping-bag-add"></i> Select Options </a>
                                                        @else
                                                            <form method="POST" action="{{ route('addToCart', $wishlist->product->id) }}" id="addToCartForm">
                                                                @csrf
                                                                <input name="quantity" value="1" type="hidden">
                                                                <button type="button" aria-label="Add To Cart" onclick="submitForm(this)" class="btn btn-sm"><i class="fi-rs-shopping-bag-add"></i> Add to cart</button>
                                                            </form>
                                                        @endif
                                                    @else
                                                        <button aria-label="Out of Stock !" class="btn btn-sm stock-out">  <i class="fi-rs-shopping-bag-add"></i> Stock Out ! </button>
                                                    @endif

                                                @else
                                                    @if(!empty($wishlist->product->colors) || !empty($wishlist->product->sizes))
                                                        <a aria-label="Select options" class="btn btn-sm" href="{{ route('products', $wishlist->product->slug) }}"> <i class="fi-rs-shopping-bag-add"></i> Select Options </a>
                                                    @else
                                                        <form method="POST" action="{{ route('addToCart', $wishlist->product->id) }}" id="addToCartForm">
                                                            @csrf
                                                            <input name="quantity" value="1" type="hidden">
                                                            <button type="button" aria-label="Add To Cart" onclick="submitForm(this)" class="btn btn-sm"><i class="fi-rs-shopping-bag-add"></i> Add to cart</button>
                                                        </form>
                                                    @endif
                                                @endif
                                            </td>
                                            <td class="action" data-title="Remove"><a onclick="addToWishlistAndReload({{$wishlist->product->id}})" href="javascript:void(0)"><i class="fi-rs-trash"></i></a></td>
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                   <td colspan="6"> No Products in Wishlist </td>
                                </tr>
                                @endif
                            @else
                                @if(session('wishlist'))
                                    @foreach(session('wishlist') as $productId)
                                        @php
                                            $product = $wishlists->where('id', $productId)->first(); // Assuming you have a function to retrieve product details
                                        @endphp
                                            <tr>
                                                <td class="image product-thumbnail"><img src="{{ asset($product->featured_image) }}" alt="#"></td>
                                                <td class="product-des product-name">
                                                    <h5 class="product-name"><a href="{{ route('products', $product->slug) }}">{{ $product->name }}</a></h5>
                                                    <p class="font-xs">{{ $product->short_desc }}</p>
                                                </td>
                                                <td class="price" data-title="Price"><span>{{ $product->price }} Tk</span></td>
                                                <td class="text-center" data-title="Stock">
                                                    <span class="color3 font-weight-bold">In Stock</span>
                                                </td>
                                                <td class="text-right" data-title="Cart">
                                                    <button class="btn btn-sm"><i class="fi-rs-shopping-bag mr-5"></i>Add to cart</button>
                                                </td>
                                                <td class="action" data-title="Remove"><a onclick="addToWishlistAndReload({{$product->id}})" href="javascript:void(0)"><i class="fi-rs-trash"></i></a></td>
                                            </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6"> No Products in Wishlist </td>
                                    </tr>
                                @endif

                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('customJs')

    <script>
        function addToWishlistAndReload(productId) {
            // Call addToWishlist function (assuming it adds the product to the wishlist)
            addToWishlist(productId);

            // Reload the page
            setTimeout(function() {
                location.reload();
            }, 2000);
        }
    </script>

@endsection
