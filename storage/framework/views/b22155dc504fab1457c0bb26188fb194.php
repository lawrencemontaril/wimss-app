<footer>
    <div class="flex flex-col items-center justify-between gap-4 border-zinc-200 bg-white p-4 md:flex-row md:rounded-xl md:border">
        <div class="flex items-center gap-2">
            <img
                class="h-8 w-8"
                src="<?php echo e(asset('images/wimss-icon.png')); ?>"
                alt="WIMSS Icon"
            />
            <?php echo e(env('APP_NAME')); ?>

        </div>

        <ul class="flex items-center gap-2">
            <li>
                <a
                    class="rounded-full border border-zinc-200 bg-zinc-100 p-2 px-4 text-sm hover:border-zinc-700 hover:bg-zinc-800 hover:text-zinc-50"
                    href="#"
                >
                    Home
                </a>
            </li>
            <li>
                <a
                    class="rounded-full border border-zinc-200 bg-zinc-100 p-2 px-4 text-sm hover:border-zinc-700 hover:bg-zinc-800 hover:text-zinc-50"
                    href="#"
                >
                    Features
                </a>
            </li>
            <li>
                <a
                    class="rounded-full border border-zinc-200 bg-zinc-100 p-2 px-4 text-sm hover:border-zinc-700 hover:bg-zinc-800 hover:text-zinc-50"
                    href="#"
                >
                    FAQs
                </a>
            </li>
            <li>
                <a
                    class="rounded-full border border-zinc-200 bg-zinc-100 p-2 px-4 text-sm hover:border-zinc-700 hover:bg-zinc-800 hover:text-zinc-50"
                    href="#"
                >
                    About
                </a>
            </li>
        </ul>
    </div>
</footer>

<?php /**PATH C:\wamp\www\wimss_prod\resources\views/partials/footer.blade.php ENDPATH**/ ?>