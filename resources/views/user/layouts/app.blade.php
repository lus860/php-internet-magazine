<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <title>{{$title}}</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="{{ asset('user/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('user/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('user/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{ asset('user/css/price-range.css')}}" rel="stylesheet">
    <link href="{{ asset('user/css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('user/css/main.css')}}" rel="stylesheet">
    <link href="{{ asset('user/css/responsive.css')}}" rel="stylesheet">
    <link href="{{ asset('user/flags/css/flag-icon.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{ asset('user/js/html5shiv.js')}}"></script>
    <script src="{{ asset('user/js/respond.min.js')}}"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{ asset('user/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('user/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('user/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('user/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('user/images/ico/apple-touch-icon-57-precomposed.png')}}">
    @stack('css')
    <style>
        @media (min-width: 992px){
            .dropdown-menu .dropdown-toggle:after{
                border-top: .3em solid transparent;
                border-right: 0;
                border-bottom: .3em solid transparent;
                border-left: .3em solid;
            }
            .dropdown-menu .dropdown-menu{
                margin-left:0; margin-right: 0;
            }
            .dropdown-menu li{
                position: relative;
            }
            .nav-item .submenu{
                display: none;
                position: absolute;
                left:100%; top:-7px;
            }
            .nav-item .submenu-left{
                right:100%; left:auto;
            }
            .dropdown-menu > li:hover{ background-color: #B4B1AB;}
            .dropdown-menu > li:hover > .submenu{
                display: block;
                color:black!important;
            }
            .navbar-nav li ul.sub-menu li a:hover {
                color:black!important;}
        }
    </style>
    <script>

        $(document).on('click', '.dropdown-menu', function (e) {
            e.stopPropagation();
        });

        // make it as accordion for smaller screens
        if ($(window).width() < 992) {
            $('.dropdown-menu a').click(function(e){
                e.preventDefault();
                if($(this).next('.submenu').length){
                    $(this).next('.submenu').toggle();
                }
                $('.dropdown').on('hide.bs.dropdown', function () {
                    $(this).find('.submenu').hide();
                })
            });
        }
    </script>
</head><!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="/"><img src="{{ asset('user/images/home/logo.png')}}" alt="" /></a>
                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                            <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            <li><a href="{{ route('cart_product')}}"><i class="fa fa-shopping-cart"></i> Cart (<span id="cart-qty">{{ session('cart_id')? \Cart::session(session('cart_id'))->getTotalQuantity():0}}</span>)</a></li>
                            @guest
                            <li><a href="{{ route('user_login')}}"><i class="fa fa-lock"></i>{{__('auth.sign_in')}}</a></li>
                                @if (Route::has('register'))
                                    <li>
                                        <a href="{{ route('user_signup') }}"><i class="fa fa-lock"></i>{{__('auth.sign_up')}}</a>
                                    </li>
                                @endif
                            @else
                                <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-lock"></i>
                                    {{__('auth.logout')}}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                </li>
                            @endguest
                            @foreach(\App\Models\Language::getAll() as $language)
                                <li>
                                    <a class="dropdown-item"
                                       href="{{ url(Localization::getUrlWithLocale($language->iso)) }}">
                                        <span class="flag-icon flag-icon-{{$language->iso}}"></span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->
    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <div class="collapse navbar-collapse" id="main_nav">
{{--                            <ul class="nav navbar-nav collapse navbar-collapse">--}}
{{--                                @foreach($active_menu as $submenu)--}}
{{--                                    @if($submenu->parent_id ==0)--}}
{{--                                        @if(count($submenu->childrens()->where('status', 1)->get())==0)--}}
{{--                                            <li class="nav-item"><a class="nav-link" href="{{$submenu->url}}"> {{$submenu->name}}</a>--}}
{{--                                            </li>--}}
{{--                                        @elseif(count($submenu->childrens()->where('status', 1)->get())>0)--}}
{{--                                            <li class="nav-item dropdown">--}}
{{--                                                <a class="nav-link dropdown-toggle" href="{{$submenu->url}}" data-toggle="dropdown">  {{$submenu->name}}--}}
{{--                                                    <i class="fa fa-angle-down"></i></a>--}}
{{--                                                <ul class="dropdown-menu sub-menu">--}}
{{--                                                    @foreach($submenu->childrens as $item)--}}
{{--                                                        @if(count($item->childrens()->where('status', 1)->get())==0)--}}
{{--                                                            <li><a class="dropdown-item" href="{{$item->url}}"> {{$item->name}} </a>--}}
{{--                                                            </li>--}}
{{--                                                        @else--}}
{{--                                                            <li><a class="dropdown-item" href="{{$item->url}}"> {{$item->name}} <i class="fa fa-angle-down"></i></a>--}}
{{--                                                                @include('user/includes.dropdown_menu',['items' => $item->childrens()->where('status', 1)->get()])--}}
{{--                                                            </li>--}}
{{--                                                        @endif--}}
{{--                                                    @endforeach--}}
{{--                                                </ul>--}}
{{--                                        @endif--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

@yield('content')

<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span>e</span>-shopper</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="{{ asset('user/images/home/iframe1.png')}}" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="{{ asset('user/images/home/iframe2.png')}}" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="{{ asset('user/images/home/iframe3.png')}}" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="{{ asset('user/images/home/iframe4.png')}}" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="address">
                        <img src="{{ asset('user/images/home/map.png')}}" alt="" />
                        <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Service</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Online Help</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Order Status</a></li>
                            <li><a href="#">Change Location</a></li>
                            <li><a href="#">FAQ’s</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Quock Shop</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">T-Shirt</a></li>
                            <li><a href="#">Mens</a></li>
                            <li><a href="#">Womens</a></li>
                            <li><a href="#">Gift Cards</a></li>
                            <li><a href="#">Shoes</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Policies</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privecy Policy</a></li>
                            <li><a href="#">Refund Policy</a></li>
                            <li><a href="#">Billing System</a></li>
                            <li><a href="#">Ticket System</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Company Information</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Store Location</a></li>
                            <li><a href="#">Affillate Program</a></li>
                            <li><a href="#">Copyright</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Get the most recent updates from <br />our site and be updated your self...</p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->
@stack('js')
<script>

    $(function () {

        $('.tooltip-inner').bind('DOMSubtreeModified' ,function (e) {

            let range = $(this).html();

            console.log(range);
            $.ajax({
                url: '{{ route('product_by_range') }}',
                type: "POST",
                data: { range: range },
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },

                success: function (data) {
                    console.log(data)
                    $('#slider').hide();
                    $('#products').html(data);
                },

                error: function (msg) {

                }
            });
        });


        $('.add-to-cart').click(function (event) {
            event.preventDefault()
            let qty = parseInt($('#quantity_input').val())
            let id = $(this).data("id");

            $.ajax({
                url: '{{ route('product_to_cart') }}',
                type: "POST",
                data: { id: id ,qty: qty?qty:1},
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },

                success: function (data) {
                    let total_qty = parseInt($('#cart-qty').text())
                    total_qty += qty ? qty:1
                    $('#cart-qty').text(total_qty)
                    console.log(data)
                },
                error: function (msg) {

                }
            });
        });

        $('#quantity_button').click(function (event) {
            event.preventDefault()
            let qty = parseInt($('#quantity_input').val())
            let id = $(this).data("id");

            $.ajax({
                url: '{{ route('product_to_cart') }}',
                type: "POST",
                data: { id: id ,qty: qty?qty:1},
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },

                success: function (data) {
                    let total_qty = parseInt($('#cart-qty').text())
                    total_qty += qty ? qty:1
                    $('#cart-qty').text(total_qty)
                    console.log(data)
                },
                error: function (msg) {

                }
            });
        });

        $(".cart_quantity_input").on("change", function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let id = $(this).data("id")
            var formData = {
                quantity: $(this).val(),
                id: id
            };
            var type = "POST";
            var ajaxurl = "{{ route('update_cart') }}";
            $.ajax({
                type: type,
                url: ajaxurl,
                data: formData,
                success: function (data) {
                    location.reload();
                    return false;
                },
                error: function (data) {
                    console.log(data);
                }

            })
        });

    })
</script>
<script src="{{ asset('user/js/jquery.js')}}"></script>
<script src="{{ asset('user/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('user/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{ asset('user/js/price-range.js')}}"></script>
<script src="{{ asset('user/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{ asset('user/js/main.js')}}"></script>
</body>
</html>
