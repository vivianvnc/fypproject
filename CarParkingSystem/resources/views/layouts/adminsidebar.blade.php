<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-name">{{ Auth::user()->name }}</div>
                    <a class="nav-link" href="{{ url('/admin') }}">
                        <div class="sb-nav-link-icon"><img src="speedometer2.svg"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Management</div>
                    <a class="nav-link" href="{{ url('/viewusers') }}" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><img src="person-fill.svg"></i></div>
                        Manage Users
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <a class="nav-link" href="{{ url('/viewreservations') }}" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><img src="pencil-square.svg"></div>
                        Manage Reservations
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <a class="nav-link" href="{{ url('/logout') }}" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><img src="logout.svg"></div>
                        Logout
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                </div>
            </div>
        </nav>
    </div>