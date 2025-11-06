<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="lg:px-32">
        <div class="mx-auto max-w-8xl p-2">
            <div class="mb-4 flex h-[50dvh] max-h-[768px] min-h-[32rem]">
                <div class="relative w-full overflow-hidden rounded-xl">
                    <div class="flex h-full transition-transform duration-500 ease-in-out" id="carousel">
                        <!-- Carousel items -->
                        <div class="carousel-item relative min-w-full bg-red-500 text-center text-white transition-transform duration-500 ease-in-out">
                            <img class="h-full w-full object-cover" src="<?php echo e(asset('images/index-carousel-1.jpg')); ?>" alt="" />
                            <div class="absolute left-0 top-0 flex h-full w-full flex-col items-center justify-center gap-4 bg-zinc-800/50 p-2 px-24">
                                <h1 class="text-2xl md:text-5xl">
                                    Recommend eligible students
                                </h1>
                                <p class="text-sm md:text-lg">
                                    Recommend your deserving OJT students for an actual job.
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item relative min-w-full bg-blue-500 text-center text-white transition-transform duration-500 ease-in-out">
                            <img class="h-full w-full object-cover" src="<?php echo e(asset('images/index-carousel-2.jpg')); ?>" alt="" />
                            <div class="absolute left-0 top-0 flex h-full w-full flex-col items-center justify-center gap-4 bg-zinc-800/50 p-2 px-24">
                                <h1 class="text-2xl md:text-5xl">Automate the process</h1>
                                <p class="text-sm md:text-lg">
                                    What takes business days will take less than a second.
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item relative min-w-full bg-green-500 text-center text-white transition-transform duration-500 ease-in-out">
                            <img class="h-full w-full object-cover" src="<?php echo e(asset('images/index-carousel-3.jpg')); ?>" alt="" />
                            <div class="absolute left-0 top-0 flex h-full w-full flex-col items-center justify-center gap-4 bg-zinc-800/50 p-2 px-24">
                                <h1 class="text-2xl md:text-5xl">Save time and paperworks</h1>
                                <p class="text-sm md:text-lg">
                                    Reduce administrative tasks and phone calls.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation buttons -->
                    <button class="group absolute left-0 top-0 h-full p-2 px-4 text-zinc-400 md:px-16" id="prev">
                        <svg class="h-12 w-12 transition-transform duration-150 ease-in-out group-hover:-translate-x-1 group-hover:text-zinc-200" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                    </button>
                    <button class="group absolute right-0 top-0 h-full p-2 px-4 text-zinc-400 md:px-16" id="next">
                        <svg class="h-12 w-12 transition-transform duration-150 ease-in-out group-hover:translate-x-1 group-hover:text-zinc-200" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="mb-4 rounded-xl border border-zinc-200 bg-white p-4 lg:px-16">
                <h1 class="text-xl font-semibold md:text-2xl">What is WIMSS?</h1>
                <hr class="my-2 border-zinc-200" />
                <p class="indent-12">
                    WIMSS (Web-based Internship Management and Supervision System) is an
                    innovative platform designed to help academic institutions, host
                    training establishments (HTEs), and students seamlessly track and
                    enhance the absorption rate of interns into the workforce. With tools
                    tailored for Deans, Faculties, HTEs, Students, and Guardians, our site
                    ensures transparent and efficient management of internship outcomes.
                    Monitor progress, identify trends, and support students as they
                    transition from interns to full-time professionals.
                </p>
            </div>

            <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </section>

    <script>
        // JavaScript for carousel functionality
        document.addEventListener('DOMContentLoaded', function() {
            const carousel = document.getElementById('carousel');
            const items = document.querySelectorAll('.carousel-item');
            const totalItems = items.length;
            let currentIndex = 0;

            function updateCarousel() {
                const offset = -currentIndex * 100;
                carousel.style.transform = `translateX(${offset}%)`;
            }

            document.getElementById('prev').addEventListener('click', function() {
                currentIndex = currentIndex > 0 ? currentIndex - 1 : totalItems - 1;
                updateCarousel();
            });

            document.getElementById('next').addEventListener('click', function() {
                currentIndex = (currentIndex + 1) % totalItems;
                updateCarousel();
            });

            // Optional: Auto-play functionality
            setInterval(function() {
                currentIndex = (currentIndex + 1) % totalItems;
                updateCarousel();
            }, 5000);
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.home-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\_projects\wimss\resources\views/pages/welcome.blade.php ENDPATH**/ ?>