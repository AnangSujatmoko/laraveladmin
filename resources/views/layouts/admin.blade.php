<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    @vite(['resources/css/app.css'])
    @stack('styles')
    <style>
        .nav-link.active {
            background-color: #cce5ff;
            /* Light blue background for the active menu */
            color: #004085;
            /* Darker blue text color for better contrast */
        }

        .nav-link:hover {
            cursor: pointer;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
                @permission('dashboard.read')
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{ route('admin.dashboard.index') }}"
                            class="nav-link {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
                            {{ __('Dashboard') }}
                        </a>
                    </li>
                @endpermission
            </ul>
            <ul class="navbar-nav ml-auto">
                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto mr-2">
                    @permission('dashboard.read')
                        <li class="nav-item">
                            <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}" target="_blank">
                                <i class="fas fa-globe"></i> {{ __('View website') }}
                            </a>
                        </li>
                    @endpermission
                </ul>
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="javascript:void(0);" class="brand-link">
                <span class="brand-image">
                    <img src="https://laravel.com/img/logomark.min.svg" alt="Laravel Logo" width="25"
                        height="25">
                </span>
                <span class="brand-text font-weight-light">Laravel 11.x</span>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        @permission('dashboard.read')
                            <li class="nav-item">
                                <a href="{{ route('admin.dashboard.index') }}"
                                    class="nav-link {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>{{ __('Dashboard') }}</p>
                                </a>
                            </li>
                        @endpermission
                        @permission('roles.read')
                            <li class="nav-item">
                                <a href="{{ route('admin.roles.index') }}"
                                    class="nav-link {{ Request::is('admin/roles*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-shield-alt"></i>
                                    <p>{{ __('Roles') }}</p>
                                </a>
                            </li>
                        @endpermission
                        @permission('permissions.read')
                            <li class="nav-item">
                                <a href="{{ route('admin.permissions.index') }}"
                                    class="nav-link {{ Request::is('admin/permissions*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-user-shield"></i>
                                    <p>{{ __('Permissions') }}</p>
                                </a>
                            </li>
                        @endpermission
                        @permission('users.read')
                            <li class="nav-item">
                                <a href="{{ route('admin.users.index') }}"
                                    class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>{{ __('Users') }}</p>
                                </a>
                            </li>
                        @endpermission
                        @permission('profile.read')
                            <li class="nav-item">
                                <a href="{{ route('profile.index') }}"
                                    class="nav-link {{ Request::is('profile*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>{{ __('My Profile') }}</p>
                                </a>
                            </li>
                        @endpermission
                        @permission('menus.read')
                            <li class="nav-item">
                                <a href="{{ route('admin.menus.index') }}"
                                    class="nav-link {{ Request::is('admin/menus*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-bars"></i>
                                    <p>{{ __('Menus') }}</p>
                                </a>
                            </li>
                        @endpermission
                        @permission('contents.read')
                            <li class="nav-item">
                                <a href="{{ route('admin.content.edit') }}"
                                    class="nav-link {{ Request::is('admin/content*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-puzzle-piece"></i>
                                    <p>{{ __('Contents') }}</p>
                                </a>
                            </li>
                        @endpermission
                        <li class="nav-item">
                            <a href="javascript:void(0);" id="logout-button" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>{{ __('Logout') }}</p>
                            </a>
                            <form id="logout-form" class="d-none" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <div class="content">
                <div class="container-fluid">
                    @yield('main')
                </div>
            </div>
        </div>

        <footer class="main-footer">
            <strong>Copyright &copy; 2024 <a href="{{ route('admin.dashboard.index') }}">{{ config('app.name') }}</a>
                11.x. Powered by Anang Sujatmoko.</strong>
            <span>{{ __('All rights reserved.') }}</span>
        </footer>
    </div>

    <script>
        window.jQuery = null;
        window.$ = null;
    </script>

    @vite(['resources/js/app.js'])
    @stack('scripts')

</body>

</html>
