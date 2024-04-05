<!doctype html>
<html lang="en">
<head>
    <title>Dashboard - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
    <script defer data-api="/stats/api/event" data-domain="preview.tabler.io" src="/stats/js/script.js"></script>
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon"/>
    <!-- CSS files -->
    <link href="{{ asset('tabler/css/tabler.min.css?1695847769') }}" rel="stylesheet"/>
    <link href="{{ asset('tabler/css/tabler-flags.min.css?1695847769') }}" rel="stylesheet"/>
    <link href="{{ asset('tabler/css/tabler-payments.min.css?1695847769') }}" rel="stylesheet"/>
    <link href="{{ asset('tabler/css/tabler-vendors.min.css?1695847769') }}" rel="stylesheet"/>
    <link href="{{ asset('tabler/css/demo.min.css?1695847769') }}" rel="stylesheet"/>
    <style>
        @import url('https://rsms.me/inter/inter.css');
        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>
<body>
    <script src="{{ asset('tabler/js/demo-theme.min.js?1695847769') }}"></script>
    <div class="page">
        <!-- Sidebar -->
        @include('layouts.admin.sidebar')
        <!-- Navbar -->
        @include('layouts.admin.header')
        <div class="page-wrapper">
            <!-- isi sesuai dengan dashboard -->

            @yield('content')

            @include('layouts.admin.footer')
        </div>
    </div>
    <!-- Libs JS -->
    <script src="{{ asset('tabler/libs/apexcharts/dist/apexcharts.min.js?1695847769') }}" defer></script>
    <script src="{{ asset('tabler/libs/jsvectormap/dist/js/jsvectormap.min.js?1695847769') }}" defer></script>
    <script src="{{ asset('tabler/libs/jsvectormap/dist/maps/world.js?1695847769') }}" defer></script>
    <script src="{{ asset('tabler/libs/jsvectormap/dist/maps/world-merc.js?1695847769') }}" defer></script>
    <!-- Tabler Core -->
    <script src="{{ asset('tabler/js/tabler.min.js?1695847769') }}" defer></script>
    <script src="{{ asset('tabler/js/demo.min.js?1695847769') }}" defer></script>
</body>
</html>
