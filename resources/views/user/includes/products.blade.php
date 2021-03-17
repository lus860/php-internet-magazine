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
                            <img src="{{$product->img}}" alt="" />
                            <h2>{{'$'.$product->price}}</h2>
                            <p>{{ $product->name.' '.$product->brand->name}}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>{{'$'.$product->price}}</h2>
                                <p>{{ $product->name.' '.$product->brand->name}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                            <li><a href="{{ route('product' ,$product->id) }}"><i class="far fa-eye"></i>Product Details</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
        <ul class="pagination">
            <li class="active"><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">&raquo;</a></li>
        </ul>
    </div><!--features_items-->
@endif
