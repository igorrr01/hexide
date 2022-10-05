<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="/public/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/public/vendor/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="/public/vendor/adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script src="/public/vendor/jquery/jquery.min.js"></script>
    <script src="/public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/public/vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="/public/vendor/adminlte/dist/js/adminlte.min.js"></script>
</head>

<body class="sidebar-mini">
    <div class="wrapper">
        @include('layouts.leftbar')
        @yield('content')
    </div>
</body>

</html>