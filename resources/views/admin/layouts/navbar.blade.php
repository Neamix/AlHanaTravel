<nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html"><img src="{{ asset('img/logo.png') }}" alt="" width="150" height="36"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
        data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
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
                    <i class="fa fa-fw fa-list"></i>
                    <span class="nav-link-text">Hotels</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Bookings">
                <a class="nav-link" href="{{ route('city.index') }}">
                    <i class="fa fa-building" aria-hidden="true"></i>
                    <span class="nav-link-text">Cities </span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Bookings">
                <a class="nav-link" href="{{ route('slider.index') }}">
                     <i class="fa fa-building" aria-hidden="true"></i>
                    <span class="nav-link-text">Slider</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My listings">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMylistings">
                    <i class="fa fa-bed" aria-hidden="true"></i>
                    <span class="nav-link-text">Reservation</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseMylistings">
                    <li>
                        <a href="{{ route('book.index',['status' => 'pending']) }}">Pending <span class="badge badge-pill badge-primary">6</span></a>
                    </li>
                    <li>
                        <a href="{{ route('book.index',['status' => 'approve']) }}">Approved <span class="badge badge-pill badge-success">6</span></a>
                    </li>
                    <li>
                        <a href="{{ route('book.index',['status' => 'expired']) }}">Expired <span class="badge badge-pill badge-danger">6</span></a>
                    </li>
                    <li>
                        <a href="{{ route('book.index',['status' => 'cancelling']) }}">Cancelling request <span class="badge badge-pill badge-danger">6</span></a>
                    </li>
                </ul>
            </li>
            </li>
        </ul>
        </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">

        </ul>
    </div>
</nav>