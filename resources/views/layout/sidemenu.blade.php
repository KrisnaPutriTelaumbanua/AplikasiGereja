<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-start" href="index.html">
        <div class="sidebar-brand-icon">
            <!-- Inline styling for red icon with white outline -->
            <i class="fas fa-church" style="color: red; text-shadow: -1px -1px 0 #ffffff, 1px -1px 0 #ffffff, -1px 1px 0 #ffffff, 1px 1px 0 #ffffff;"></i>
        </div>

        <div class="sidebar-brand-text mx-3">Christian Church</div>
    </a>

    <!-- Nav Item - Charts -->

{{--    <li class="nav-item" style="display: flex; align-items: center;">--}}
{{--        <a href="{{ url('/user/dashboard') }}" class="nav-link {{ Request::is('user/dashboard') ? 'btn btn-warning' : '' }}">--}}
{{--            <i class="nav-icon fas fa-th" style="margin-right: 5px;"></i>--}}
{{--            <span>Dashboard</span>--}}
{{--        </a>--}}
{{--    </li>--}}

    <li class="nav-item">
        <a href="{{ url('/kategori') }}" class="nav-link {{ Request::is('kategori') ? 'btn btn-warning' : '' }}">
            <i class="nav-icon fas fa-list"></i>
            <span>Kategori</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ url('/departemen') }}" class="nav-link {{ Request::is('departemen') ? 'btn btn-warning' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <span>Departemen</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ url('/subdepartemen') }}" class="nav-link {{ Request::is('subdepartemen') ? 'btn btn-warning' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <span>SubDepartemen</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ url('/pelayan') }}" class="nav-link {{ Request::is('pelayan') ? 'btn btn-warning' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <span>Pelayan</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ url('/ibadah') }}" class="nav-link {{ Request::is('ibadah') ? 'btn btn-warning' : '' }}">
            <i class="nav-icon fas fa-praying-hands"></i>
            <span>Ibadah</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ url('/pelayanIbadah') }}" class="nav-link {{ Request::is('pelayanIbadah') ? 'btn btn-warning' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <span>Pelayan Ibadah</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ url('/presensi') }}" class="nav-link {{ Request::is('presensi') ? 'btn btn-warning' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <span>Presensi</span>
        </a>
    </li>







</ul>
<!-- End of Sidebar -->
