<nav
    class="sticky top-0 z-30 h-16 border-b border-zinc-200 bg-white"
    wire:ignore
>
    <div class="relative mx-auto flex h-full max-w-8xl items-center justify-between gap-4 p-2 px-4">
        <a
            class="hidden items-center gap-2 md:flex"
            href="{{ route('index') }}"
        >
            <img
                class="h-12 w-12"
                src="{{ asset('images/wimss-icon.png') }}"
                alt="WIMSS Icon"
            />
            <span class="text-xl font-bold">WIMSS</span>
        </a>

        <button
            class="md:hidden"
            id="sidebar-menu-btn"
        >
            <svg
                class="size-8"
                id="sidebar-menu-icon"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                />
            </svg>
        </button>

        @notrole('admin')
            <div class="max-w-56 overflow-hidden text-ellipsis text-nowrap rounded-full border border-zinc-200 p-2 px-4 text-sm font-semibold md:max-w-96">
                {{ Auth::user()->profile->hei->name }}
            </div>
        @endnotrole

        <img
            class="size-9 cursor-pointer rounded-full"
            id="profile-dropdown-btn"
            src="https://ui-avatars.com/api/?name={{ auth()->user()->full_name }}&background=09090B&color=fff"
        />

        <div
            class="absolute right-4 top-20 hidden w-52 overflow-hidden rounded-lg border border-zinc-200 bg-white p-0 text-sm text-zinc-800 shadow-sm"
            id="profile-dropdown-menu"
        >
            <div>
                <a
                    class="flex items-center justify-start gap-2 text-nowrap p-2 font-semibold text-zinc-800 hover:bg-zinc-50"
                    href="{{ route('users.show', auth()->user()->username) }}"
                >
                    <img
                        class="size-6 cursor-pointer rounded-full"
                        id="profile-dropdown-btn"
                        src="https://ui-avatars.com/api/?name={{ auth()->user()->full_name }}&background=09090B&color=fff"
                    />

                    <p class="overflow-hidden text-ellipsis text-nowrap">
                        <span class="block">
                            {{ auth()->user()->full_name }}
                        </span>
                        <span class="block text-[10px] font-normal uppercase">
                            {{ auth()->user()->role }}
                        </span>
                    </p>
                </a>
            </div>

            <hr class="border-zinc-200" />

            <ul class="flex flex-col gap-1 p-2">
                <li>
                    <a
                        class="flex items-center gap-2 rounded-md p-2 px-4 hover:bg-zinc-100"
                        href="{{ route('users.edit', ['user' => auth()->user()]) }}"
                    >
                        <x-heroicon-s-cog-6-tooth />

                        Settings
                    </a>
                </li>

                <li>
                    <form
                        class="hidden"
                        id="sign-out-form"
                        action="{{ route('sign_out') }}"
                        method="POST"
                    >
                        @csrf
                    </form>
                    <a
                        class="flex w-full items-center gap-2 rounded-md p-2 px-4 text-red-500 hover:bg-red-500 hover:text-red-50"
                        id="sign_out"
                        href="javascript:void"
                        onclick="document.getElementById('sign-out-form').submit()"
                    >
                        <x-heroicon-s-arrow-right-end-on-rectangle />

                        Sign out
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

