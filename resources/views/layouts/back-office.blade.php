<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-lte/dist/css/adminlte.min.css') }}">
    @stack('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('admin-lte/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
    </div>
    <x-back-office.navbar></x-back-office.navbar>
    <x-back-office.sidebar></x-back-office.sidebar>


    <div class="content-wrapper">
        @yield('content')
    </div>

    <x-back-office.footer></x-back-office.footer>
</div>
<script src="{{ asset('admin-lte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin-lte/dist/js/adminlte.js') }}"></script>
@stack('scripts')
</body>
</html>
