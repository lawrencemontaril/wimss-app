@props([
    'name',
    'labelText',
    'ratings' => [
        5 => ['label' => 'Excellent', 'bg' => 'bg-green-500', 'border' => 'border-green-500', 'text' => 'text-green-50'],
        4 => ['label' => 'Very Good', 'bg' => 'bg-lime-500', 'border' => 'border-lime-500', 'text' => 'text-lime-50'],
        3 => ['label' => 'Good', 'bg' => 'bg-sky-500', 'border' => 'border-sky-500', 'text' => 'text-sky-50'],
        2 => ['label' => 'Fair', 'bg' => 'bg-yellow-500', 'border' => 'border-yellow-500', 'text' => 'text-yellow-50'],
        1 => ['label' => 'Needs Improvement', 'bg' => 'bg-red-500', 'border' => 'border-red-500', 'text' => 'text-red-50'],
    ],
])
<div class="mb-4 space-y-4">
    <label for="{{ $name }}">{{ $labelText }}</label>

    <div
        class="likert-scale flex flex-col gap-4 lg:flex-row lg:gap-2"
        id="{{ $name }}-scale"
    >
        @foreach ($ratings as $value => $rating)
            <div
                class="likert-box flex flex-1 cursor-pointer items-center justify-center rounded-full border border-zinc-200 p-4 text-center text-sm shadow-sm transition-all duration-150 ease-in-out"
                data-value="{{ $value }}"
                data-selected-class="{{ "{$rating['bg']} {$rating['border']} {$rating['text']}" }}"
                tabindex="0"
            >
                {{ $rating['label'] }}
            </div>
        @endforeach
    </div>

    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="hidden"
        value="{{ old($name) }}"
    />

    @error($name)
        <p class="my-1 text-xs text-red-500">{{ $message }}</p>
    @enderror
</div>

