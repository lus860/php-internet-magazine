@foreach($products as $product)
<div class="col-sm-3">
    <div class="product-image-wrapper">
        <div class="single-products">
            <div class="productinfo text-center">
                <a href="{{ route('product' ,$product->id) }}">
                <img src="@if($product->mainImg()) {{$product->mainImg()}}
                @elseif($product->images()->first()->img) {{$product->images()->first()->img}}
                @else {{asset('/admin/dist/img/product/no-image.png')}} @endif" alt="" />
                </a>
                <h2>@if($product->new_price !==0) ${{$product->new_price}} @else ${{$product->price}} @endif</h2>
                <p>{{ $product->name.' '.$product->brand->name}}</p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>

        </div>
    </div>
</div>
@endforeach
