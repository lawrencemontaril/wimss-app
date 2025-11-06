@extends('layouts.dashboard-layout')

@section('title-prefix')
@endsection

@section('title')
    {{ $hei->name }}
@endsection

@section('content')
    @php
        $breadcrumbs = [
            ['name' => 'HEIs', 'url' => route('heis.index')],
            ['name' => $hei->name, 'url' => route('heis.show', $hei->id)],
        ];
    @endphp

    <x-breadcrumb :items="$breadcrumbs" />

    <header class="mb-4">
        <div class="text-red-sky flex h-40 items-end justify-center rounded-xl bg-sky-500 p-4 md:justify-start">
            <div>
                <h1 class="text-2xl font-semibold text-sky-950">
                    {{ $hei->name }}
                </h1>
                <span class="text-xs text-sky-950">HEI</span>
            </div>
        </div>
    </header>

    <div class="mb-4 rounded-xl border border-zinc-200 bg-white shadow-sm">
        <div class="border-b border-zinc-200 p-2 px-4">
            <span class="font-semibold">HEI Information</span>
        </div>
        <div class="p-4">
            <p class="text-sm">
                <b>Address:</b>
                {{ $hei->address }}
            </p>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-4 lg:grid-cols-4">
        <div class="rounded-xl border border-b-4 border-zinc-200 border-b-sky-500 bg-white p-4 shadow-sm">
            <p class="text-sm font-medium text-zinc-600">
                {{ Str::plural('Dean', $hei->deans->count()) }}
            </p>
            <h4 class="text-4xl font-semibold text-zinc-950">
                {{ $hei->deans->count() }}
            </h4>
        </div>
        <div class="rounded-xl border border-b-4 border-zinc-200 border-b-sky-500 bg-white p-4 shadow-sm">
            <p class="text-sm font-medium text-zinc-600">
                {{ Str::plural('Faculty', $hei->faculties->count()) }}
            </p>
            <h4 class="text-4xl font-semibold text-zinc-950">
                {{ $hei->faculties->count() }}
            </h4>
        </div>
        <div class="rounded-xl border border-b-4 border-zinc-200 border-b-sky-500 bg-white p-4 shadow-sm">
            <p class="text-sm font-medium text-zinc-600">
                {{ $hei->htes->count() > 1 || $hei->htes->count() == 0 ? 'HTEs' : 'HTE' }}
            </p>
            <h4 class="text-4xl font-semibold text-zinc-950">
                {{ $hei->htes->count() }}
            </h4>
        </div>
        <div class="rounded-xl border border-b-4 border-zinc-200 border-b-sky-500 bg-white p-4 shadow-sm">
            <p class="text-sm font-medium text-zinc-600">
                {{ Str::plural('Student', $hei->students->count()) }}
            </p>
            <h4 class="text-4xl font-semibold text-zinc-950">
                {{ $hei->students->count() }}
            </h4>
        </div>
    </div>
@endsection

