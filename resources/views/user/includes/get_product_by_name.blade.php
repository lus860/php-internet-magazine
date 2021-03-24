@foreach($products as $product)
    @if ($loop->index == 8) @break @endif
    <div class="col-sm-3">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <a href="{{ route('product' ,$product->id) }}">
                        <img src="@if($product->mainImg()) {{$product->mainImg()}}
                        @elseif($product->images()->first()->img) {{$product->images()->first()->img}}
                        @else {{asset('/admin/dist/img/product/no-image.png')}} @endif" alt=""/>
                    </a>
                    <h2>@if($product->new_price !==0) ${{$product->new_price}} @else ${{$product->price}} @endif</h2>
                    <p>{{ $product->name.' '.$product->brand->name}}</p>
                    <a href="{{ route('add_to_cart', $product->id) }}" class="btn btn-default add-to-cart"
                       data-id="{{$product->id}}"><i class="fa fa-shopping-cart"></i>
                        @if(session('cart_id') && \Cart::session(session('cart_id'))->get($product->id))
                            In The Cart @else  Add to cart @endif
                    </a>
                </div>

            </div>
        </div>
    </div>
@endforeach
@if(count($products) >2)
    <div class="col-sm-12">
        <a href="{{ route('product_name', ['name' => $name]) }}">
            <button type="button" class="btn btn-default get"
                    style="float: right;margin-top: -20px;margin-bottom: 30px!important;">
                View All
            </button>
        </a>
    </div>
@endif
