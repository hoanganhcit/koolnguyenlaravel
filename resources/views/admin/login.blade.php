<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập quản trị | Kool Nguyen</title>
    <link rel="stylesheet" href="{{ asset('public/FE/style/login.css') }}">
    <!-- Favicons -->
	<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('public/FE/images/favicons/apple-touch-icon-144x144.png') }}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('public/FE/images/favicons/apple-touch-icon-114x114.png') }}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('public/FE/images/favicons/apple-touch-icon-72x72.png') }}">
	<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('public/FE/images/favicons/apple-touch-icon-57x57.png') }}">
	<link rel="shortcut icon" href="{{ asset('public/FE/images/favicons/favicon.png') }}" type="image/png">

</head>
<body>
    <main class="admin-login">
        <section class="admin-login__visual">
            <a href="{{ url('/') }}" class="brand" title="Kool Nguyen – Photography / Visual stories">
                <span class="brand-name">Kool Nguyen</span>
                <span class="brand-tagline">Photography / Visual stories</span>
            </a>
            <div class="visual-copy">
                <p class="overhead">Private workspace</p>
                <h1>Shape the story<br>behind every frame.</h1>
                <p>Enter the studio space to manage your visual work and keep every detail in focus.</p>
            </div>
        </section>
        <section class="admin-login__panel">
            <div class="login">
                <p class="login__eyebrow">Kool Nguyen / Admin</p>
                <h1>Đăng nhập</h1>
                <p class="login__intro">Đăng nhập để quản lý nội dung và bộ sưu tập hình ảnh.</p>
                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus>
                    @error('email') <div class="error">{{ $message }}</div> @enderror
                    <label for="password">Mật khẩu</label>
                    <input id="password" name="password" type="password" required>
                    <label class="remember"><input name="remember" type="checkbox" value="1"> Ghi nhớ đăng nhập</label>
                    <button type="submit">Vào trang quản trị</button>
                </form>
                <a class="login__back" href="{{ url('/') }}">← Quay lại website</a>
            </div>
        </section>
    </main>
</body>
</html>
