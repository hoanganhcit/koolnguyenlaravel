<aside class="sidebar">
    <a class="sidebar__brand" href="{{ route('admin.dashboard') }}"><span class="sidebar__brand-icon"></span>
        <div><strong>KOOL NGUYEN</strong><small>Studio Manager</small></div>
    </a>
    <p class="sidebar__label">Không gian làm việc</p>
    <nav class="sidebar__nav">
        <a class="{{ request()->routeIs('admin.dashboard') ? 'is-active' : '' }}"
            href="{{ route('admin.dashboard') }}"><i>⌂</i>Tổng quan</a>
        <a class="{{ request()->routeIs('admin.categories.*') ? 'is-active' : '' }}"
            href="{{ route('admin.categories.index') }}"><i>◫</i>Danh mục chụp hình</a>
        <a class="{{ request()->routeIs('admin.projects.*') ? 'is-active' : '' }}"
            href="{{ route('admin.projects.index') }}"><i>▧</i>Dự án đã chụp</a>
        <a class="{{ request()->routeIs('admin.post-categories.*') ? 'is-active' : '' }}"
            href="{{ route('admin.post-categories.index') }}"><i>◪</i>Danh mục bài viết</a>
        <a class="{{ request()->routeIs('admin.posts.*') ? 'is-active' : '' }}"
            href="{{ route('admin.posts.index') }}"><i>✎</i>Quản lý bài viết</a>
    </nav>
    <div class="sidebar__footer"><a href="{{ url('/') }}" target="_blank">Xem website ↗</a>
        <form method="POST" action="{{ route('admin.logout') }}">@csrf<button type="submit">Đăng xuất</button></form>
    </div>
</aside>
