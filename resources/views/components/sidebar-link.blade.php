@props(['route' => 'dashboard'])

<a {{ $attributes->class(['nav-link', 'active text-primary font-weight-bold' => request()->routeIs($route)]) }} href="{{ route($route) }}">
    {{ $slot }}
</a>
