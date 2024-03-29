@extends('user/layouts.app')

@section('content')
    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach($productSale as $item)
                                @if($item->new_price !==0 && $item->new_price < $item->price)
                                    <li data-target="#slider-carousel" data-slide-to="{{$item->id}}"
                                        class="@if ($loop->first) active @endif"></li>
                                @endif
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($productSale as $item)
                                @if($item->new_price !==0 && $item->new_price < $item->price)
                                    <div class="item  @if ($loop->first) active @endif">
                                        <div class="col-sm-6">
                                            <h1><span>SALE</span></h1>
                                            <h2>
                                                <del>{{'$'.$item->price}}</del> {{' $'.$item->new_price}}</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. </p>
                                            <button type="button" class="btn btn-default get"><a
                                                    href="{{ route('product' ,$item->id) }}">Product Details</a>
                                            </button>
                                        </div>
                                        <div class="col-sm-6">
                                            <img src="@if($item->mainImg()) {{$item->mainImg()}}
                                            @elseif($item->images()->first()->img) {{$item->images()->first()->img}}
                                            @else {{asset('/admin/dist/img/product/no-image.png')}} @endif"
                                                 class="girl img-responsive" alt=""/>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    @include('user/includes.left_sidebar')
                </div>

                <div class="col-sm-9 padding-right" id="products">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Features Items</h2>
                        @foreach($products as $item)
                            @if ($loop->index == 12) @break @endif
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="@if($item->mainImg()) {{$item->mainImg()}}
                                            @elseif($item->images()->first()->img) {{$item->images()->first()->img}}
                                            @else {{asset('/admin/dist/img/product/no-image.png')}} @endif" alt=""/>
                                            <h2>@if($item->new_price !==0) ${{$item->new_price}} @else
                                                    ${{$item->price}} @endif</h2>
                                            <p>{{ $item->name.' '.$item->brand->name}}</p>
                                            <a href="#" class="btn btn-default add-to-cart" data-id="{{$item->id}}"><i
                                                    class="fa fa-shopping-cart"></i> @if(session('cart_id') && \Cart::session(session('cart_id'))->get($item->id))
                                                    In The Cart @else  Add to cart @endif
                                            </a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>@if($item->new_price !==0) ${{$item->new_price}} @else
                                                        ${{$item->price}} @endif</h2>
                                                <p>{{  $item->name.' '.$item->brand->name}}</p>
                                                <a href="#" class="btn btn-default add-to-cart" data-id="{{$item->id}}"><i
                                                        class="fa fa-shopping-cart"></i> @if(session('cart_id') && \Cart::session(session('cart_id'))->get($item->id))
                                                        In The Cart @else  Add to cart @endif </a>
                                            </div>
                                        </div>
                                        @if($item->status == 0)
                                            <img src="{{ asset('user/images/home/new.png')}}" class="new" alt=""/>

                                        @elseif($item->sale == 1)
                                            <img src="{{ asset('user/images/home/sale.png')}}" class="new" alt=""/>
                                        @endif
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                            <li><a href="{{ route('product' ,$item->id) }}"><i class="far fa-eye"></i>Product
                                                    Details</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div><!--features_items-->
                    <div class="row">
                        <br> <a href="{{ route('all_product') }}">
                            <button type="button" class="btn btn-default get float-right" style="float: right;margin-top: -20px;margin-bottom: 30px!important;">
                                View All
                            </button>
                        </a>
                    </div>
                    <div class="category-tab"><!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#all" data-toggle="tab">all</a></li>
                                @foreach($names as $name)
                                    <li data-name="{{$name->name}}" class="product-name"><a href="#{{$name->name}}"
                                                                                            data-toggle="tab"
                                                                                            data-name="{{$name->name}}">{{$name->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="all">
                                @foreach($products as $product)
                                    @if ($loop->index == 8) @break @endif
                                    <div class="col-sm-3">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <a href="{{ route('product' ,$product->id) }}">
                                                        <img src="@if($product->mainImg()) {{$product->mainImg()}}
                                                        @elseif($product->images()->first()->img) {{$product->images()->first()->img}}
                                                        @else {{asset('/admin/dist/img/product/no-image.png')}} @endif"
                                                             alt=""/>
                                                    </a>
                                                    <h2>@if($product->new_price !==0) ${{$product->new_price}} @else
                                                            ${{$product->price}} @endif</h2>
                                                    <p>{{ $product->name.' '.$product->brand->name}}</p>
                                                    <a href="#" class="btn btn-default add-to-cart"
                                                       data-id="{{$product->id}}"><i class="fa fa-shopping-cart"></i>
                                                        @if(session('cart_id') && \Cart::session(session('cart_id'))->get($item->id))
                                                            In The Cart @else  Add to cart @endif </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                    <a href="{{ route('all_product') }}">
                                    <button type="button" class="btn btn-default get float-right" style="float: right;margin-top: -20px;margin-bottom: 30px!important;">
                                        View All
                                    </button>
                                    </a>
                            </div>
                            @foreach($names as $name)
                                <div class="tab-pane fade" id="{{$name->name}}">

                                </div>

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('css')
@endpush
@push('js')
    <script>

        $(function () {
            $('.product-name').click(function () {
                let name = $(this).data("name");
                $.ajax({
                    url: '{{ route('product_by_name') }}',
                    type: "POST",
                    data: {name: name},
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },

                    success: function (data) {
                        $('#' + name).html(data);
                        $('#' + name).addClass('active in');
                    },
                    error: function (msg) {

                    }

                });
            });

        })

    </script>
@endpush


