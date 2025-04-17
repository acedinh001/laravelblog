@props(['active'])

@php
$classes = ($active ?? false)
            ? 'items-center hover:text-yellow-900 text-sm text-yellow-500'
            : 'items-center hover:text-yellow-900 text-sm';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
