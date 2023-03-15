<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('template-admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->nama }}</p>

                @if (Auth::user()->role == 'admin')
                    <a href="#"><i class="fa fa-circle text-success"></i> Admin</a>
                @elseif(Auth::user()->role == 'kasir')
                    <a href="#"><i class="fa fa-circle text-info"></i> Kasir</a>
                @elseif(Auth::user()->role == 'owner')
                    <a href="#"><i class="fa fa-circle text-primary"></i> Owner</a>
                @endif
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">Menu Utama</li>
            <li class="{{ $menu == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('dashboardAdmin') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="{{ $menu == 'member' ? 'active' : '' }}">
                <a href="{{ route('member') }}">
                    <i class="fa fa-users"></i> <span>Member</span>
                </a>
            </li>
            <li class="{{ $menu == 'user' ? 'active' : '' }}">
                <a href="{{ route('user') }}">
                    <i class="fa fa-users"></i> <span>Users</span>
                </a>
            </li>
            <li class="{{ $menu == 'outlet' ? 'active' : '' }}">
                <a href="{{ route('outlet') }}">
                    <i class="fa fa-home"></i> <span>Outlet</span>
                </a>
            </li>
            <li class="{{ $menu == 'paket' ? 'active' : '' }}">
                <a href="{{ route('paket') }}">
                    <i class="fa fa-archive"></i> <span>Paket</span>
                </a>
            </li>
            <li class="{{ $menu == 'transaksi' ? 'active' : '' }}">
                <a href="{{ route('transaksi') }}">
                    <i class="fa fa-shopping-cart"></i> <span>Transaksi</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
