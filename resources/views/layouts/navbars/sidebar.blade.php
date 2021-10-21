<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('dashboard') }}">
            <x-application-logo class="navbar-brand-img"/>
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <i class="fas fa-user mr-1"></i>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('profile.show') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('dashboard') }}">
                            <x-application-logo/>
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            @can('perform-administrative')

            <h6 class="navbar-heading text-muted">Administrative</h6>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <x-sidebar.link route-name="dashboard" href="{{ route('dashboard') }}">
                        <i class="fa fa-tachometer-alt"></i>
                        {{ __('Dashboard') }}
                    </x-sidebar.link>
                </li>
                @can('viewAny', App\Models\User\User::class)
                <li class="nav-item">
                    <x-sidebar.link route-name="user.*" href="{{ route('user.index') }}">
                        <i class="fa fa-users"></i>
                        {{ __('Users') }}
                    </x-sidebar.link>
                </li>
                @endcan
                @can('viewAny', App\Models\User\Distributor::class)
                <li class="nav-item">
                    <x-sidebar.link route-name="distributor.*" href="{{ route('distributor.index') }}">
                        <i class="fas fa-project-diagram"></i>
                        {{ __('Distributors') }}
                    </x-sidebar.link>
                </li>
                @endcan
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            @endcan
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">Products</h6>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <x-sidebar.link route-name="product.*">
                        <i class="fas fa-tshirt"></i>
                        {{ __('Products') }}
                    </x-sidebar.link>
                </li>
                <li class="nav-item">
                    <x-sidebar.collapse id="user-collapse" route-name="user.*">
                        <x-slot name="trigger">
                            <i class="fa fa-users"></i>
                            {{ __('Orders') }}
                        </x-slot>
                        <x-slot name="content">
                            <x-sidebar.link route-name="user.*" href="{{ route('user.index') }}">
                                <i class="fa fa-tachometer-alt"></i>
                                {{ __('Dashboard') }}
                            </x-sidebar.link>
                        </x-slot>
                    </x-sidebar.collapse>
                </li>
            </ul>
        </div>
    </div>
</nav>
