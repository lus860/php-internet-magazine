<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <title></title>
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
    @stack('styles')
    <style>

    </style>
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
</header>
@yield('content')

<footer id="footer"><!--Footer-->
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
<script src="{{ asset('user/js/jquery.js')}}"></script>
<script src="{{ asset('user/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('user/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{ asset('user/js/price-range.js')}}"></script>
<script src="{{ asset('user/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{ asset('user/js/main.js')}}"></script>
</body>
</html>
