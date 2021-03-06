<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

    {{--Style Add--}}

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('student/img/favicon.png') }}">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="{{ asset('student/css/normalize.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('student/css/bootstrap.min.css') }}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('student/css/main.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('student/css/animate.min.css') }}">
    <!-- Font-awesome CSS-->
    <link rel="stylesheet" href="{{ asset('student/css/font-awesome.min.css') }}">
    <!-- Owl Caousel CSS -->
    <link rel="stylesheet" href="{{ asset('student/vendor/OwlCarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('student/vendor/OwlCarousel/owl.theme.default.min.css') }}">
    <!-- Main Menu CSS -->
    <link rel="stylesheet" href="{{ asset('student/css/meanmenu.min.css') }}">
    <!-- nivo slider CSS -->
    <link rel="stylesheet" href="{{ asset('student/vendor/slider/css/nivo-slider.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('student/vendor/slider/css/preview.css') }}" type="text/css" media="screen" />
    <!-- Datetime Picker Style CSS -->
    <link rel="stylesheet" href="{{ asset('student/css/jquery.datetimepicker.css') }}">
    <!-- Magic popup CSS -->
    <link rel="stylesheet" href="{{ asset('student/css/magnific-popup.css') }}">
    <!-- Switch Style CSS -->
    <link rel="stylesheet" href="{{ asset('student/css/hover-min.css') }}">
    <!-- ReImageGrid CSS -->
    <link rel="stylesheet" href="{{ asset('student/css/reImageGrid.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('student/style.css') }}">
    <!-- Modernizr Js -->
    <script src="{{ asset('student/js/modernizr-2.8.3.min.js') }}"></script>
    @stack('cssCode')
</head>
<body>
    @include('sweetalert::alert')
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <!-- Main Body Area Start Here -->
    <div id="wrapper">
        @include('includes.header')
        @yield('content')
        @include('includes.footer')
    </div>
    <!-- Main Body Area End Here -->
    <!-- jquery-->
    <script src="{{ asset('student/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
    <!-- Plugins js -->
    <script src="{{ asset('student/js/plugins.js') }}" type="text/javascript"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('student/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- WOW JS -->
    <script src="{{ asset('student/js/wow.min.js') }}"></script>
    <!-- Nivo slider js -->
    <script src="{{ asset('student/vendor/slider/js/jquery.nivo.slider.js') }}" type="text/javascript"></script>
    <script src="{{ asset('student/vendor/slider/home.js') }}" type="text/javascript"></script>
    <!-- Owl Cauosel JS -->
    <script src="{{ asset('student/vendor/OwlCarousel/owl.carousel.min.js') }}" type="text/javascript"></script>
    <!-- Meanmenu Js -->
    <script src="{{ asset('student/js/jquery.meanmenu.min.js') }}" type="text/javascript"></script>
    <!-- Srollup js -->
    <script src="{{ asset('student/js/jquery.scrollUp.min.js') }}" type="text/javascript"></script>
    <!-- jquery.counterup js -->
    <script src="{{ asset('student/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('student/js/waypoints.min.js') }}"></script>
    <!-- Countdown js -->
    <script src="{{ asset('student/js/jquery.countdown.min.js') }}" type="text/javascript"></script>
    <!-- Isotope js -->
    <script src="{{ asset('student/js/isotope.pkgd.min.js') }}" type="text/javascript"></script>
    <!-- Magic Popup js -->
    <script src="{{ asset('student/js/jquery.magnific-popup.min.js') }}" type="text/javascript"></script>
    <!-- Gridrotator js -->
    <script src="{{ asset('student/js/jquery.gridrotator.js') }}" type="text/javascript"></script>
    <!-- Custom Js -->
    <script src="{{ asset('student/js/main.js') }}" type="text/javascript"></script>
    @stack('jsCode')
</body>
</html>
