<aside
    class="fixed top-16 z-20 hidden h-[calc(100dvh-4rem)] w-72 flex-col overflow-y-auto border-r border-zinc-200 bg-zinc-50 p-2 md:flex"
    id="sidebar-menu"
>
    <ul>
        <li>
            <a
                href="{{ route('dashboard') }}"
                @class([
                    'block relative rounded-xl px-4 py-3 text-sm font-medium',
                    'bg-sky-400 text-sky-50' => Route::is('dashboard'),
                    'text-zinc-700 hover:bg-zinc-100' => !Route::is('dashboard'),
                ])
            >
                <x-heroicon-s-home class="{{ Route::is('dashboard') ? 'text-white' : 'text-zinc-400' }} inline" />
                <span class="ml-2">Dashboard</span>
            </a>
        </li>

        <div class="mx-0.5 mt-4 flex items-center justify-between gap-3 rounded-xl p-1.5 px-3 text-sm font-medium text-zinc-700">
            References
        </div>

        @can('viewAny', \App\Models\Hei::class)
            <li>
                <a
                    href="{{ route('heis.index') }}"
                    @class([
                        'block relative rounded-xl px-4 py-3 text-sm font-medium',
                        'bg-sky-400 text-sky-50' => Route::is('heis.*'),
                        'text-zinc-700 hover:bg-zinc-100' => !Route::is('heis.*'),
                    ])
                >
                    <x-heroicon-o-building-library class="{{ Route::is('heis.*') ? 'text-white' : 'text-zinc-400' }} inline" />
                    <span class="ml-2">HEIs</span>
                    <span class="absolute right-2 min-w-8 rounded-full border border-sky-400 bg-zinc-50 p-1 px-2 text-center text-xs text-sky-400">
                        {{ $sidebarData['hei_count'] }}
                    </span>
                </a>
            </li>
        @endcan

        @notrole('admin')
            <li>
                <a
                    href="{{ route('heis.show', auth()->user()->profile->hei) }}"
                    @class([
                        'block relative rounded-xl px-4 py-3 text-sm font-medium',
                        'bg-sky-400 text-sky-50' => Route::is('heis.show'),
                        'text-zinc-700 hover:bg-zinc-100' => !Route::is('heis.show'),
                    ])
                >
                    <x-heroicon-o-building-library class="{{ Route::is('heis.show') ? 'text-white' : 'text-zinc-400' }} inline" />
                    <span class="ml-2">Your HEI</span>
                </a>
            </li>
        @endnotrole

        @can('viewAny', \App\Models\Course::class)
            <li>
                <a
                    href="{{ route('courses.index') }}"
                    @class([
                        'block relative rounded-xl px-4 py-3 text-sm font-medium',
                        'bg-sky-400 text-sky-50' => Route::is('courses.*'),
                        'text-zinc-700 hover:bg-zinc-100' => !Route::is('courses.*'),
                    ])
                >
                    <x-heroicon-o-star class="{{ Route::is('courses.*') ? 'text-white' : 'text-zinc-400' }} inline" />
                    <span class="ml-2">Courses</span>
                    <span class="absolute right-2 min-w-8 rounded-full border border-sky-400 bg-zinc-50 p-1 px-2 text-center text-xs text-sky-400">
                        {{ $sidebarData['course_count'] }}
                    </span>
                </a>
            </li>
        @endcan

        @can('viewAny', \App\Models\Recommendation::class)
            <li>
                <a
                    href="{{ route('recommendations.index') }}"
                    @class([
                        'block relative rounded-xl px-4 py-3 text-sm font-medium',
                        'bg-sky-400 text-sky-50' => Route::is('recommendations.*'),
                        'text-zinc-700 hover:bg-zinc-100' => !Route::is('recommendations.*'),
                    ])
                >
                    <x-heroicon-o-pencil class="{{ Route::is('recommendations.*') ? 'text-white' : 'text-zinc-400' }} inline" />
                    <span class="ml-2">Recommendations</span>
                </a>
            </li>
        @endcan
    </ul>

    @role(['admin', 'dean', 'faculty', 'hte'])
        <div class="mx-0.5 mt-4 flex items-center justify-between gap-3 rounded-xl p-1.5 px-3 text-sm font-medium text-zinc-700">
            Users
        </div>

        <ul>
            @role(['admin', 'dean'])
                <li>
                    <a
                        href="{{ route('deans.index') }}"
                        @class([
                            'block relative rounded-xl px-4 py-3 text-sm font-medium',
                            'bg-sky-400 text-sky-50' => Route::is('deans.*'),
                            'text-zinc-700 hover:bg-zinc-100' => !Route::is('deans.*'),
                        ])
                    >
                        <x-heroicon-o-book-open class="{{ Route::is('deans.*') ? 'text-white' : 'text-zinc-400' }} inline" />
                        <span class="ml-2">Deans</span>
                        <span class="absolute right-2 min-w-8 rounded-full border border-sky-400 bg-zinc-50 p-1 px-2 text-center text-xs text-sky-400">
                            {{ $sidebarData['dean_count'] }}
                        </span>
                    </a>
                </li>

                <li>
                    <a
                        href="{{ route('faculties.index') }}"
                        @class([
                            'block relative rounded-xl px-4 py-3 text-sm font-medium',
                            'bg-sky-400 text-sky-50' => Route::is('faculties.*'),
                            'text-zinc-700 hover:bg-zinc-100' => !Route::is('faculties.*'),
                        ])
                    >
                        <x-heroicon-o-user-group class="{{ Route::is('faculties.*') ? 'text-white' : 'text-zinc-400' }} inline" />
                        <span class="ml-2">SIP/Faculty Coordinators</span>
                        <span class="absolute right-2 min-w-8 rounded-full border border-sky-400 bg-zinc-50 p-1 px-2 text-center text-xs text-sky-400">
                            {{ $sidebarData['faculty_count'] }}
                        </span>
                    </a>
                </li>
            @endrole

            @role(['admin', 'dean', 'faculty'])
                <li>
                    <a
                        href="{{ route('htes.index') }}"
                        @class([
                            'block relative rounded-xl px-4 py-3 text-sm font-medium',
                            'bg-sky-400 text-sky-50' => Route::is('htes.*'),
                            'text-zinc-700 hover:bg-zinc-100' => !Route::is('htes.*'),
                        ])
                    >
                        <x-heroicon-o-building-office-2 class="{{ Route::is('htes.*') ? 'text-white' : 'text-zinc-400' }} inline" />
                        <span class="ml-2">HTEs</span>
                        <span class="absolute right-2 min-w-8 rounded-full border border-sky-400 bg-zinc-50 p-1 px-2 text-center text-xs text-sky-400">
                            {{ $sidebarData['hte_count'] }}
                        </span>
                    </a>
                </li>
            @endrole

            <li>
                <a
                    href="{{ route('students.index') }}"
                    @class([
                        'block relative rounded-xl px-4 py-3 text-sm font-medium',
                        'bg-sky-400 text-sky-50' => Route::is('students.*'),
                        'text-zinc-700 hover:bg-zinc-100' => !Route::is('students.*'),
                    ])
                >
                    <x-heroicon-o-academic-cap class="{{ Route::is('students.*') ? 'text-white' : 'text-zinc-400' }} inline" />
                    <span class="ml-2">Students</span>
                    <span class="absolute right-2 min-w-8 rounded-full border border-sky-400 bg-zinc-50 p-1 px-2 text-center text-xs text-sky-400">
                        {{ $sidebarData['student_count'] }}
                    </span>
                </a>
            </li>

            <li>
                <a
                    href="{{ route('guardians.index') }}"
                    @class([
                        'block relative rounded-xl px-4 py-3 text-sm font-medium',
                        'bg-sky-400 text-sky-50' => Route::is('guardians.*'),
                        'text-zinc-700 hover:bg-zinc-100' => !Route::is('guardians.*'),
                    ])
                >
                    <x-heroicon-o-users class="{{ Route::is('guardians.*') ? 'text-white' : 'text-zinc-400' }} inline" />
                    <span class="ml-2">Guardians</span>
                    <span class="absolute right-2 min-w-8 rounded-full border border-sky-400 bg-zinc-50 p-1 px-2 text-center text-xs text-sky-400">
                        {{ $sidebarData['guardian_count'] }}
                    </span>
                </a>
            </li>
        </ul>
    @endrole
</aside>

