<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-name">{{ Auth::user()->name }}</div>
                    <a class="nav-link" href="{{ url('/user') }}">
                        <div class="sb-nav-link-icon"><img src="speedometer2.svg" alt="speed-icon"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Management</div>
                    <a class="nav-link" href="{{ url('/edit') }}" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><img src="person-fill.svg" alt="person-icon"></i></div>
                        Edit Profile
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <a class="nav-link" href="{{ url('/reservation') }}" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><img src="pencil-square.svg" alt="pencil-square"></div>
                        View Reservations
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <a class="nav-link" href="{{ url('/makereservation') }}" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><img src="pencil-square.svg" alt="pencil-square"></div>
                        Make Reservations
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <a class="nav-link" href="{{ url('/logout') }}" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><img src="logout.svg" alt="logout-icon"></div>
                        Logout
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                </div>
            </div>
        </nav>
    </div>