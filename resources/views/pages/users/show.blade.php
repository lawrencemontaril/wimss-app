@extends('layouts.dashboard-layout')

@section('title')
    {{ $user->full_name }}
@endsection

@section('content')
    @php
        $breadcrumbs = [['name' => 'Users', 'url' => '#'], ['name' => '@' . $user->username, 'url' => route('users.show', $user->username)]];
    @endphp

    <x-breadcrumb :items="$breadcrumbs" />

    <header class="mb-8 mt-4 flex items-center gap-4">
        <div
            class="flex h-24 w-24 items-center justify-center rounded-full bg-zinc-950 p-2 text-4xl text-zinc-50"
            id="profile-dropdown-btn"
        >
            {{ $user->first_name[0] . $user->last_name[0] }}
        </div>
        <div class="flex flex-col gap-2">
            <p class="text-2xl font-semibold">
                {{ $user->first_name . ' ' . $user->last_name }}
            </p>
            <span class="text-xs uppercase">{{ $user->role }}</span>
        </div>
    </header>

    <div class="mb-4 grid w-full grid-cols-12 gap-4">
        <div class="col-span-full lg:col-span-9">
            @role('dean', $user)
                <div class="rounded-xl border border-zinc-200 bg-white shadow-sm">
                    <div class="border-b border-zinc-200 p-2 px-4">
                        <span class="font-semibold">Dean Information</span>
                    </div>
                    <div class="p-4">
                        <p class="mb-2 text-sm">
                            <b>Contact Number:</b>
                            {{ $user->contact_number }}
                        </p>

                        <p class="mb-2 text-sm">
                            <b>HEI:</b>
                            <a
                                class="hover:underline"
                                href="{{ route('heis.show', $user->profile->hei) }}"
                            >
                                {{ $user->profile->hei->name }}
                            </a>
                        </p>
                    </div>
                </div>
            @endrole

            @role('faculty', $user)
                <div class="rounded-xl border border-zinc-200 bg-white shadow-sm">
                    <div class="border-b border-zinc-200 p-2 px-4">
                        <span class="font-semibold">Faculty Information</span>
                    </div>
                    <div class="p-4">
                        <p class="mb-2 text-sm">
                            <b>Contact Number:</b>
                            {{ $user->contact_number }}
                        </p>

                        <p class="mb-2 text-sm">
                            <b>HEI:</b>
                            <a
                                class="hover:underline"
                                href="{{ route('heis.show', $user->profile->hei) }}"
                            >
                                {{ $user->profile->hei->name }}
                            </a>
                        </p>

                        <p class="mb-2 text-sm">
                            <b>Department:</b>
                            {{ $user->profile->department->name }}
                        </p>

                        <p class="mb-2 text-sm">
                            <b>HTEs:</b>
                            @if ($user->profile->htes->isNotEmpty())
                                <ol class="mb-2 list-inside list-decimal ps-2 text-sm">
                                    @foreach ($user->profile->htes as $hte)
                                        <li>
                                            <a
                                                class="hover:underline"
                                                href="{{ route('users.show', $hte->user->username) }}"
                                            >
                                                {{ $hte->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ol>
                            @else
                                Not HTEs yet
                            @endif
                        </p>
                    </div>
                </div>
            @endrole

            @role('hte', $user)
                <div class="rounded-xl border border-zinc-200 bg-white shadow-sm">
                    <div class="border-b border-zinc-200 p-2 px-4">
                        <span class="font-semibold">HTE Information</span>
                    </div>
                    <div class="p-4">
                        <p class="mb-2 text-sm">
                            <b>Contact Person Contact Number:</b>
                            {{ $user->contact_number }}
                        </p>

                        <p class="mb-2 text-sm">
                            <b>HEI:</b>
                            <a
                                class="hover:underline"
                                href="{{ route('heis.show', $user->profile->hei) }}"
                            >
                                {{ $user->profile->hei->name }}
                            </a>
                        </p>

                        <p class="mb-2 text-sm">
                            <b>Company Name:</b>
                            {{ $user->profile->name }}
                        </p>

                        <p class="mb-2 text-sm">
                            <b>Address:</b>
                            {{ $user->profile->address }}
                        </p>

                        <p class="mb-2 text-sm">
                            <b>Contact Number:</b>
                            {{ $user->profile->contact_number }}
                        </p>

                        <p class="mb-2 text-sm">
                            <b>Company President:</b>
                            {{ $user->profile->president }}
                        </p>

                        <p class="mb-2 text-sm">
                            <b>Memorandum of Agreement:</b>
                            <a
                                class="rounded-md bg-sky-500 p-1 px-3 text-sky-50 hover:bg-sky-400"
                                href="{{ Storage::disk('public')->url($user->profile->memorandum) }}"
                                download
                            >
                                Download
                            </a>
                        </p>

                        <p class="mb-2 text-sm">
                            <b>Faculty:</b>
                            <a
                                class="hover:underline"
                                href="{{ route('users.show', $user->profile->faculty->user->username) }}"
                            >
                                {{ $user->profile->faculty->user->full_name }}
                            </a>
                        </p>
                    </div>
                </div>
            @endrole

            @role('student', $user)
                <div class="mb-4 rounded-xl border border-zinc-200 bg-white shadow-sm">
                    <div class="border-b border-zinc-200 p-2 px-4">
                        <span class="font-semibold">Student Information</span>
                    </div>
                    <div class="p-4">
                        <p class="mb-2 text-sm">
                            <b>Contact Number:</b>
                            {{ $user->contact_number }}
                        </p>

                        <p class="mb-2 text-sm">
                            <b>HEI:</b>
                            <a
                                class="hover:underline"
                                href="{{ route('heis.show', $user->profile->hei) }}"
                            >
                                {{ $user->profile->hei->name }}
                            </a>
                        </p>

                        <p class="mb-2 text-sm">
                            <b>Course:</b>
                            {{ $user->profile->course->name }}
                        </p>

                        <p class="mb-2 text-sm">
                            <b>Adviser:</b>
                            <a
                                class="hover:underline"
                                href="{{ route('users.show', $user->profile->faculty->user->username) }}"
                            >
                                {{ $user->profile->faculty->user->full_name }}
                            </a>
                        </p>

                        <p class="mb-2 text-sm">
                            <b>HTE:</b>
                            <a
                                class="hover:underline"
                                href="{{ route('users.show', $user->profile->hte->user->username) }}"
                            >
                                {{ $user->profile->hte->name }}
                            </a>
                        </p>

                        <p class="mb-2 text-sm">
                            <b>Guardian:</b>
                            @if ($user->profile->guardian)
                                <a
                                    class="hover:underline"
                                    href="{{ route('users.show', $user->profile->guardian->user->username) }}"
                                >
                                    {{ $user->profile->guardian->user->full_name }}
                                </a>
                            @else
                                Not set
                            @endif
                        </p>
                    </div>
                </div>

                @if ($user->profile->is_graded)
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div class="rounded-xl border border-zinc-200 bg-white shadow-sm">
                            <div class="border-b border-zinc-200 p-2 px-4">
                                <span class="font-semibold">Strengths</span>
                            </div>

                            <div class="p-4">
                                @forelse ($user->profile->strengths as $strength)
                                    <p>{{ $loop->iteration }}. {{ $strength['label'] }} ({{ $strength['score'] }})</p>
                                @empty
                                    <p>No strengths.</p>
                                @endforelse
                            </div>
                        </div>

                        <div class="rounded-xl border border-zinc-200 bg-white shadow-sm">
                            <div class="border-b border-zinc-200 p-2 px-4">
                                <span class="font-semibold">Weaknesses</span>
                            </div>

                            <div class="p-4">
                                @forelse ($user->profile->weaknesses as $weakness)
                                    <p>{{ $loop->iteration }}. {{ $weakness['label'] }} ({{ $weakness['score'] }})</p>
                                @empty
                                    <p>No weaknesses.</p>
                                @endforelse
                            </div>
                        </div>

                        <div class="col-span-2 rounded-xl border border-zinc-200 bg-white shadow-sm">
                            <div class="border-b border-zinc-200 p-2 px-4">
                                <span class="font-semibold">Remarks</span>
                            </div>

                            <div class="p-4">
                                {{ $user->profile->recom ?? 'No remarks.' }}
                            </div>
                        </div>
                    </div>
                @endif

                @if (!empty($user->profile->recommendations))
                    <div class="mt-4 rounded-xl border border-zinc-200 bg-white shadow-sm">
                        <div class="border-b border-zinc-200 p-2 px-4">
                            <span class="font-semibold">Recommendations</span>
                        </div>

                        <div class="p-4">
                            <ul class="ms-4 list-disc">
                                @foreach ($user->profile->recommendations as $rec)
                                    <li class="mb-1.5">
                                        <strong>{{ $rec['label'] }} ({{ $rec['score'] }}/5):</strong>
                                        {{ $rec['message'] }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            @endrole

            @role('guardian', $user)
                <div class="rounded-xl border border-zinc-200 bg-white shadow-sm">
                    <div class="border-b border-zinc-200 p-2 px-4">
                        <span class="font-semibold">Guardian Information</span>
                    </div>
                    <div class="p-4">
                        <p class="mb-2 text-sm">
                            <b>Contact Number:</b>
                            {{ $user->contact_number }}
                        </p>

                        <p class="mb-2 text-sm">
                            <b>HEI:</b>
                            {{ $user->profile->hei->name }}
                        </p>
                        <p class="mb-2 text-sm">
                            <b>Child:</b>
                            @if ($user->profile->child)
                                <a
                                    class="hover:underline"
                                    href="{{ route('users.show', $user->profile->child->user->username) }}"
                                >
                                    {{ $user->profile->child->user->full_name }}
                                </a>
                            @else
                                Not set
                            @endif
                        </p>
                    </div>
                </div>
            @endrole
        </div>

        {{-- Created At/Updated At section --}}
        <div class="col-span-full lg:col-span-3">
            <div class="rounded-xl border border-zinc-200 bg-white p-4 shadow-sm">
                @notrole('admin', $user)
                    @php
                        $updated_at = $user->updated_at->gt($user->profile->updated_at) ? $user->updated_at : $user->profile->updated_at;
                    @endphp
                @else
                    @php
                        $updated_at = $user->updated_at;
                    @endphp
                @endnotrole
                <h4 class="font-semibold">Created</h4>
                <p class="text-sm">
                    {{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}
                </p>

                <hr class="my-2 border-zinc-100" />
                <h4 class="font-semibold">Last modified</h4>
                <p class="text-sm">
                    {{ \Carbon\Carbon::parse($updated_at)->diffForHumans() }}
                </p>
            </div>
        </div>
    </div>
@endsection

