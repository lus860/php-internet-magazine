<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$title}}</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css')}}">

{{--    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css')}}">--}}
{{--    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">--}}
{{--    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css')}}">--}}
{{--    <!-- AdminLTE Skins. Choose a skin from the css/skins--}}
{{--         folder instead of downloading all of them to reduce the load. -->--}}
{{--    <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css')}}">--}}

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <style>
        .alert{
            position: absolute;
            padding-right: 55px;
            width: 300px;
            margin-top: 40px;
            border-radius: 15px;
            background-color: #FFF;
            color: #283896;
            -webkit-box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.75);
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.75);
            display: none;
        }
        /*alert-success*/
        .alert-success button{
            background-color: #468847;
            color:#FFF;
        }

        .alert-success hr{
            border-color: #FFF;
        }
        /**/
        /*alert-warning*/
        .alert-warning button{
            background-color: #E5A218;
            color:#FFF;
        }

        .alert-warning hr{
            border-color: #E5A218;
        }
        /**/
        /*alert-error*/
        .alert-error button{
            background-color: #FF0000;
            color:#FFF;
        }

        .alert-error hr{
            border-color: #FFF;
        }
        /**/

        .hr-alert {
            margin-top: 0px;
            margin-bottom: 10px;
            border: 0;
            border-top: 4px solid #eee;
        }

        .btn-circle {
            width: 20px;
            height: 20px;
            text-align: center;
            padding: 5px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px;
        }
        .btn-circle.btn-lg {
            width: 50px;
            height: 50px;
            padding: 10px 16px;
            font-size: 18px;
            line-height: 1.33;
            border-radius: 25px;
        }
        .btn-circle.btn-xl-alert  {
            width: 50px;
            height: 50px;
            padding: 10px;
            /*font-size: 24px;*/
            line-height: 1.33;
            border-radius: 35px;
            cursor:default;
            transition: background-color 1s, color 1s;
        }

        .btn-float-alert{
            position: absolute;
            right:-20px;
            top:-20px;
        }

        .pull-right {
            position: absolute;
            right: 5%;
        }
    </style>
    <![endif]-->
    @stack('css')
</head>
<body>
@yield('content')
<script>
    $(document).ready(function () {

        $('.alert').fadeIn();

        setTimeout(function(){
            $('.alert').fadeOut()
        }, 7000);

    });
</script>
<script src="{{ asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.min.js')}}"></script>

</body>
</html>
