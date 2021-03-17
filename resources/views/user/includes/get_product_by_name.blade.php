@foreach($pruducts as $pruduct)
<div class="col-sm-3">
    <div class="product-image-wrapper">
        <div class="single-products">
            <div class="productinfo text-center">
                <a href="{{ route('product' ,$pruduct->id) }}">
                <img src="{{ $pruduct->img}}" alt="" />
                </a>
                <h2>{{ $pruduct->price}}</h2>
                <p>{{ $pruduct->name.' '.$pruduct->brand->name}}</p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>

        </div>
    </div>
</div>
@endforeach
