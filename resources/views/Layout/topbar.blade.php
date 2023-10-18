<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-link d-none d-sm-inline-block"
                    href="/profile/password">
                    @lang('topbar.change_password')
                </a>
                <a class="nav-link d-none d-sm-inline-block"
                    href="/profile">
                    @lang('topbar.update_profile')
                </a>
                <a class="nav-link d-none d-sm-inline-block"
                    href="/logout">
                    Logout
                </a>
                <div class="btn-group">
                    <button class="btn {{session('locale') == 'id' ? 'btn-success' : 'btn-outline-secondary'}}" onclick="location.href='{{ url('set-language/id') }}'" checked>ID</button>
                    <button class="btn {{session('locale') == 'en' ? 'btn-success' : 'btn-outline-secondary'}}" onclick="location.href='{{ url('set-language/en') }}'">EN</button>
                </div>
            </li>
        </ul>
    </div>
</nav>

