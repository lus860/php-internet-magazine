<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$title}}</title>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js')}}"></script>
    {{--    <script src="{{ asset('admin/dist/js/pages/dashboard2.js')}}"></script>--}}
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet"
          href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jqvmap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/toastr/toastr.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css')}}">
    <link href="{{ asset('admin/dist/css/nestable.css')}}" rel="stylesheet">

    @stack('css')
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

<div class="wrapper">
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="{{ asset('admin/dist/img/AdminLTELogo.png')}}" height="60" width="60">
    </div>
    <nav class="main-header navbar navbar-expand navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <div class="media">
                            <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">The subject goes here</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class=" nav-item dropdown user user-menu">
                <a href="#" class=" nav-link dropdown-toggle dropdown-item" data-toggle="dropdown">
                    <img src="{{ Auth::user()->image }}" class="user-image" alt="User Image">
                    <span class="dropdown-item-title">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="{{ Auth::user()->image }}" class="img-circle" alt="User Image">
                        <p>
                            {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                        </p>
                    </li>
                    <li class="user-footer">
                        <div class="" style="margin-top: 10px">
                            <a class="dropdown-item nav-link" href="{{ route('profile') }}"><i
                                    class="fas fa-cog m-r-5 m-l-5"></i> {{ __('app.profile_settings') }}</a>
                        </div>
                        <div class="" style="margin-top: 10px">
                            <a href="/" class="dropdown-item nav-link"><i
                                    class="fa fa-home m-r-5 m-l-5"></i> {{ __('app.view_site') }}</a>
                        </div>
                        <div class="" style="margin-top: 10px">
                            <a class="dropdown-item nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off m-r-5 m-l-5"></i> {{ __('app.logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="index3.html" class="brand-link">
            <img src="{{ asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>
        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            </div>
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                           aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item @if(url()->current() == route('admin_dashboard')) menu-open @endif">
                        <a href="{{ route('admin_dashboard')}}"
                           class="nav-link @if(url()->current() == route('admin_dashboard')) active @endif">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item @if(url()->current() == route('menu')) menu-open @endif">
                        <a href="{{ route('menu')}}"
                           class="nav-link @if(url()->current() == route('menu')) active @endif">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Menu
                            </p>
                        </a>
                    </li>
                    <li class="nav-item @if(url()->current() == route('products')) menu-open @endif">
                        <a href="{{ route('products')}}"
                           class="nav-link @if(url()->current() == route('products')) active @endif">
                            <i class="fab fa-product-hunt"></i>
                            <p>
                                Products
                            </p>
                        </a>
                    </li>
                    <li class="nav-item @if(url()->current() == route('categories')) menu-open @endif">
                        <a href="{{ route('categories')}}"
                           class="nav-link @if(url()->current() == route('categories')) active @endif">
                            <i class="fas fa-clipboard-list"></i>
                            <p>
                                Categories
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item @if(url()->current() == route('categories')) menu-open @endif">
                                <a href="{{ route('categories')}}"
                                   class="nav-link @if(url()->current() == route('categories')) active @endif">
                                    <i class="far fa-circle nav-icon"></i>

                                    <p>
                                        Categories
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item @if(url()->current() == route('subcategories')) menu-open @endif">
                                <a href="{{ route('subcategories')}}"
                                   class="nav-link @if(url()->current() == route('subcategories')) active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Subcategories
                                    </p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item @if(url()->current() == route('brands')) menu-open @endif">
                        <a href="{{ route('brands')}}"
                           class="nav-link @if(url()->current() == route('brands')) active @endif">
                            <i class="fas fa-star"></i>
                            <p>
                                Brand

                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Orders
                            </p>
                        </a>
                    </li>
                    <li class="nav-item @if(url()->current() == route('users')) menu-open @endif">
                        <a href="{{ route('users')}}"
                           class="nav-link @if(url()->current() == route('users')) active @endif">
                            <i class="fas fa-users"></i>
                            <p>
                                Users
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/gallery.html" class="nav-link">
                            <i class="fas fa-comments"></i>
                            <p>
                                Comments
                            </p>
                        </a>
                    </li>

                </ul>

            </nav>
        </div>
    </aside>
    <div class="content-wrapper">
        @yield('content')
    </div>
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.1.0-rc
        </div>
    </footer>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>
<script src="{{ asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
    $(function () {
        $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
        //Money Euro
        $('[data-mask]').inputmask()

        $('#reservationdate').datetimepicker({
            format: 'L'
        });
        $('#timepicker').datetimepicker({
            format: 'L'
        })
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        $("input[data-bootstrap-switch]").each(function () {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
        <?php if(session()->get('success')):?>
        toastr.success('<?php echo session()->get('success') ?>')
        <?php endif;?>
        <?php if(session()->get('error')):?>
        toastr.error('<?php echo session()->get('error') ?>')
        <?php endif;?>

    })

    window.setTimeout(function () {
        $("#alert-success").fadeTo(500, 0).slideUp(600, function () {
            $(this).remove();
        });
    }, 4000);

    window.setTimeout(function () {
        $("#alert-danger").fadeTo(500, 0).slideUp(600, function () {
            $(this).remove();
        });
    }, 4000);

    $.widget.bridge('uibutton', $.ui.button)
</script>
@stack('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="{{ asset('admin/dist/js/jquery.nestable.js')}}"></script>
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('admin/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{ asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{ asset('admin/plugins/sparklines/sparkline.js')}}"></script>
<script src="{{ asset('admin/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<script src="{{ asset('admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{ asset('admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('admin/plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{ asset('admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<script src="{{ asset('admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{ asset('admin/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{ asset('admin/dist/js/adminlte.js')}}"></script>
<script src="{{ asset('admin/dist/js/demo.js')}}"></script>
@stack('js')
</body>
</html>
