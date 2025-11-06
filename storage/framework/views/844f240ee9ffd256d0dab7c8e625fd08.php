<nav class="sticky top-0 z-50 border-b border-zinc-200 bg-white p-3 lg:px-32">
    <div class="mx-auto flex max-w-8xl items-center justify-between">
        <a
            class="flex items-center gap-2 text-xl font-bold"
            href="<?php echo e(route('index')); ?>"
        >
            <img
                class="h-8 w-8"
                src="<?php echo e(asset('images/wimss-icon.png')); ?>"
                alt="WIMSS Icon"
            />
            WIMSS
        </a>

        <?php if(auth()->guard()->guest()): ?>
            <a
                class="rounded-full bg-sky-500 px-6 py-2 text-sm font-bold text-zinc-50 hover:bg-sky-400"
                href="<?php echo e(route('sign_in')); ?>"
            >
                Sign in
            </a>
        <?php else: ?>
            <div class="flex items-center gap-2">
                <a
                    class="rounded-full border border-zinc-200 bg-zinc-50 px-6 py-2 text-sm font-bold text-zinc-950 hover:bg-zinc-100"
                    href="<?php echo e(route('dashboard')); ?>"
                >
                    Dashboard
                </a>
                <form
                    class="hidden"
                    action="<?php echo e(route('sign_out')); ?>"
                    method="POST"
                >
                    <?php echo csrf_field(); ?>
                </form>
                <button
                    class="rounded-full bg-red-500 px-6 py-2 text-sm font-bold text-red-50 hover:bg-red-400"
                    id="sign_out"
                    onclick="sign_out(event)"
                >
                    Sign out
                </button>
            </div>
        <?php endif; ?>
    </div>
</nav>

<?php /**PATH /home/wimssph/public_html/wimss_prod/resources/views/partials/navbar.blade.php ENDPATH**/ ?>