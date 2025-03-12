<!-- Sidebar -->
<div class="sidebar" style="background: linear-gradient(to bottom, #000000, #333333);">
    <!-- SidebarSearch Form -->
    <div class="form-inline mt-3">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <div style="max-height: 100%; overflow-y: auto;">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active" style="background-color: #ff0000 !important; color: #ffffff !important; border-radius: 5px;">
                        <i class="nav-icon fas fa-film" style="color: #ffffff !important;"></i>
                        <p>
                            Cinema Studio System
                            <i class="right fas fa-angle-left" style="color: #ffffff !important;"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- Actors -->
                        <li class="nav-item">
                            <a href="{{ route('Actors') }}" class="nav-link">
                                <i class="nav-icon fas fa-user" style="color: #ff0000;"></i>
                                <p>Actors</p>
                            </a>
                        </li>

                        <!-- Address -->
                        <li class="nav-item">
                            <a href="{{ route('Address') }}" class="nav-link">
                                <i class="nav-icon fas fa-map-marker-alt" style="color: #ff0000;"></i>
                                <p>Address</p>
                            </a>
                        </li>

                        <!-- Categories -->
                        <li class="nav-item">
                            <a href="{{ route('Categories') }}" class="nav-link">
                                <i class="nav-icon fas fa-tags" style="color: #ff0000;"></i>
                                <p>Categories</p>
                            </a>
                        </li>

                        <!-- cities -->
                        <li class="nav-item">
                            <a href="{{ route('Citys') }}" class="nav-link">
                                <i class="nav-icon fas fa-city" style="color: #ff0000;"></i>
                                <p>Cities</p>
                            </a>
                        </li>

                        <!-- Customers -->
                        <li class="nav-item">
                            <a href="{{ route('Customers') }}" class="nav-link">
                                <i class="nav-icon fas fa-users" style="color: #ff0000;"></i>
                                <p>Customers</p>
                            </a>
                        </li>

                        <!-- Films -->
                        <li class="nav-item">
                            <a href="{{ route('Films') }}" class="nav-link">
                                <i class="nav-icon fas fa-video" style="color: #ff0000;"></i>
                                <p>Films</p>
                            </a>
                        </li>

                        <!-- Film Actors -->
                        <li class="nav-item">
                            <a href="{{ route('Flim_Actor') }}" class="nav-link">
                                <i class="nav-icon fas fa-theater-masks" style="color: #ff0000;"></i>
                                <p>Film Actors</p>
                            </a>
                        </li>

                        <!-- Film Categories -->
                        <li class="nav-item">
                            <a href="{{ route('Flim_Category') }}" class="nav-link">
                                <i class="nav-icon fas fa-layer-group" style="color: #ff0000;"></i>
                                <p>Film Categories</p>
                            </a>
                        </li>

                        <!-- Film Text -->
                        <li class="nav-item">
                            <a href="{{ route('Film_text') }}" class="nav-link">
                                <i class="nav-icon fas fa-align-left" style="color: #ff0000;"></i>
                                <p>Film Text</p>
                            </a>
                        </li>

                        <!-- Inventory -->
                        <li class="nav-item">
                            <a href="{{ route('Inventories') }}" class="nav-link">
                                <i class="nav-icon fas fa-box-open" style="color: #ff0000;"></i>
                                <p>Inventories</p>
                            </a>
                        </li>

                        <!-- Languages -->
                        <li class="nav-item">
                            <a href="{{ route('Languages') }}" class="nav-link">
                                <i class="nav-icon fas fa-language" style="color: #ff0000;"></i>
                                <p>Languages</p>
                            </a>
                        </li>

                        <!-- Payments -->
                        <li class="nav-item">
                            <a href="{{ route('Payments') }}" class="nav-link">
                                <i class="nav-icon fas fa-credit-card" style="color: #ff0000;"></i>
                                <p>Payments</p>
                            </a>
                        </li>

                        <!-- Rentals -->
                        <li class="nav-item">
                            <a href="{{ route('Rentals') }}" class="nav-link">
                                <i class="nav-icon fas fa-film" style="color: #ff0000;"></i>
                                <p>Rentals</p>
                            </a>
                        </li>

                        <!-- Staff -->
                        <li class="nav-item">
                            <a href="{{ route('Staff') }}" class="nav-link">
                                <i class="nav-icon fas fa-user-tie" style="color: #ff0000;"></i>
                                <p>Staff</p>
                            </a>
                        </li>

                        <!-- Stores -->
                        <li class="nav-item">
                            <a href="{{ route('Stores') }}" class="nav-link">
                                <i class="nav-icon fas fa-store" style="color: #ff0000;"></i>
                                <p>Stores</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- /.sidebar-menu -->
</div>