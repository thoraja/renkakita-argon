@props(['size' => 18])

<span {{ $attributes->merge(['class' => 'material-icons align-middle']) }} style="font-size: {{ $size }}px">
{{ $slot }}
</span>
