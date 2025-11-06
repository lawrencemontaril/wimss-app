<form
    class="relative m-2 flex w-64 items-center gap-2 overflow-hidden rounded-lg border border-zinc-200 bg-white"
    action=""
    method="GET"
>
    <label
        class="absolute left-2 cursor-text"
        for="search"
    >
        <svg
            class="size-5 text-zinc-400"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="2"
            stroke="currentColor"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
            />
        </svg>
    </label>
    <input
        class="block w-full border-none bg-white p-2 ps-9 text-sm outline-none placeholder:text-zinc-400 focus:ring-0"
        id="search"
        name="search"
        type="text"
        value="<?php echo e(request()->get('search', '')); ?>"
        placeholder="Search"
    />

    <?php if(request()->has('search')): ?>
        <button
            class="group absolute right-1 cursor-pointer rounded-md bg-zinc-200 p-1 hover:bg-red-500 hover:text-red-50"
            type="button"
            tabindex="0"
            onclick="window.location='<?php echo e(url()->current()); ?>'"
        >
            <svg
                class="size-5 text-zinc-400 group-hover:text-red-50"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M6 18 18 6M6 6l12 12"
                />
            </svg>
        </button>
    <?php endif; ?>
</form>

<?php /**PATH C:\_projects\wimss\resources\views/components/search-bar.blade.php ENDPATH**/ ?>