<div wire:ignore>
    <canvas id="absorption-pattern"></canvas>
</div>

    <?php
        $__assetKey = '1491085486-0';

        ob_start();
    ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php
        $__output = ob_get_clean();

        // If the asset has already been loaded anywhere during this request, skip it...
        if (in_array($__assetKey, \Livewire\Features\SupportScriptsAndAssets\SupportScriptsAndAssets::$alreadyRunAssetKeys)) {
            // Skip it...
        } else {
            \Livewire\Features\SupportScriptsAndAssets\SupportScriptsAndAssets::$alreadyRunAssetKeys[] = $__assetKey;

            // Check if we're in a Livewire component or not and store the asset accordingly...
            if (isset($this)) {
                \Livewire\store($this)->push('assets', $__output, $__assetKey);
            } else {
                \Livewire\Features\SupportScriptsAndAssets\SupportScriptsAndAssets::$nonLivewireAssets[$__assetKey] = $__output;
            }
        }
    ?>

    <?php
        $__scriptKey = '1491085486-1';
        ob_start();
    ?>
    <script>
        const ctx = document.getElementById('absorption-pattern').getContext('2d');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: Array.from({
                    length: <?php echo json_encode($data['student_count'], 15, 512) ?>
                }, (_, i) => i + 1),
                datasets: [{
                        label: 'SIP',
                        data: <?php echo json_encode($data['per'], 15, 512) ?>,
                        backgroundColor: 'rgba(79, 70, 229, 0.75)',
                        borderWidth: 1,
                        borderColor: 'rgba(79, 70, 229, 0.75)',
                        hoverOffset: 4,
                    },
                    {
                        label: 'TKS',
                        data: <?php echo json_encode($data['tech'], 15, 512) ?>,
                        backgroundColor: 'rgba(249, 115, 22, 0.75)',
                        borderWidth: 1,
                        borderColor: 'rgba(249, 115, 22, 0.75)',
                        hoverOffset: 4,
                    },
                    {
                        label: 'OWM',
                        data: <?php echo json_encode($data['office'], 15, 512) ?>,
                        backgroundColor: 'rgba(16, 185, 129, 0.75)',
                        borderWidth: 1,
                        borderColor: 'rgba(16, 185, 129, 0.75)',
                        hoverOffset: 4,
                    },
                ],
            },
        });
    </script>
    <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>

<?php /**PATH C:\_projects\wimss\resources\views/livewire/absorption-pattern.blade.php ENDPATH**/ ?>