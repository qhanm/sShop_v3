<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login | Skote - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('qBackend/assets/images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('qBackend/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css">
    <!-- Icons Css -->
    <link href="{{ asset('qBackend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{ asset('qBackend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css">

</head>

<body>
    <div class="home-btn d-none d-sm-block">
        <a href="index.html" class="text-dark"><i class="fas fa-home h2"></i></a>
    </div>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    @yield('content')
                    <div class="mt-5 text-center">

                        <div>
                            <p>Don't have an account ? <a href="auth-register.html"
                                    class="font-weight-medium text-primary"> Signup now </a> </p>
                            <p>© 2020 Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('qBackend/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('qBackend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('qBackend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('qBackend/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('qBackend/assets/libs/node-waves/waves.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('qBackend/assets/js/app.js') }}"></script>
    <script src="{{ asset('qBackend/js/jquery.pjax.js') }}"></script>
    <script>
        $(document).ready(function() {
            if ($.support.pjax) {
                $.pjax.defaults.timeout = 1000; // time in milliseconds
                $.pjax.defaults.push = false;
            }
        });

    </script>

    @yield('endScript')
</body>

</html>
