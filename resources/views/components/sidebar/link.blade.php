<a {{ $attributes->class(['nav-link', 'active text-primary font-weight-bold' => $isActive() ? true : false ]) }} href="{{ url($uri) }}">
    {{ $slot }}
</a>
