<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
<head>
    <title>Доставка в ЛНР</title>
    <meta name="viewport" content="width=device-width height=device-height initial-scale=1.0">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Work+Sans:300,400,500,700%7CZilla+Slab:300,400,500,700,700i%7CGloria+Hallelujah">
    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    @vite(['resources/sass/app.scss','resources/css/style.css'])
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
</head>
<body>
<div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="{{ asset('images/ie8-panel/warning_bar_0000_us.jpg') }}" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
<div class="preloader">
    <div class="preloader-logo"><a class="brand" href="{{ route('main') }}"><img class="brand-logo-dark" src="{{ asset('images/logo-default-355x118.png') }}" alt="" width="177" height="59"/></a>
    </div>
    <div class="preloader-body">
        <div class="cssload-container">
            <div class="cssload-speeding-wheel"></div>
        </div>
    </div>
</div>
<div class="page">
    <!-- Page Header-->
    <!-- Page Header-->
    <header class="page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
            <nav class="rd-navbar rd-navbar-modern" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-body-class="rd-navbar-modern-linked" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
                <div class="rd-navbar-main-outer">
                    <div class="rd-navbar-main">
                        <div class="rd-navbar-nav-wrap">
                            <!-- RD Navbar Nav		-->
                            <ul class="rd-navbar-nav">
                                <li class="rd-nav-item"><a class="rd-nav-link" href="{{ route('main') }}">Главная</a>
                                </li>
                                <li class="rd-nav-item"><a class="rd-nav-link" href="{{ route('posts.index') }}">Новости</a>
                                </li>
                            </ul>

                        </div>

                    </div>

                </div>
                <div class="rd-navbar-aside-outer">
                    <div class="rd-navbar-aside">
                        <!-- RD Navbar Panel-->
                        <div class="rd-navbar-panel">
                            <!-- RD Navbar Toggle-->
                            <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                            <!-- RD Navbar Brand-->
                            <div class="rd-navbar-brand"><a class="brand" href="{{ route('main') }}"><img class="brand-logo-dark" src="{{ asset('images/logo-default-355x118.png') }}" alt="" width="177" height="59"/></a>
                            </div>
                        </div>
                        <div class="rd-navbar-collapse">
                            <button class="rd-navbar-collapse-toggle" data-rd-navbar-toggle=".rd-navbar-collapse-content"><span></span></button>
                            <div class="rd-navbar-collapse-content">
                                <div class="link-icon-title"><a class="link-icon-1" href="tel:#"><span class="icon mdi mdi-phone"></span><span>1-800-1234-567</span></a></div>
                                <div><a class="link-icon-1" href="mailto:#"><span class="icon mdi mdi-email-outline"></span><span>info@demolink.org</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>


    @yield('content')


    <!-- Page Footer-->
    <footer class="section footer-modern bg-gray-950">
        <div class="footer-modern-aside">
            <div class="container">
                <div class="layout-2">
                    <!-- Rights-->
                    <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span>. All Rights Reserved. Design by <a href="https://www.templatemonster.com">TemplateMonster</a></p>
                </div>
            </div>
        </div>
    </footer>
</div>
<div class="snackbars" id="form-output-global"></div>
<script src="{{ asset('js/core.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
