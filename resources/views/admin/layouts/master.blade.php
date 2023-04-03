<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Page Title -->
    <title>@yield('title')</title>

    <!-- Meta Data -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon"
          href=""/>

    <!-- Web Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap"
        rel="stylesheet"> --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400&display=swap" rel="stylesheet"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
        <style>
         
         body{
            font-family: 'Cairo', sans-serif;
         }
    
        </style>

    <!-- ======= BEGIN GLOBAL MANDATORY STYLES ======= -->
    <link href="{{asset('assets/admin-module')}}/css/material-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/admin-module')}}/css/bootstrap.min.css"/>
    <link rel="stylesheet"
    href="{{asset('assets/admin-module')}}/plugins/perfect-scrollbar/perfect-scrollbar.min.css"/>
    <!-- ======= END BEGIN GLOBAL MANDATORY STYLES ======= -->

    <!-- ======= BEGIN PAGE LEVEL PLUGINS STYLES ======= -->
    {{-- <link rel="stylesheet" href="{{asset('assets/admin-module')}}/plugins/apex/apexcharts.css"/>
    <link rel="stylesheet" href="{{asset('assets/admin-module')}}/plugins/select2/select2.min.css"/> --}}
    <!-- ======= END BEGIN PAGE LEVEL PLUGINS STYLES ======= -->

    
    {{-- <link rel="stylesheet" href="{{asset('public/assets/admin-module')}}/css/toastr.css"> --}}
    <!-- ======= MAIN STYLES ======= -->
    <link rel="stylesheet" href="{{asset('assets/admin-module')}}/css/style.css"/>
    <link rel="stylesheet" href="{{asset('assets/admin-module')}}/css/dev.css"/>
    <!-- ======= END MAIN STYLES ======= -->

    @livewireStyles
    @stack('css_or_js')
</head>

<body style=" font-family: 'Cairo', sans-serif; font-size:15px">
<!-- Offcanval Overlay -->
<div class="offcanvas-overlay"></div>
<!-- Offcanval Overlay -->

<!-- Preloader -->
<div class="preloader"></div>
<!-- End Preloader -->

<!-- Header -->
@include('admin.layouts.partials._header')
<!-- End Header -->

<!-- Aside -->
@include('admin.layouts.partials._aside')
<!-- End Aside -->

<!-- Settings Sidebar -->
@include('admin.layouts.partials._settings-sidebar')
<!-- End Settings Sidebar -->

<!-- Wrapper -->
<main class="main-area">
    <!-- Main Content -->
@yield('content')
<!-- End Main Content -->

    <!-- Footer -->
@include('admin.layouts.partials._footer')
<!-- End Footer -->
</main>
<!-- End wrapper -->
<!-- ======= BEGIN GLOBAL MANDATORY SCRIPTS ======= -->
<script src="{{asset('assets/admin-module')}}/js/jquery-3.6.0.min.js"></script>
<script src="{{asset('assets/admin-module')}}/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/admin-module')}}/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="{{asset('assets/admin-module')}}/js/main.js"></script>
<!-- ======= BEGIN GLOBAL MANDATORY SCRIPTS ======= -->

<!-- ======= BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS ======= -->


{{--toastr and sweetalert--}}



@livewireScripts
@stack('script')
</body>

</html>
