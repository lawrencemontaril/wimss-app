<form
    action="{{ route('students.grades-update', $student) }}"
    method="POST"
>
    @csrf
    @method('PUT')

    <div class="rounded-xl border border-zinc-200 bg-white p-4 lg:p-6">
        <h4 class="mb-6 text-2xl font-bold">I. Student Personality</h4>
        <x-likert-field
            name="per1"
            labelText="General Appearance"
        />
        <x-likert-field
            name="per2"
            labelText="Social Maturity"
        />
        <x-likert-field
            name="per3"
            labelText="Mental Alertness"
        />
        <x-likert-field
            name="per4"
            labelText="Social Confidence"
        />
        <x-likert-field
            name="per5"
            labelText="Observance to Office Etiquettes"
        />

        <hr class="my-6 border-zinc-200" />

        <h4 class="mb-6 text-2xl font-bold">II. Technical Knowledge & Skills</h4>
        <x-likert-field
            name="tech1"
            labelText="Typing Skills"
        />
        <x-likert-field
            name="tech2"
            labelText="PC Operations"
        />
        <x-likert-field
            name="tech3"
            labelText="Programming Skills"
        />
        <x-likert-field
            name="tech4"
            labelText="Basic Network Administration"
        />
        <x-likert-field
            name="tech5"
            labelText="Computer Troubleshooting"
        />
        <x-likert-field
            name="tech6"
            labelText="Communication Skills"
        />

        <hr class="my-6 border-zinc-200" />

        <h4 class="mb-6 text-2xl font-bold">III. Office Work Management</h4>
        <x-likert-field
            name="office1"
            labelText="Quality and Quantity of Work"
        />
        <x-likert-field
            name="office2"
            labelText="Promptness"
        />
        <x-likert-field
            name="office3"
            labelText="Reliability and Trustworthiness"
        />
        <x-likert-field
            name="office4"
            labelText="Interest and Initiatives"
        />
        <x-likert-field
            name="office5"
            labelText="Cooperativeness and Discipline"
        />
        <x-likert-field
            name="office6"
            labelText="Observance of Proper Office Procedures"
        />
        <x-likert-field
            name="office7"
            labelText="Judgement Ability"
        />
    </div>

    <div>
        <label for="recom">Remarks</label>

        <textarea
            class="my-1 block w-full rounded-lg border border-zinc-200 bg-white p-2.5 px-3 text-sm outline-none transition-all duration-150 ease-in-out focus:border-sky-500 focus:ring-0"
            id="recom"
            name="recom"
            placeholder="Leave a comment"
        ></textarea>
    </div>

    <div class="mt-4 flex gap-2">
        <button
            class="max-w-fit text-nowrap rounded-full bg-sky-500 p-3 px-6 text-sm font-semibold text-sky-50 outline-none ring-sky-500/50 transition-all duration-150 ease-in-out hover:bg-sky-600 focus:ring-4"
            type="submit"
        >
            Mark grade
        </button>
        <a
            class="max-w-fit text-nowrap rounded-full border border-zinc-200 bg-white p-3 px-6 text-sm font-semibold outline-none ring-zinc-200/50 transition-all duration-150 ease-in-out hover:bg-zinc-50 focus:ring-4"
            href="{{ route('students.index') }}"
        >
            Cancel
        </a>
    </div>
</form>

