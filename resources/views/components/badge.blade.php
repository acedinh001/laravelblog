@props(['text_color' => '', 'bg_color' => ''])

@php
    $textColor = match ($text_color) {
        'blue' => 'text-blue-500',
        'green' => 'text-green-500',
        'red' => 'text-red-500',
        'yellow' => 'text-yellow-500',
        default => 'text-gray-500'
    };

    $bgColor = match ($bg_color) {
        'blue' => 'bg-blue-100',
        'green' => 'bg-green-100',
        'red' => 'bg-red-100',
        'yellow' => 'bg-yellow-100',
        default => 'bg-gray-100'
    }
@endphp

<a {{ $attributes }} class=" rounded-xl px-3 py-1 text-base {{ $textColor }} {{ $bgColor }}">
    {{ $slot }}
</a>
