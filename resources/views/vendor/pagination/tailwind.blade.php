@if ($paginator->hasPages())
    <nav
        class="my-2 flex items-center justify-between"
        role="navigation"
        aria-label="{{ __('Pagination Navigation') }}"
    >
        <div class="flex flex-1 justify-between sm:hidden">
            @if ($paginator->onFirstPage())
                <span
                    class="relative inline-flex cursor-default items-center rounded-xl border border-zinc-200 bg-white px-4 py-2 text-sm font-medium leading-5 text-zinc-500"
                >
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a
                    class="relative inline-flex items-center rounded-xl border border-sky-200 bg-sky-50 px-4 py-2 text-sm font-medium leading-5 text-sky-500 ring-sky-500/50 transition duration-150 ease-in-out hover:border-sky-300 hover:bg-sky-200 focus:outline-none focus:ring active:bg-sky-500 active:text-sky-50"
                    href="{{ $paginator->previousPageUrl() }}"
                >
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a
                    class="relative inline-flex items-center rounded-xl border border-sky-200 bg-sky-50 px-4 py-2 text-sm font-medium leading-5 text-sky-500 ring-sky-500/50 transition duration-150 ease-in-out hover:border-sky-300 hover:bg-sky-200 focus:outline-none focus:ring active:bg-sky-500 active:text-sky-50"
                    href="{{ $paginator->nextPageUrl() }}"
                >
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span
                    class="relative inline-flex cursor-default items-center rounded-xl border border-zinc-200 bg-white px-4 py-2 text-sm font-medium leading-5 text-zinc-500"
                >
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>

        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <div>
                <span class="relative z-0 inline-flex rounded-xl shadow-sm rtl:flex-row-reverse">
                    {{-- Previous Page Link --}}

                    @if ($paginator->onFirstPage())
                        <span
                            aria-disabled="true"
                            aria-label="{{ __('pagination.previous') }}"
                        >
                            <span
                                class="relative inline-flex cursor-default items-center rounded-l-xl border border-zinc-200 bg-white px-2 py-2 text-sm font-medium leading-5 text-zinc-300"
                                aria-hidden="true"
                            >
                                <svg
                                    class="size-5"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M15.75 19.5 8.25 12l7.5-7.5"
                                    />
                                </svg>
                            </span>
                        </span>
                    @else
                        <a
                            class="relative inline-flex items-center rounded-l-xl border border-sky-200 bg-sky-50 px-2 py-2 text-sm font-medium leading-5 text-sky-500 ring-sky-500/50 transition duration-150 ease-in-out hover:z-10 hover:border-sky-300 hover:bg-sky-200 focus:z-10 focus:border-sky-500 focus:outline-none focus:ring active:bg-sky-500 active:text-sky-50"
                            href="{{ $paginator->previousPageUrl() }}"
                            aria-label="{{ __('pagination.previous') }}"
                            rel="prev"
                        >
                            <svg
                                class="size-5"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15.75 19.5 8.25 12l7.5-7.5"
                                />
                            </svg>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span
                                    class="relative -ml-px inline-flex cursor-default items-center border border-zinc-200 bg-white px-4 py-2 text-sm font-medium leading-5 text-zinc-700"
                                >
                                    {{ $element }}
                                </span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span
                                            class="relative z-10 -ml-px inline-flex items-center border border-sky-200 bg-sky-500 px-4 py-2 text-sm font-medium leading-5 text-sky-50 transition duration-150 ease-in-out"
                                        >
                                            {{ $page }}
                                        </span>
                                    </span>
                                @else
                                    <a
                                        class="relative -ml-px inline-flex items-center border border-zinc-200 bg-white px-4 py-2 text-sm font-medium leading-5 text-zinc-800 ring-sky-500/50 transition duration-150 ease-in-out hover:border-sky-200 hover:bg-sky-50 hover:text-sky-500 focus:z-20 focus:border-sky-300 focus:outline-none focus:ring active:z-20 active:bg-sky-500 active:text-sky-50"
                                        href="{{ $url }}"
                                        aria-label="{{ __('Go to page :page', ['page' => $page]) }}"
                                    >
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}

                    @if ($paginator->hasMorePages())
                        <a
                            class="relative inline-flex items-center rounded-r-xl border border-sky-200 bg-sky-50 px-2 py-2 text-sm font-medium leading-5 text-sky-500 ring-sky-500/50 transition duration-150 ease-in-out hover:z-10 hover:border-sky-300 hover:bg-sky-200 focus:z-10 focus:border-sky-500 focus:outline-none focus:ring active:bg-sky-500 active:text-sky-50"
                            href="{{ $paginator->nextPageUrl() }}"
                            aria-label="{{ __('pagination.next') }}"
                            rel="next"
                        >
                            <svg
                                class="size-5"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="m8.25 4.5 7.5 7.5-7.5 7.5"
                                />
                            </svg>
                        </a>
                    @else
                        <span
                            aria-disabled="true"
                            aria-label="{{ __('pagination.next') }}"
                        >
                            <span
                                class="relative -ml-px inline-flex cursor-default items-center rounded-r-xl border border-zinc-200 bg-white px-2 py-2 text-sm font-medium leading-5 text-zinc-300"
                                aria-hidden="true"
                            >
                                <svg
                                    class="size-5"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="m8.25 4.5 7.5 7.5-7.5 7.5"
                                    />
                                </svg>
                            </span>
                        </span>
                    @endif
                </span>
            </div>

            <div>
                <p class="text-sm leading-5 text-zinc-700">
                    {!! __('Showing') !!}
                    @if ($paginator->firstItem())
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>
        </div>
    </nav>
@endif

