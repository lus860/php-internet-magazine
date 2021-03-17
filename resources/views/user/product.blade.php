@extends('user/layouts.app')

@section('content')
    <section id="advertisement">
        <div class="container">
            <img src="images/shop/advertisement.jpg" alt="" />
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    @include('user/includes.left_sidebar')
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="{{ $product->img}}" alt="" />
                                <h3>ZOOM</h3>
                            </div>
                            <div id="similar-product" class="carousel slide" data-ride="carousel">

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <a href=""><img src="{{ asset('user/images/product-details/similar1.jpg')}}" alt=""></a>
                                        <a href=""><img src="{{ asset('user/images/product-details/similar2.jpg')}}" alt=""></a>
                                        <a href=""><img src="{{ asset('user/images/product-details/similar3.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="item">
                                        <a href=""><img src="{{ asset('user/images/product-details/similar1.jpg')}}" alt=""></a>
                                        <a href=""><img src="{{ asset('user/images/product-details/similar2.jpg')}}" alt=""></a>
                                        <a href=""><img src="{{ asset('user/images/product-details/similar3.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="item">
                                        <a href=""><img src="{{ asset('user/images/product-details/similar1.jpg')}}" alt=""></a>
                                        <a href=""><img src="{{ asset('user/images/product-details/similar2.jpg')}}" alt=""></a>
                                        <a href=""><img src="{{ asset('user/images/product-details/similar3.jpg')}}" alt=""></a>
                                    </div>

                                </div>

                                <!-- Controls -->
                                <a class="left item-control" href="#similar-product" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a class="right item-control" href="#similar-product" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>

                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                @if($product->status == 1)
                                    <img src="{{ asset('user/images/product-details/new.jpg')}}" class="newarrival" alt="" />
                                @endif

                                <h2>{{ ucfirst( $product->name).' '. ucfirst( $product->brand->name)}} </h2>
                                <p>Web ID: {{$product->id}}</p>
                                <span>
									<span> {{'$'.$product->price}}</span>
									<label>Quantity:</label>
									<input type="text" value="" />
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
                                <p><b>Availability:</b> @if($product->quantity >0) Is Available @else Not Available @endif</p>
                                @if($product->sale == 1)
                                    <p><b>Condition:</b> Sale</p>
                                @endif

                                <p><b>Brand:</b> {{ucfirst( $product->brand->name)}}</p>
                                <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                            </div><!--/product-information-->
                        </div>
                    </div><!--/product-details-->

                    <div class="category-tab shop-details-tab"><!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#reviews" data-toggle="tab">Comments (5)</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="reviews" >
                                <div class="col-sm-12">
                                    <ul>
                                        <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                                        <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                        <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                    <p><b>Write Your Review</b></p>

                                    <form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
                                        <textarea name="" ></textarea>
                                        <button type="button" class="btn btn-default pull-right">
                                            Submit
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div><!--/category-tab-->



                </div>
            </div>
        </div>
    </section>
@endsection
@push('css')
@endpush
@push('js')
    <script>
    </script>
@endpush


