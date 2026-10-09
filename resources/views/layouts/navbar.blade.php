<header class="navbar-custom">

    <div class="navbar-left">

        <button class="btn-desktop-toggle d-none d-xl-flex align-items-center justify-content-center me-3"
                id="desktop-sidebar-toggle"
                aria-label="Minimize Sidebar">

            <i class="bi bi-chevron-bar-left"></i>

        </button>


        <button class="sidebar-toggle-btn me-2"
                id="sidebar-toggle"
                aria-label="Toggle Navigation">

            <i class="bi bi-list"></i>

        </button>






    <div class="navbar-actions">

        <div class="dropdown ms-2">

            <button class="navbar-profile-btn dropdown-toggle"
                    type="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                    id="profile-dropdown">

                <img src="{{ asset('assets/images/avatar.png') }}"
                     alt="Profile Image"
                     class="navbar-profile-img">

                <span class="navbar-profile-name d-none d-md-inline">
                  {{ session('admin_name') }}
                </span>

                <i class="bi bi-chevron-down navbar-profile-caret"></i>

            </button>


            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-profile"
                aria-labelledby="profile-dropdown">

                <li class="dropdown-header">
                    Welcome !
                </li>

               

                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>

                    <form method="POST" action="{{ route('admin.logout') }}">

                        @csrf

                        <button type="submit"
                                class="dropdown-item text-danger">

                            <i class="bi bi-box-arrow-right"></i>
                            Logout

                        </button>

                    </form>

                </li>

            </ul>

        </div>

    </div>

</header>