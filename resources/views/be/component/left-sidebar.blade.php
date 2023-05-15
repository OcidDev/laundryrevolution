        <div class="left-side-menu">

            <div class="h-100" data-simplebar>

                <!-- User box -->
                <div class="user-box text-center">
                    <img src="{{ asset('assets/images/users/user-6.jpg') }}" alt="user-img"
                        title="Mat Helme" class="rounded-circle avatar-md">
                    <div class="dropdown">
                        <a href="javascript: void(0);" class="text-black dropdown-toggle h5 mt-2 mb-1 d-block"
                            data-bs-toggle="dropdown">Stanley Parker</a>
                        <div class="dropdown-menu user-pro-dropdown">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-user me-1"></i>
                                <span>My Account</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-settings me-1"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-lock me-1"></i>
                                <span>Lock Screen</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-log-out me-1"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </div>
                    <p class="text-muted">Admin Head</p>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul id="side-menu">

                        <li class="menu-title">Navigation</li>
                        {{-- Menu Dashboard --}}
                        {{-- <li>
                            <a href="#sidebarDashboards" data-bs-toggle="collapse">
                                <i data-feather="airplay"></i>
                                <span class="badge bg-success rounded-pill float-end">4</span>
                                <span> Dashboards </span>
                            </a>
                            <div class="collapse" id="sidebarDashboards">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{route('home')}}">Dashboard 1</a>
                                    </li>
                                    <li>
                                        <a href="dashboard-2.html">Dashboard 2</a>
                                    </li>
                                    <li>
                                        <a href="dashboard-3.html">Dashboard 3</a>
                                    </li>
                                    <li>
                                        <a href="dashboard-4.html">Dashboard 4</a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}

                        <li>
                            <a href="{{ route('home') }}"><i data-feather="airplay"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('member.index') }}"><i data-feather="airplay"></i>
                                <span> Member </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('mentoring.index') }}"><i data-feather="airplay"></i>
                                <span> Mentoring </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('business.index') }}"><i data-feather="airplay"></i>
                                <span> Rencana Outlet </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('report.index') }}"><i data-feather="airplay"></i>
                                <span> Laporan Outlet </span>
                            </a>
                        </li>

                    </ul>
                </div>
                <!-- End Sidebar -->
                <div class="clearfix"></div>
            </div>
            <!-- Sidebar -left -->
        </div>
