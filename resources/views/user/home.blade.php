@extends('user/layouts.app')

@section('content')
    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach($productSale as $item)
                            <li data-target="#slider-carousel" data-slide-to="{{$item->id}}" class="@if ($loop->first) active @endif"></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($productSale as $item)
                            <div class="item  @if ($loop->first) active @endif">
                                <div class="col-sm-6">
                                    <h1><span>SALE</span></h1>
                                    <h2>{{'$'.$item->price}}</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get"><a href="{{ route('product' ,$item->id) }}">Product Details</a></button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{$item->img }}" class="girl img-responsive" alt=""/>
                                </div>
                            </div>
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
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{ $item->img}}" alt="" />
                                        <h2>{{ '$'.$item->price}}</h2>
                                        <p>{{ $item->name.' '.$item->brand->name}}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>{{ '$'.$item->price}}</h2>
                                            <p>{{  $item->name.' '.$item->brand->name}}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                    @if($item->status == 1)
                                        <img src="{{ asset('user/images/home/new.png')}}" class="new" alt="" />

                                    @elseif($item->sale == 1)
                                        <img src="{{ asset('user/images/home/sale.png')}}" class="new" alt="" />
                                    @endif
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href="{{ route('product' ,$item->id) }}"><i class="far fa-eye"></i>Product Details</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div><!--features_items-->
                    <div class="category-tab"><!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#all" data-toggle="tab">all</a></li>
                            @foreach($names as $name)
                                <li data-name="{{$name->name}}" class="product-name"><a href="#{{$name->name}}" data-toggle="tab" data-name="{{$name->name}}">{{$name->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="all" >
                                @foreach($products as $product)
                                    @if ($loop->index == 8) @break @endif
                                    <div class="col-sm-3">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <a href="{{ route('product' ,$item->id) }}">
                                                    <img src="{{ $product->img}}" alt="" />
                                                    </a>
                                                    <h2>{{ '$'.$product->price}}</h2>
                                                    <p>{{ $product->name.' '.$product->brand->name}}</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @foreach($names as $name)
                                <div class="tab-pane fade" id="{{$name->name}}" >

                                </div>

                            @endforeach
                        </div>
                    </div><!--/category-tab-->

{{--                    <div class="recommended_items"><!--recommended_items-->--}}
{{--                        <h2 class="title text-center">recommended items</h2>--}}

{{--                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">--}}
{{--                            <div class="carousel-inner">--}}
{{--                                <div class="item active">--}}
{{--                                    <div class="col-sm-4">--}}
{{--                                        <div class="product-image-wrapper">--}}
{{--                                            <div class="single-products">--}}
{{--                                                <div class="productinfo text-center">--}}
{{--                                                    <img src="{{ asset('user/images/home/recommend1.jpg')}}" alt="" />--}}
{{--                                                    <h2>$56</h2>--}}
{{--                                                    <p>Easy Polo Black Edition</p>--}}
{{--                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-sm-4">--}}
{{--                                        <div class="product-image-wrapper">--}}
{{--                                            <div class="single-products">--}}
{{--                                                <div class="productinfo text-center">--}}
{{--                                                    <img src="{{ asset('user/images/home/recommend2.jpg')}}" alt="" />--}}
{{--                                                    <h2>$56</h2>--}}
{{--                                                    <p>Easy Polo Black Edition</p>--}}
{{--                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-sm-4">--}}
{{--                                        <div class="product-image-wrapper">--}}
{{--                                            <div class="single-products">--}}
{{--                                                <div class="productinfo text-center">--}}
{{--                                                    <img src="{{ asset('user/images/home/recommend3.jpg')}}" alt="" />--}}
{{--                                                    <h2>$56</h2>--}}
{{--                                                    <p>Easy Polo Black Edition</p>--}}
{{--                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="item">--}}
{{--                                    <div class="col-sm-4">--}}
{{--                                        <div class="product-image-wrapper">--}}
{{--                                            <div class="single-products">--}}
{{--                                                <div class="productinfo text-center">--}}
{{--                                                    <img src="{{ asset('user/images/home/recommend1.jpg')}}" alt="" />--}}
{{--                                                    <h2>$56</h2>--}}
{{--                                                    <p>Easy Polo Black Edition</p>--}}
{{--                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-sm-4">--}}
{{--                                        <div class="product-image-wrapper">--}}
{{--                                            <div class="single-products">--}}
{{--                                                <div class="productinfo text-center">--}}
{{--                                                    <img src="{{ asset('user/images/home/recommend2.jpg')}}" alt="" />--}}
{{--                                                    <h2>$56</h2>--}}
{{--                                                    <p>Easy Polo Black Edition</p>--}}
{{--                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-sm-4">--}}
{{--                                        <div class="product-image-wrapper">--}}
{{--                                            <div class="single-products">--}}
{{--                                                <div class="productinfo text-center">--}}
{{--                                                    <img src="{{ asset('user/images/home/recommend3.jpg')}}" alt="" />--}}
{{--                                                    <h2>$56</h2>--}}
{{--                                                    <p>Easy Polo Black Edition</p>--}}
{{--                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">--}}
{{--                                <i class="fa fa-angle-left"></i>--}}
{{--                            </a>--}}
{{--                            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">--}}
{{--                                <i class="fa fa-angle-right"></i>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div><!--/recommended_items-->--}}
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
                    data: { name: name },
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },

                    success: function (data) {
                        console.log(data)
                        $('#'+name).html(data);
                        $('#'+name).addClass('active in');
                    },

                    error: function (msg) {

                        alert('Ошибка');

                    }

                });
            });

        })

    </script>
@endpush


