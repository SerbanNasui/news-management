<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/jqvmap/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-lte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/summernote/summernote-bs4.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="admin-lte/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>
    <x-back-office.navbar></x-back-office.navbar>
    <x-back-office.sidebar></x-back-office.sidebar>


    <div class="content-wrapper">
        @yield('content')
    </div>

    <x-back-office.footer></x-back-office.footer>
</div>
<script src="{{ asset('admin-lte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{ asset('admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/sparklines/sparkline.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('admin-lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('admin-lte/dist/js/adminlte.js') }}"></script>
<script src="{{ asset('admin-lte/dist/js/demo.js') }}"></script>
<script src="{{ asset('admin-lte/dist/js/pages/dashboard.js') }}"></script>
</body>
</html>
