<x-sidebar-link route="{{ $route }}" href="#{{ $id }}" data-toggle="collapse" role="button" aria-expanded="{{ request()->routeIs($route) ? 'true' : 'false' }}" aria-controls="{{ $id }}">
    {{ $trigger }}
</x-sidebar-link>

<div class="collapse" id="{{ $id }}">
    {{ $content }}
</div>
