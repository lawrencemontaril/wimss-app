@extends('layouts.dashboard-layout')

@section('title')
    - Create a Student
@endsection

@section('content')
    @php
        $breadcrumbs = [
            ['name' => 'Students', 'url' => route('students.index')],
            ['name' => $student->user->full_name, 'url' => route('users.show', $student->user->username)],
            ['name' => 'Grades', 'url' => ''],
        ];
    @endphp

    <x-breadcrumb :items="$breadcrumbs" />

    <div class="rounded-xl border border-zinc-200 bg-white">
        <div class="border-b border-zinc-200 p-4">
            <p class="font-semibold">Student Report Card</p>
        </div>
        <div class="p-2">
            <div class="mb-2 grid grid-cols-1 gap-2 border border-zinc-200 lg:grid-cols-3">
                <div class="p-2">
                    <p class="text-xs">FULL NAME</p>
                    <p class="text-base font-semibold">
                        {{ $student->user->full_name }}
                    </p>
                </div>
                <div class="p-2">
                    <p class="text-xs">COURSE</p>
                    <p class="text-base font-semibold">
                        {{ $student->course->name }}
                    </p>
                </div>
                <div class="p-2">
                    <p class="text-xs">SCHOOL YEAR</p>
                    <p class="text-base font-semibold">
                        {{ $student->school_year }} - {{ $student->school_year + 1 }}
                    </p>
                </div>
            </div>

            <div class="mb-2 grid grid-cols-1 gap-2 border border-zinc-200 lg:grid-cols-3">
                <div class="p-2">
                    <p class="text-xs">PROFESSOR</p>
                    <p class="text-base font-semibold">
                        {{ $student->faculty->user->full_name }}
                    </p>
                </div>
                <div class="col-span-2 p-2">
                    <p class="text-xs">HTE</p>
                    <p class="text-base font-semibold">
                        {{ $student->hte->name }}
                    </p>
                </div>
            </div>

            <div class="mb-2 border border-zinc-200">
                <div class="bg-zinc-200 p-2 text-center text-sm font-medium">
                    Student Personality
                </div>

                <x-likert-grid
                    labelText="General Appearance"
                    :value="$student->per1"
                />
                <x-likert-grid
                    labelText="Social Maturity"
                    :value="$student->per2"
                />
                <x-likert-grid
                    labelText="Mental Alertness"
                    :value="$student->per3"
                />
                <x-likert-grid
                    labelText="Social Confidence"
                    :value="$student->per4"
                />
                <x-likert-grid
                    labelText="Observance to Office Etiquettes"
                    :value="$student->per5"
                />

                <div class="grid grid-cols-3 border-t border-zinc-200 lg:grid-cols-7">
                    <div class="col-span-2 flex items-center p-2 text-sm font-medium lg:col-span-6">
                        Total
                    </div>
                    <div class="flex items-center justify-center p-2 pe-4 text-xl font-semibold">
                        {{ $student->per_total }}/25
                    </div>
                </div>
            </div>

            <div class="mb-2 border border-zinc-200">
                <div class="bg-zinc-200 p-2 text-center text-sm font-medium">
                    Technical Knowledge & Skills
                </div>

                <x-likert-grid
                    labelText="Typing Skills"
                    :value="$student->tech1"
                />
                <x-likert-grid
                    labelText="PC Operations"
                    :value="$student->tech2"
                />
                <x-likert-grid
                    labelText="Programming Skills"
                    :value="$student->tech3"
                />
                <x-likert-grid
                    labelText="Basic Network Administration"
                    :value="$student->tech4"
                />
                <x-likert-grid
                    labelText="Computer Troubleshooting"
                    :value="$student->tech5"
                />
                <x-likert-grid
                    labelText="Communication Skills"
                    :value="$student->tech6"
                />

                <div class="grid grid-cols-3 border-t border-zinc-200 lg:grid-cols-7">
                    <div class="col-span-2 flex items-center p-2 text-sm font-medium lg:col-span-6">
                        Total
                    </div>
                    <div class="flex items-center justify-center p-2 pe-4 text-xl font-semibold">
                        {{ $student->tech_total }}/30
                    </div>
                </div>
            </div>

            <div class="mb-2 border border-zinc-200">
                <div class="bg-zinc-200 p-2 text-center text-sm font-medium">
                    Office Work Management
                </div>

                <x-likert-grid
                    labelText="Quality and Quantity of Work"
                    :value="$student->office1"
                />
                <x-likert-grid
                    labelText="Promptness"
                    :value="$student->office2"
                />
                <x-likert-grid
                    labelText="Reliability and Trustworthiness"
                    :value="$student->tech3"
                />
                <x-likert-grid
                    labelText="Interest and Initiatives"
                    :value="$student->office4"
                />
                <x-likert-grid
                    labelText="Cooperativeness and Discipline"
                    :value="$student->office5"
                />
                <x-likert-grid
                    labelText="Observance of Proper Office Procedures"
                    :value="$student->office6"
                />
                <x-likert-grid
                    labelText="Judgement Ability"
                    :value="$student->office7"
                />

                <div class="grid grid-cols-3 border-t border-zinc-200 lg:grid-cols-7">
                    <div class="col-span-2 flex items-center p-2 text-sm font-medium lg:col-span-6">
                        Total
                    </div>
                    <div class="flex items-center justify-center p-2 pe-4 text-xl font-semibold">
                        {{ $student->office_total }}/35
                    </div>
                </div>
            </div>

            <div class="mb-2 border border-zinc-200">
                <div class="bg-zinc-200 p-2 text-center text-sm font-medium">
                    Final Grade
                </div>

                <div class="grid grid-cols-3 border-t border-zinc-200 lg:grid-cols-7">
                    <div class="col-span-2 flex items-center p-2 text-sm font-medium lg:col-span-6">
                        HTE Rating
                    </div>
                    <div class="flex items-center justify-center p-2 pe-4 text-xl font-semibold">
                        {{ $student->likert_total }}/90
                    </div>
                </div>

                <div class="grid grid-cols-3 border-t border-zinc-200 lg:grid-cols-7">
                    <div class="col-span-2 flex items-center p-2 text-sm font-medium lg:col-span-6">
                        Adviser Rating
                    </div>
                    <div class="flex items-center justify-center p-2 pe-4 text-xl font-semibold">
                        {{ $student->adviser_rating }}/10
                    </div>
                </div>

                <div class="grid grid-cols-3 border-t border-zinc-200 lg:grid-cols-7">
                    <div class="col-span-2 flex items-center p-2 text-sm font-medium lg:col-span-6">
                        Total
                    </div>
                    <div class="flex items-center justify-center p-2 pe-4 text-xl font-semibold">
                        {{ $student->final_grade }}/100
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

