<div class="sidebar-wrapper" id="sidebar">

    {{-- Logo --}}
    <a href="{{ route('admin.index') }}" class="sidebar-brand">
        <i class="bi bi-asterisk"></i>
        <span>Spark Admin</span>
    </a>


    {{-- Menu --}}
    <div class="flex-grow-1 overflow-y-auto">

        <div class="sidebar-menu-section">

            <div class="sidebar-menu-title">
                Menu
            </div>

            <ul class="sidebar-menu-list">

                {{-- Dashboard --}}
                <li class="sidebar-menu-item">

                    <a href="{{ route('admin.addbook') }}"
                       class="sidebar-menu-link">

                        <i class="bi bi-grid-fill"></i>

                        <span>
                            Add books
                        </span>

                    </a>

                </li>


                
                <li class="sidebar-menu-item">

                    <a href="{{ route('admin.index') }}"
                       class="sidebar-menu-link">

                        <i class="bi bi-book"></i>

                        <span>
                             Admin Book
                        </span>

                    </a>

                </li>

            </ul>

        </div>

    </div>


    {{-- Profile --}}
    <div class="sidebar-profile">

        <img src="{{ asset('assets/images/avatar.png') }}"
             alt="Administrator"
             class="sidebar-profile-img">

        <div class="sidebar-profile-info">

            <div class="sidebar-profile-name">
                {{ session('admin_name') }}
            </div>

            <div class="sidebar-profile-email">
               {{ session('admin_email') }}
            </div>

        </div>

    </div>

</div>