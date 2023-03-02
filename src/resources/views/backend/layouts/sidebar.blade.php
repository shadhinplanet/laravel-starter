@include('backend.layouts.header')
<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Light Logo-->
        <a href="{{ route('front.home') }}" target="_blank" class="logo logo-light text-white">
            {{ config('starter.SITE_TITLE') }}
        </a>
        <button type="button" class="btn btn-sm fs-20 header-item float-end btn-vertical-sm-hover p-0"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">


            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                        href="{{ route('dashboard') }}">
                        <i class="mdi mdi-speedometer"></i> <span data-key="t-dashboards">Dashboard</span>
                    </a>
                </li>

                <!-- User Management -->
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('user.*') || request()->routeIs('permission.*') || request()->routeIs('role.*')
                        ? 'active'
                        : '' }}"
                        href="#userManagement" data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="userManagement">
                        <i class="fa las la-users"></i> <span data-key="t-dashboards">Users</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('user.*') || request()->routeIs('permission.*') || request()->routeIs('role.*')
                        ? 'show'
                        : '' }}"
                        id="userManagement">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{ route('user.index') }}"
                                    class="nav-link {{ request()->routeIs('user.*') ? 'active' : '' }}"
                                    data-key="t-ecommerce"> Users </a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end User Management -->

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
