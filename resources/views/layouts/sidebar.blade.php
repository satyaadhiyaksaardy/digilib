<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">

            <img src="{{ auth()->user()->avatar }}" alt="user-img" title="Mat Helme"
                class="rounded-circle img-thumbnail avatar-md">
            <div class="dropdown">
                <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown"
                    aria-expanded="false">{{ auth()->user()->name }}</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="{{ route('logout') }}" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Keluar</span>
                    </a>

                </div>
            </div>

            <p class="text-muted left-user-info">{{ auth()->user()->is_admin ? 'Administrator' : 'Pustakawan' }}</p>

        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigasi</li>

                <li>
                    <a href="{{ route('books.index') }}">
                        <i class="mdi mdi-book-education"></i>
                        <span> Buku </span>
                    </a>
                </li>

                @if (auth()->user()->is_admin)
                    <li>
                        <a href="{{ route('book-categories.index') }}">
                            <i class="mdi mdi-book-cog"></i>
                            <span> Kategori Buku </span>
                        </a>
                    </li>
                @endif

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
