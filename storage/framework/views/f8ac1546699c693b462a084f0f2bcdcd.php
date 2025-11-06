<div class="mb-4 grid grid-cols-1 gap-4 lg:grid-cols-2">
    <?php if($student->likert_total): ?>
        <div class="rounded-xl border border-green-600 bg-green-500 text-green-50">
            <div class="border-b border-green-600 p-2 px-4">
                <p class="text-sm"><?php echo e($student->hte->name); ?> has rated you.</p>
            </div>
            <div class="relative flex min-h-64 items-center p-2">
                <div class="w-3/5 rounded-md bg-green-600 p-2">
                    <p class="mb-2 flex justify-between border-b border-green-700 pb-1 text-sm">
                        <span class="font-semibold">Student Personality:</span>
                        <span><?php echo e($student->per_total); ?>/25</span>
                    </p>
                    <p class="mb-2 flex justify-between border-b border-green-700 pb-1 text-sm">
                        <span class="font-semibold">Technical Knowledge & Skills:</span>
                        <span><?php echo e($student->tech_total); ?>/30</span>
                    </p>
                    <p class="mb-2 flex justify-between border-b border-green-400 pb-1 text-sm">
                        <span class="font-semibold">Office Work Management:</span>
                        <span><?php echo e($student->office_total); ?>/35</span>
                    </p>
                    <p class="flex justify-between text-sm">
                        <span class="font-semibold">Total:</span>
                        <span><?php echo e($student->likert_total); ?>/90</span>
                    </p>
                </div>
                <img
                    class="absolute bottom-0 right-4 w-32 md:w-40"
                    src="<?php echo e(asset('images/grade-rated.svg')); ?>"
                    alt="Grade rated"
                />
            </div>
        </div>
    <?php else: ?>
        <div class="mb-8 rounded-xl border border-yellow-600 bg-yellow-500 md:mb-0">
            <div class="border-b border-yellow-600 p-2 px-4">
                <p class="text-sm"><?php echo e($student->hte->name); ?>'s rating is pending.</p>
            </div>
            <div class="relative flex min-h-64 items-stretch p-2">
                <img
                    class="absolute -bottom-10 right-1/2 w-64 translate-x-1/2"
                    src="<?php echo e(asset('images/grade-pending.svg')); ?>"
                    alt="Grade rated"
                />
            </div>
        </div>
    <?php endif; ?>

    <?php if($student->adviser_rating): ?>
        <div class="rounded-xl border border-green-600 bg-green-500 text-green-50">
            <div class="border-b border-green-600 p-2 px-4">
                <p class="text-sm">
                    <?php echo e($student->faculty->user->full_name); ?> has rated you.
                </p>
            </div>
            <div class="relative flex min-h-64 items-center p-2">
                <div class="w-3/5 rounded-md bg-green-600 p-2">
                    <p class="flex justify-between text-sm">
                        <span class="font-semibold">Adviser rating:</span>
                        <span><?php echo e($student->adviser_rating); ?>/10</span>
                    </p>
                </div>
                <img
                    class="absolute bottom-0 right-4 w-32 md:w-40"
                    src="<?php echo e(asset('images/grade-rated.svg')); ?>"
                    alt="Grade rated"
                />
            </div>
        </div>
    <?php else: ?>
        <div class="mb-8 rounded-xl border border-yellow-600 bg-yellow-500 md:mb-0">
            <div class="border-b border-yellow-600 p-2 px-4">
                <p class="text-sm">
                    <?php echo e($student->faculty->user->full_name); ?>'s rating is pending.
                </p>
            </div>
            <div class="relative flex min-h-64 items-stretch p-2">
                <img
                    class="absolute -bottom-10 right-1/2 w-64 translate-x-1/2"
                    src="<?php echo e(asset('images/grade-pending.svg')); ?>"
                    alt="Grade rated"
                />
            </div>
        </div>
    <?php endif; ?>
</div>

<?php if($student->final_grade): ?>
    <div class="mb-4 flex items-center justify-between gap-1 rounded-xl border border-zinc-200 bg-white p-1">
        <div class="flex items-center gap-1">
            <a
                class="flex items-center gap-2 rounded-lg bg-sky-500 px-3 py-2 text-xs text-sky-50 hover:bg-sky-400"
                href="<?php echo e(route('students.grades-show', $student)); ?>"
            >
                <svg
                    class="size-4"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"
                    />
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                    />
                </svg>

                See full report
            </a>
        </div>
    </div>
<?php endif; ?>

<?php /**PATH /home/wimssph/public_html/wimss_prod/resources/views/components/dashboard/student-dashboard.blade.php ENDPATH**/ ?>