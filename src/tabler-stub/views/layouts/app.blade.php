<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @routes
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"
            defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}"
          rel="stylesheet">
    <link rel="shortcut icon" href="#">
</head>
<body>
<div id="app"
     class="page">
    <div class="page-main">
        <div class="header py-4">
            <div class="container">
                <div class="d-flex">
                    <router-link to="/"
                                 class="header-brand">
                        <img src="https://tabler.github.io/tabler/demo/brand/tabler.svg"
                             class="header-brand-img"
                             alt="tabler logo">
                    </router-link>


                    <div class="d-flex order-lg-2 ml-auto">

                        @guest

                            <div class="nav-item d-none d-md-flex">
                                <router-link to="/login"
                                             class="btn btn-link">
                                    Login
                                </router-link>
                            </div>

                            <div class="nav-item d-none d-md-flex">
                                <router-link to="/register"
                                             class="btn btn-link">
                                    Register
                                </router-link>
                            </div>
                            @else
                                <div class="dropdown">
                                    <a href="#"
                                       class="nav-link pr-0 leading-none"
                                       data-toggle="dropdown">
                                <span class="avatar"
                                      style="background-image: url('{{ auth()->user()->avatar }}')"></span>
                                        <span class="ml-2 d-none d-lg-block">

                                    <span class="text-default">{{ auth()->user()->name }}</span>
                                        <small class="text-muted d-block mt-1">Administrator</small>
                                    </span>

                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item"
                                           href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 width="18"
                                                 height="18"
                                                 viewBox="0 0 24 24"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 stroke-width="2"
                                                 stroke-linecap="round"
                                                 stroke-linejoin="round"
                                                 class="feather feather-user tw-inline"
                                                 style="margin-left: -15px;">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12"
                                                        cy="7"
                                                        r="4"></circle>
                                            </svg>
                                            Profile
                                        </a>

                                        <div class="dropdown-divider"></div>

                                        <a class="dropdown-item"
                                           href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 width="18"
                                                 height="18"
                                                 viewBox="0 0 24 24"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 stroke-width="2"
                                                 stroke-linecap="round"
                                                 stroke-linejoin="round"
                                                 class="feather feather-log-out tw-inline"
                                                 style="margin-left: -15px;">
                                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                <polyline points="16 17 21 12 16 7"></polyline>
                                                <line x1="21"
                                                      y1="12"
                                                      x2="9"
                                                      y2="12"></line>
                                            </svg>
                                            @lang('Sign out')
                                        </a>
                                        <form id="logout-form"
                                              action="{{ route('logout') }}"
                                              method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                                @endguest
                    </div>

                    <a href="#"
                       class="header-toggler d-lg-none ml-3 ml-lg-0"
                       data-toggle="collapse"
                       data-target="#headerMenuCollapse">
                        <span class="header-toggler-icon"></span>
                    </a>
                </div>
            </div>
        </div>

        <div class="header collapse d-lg-flex p-0"
             id="headerMenuCollapse">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 ml-auto">
                        <form class="input-icon my-3 my-lg-0">
                            <input type="search"
                                   class="form-control header-search"
                                   placeholder="Search&hellip;"
                                   tabindex="1">
                            <div class="input-icon-addon">
                                @include('svg.search')
                            </div>
                        </form>
                    </div>
                    <div class="col-lg order-lg-first">
                        <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                            <li class="nav-item">
                                <a href="{{ route('home')}}" class="nav-link {{ request()->is('home') ? 'active' : ''}}">
                                    <i class="fe fe-home"></i> Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="dropdown"><i class="fe fe-box"></i> Interface</a>
                                <div class="dropdown-menu dropdown-menu-arrow">
                                    <a href="#" class="dropdown-item ">Cards design</a>
                                    <a href="#" class="dropdown-item ">Charts</a>
                                    <a href="#" class="dropdown-item ">Pricing cards</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" data-toggle="dropdown"><i class="fe fe-calendar"></i> Components</a>
                                <div class="dropdown-menu dropdown-menu-arrow">
                                    <a href="#" class="dropdown-item ">Maps</a>
                                    <a href="#" class="dropdown-item ">Icons</a>
                                    <a href="#" class="dropdown-item ">Store</a>
                                    <a href="#" class="dropdown-item ">Blog</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" data-toggle="dropdown"><i class="fe fe-file"></i> Pages</a>
                                <div class="dropdown-menu dropdown-menu-arrow">
                                    <a href="#" class="dropdown-item active">Profile</a>
                                    <a href="#" class="dropdown-item ">Login</a>
                                    <a href="#" class="dropdown-item ">Register</a>
                                    <a href="#" class="dropdown-item ">Forgot password</a>
                                    <a href="#" class="dropdown-item ">400 error</a>
                                    <a href="#" class="dropdown-item ">401 error</a>
                                    <a href="#" class="dropdown-item ">403 error</a>
                                    <a href="#" class="dropdown-item ">404 error</a>
                                    <a href="#" class="dropdown-item ">500 error</a>
                                    <a href="#" class="dropdown-item ">503 error</a>
                                    <a href="#" class="dropdown-item ">Email</a>
                                    <a href="#" class="dropdown-item ">Empty page</a>
                                    <a href="#" class="dropdown-item ">RTL mode</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link"><i class="fe fe-check-square"></i> Forms</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link"><i class="fe fe-image"></i> Gallery</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link"><i class="fe fe-file-text"></i> Documentation</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</div>
</body>
</html>
