<x-sidebar.link {{ $attributes }} :active="$isActive()" uri="{{ $uri }}" href="#{{ $id }}" data-toggle="collapse" role="button" aria-expanded="{{ $isActive() ? 'true' : 'false' }}" aria-controls="{{ $id }}">
    {{ $trigger }}
</x-sidebar.link>

<div class="collapse{{ $isActive() ? ' show' : '' }}" id="{{ $id }}">
    {{ $content }}
</div>
