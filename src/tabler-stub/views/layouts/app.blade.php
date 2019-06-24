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
    <link rel="shortcut icon"
          href="https://cdn.myntassets.com/skin1/icons/favicon.ico">
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

                        @auth
                            <cart-menu :prop-count="{{ auth()->user()->carts()->count() }}"></cart-menu>
                        @endauth

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

                                        <router-link to="/my/wishlist"
                                                     class="dropdown-item">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 width="18"
                                                 height="18"
                                                 viewBox="0 0 24 24"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 stroke-width="2"
                                                 stroke-linecap="round"
                                                 stroke-linejoin="round"
                                                 class="feather feather-list tw-inline"
                                                 style="margin-left: -16px;">
                                                <line x1="8"
                                                      y1="6"
                                                      x2="21"
                                                      y2="6"></line>
                                                <line x1="8"
                                                      y1="12"
                                                      x2="21"
                                                      y2="12"></line>
                                                <line x1="8"
                                                      y1="18"
                                                      x2="21"
                                                      y2="18"></line>
                                                <line x1="3"
                                                      y1="6"
                                                      x2="3"
                                                      y2="6"></line>
                                                <line x1="3"
                                                      y1="12"
                                                      x2="3"
                                                      y2="12"></line>
                                                <line x1="3"
                                                      y1="18"
                                                      x2="3"
                                                      y2="18"></line>
                                            </svg>
                                            My Wishlist
                                        </router-link>

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
                            @foreach($menus as $menu)
                                <li class="nav-item">
                                    <a class="nav-link"
                                       @if($menu->subCategories->isNotEmpty())
                                       href="javascript:void(0)"
                                       data-toggle="dropdown"
                                       @else
                                       href="{!! $menu->slug !!}" @endif>
                                        {!! $menu->name !!}
                                    </a>

                                    @if($menu->subCategories->isNotEmpty())
                                        <div class="dropdown-menu dropdown-menu-arrow">
                                            @foreach($menu->subCategories as $menuChild)
                                                <router-link to="/products/{{ $menuChild->slug }}"
                                                             class="dropdown-item">
                                                    {{ $menuChild->name }}
                                                </router-link>
                                            @endforeach
                                        </div>
                                    @endif
                                </li>
                            @endforeach
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
