<x-sidebar.link {{ $attributes }} route-name="{{ $routeName }}" href="#{{ $id }}" data-toggle="collapse" role="button" aria-expanded="{{ $isActive ? 'true' : 'false' }}" aria-controls="{{ $id }}">
    {{ $trigger }}
</x-sidebar.link>

<div class="collapse" id="{{ $id }}">
    {{ $content }}
</div>
