<aside class="sidebar">
    <a class="sidebar__brand" href="{{ route('admin.dashboard') }}">
        @if (!empty($siteSettings['site_logo']))
            <img src="{{ asset('public/storage/' . $siteSettings['site_logo']) }}" alt="{{ $siteSettings['site_title'] ?? 'Kool Nguyen' }}" style="max-height: 42px; max-width: 180px; object-fit: contain;">
        @else
            <span class="sidebar__brand-icon"></span>
            <div>
                <strong>{{ strtoupper($siteSettings['site_title'] ?? 'Kool Nguyen') }}</strong>
                <small>Studio Manager</small>
            </div>
        @endif
    </a>
    <p class="sidebar__label">Không gian làm việc</p>
    <nav class="sidebar__nav">
        <a class="{{ request()->routeIs('admin.dashboard') ? 'is-active' : '' }}"
            href="{{ route('admin.dashboard') }}"><i>⌂</i>Tổng quan</a>
        <a class="{{ request()->routeIs('admin.bookings.*') ? 'is-active' : '' }}"
            href="{{ route('admin.bookings.index') }}"><i>◷</i><span>Booking</span>
            @if ($pendingBookingCount > 0)
                <span class=" sidebar__badge">{{ $pendingBookingCount }}</span>
            @endif
        </a>
        <a class="{{ request()->routeIs('admin.categories.*') ? 'is-active' : '' }}"
            href="{{ route('admin.categories.index') }}"><i>◫</i>Danh mục chụp hình</a>
        <a class="{{ request()->routeIs('admin.projects.*') ? 'is-active' : '' }}"
            href="{{ route('admin.projects.index') }}"><i>▧</i>Dự án đã chụp</a>
        <a class="{{ request()->routeIs('admin.post-categories.*') ? 'is-active' : '' }}"
            href="{{ route('admin.post-categories.index') }}"><i>◪</i>Danh mục bài viết</a>
        <a class="{{ request()->routeIs('admin.posts.*') ? 'is-active' : '' }}"
            href="{{ route('admin.posts.index') }}"><i>✎</i>Quản lý bài viết</a>
        <a class="{{ request()->routeIs('admin.comments.*') ? 'is-active' : '' }}"
            href="{{ route('admin.comments.index') }}"><i>◌</i>Bình luận</a>
        <a class="{{ request()->routeIs('admin.settings.*') ? 'is-active' : '' }}"
            href="{{ route('admin.settings.index') }}"><i>⚙</i>Cài đặt</a>
    </nav>
    <div class="sidebar__footer"><a href="{{ url('/') }}" target="_blank">Xem website ↗</a>
        <form method="POST" action="{{ route('admin.logout') }}">@csrf<button type="submit">Đăng xuất</button></form>
    </div>
</aside>
