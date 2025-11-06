<div class="mb-4 grid grid-cols-1 gap-4 lg:grid-cols-2">
    @if ($student->likert_total)
        <div class="rounded-xl border border-green-600 bg-green-500 text-green-50">
            <div class="border-b border-green-600 p-2 px-4">
                <p class="text-sm">{{ $student->hte->name }} has rated your child.</p>
            </div>
            <div class="relative flex min-h-64 items-center p-2">
                <div class="w-3/5 rounded-md bg-green-600 p-2">
                    <p class="mb-2 flex justify-between border-b border-green-700 pb-1 text-sm">
                        <span class="font-semibold">Student Personality:</span>
                        <span>{{ $student->per_total }}/25</span>
                    </p>
                    <p class="mb-2 flex justify-between border-b border-green-700 pb-1 text-sm">
                        <span class="font-semibold">Technical Knowledge & Skills:</span>
                        <span>{{ $student->tech_total }}/30</span>
                    </p>
                    <p class="mb-2 flex justify-between border-b border-green-400 pb-1 text-sm">
                        <span class="font-semibold">Office Work Management:</span>
                        <span>{{ $student->office_total }}/35</span>
                    </p>
                    <p class="flex justify-between text-sm">
                        <span class="font-semibold">Total:</span>
                        <span>{{ $student->likert_total }}/90</span>
                    </p>
                </div>
                <img
                    class="absolute bottom-0 right-4 w-32 md:w-40"
                    src="{{ asset('images/grade-rated.svg') }}"
                    alt="Grade rated"
                />
            </div>
        </div>
    @else
        <div class="mb-8 rounded-xl border border-yellow-600 bg-yellow-500 md:mb-0">
            <div class="border-b border-yellow-600 p-2 px-4">
                <p class="text-sm">{{ $student->hte->name }}'s rating is pending.</p>
            </div>
            <div class="relative flex min-h-64 items-stretch p-2">
                <img
                    class="absolute -bottom-10 right-1/2 w-64 translate-x-1/2"
                    src="{{ asset('images/grade-pending.svg') }}"
                    alt="Grade rated"
                />
            </div>
        </div>
    @endif

    @if ($student->adviser_rating)
        <div class="rounded-xl border border-green-600 bg-green-500 text-green-50">
            <div class="border-b border-green-600 p-2 px-4">
                <p class="text-sm">
                    {{ $student->faculty->user->full_name }} has rated your child.
                </p>
            </div>
            <div class="relative flex min-h-64 items-center p-2">
                <div class="w-3/5 rounded-md bg-green-600 p-2">
                    <p class="flex justify-between text-sm">
                        <span class="font-semibold">Adviser rating:</span>
                        <span>{{ $student->adviser_rating }}/10</span>
                    </p>
                </div>
                <img
                    class="absolute bottom-0 right-4 w-32 md:w-40"
                    src="{{ asset('images/grade-rated.svg') }}"
                    alt="Grade rated"
                />
            </div>
        </div>
    @else
        <div class="mb-8 rounded-xl border border-yellow-600 bg-yellow-500 md:mb-0">
            <div class="border-b border-yellow-600 p-2 px-4">
                <p class="text-sm">
                    {{ $student->faculty->user->full_name }}'s rating is pending.
                </p>
            </div>
            <div class="relative flex min-h-64 items-stretch p-2">
                <img
                    class="absolute -bottom-10 right-1/2 w-64 translate-x-1/2"
                    src="{{ asset('images/grade-pending.svg') }}"
                    alt="Grade rated"
                />
            </div>
        </div>
    @endif
</div>

