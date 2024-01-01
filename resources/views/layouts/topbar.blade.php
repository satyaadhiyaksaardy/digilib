<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-end mb-0">

        <li class="dropdown notification-list topbar-dropdown">
            <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#"
                role="button" aria-haspopup="false" aria-expanded="false">
                <i class="fe-bell noti-icon"></i>
                @if (auth()->user()->unreadNotifications->count() > 0)
                    <span
                        class="badge bg-danger rounded-pill noti-icon-badge">{{ auth()->user()->unreadNotifications->count() }}</span>
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-lg">

                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5 class="m-0">
                        <span class="float-end">
                            <a href="{{ route('notifications.clear') }}" class="text-dark">
                                <small>Clear All</small>
                            </a>
                        </span>Notification
                    </h5>
                </div>

                <div class="noti-scroll" data-simplebar>
                    @foreach (auth()->user()->unreadNotifications as $notification)
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon">
                                <img src="{{ asset('images/favicon.svg') }}" class="img-fluid rounded-circle"
                                    width="36" alt="" />
                            </div>
                            <p class="notify-details">{{ $notification->data['user'] }}</p>
                            <p class="text-muted mb-0 user-msg">
                                <small>{{ $notification->data['message'] }}</small>
                            </p>
                        </a>
                    @endforeach
                </div>

            </div>
        </li>

        <li class="dropdown notification-list topbar-dropdown">
            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown"
                href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <img src="{{ auth()->user()->avatar }}" alt="user-image" class="rounded-circle">
                <span class="pro-user-name ms-1">
                    {{ explode(' ', auth()->user()->name)[0] }} <i class="mdi mdi-chevron-down"></i>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Selamat Datang! </h6>
                </div>

                <div class="dropdown-divider"></div>

                <!-- item-->
                <form action="{{ route('logout') }}" method="POST" enctype="application/x-www-form-urlencoded">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Keluar</span>
                    </button>
                </form>

            </div>
        </li>

    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="index.html" class="logo logo-light text-center">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="16">
            </span>
        </a>
        <a href="index.html" class="logo logo-dark text-center">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="16">
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
        <li>
            <button class="button-menu-mobile disable-btn waves-effect">
                <i class="fe-menu"></i>
            </button>
        </li>

        <li>
            <h4 class="page-title-main">Dashboard</h4>
        </li>

    </ul>

    <div class="clearfix"></div>

</div>
