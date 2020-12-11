<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Starter Page | Skote - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('qBackend/assets/images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('qBackend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{ asset('qBackend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{ asset('qBackend/assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('qBackend/assets/css/app.min.css') }}"  rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.css') }}"  rel="stylesheet" type="text/css">

</head>

<body data-sidebar="dark">

<!-- Begin page -->
<div id="layout-wrapper">

    <header id="page-topbar">
        @include('backend.layouts.header')
    </header>

    <!-- ========== Left Sidebar Start ========== -->

    <!-- Left Sidebar End -->
    @include('backend.layouts.sidebar')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        @include('backend.layouts.footer')
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<div class="right-bar">
    <div data-simplebar="" class="h-100">
        <div class="rightbar-title px-3 py-4">
            <a href="javascript:void(0);" class="right-bar-toggle float-right">
                <i class="mdi mdi-close noti-icon"></i>
            </a>
            <h5 class="m-0">Settings</h5>
        </div>

        <!-- Settings -->
        <hr class="mt-0">
        <h6 class="text-center mb-0">Choose Layouts</h6>

        <div class="p-4">
            <div class="mb-2">
                <img src="{{ asset('qbackend/assets/images/layouts/layout-1.jpg') }}" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="custom-control custom-switch mb-3">
                <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked="">
                <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
            </div>

            <div class="mb-2">
                <img src="{{ asset('qbackend/assets/images/layouts/layout-2.jpg') }}" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="custom-control custom-switch mb-3">
                <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsstyle="assets/css/bootstrap-dark.min.css" data-appstyle="assets/css/app-dark.min.css">
                <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
            </div>

            <div class="mb-2">
                <img src="{{ asset('qbackend/assets/images/layouts/layout-3.jpg') }}" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="custom-control custom-switch mb-5">
                <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appstyle="assets/css/app-rtl.min.css">
                <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
            </div>


        </div>

    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="{{ asset('qBackend/assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('qBackend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('qBackend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('qBackend/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('qBackend/assets/libs/node-waves/waves.min.js') }}"></script>
{{--<script src="{{ assets('qbackend/assets/libs/select2/js/select2.min.js') }}"></script>--}}

{{--<script src="{{ assets('qbackend/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>--}}
{{--<script src="{{ assets('qbackend/assets/libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>--}}
{{--<script src="{{ assets('qbackend/assets/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>--}}
{{--<script src="{{ assets('qbackend/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>--}}
{{--<script src="{{ assets('qbackend/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>--}}
{{--<script src="{{ assets('qbackend/assets/libs/chenfengyuan/datepicker/datepicker.min.js') }}"></script>--}}

{{--<script src="{{ assets('qbackend/assets/js/pages/form-advanced.init.js') }}"></script>--}}
<script src="{{ asset('qBackend/assets/js/app.js') }}"></script>
@yield('script-footer-end')
</body>
</html>
