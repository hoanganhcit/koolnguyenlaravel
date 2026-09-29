<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') | {{ $siteSettings['site_title'] ?? 'Kool Nguyen' }}</title>
    <!-- Favicons -->
	<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('public/FE/images/favicons/apple-touch-icon-144x144.png') }}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('public/FE/images/favicons/apple-touch-icon-114x114.png') }}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('public/FE/images/favicons/apple-touch-icon-72x72.png') }}">
	<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('public/FE/images/favicons/apple-touch-icon-57x57.png') }}">
	<link rel="shortcut icon" href="{{ asset('public/FE/images/favicons/favicon.png') }}" type="image/png">

    <link rel="stylesheet" href="{{ asset('public/FE/style/admin.css') }}?v={{ filemtime(public_path('FE/style/admin.css')) }}">
    @stack('styles')
</head>
<body class="admin-shell">
    <div class="admin-layout">
        @include('admin.partials.sidebar')
        <main class="admin-content">
            <header class="topbar">
                <span>@yield('eyebrow', 'Kool Nguyen / Admin')</span>
                <div class="topbar__user">{{ auth()->user()->name }} <span class="user-dot"></span></div>
            </header>
            <div class="content-inner">
                @if (session('success')) <div class="flash flash--success">{{ session('success') }}</div> @endif
                @if ($errors->any()) <div class="flash flash--error">{{ $errors->first() }}</div> @endif
                @yield('content')
            </div>
        </main>
    </div>
    @stack('scripts')
</body>
</html>
