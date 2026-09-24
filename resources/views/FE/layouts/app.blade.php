<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Kool Nguyen - Photography / Visual stories')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Kool Nguyen" />
    <meta name="keywords" content="@yield('keywords', '')" />
    <meta name="description" content="@yield('description', '')" />
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('public/FE/images/favicons/apple-touch-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('public/FE/images/favicons/apple-touch-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('public/FE/images/favicons/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('public/FE/images/favicons/apple-touch-icon-57x57.png') }}">
    <link rel="shortcut icon" href="{{ asset('public/FE/images/favicons/favicon.png') }}" type="image/png">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/FE/style/style.css') }}" />
    @stack('styles')
    <script src="{{ asset('public/FE/js/modernizr.custom.js') }}" type="text/javascript"></script>
</head>
<body>
    <div class="loading animated">
        <div class="loading-wrap animated bounceInLeft">
            <span class="logotype animated infinite bounceIn">Kool Nguyen</span>
            <span class="loading-tagline">Photography / Visual stories</span>
        </div>
    </div>

    @include('FE.layouts.header')
    @yield('content')
    @include('FE.layouts.newsletter')
    @include('FE.layouts.footer')

    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">
            <div class="pswp__container"><div class="pswp__item"></div><div class="pswp__item"></div><div class="pswp__item"></div></div>
            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar"><div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button><button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button><button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button><div class="pswp__preloader"><div class="pswp__preloader__icn"><div class="pswp__preloader__cut"><div class="pswp__preloader__donut"></div></div></div></div></div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap"><div class="pswp__share-tooltip"></div></div>
                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button><button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                <div class="pswp__caption"><div class="pswp__caption__center"></div></div>
            </div>
        </div>
    </div>
    <div id="wave"></div>
    @stack('scripts')
    <script src="{{ asset('public/FE/js/jquery-3.1.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/FE/js/plugins.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/FE/js/siriwave.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/FE/js/common.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/FE/js/index.js') }}" type="text/javascript"></script>
</body>
</html>
