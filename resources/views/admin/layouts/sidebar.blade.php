<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand mb-3 bg-primary">
            <a href="{{ route('admin.dashboard') }}"><img src="{{ asset('template/base-admin/dist/assets/figma-assets/LOGO.png') }}" width="150" alt="dimdevs-logo">
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}"><img src="{{ asset('template/base-admin/dist/assets/figma-assets/dimdevs-logo.png') }}" width="50" class="img-fluid" alt="dimdevs-logo"> </a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
            <li class="menu-header">Master Data</li>
            <li class="dropdown {{ request()->is('admin/collegers*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-archive"></i>
                <span>Menu</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->is('admin/collegers*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.collegers.index') }}">Data Mahasiswa</a></li>
                </ul>
            </li>

            @if (auth()->user()->role === 'super_admin')
            <li class="menu-header">Autentikasi</li>
            <li class="dropdown {{ request()->is('admin/super-admins*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-users-cog"></i>
                    <span>Pengguna</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ request()->is('admin/super-admins*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.super-admins.index') }}">Super Admin</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </aside>
</div>
