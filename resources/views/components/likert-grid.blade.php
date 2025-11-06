@props(['labelText', 'value'])

@php
    $ratings = [
        5 => ['label' => 'Excellent', 'bg' => 'bg-green-500', 'text' => 'text-green-50'],
        4 => ['label' => 'Very Good', 'bg' => 'bg-lime-500', 'text' => 'text-lime-50'],
        3 => ['label' => 'Good', 'bg' => 'bg-sky-500', 'text' => 'text-sky-50'],
        2 => ['label' => 'Fair', 'bg' => 'bg-yellow-500', 'text' => 'text-yellow-50'],
        1 => ['label' => 'Needs improvement', 'bg' => 'bg-red-500', 'text' => 'text-red-50'],
    ];
@endphp

<div class="grid grid-cols-3 lg:grid-cols-7">
    <div class="flex items-center bg-zinc-100 p-2 text-sm font-medium">
        {{ $labelText }}
    </div>

    @foreach ($ratings as $key => $rating)
        <div @class([
            'items-center justify-center p-2 text-sm',
            'flex' => $value == $key,
            'hidden lg:flex' => $value != $key,
            $rating['bg'] => $value == $key,
            $rating['text'] => $value == $key,
        ])>
            {{ $rating['label'] }}
        </div>
    @endforeach

    <div class="flex items-center justify-center p-2 text-xl font-semibold">
        {{ $value }}
    </div>
</div>

