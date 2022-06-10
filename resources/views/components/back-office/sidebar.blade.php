<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('backoffice.index') }}" class="brand-link">
        <img src="{{ asset('admin-lte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">NewsDirect</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admin-lte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('backoffice.index') }}" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @can('users-management')
                <li class="nav-item @if(\Request::routeIs('users.*') || \Request::routeIs('roles.*')) menu-open @endif">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Users Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link @if(\Request::routeIs('users.*')) active @endif">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}" class="nav-link @if(\Request::routeIs('roles.*')) active @endif">
                                <i class="fas fa-bullseye nav-icon"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan
                <li class="nav-item @if(\Request::routeIs('news.*')) menu-open @endif">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            News
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('news.create')
                            <li class="nav-item">
                                <a href="{{ route('news.create') }}" class="nav-link @if(\Request::routeIs('news.create')) active @endif">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>Create News</p>
                                </a>
                            </li>
                        @endcan
                        @can('news.index')
                            <li class="nav-item">
                                <a href="{{ route('news.index') }}" class="nav-link @if(\Request::routeIs('news.index')) active @endif">
                                    <i class="fas fa-clipboard nav-icon"></i>
                                    <p>News list</p>
                                </a>
                            </li>
                        @endcan
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="fas fa-magnet nav-icon"></i>
                                <p>Manage news</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link">
                        <i class="nav-icon fas fa-power-off text-red"></i>
                        <p> {{ __('Logout') }} </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
