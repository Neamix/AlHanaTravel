<div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="index.html">
                <i class="fa fa-fw fa-dashboard"></i>
                <span class="nav-link-text">Dashboard</span>
            </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Messages">
            <a class="nav-link" href="{{ route('hotel.index') }}">
                <i class="fa fa-fw fa-envelope-open"></i>
                <span class="nav-link-text">Hotels</span>
            </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Bookings">
            <a class="nav-link" href="{{ route('city.index') }}">
                <i class="fa fa-fw fa-calendar-check-o"></i>
                <span class="nav-link-text">Cities </span>
            </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My listings">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMylistings">
                <i class="fa fa-fw fa-list"></i>
                <span class="nav-link-text">My listings</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseMylistings">
                <li>
                    <a href="listings.html">Pending <span class="badge badge-pill badge-primary">6</span></a>
                </li>
                <li>
                    <a href="listings.html">Active <span class="badge badge-pill badge-success">6</span></a>
                </li>
                <li>
                    <a href="listings.html">Expired <span class="badge badge-pill badge-danger">6</span></a>
                </li>
            </ul>
        </li>
    </ul>
</div>