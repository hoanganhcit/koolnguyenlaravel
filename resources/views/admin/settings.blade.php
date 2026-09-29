@extends('admin.layouts.app')
@section('title', 'Cài đặt')
@section('eyebrow', 'Workspace / Settings')
@section('content')
    <div class="list-header">
        <div>
            <p class="eyebrow">Tùy chỉnh website</p>
            <h1>Cài đặt</h1>
            <p>Quản lý nhận diện website và bảo mật tài khoản quản trị.</p>
        </div>
    </div>

    <section class="content-section">
        <div class="section-heading">
            <div><p class="eyebrow">Nhận diện</p><h2>Tên website và logo</h2></div>
        </div>
        <form class="form-panel" method="POST" action="{{ route('admin.settings.appearance.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-grid">
                <div class="field field--full">
                    <label for="site_title">Tên website</label>
                    <input id="site_title" name="site_title" value="{{ old('site_title', $settings['site_title'] ?? 'Kool Nguyen') }}" required maxlength="120">
                </div>
                <div class="field field--full">
                    <label for="logo">Logo website</label>
                    <input id="logo" name="logo" type="file" accept="image/jpeg,image/png,image/webp,image/gif">
                    @if (!empty($settings['site_logo']))
                        <p><img src="{{ asset('public/storage/' . $settings['site_logo']) }}" alt="Logo hiện tại" style="max-width: 220px; max-height: 100px; object-fit: contain;"></p>
                    @endif
                </div>
            </div>
            @php($cancelUrl = route('admin.dashboard'))
            @php($submitLabel = 'Lưu nhận diện')
            @include('admin.partials.form-actions')
        </form>
    </section>

    <section class="content-section">
        <div class="section-heading">
            <div><p class="eyebrow">Bảo mật</p><h2>Đổi mật khẩu</h2></div>
        </div>
        <form class="form-panel" method="POST" action="{{ route('admin.settings.password.update') }}">
        @csrf
        @method('PUT')
        <div class="form-grid">
            <div class="field field--full">
                <label for="current_password">Mật khẩu hiện tại</label>
                <input id="current_password" name="current_password" type="password" autocomplete="current-password" required>
            </div>
            <div class="field">
                <label for="new_password">Mật khẩu mới</label>
                <input id="new_password" name="new_password" type="password" autocomplete="new-password" required minlength="8">
            </div>
            <div class="field">
                <label for="new_password_confirmation">Nhập lại mật khẩu mới</label>
                <input id="new_password_confirmation" name="new_password_confirmation" type="password" autocomplete="new-password" required minlength="8">
            </div>
        </div>
        @php($cancelUrl = route('admin.dashboard'))
        @php($submitLabel = 'Đổi mật khẩu')
        @include('admin.partials.form-actions')
        </form>
    </section>
@endsection