<a {{ $attributes->class(['nav-link', 'active text-primary font-weight-bold' => $isActive() ? true : false ]) }}>
    {{ $slot }}
</a>
