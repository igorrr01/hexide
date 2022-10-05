<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="QOhLIaP0qkEK2ORKtdagSRXpW6OWxTutb4YF97rn">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="/public/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/public/vendor/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="/public/vendor/adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!--     <link rel="stylesheet" href="/css/admin_custom.css">-->
    <script src="/public/vendor/jquery/jquery.min.js"></script>
    <script src="/public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/public/vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="/public/vendor/adminlte/dist/js/adminlte.min.js"></script>
</head>

<body class="sidebar-mini">
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img src="/public/vendor/adminlte/dist/img/AdminLTELogo.png" class="animation__shake" alt="AdminLTE Preloader Image" width="60" height="60">
        </div>
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#">
                        <i class="fas fa-bars"></i>
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <span>
                            {{ Auth::user()->name }}
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <li class="user-footer">
                            <a class="btn btn-default btn-flat float-right  btn-block " href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-fw fa-power-off text-red"></i>
                                Log Out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="http://hexide.task/home" class="brand-link ">
                <img src="/public/vendor/adminlte/dist/img/AdminLTELogo.png" alt="Admin Logo" class="brand-image img-circle elevation-3" style="opacity:.8">
                <span class="brand-text font-weight-light ">
                    <b>Admin</b>LTE
                </span>
            </a>
            <div class="sidebar">
                <nav class="pt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu">
                        <li class="nav-header ">
                            {{__('admin.admin_panel')}}
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  " href="http://hexide.task/admin/users/index">
                                <i class="fas fa-fw fa-user "></i>
                                <p>{{__('admin.users')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  " href="http://hexide.task/admin/products/index">
                                <i class="fas fa-archive "></i>
                                <p>{{__('admin.products')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  " href="http://hexide.task/admin/orders/index">
                                <i class="fas fa-shopping-cart "></i>
                                <p>{{__('admin.orders')}}</p>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="flag-icon flag-icon-{{Config::get('languages')[App::getLocale()]['flag-icon']}}"></span> {{ Config::get('languages')[App::getLocale()]['display'] }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                <a class="dropdown-item" style="color: black;" href="{{ route('lang.switch', $lang) }}"><span class="flag-icon flag-icon-{{$language['flag-icon']}}"></span> {{$language['display']}}</a>
                                @endif
                                @endforeach
                            </div>
                        </li>
                        <a class="btn btn-primary" href="{{ route('seed.user') }}" role="button" style="color: white;">{{__('admin.seed_users')}}</a>
                        <span style="color: grey;">({{__('admin.users_has_password')}} - 11111111)</span>
                        <a class="btn btn-primary" href="{{ route('seed.product') }}" role="button" style="color: white;">{{__('admin.seed_products')}}</a>
                        <a class="btn btn-primary mt-2" href="{{ route('seed.order') }}" role="button" style="color: white;">{{__('admin.seed_orders')}}</a>
                    </ul>
                </nav>
            </div>
        </aside>

        @yield('content')
    </div>
</body>

</html>