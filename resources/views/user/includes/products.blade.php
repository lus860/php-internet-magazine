@if(count($products) == 0)
    <h2 class="title text-center">Not Items</h2>
@else
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">{{$header}}</h2>

        @foreach($products as $product)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="@if($product->mainImg()) {{$product->mainImg()}}
                            @elseif($product->images()->first()->img) {{$product->images()->first()->img}}
                            @else {{asset('/admin/dist/img/product/no-image.png')}} @endif" alt=""/>
                            <h2>@if($product->new_price !==0) ${{$product->new_price}} @else
                                    ${{$product->price}} @endif</h2>
                            <p>{{ $product->name.' '.$product->brand->name}}</p>
                            <a href="#" class="btn btn-default add-to-cart" data-id="{{$product->id}}"><i
                                    class="fa fa-shopping-cart"></i> @if(session('cart_id') && \Cart::session(session('cart_id'))->get($product->id))
                                    In The Cart @else Add to cart @endif </a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>@if($product->new_price !==0) ${{$product->new_price}} @else
                                        ${{$product->price}} @endif</h2>
                                <p>{{ $product->name.' '.$product->brand->name}}</p>
                                <a href="#" class="btn btn-default add-to-cart" data-id="{{$product->id}}"><i
                                        class="fa fa-shopping-cart"></i> @if(session('cart_id') && \Cart::session(session('cart_id'))->get($product->id))
                                        In The Cart @else Add to cart @endif </a>
                            </div>
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                            <li><a href="{{ route('product' ,$product->id) }}"><i class="far fa-eye"></i>Product Details</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div><!--features_items-->
    @if($products->total() > $products->count())
        <ul class="pagination">
            @if($products->onFirstPage())
                <li><a href="" style="cursor: no-drop;pointer-events: none;"><i class="fa fa-angle-double-left"></i></a></li>
            @else
                <li><a href="{{$products->previousPageUrl()}}"><i class="fa fa-angle-double-left"></i></a></li>
            @endif
            @foreach($products->getUrlRange(1, $products->lastPage()) as $pag => $url)
                @if($pag == $products->currentPage())
                    <li class="active"><a href="{{$url}}" class="current-page">{{$pag}}</a></li>
                @else
                    <li><a href="{{$url}}">{{$pag}}</a></li>
                @endif
            @endforeach
            @if($products->hasMorePages())
                <li><a href="{{$products->nextPageUrl()}}"><i class="fa fa-angle-double-right"></i></a></li>
            @else
                <li><a href="" class="disabled" style="pointer-events: none;cursor: no-drop;"><i class="fa fa-angle-double-right"></i></a></li>
            @endif
        </ul>
    @endif
@endif

