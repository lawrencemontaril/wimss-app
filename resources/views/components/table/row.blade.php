@props([
    'href' => null,
])

<tr
    data-href="{{ $href }}"
    {{ $attributes->class([
        'hover:bg-zinc-100 hover:cursor-pointer clickable-row' => $href,
    ]) }}
>
    {{ $slot }}
</tr>
