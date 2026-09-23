<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Kool Nguyen</title>
    <style>
        body { background: #111; color: #fff; font-family: Arial, sans-serif; margin: 0; }
        header { align-items: center; border-bottom: 1px solid #333; display: flex; justify-content: space-between; padding: 22px 32px; }
        main { margin: 0 auto; max-width: 1100px; padding: 64px 32px; }
        h1 { font-size: 38px; font-weight: 400; }
        .muted { color: #aaa; }
        button { background: transparent; border: 1px solid #666; color: #fff; cursor: pointer; padding: 10px 16px; }
        button:hover { border-color: #fff; }
    </style>
</head>
<body>
    <header>
        <strong>Kool Nguyen Admin</strong>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit">Đăng xuất</button>
        </form>
    </header>
    <main>
        <p class="muted">Xin chào, {{ auth()->user()->name }}.</p>
        <h1>Dashboard</h1>
        <p>Khu vực quản trị đã được bảo vệ bằng tài khoản admin.</p>
    </main>
</body>
</html>
