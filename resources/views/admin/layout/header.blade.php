<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo"><b>Admin</b>LTE</a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="text-center">
                    <a href="{{ route('logout') }}" class="btn btn-block btn-danger" id="tombol_logout" onclick="return confirm('Ada yakin ingin logout?')">Logout</a>
                </li>

            </ul>
        </div>
    </nav>
</header>
