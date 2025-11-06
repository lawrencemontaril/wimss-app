<label
    class="text-sm font-semibold"
    for="{{ $name }}"
>
    {{ $labelText }}
    @if ($required)
        <span class="text-red-500">*</span>
    @else
        <span class="text-xs italic text-zinc-500">(Optional)</span>
    @endif
</label>
<input
    class="my-1 block w-full rounded-lg border border-zinc-200 bg-white p-2.5 px-3 text-sm outline-none transition-all duration-150 ease-in-out focus:border-sky-500 focus:ring-0"
    id="{{ $name }}"
    name="{{ $name }}"
    type="{{ $type }}"
    value="{{ $value }}"
/>
@error($name)
    <p class="my-1 text-xs text-red-500">{{ $message }}</p>
@enderror

