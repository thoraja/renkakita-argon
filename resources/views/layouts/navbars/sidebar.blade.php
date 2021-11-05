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
                    <x-sidebar.link uri="dashboard">
                        <x-icon class="mr-2">dashboard</x-icon>
                        {{ __('Dashboard') }}
                    </x-sidebar.link>
                </li>
                @can('viewAny', App\Models\User\User::class)
                <li class="nav-item">
                    <x-sidebar.link uri="user">
                        <x-icon class="mr-2">people</x-icon>
                        {{ __('Users') }}
                    </x-sidebar.link>
                </li>
                @endcan
                @can('viewAny', App\Models\User\Distributor::class)
                <li class="nav-item">
                    <x-sidebar.link uri="distributor">
                        <x-icon class="mr-2">share</x-icon>
                        {{ __('Distributors') }}
                    </x-sidebar.link>
                </li>
                @endcan
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            @endcan
            <!-- Heading -->
            @can('viewAny', App\Models\Product\Product::class)
            <h6 class="navbar-heading text-muted">Products</h6>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <x-sidebar.collapse id="product-collapse" uri="product/product*" :active="request()->is('product/category/*')">
                        <x-slot name="trigger">
                            <x-icon class="mr-2">checkroom</x-icon>
                            {{ __('Product') }}
                        </x-slot>
                        <x-slot name="content">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <x-sidebar.link uri="product/product">
                                        <x-icon class="mr-2">label</x-icon>
                                        {{ __('All Products') }}
                                    </x-sidebar.link>
                                </li>
                                @foreach (App\Models\Product\Category::all() as $category)
                                <li class="nav-item">
                                    <x-sidebar.link :uri="'product/category/'.$category->id">
                                        <x-icon class="mr-2">label</x-icon>
                                        {{ $category->name }}
                                    </x-sidebar.link>
                                </li>
                                @endforeach
                            </ul>
                        </x-slot>
                    </x-sidebar.collapse>
                </li>
            @endcan
                @can('viewAny', App\Models\Product\Category::class)
                <li class="nav-item">
                    <x-sidebar.link uri="product/category">
                        <x-icon class="mr-2">category</x-icon>
                        {{ __('Categories') }}
                    </x-sidebar.link>
                </li>
                @endcan
                @can('viewAny', App\Models\Product\Material::class)
                <li class="nav-item">
                    <x-sidebar.link uri="product/material">
                        <x-icon class="mr-2">note</x-icon>
                        {{ __('Materials') }}
                    </x-sidebar.link>
                </li>
                @endcan
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">Transaction</h6>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <x-sidebar.link uri="order/cart">
                        <x-icon class="mr-2">shopping_cart</x-icon>
                        {{ __('Cart') }}
                    </x-sidebar.link>
                </li>
                <li class="nav-item">
                    <x-sidebar.link uri="order/order">
                        <x-icon class="mr-2">receipt_long</x-icon>
                        {{ __('Orders') }}
                    </x-sidebar.link>
                </li>
            </ul>
        </div>
    </div>
</nav>
