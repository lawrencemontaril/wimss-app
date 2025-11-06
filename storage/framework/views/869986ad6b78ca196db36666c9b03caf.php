<div wire:ignore>
    <canvas id="grade-status-chart"></canvas>
</div>

    <?php
        $__assetKey = '3798129499-0';

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
        $__scriptKey = '3798129499-1';
        ob_start();
    ?>
    <script>
        const ctx = document.getElementById('grade-status-chart').getContext('2d');

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode($labels, 15, 512) ?>,
                datasets: [{
                    data: <?php echo json_encode($data, 15, 512) ?>,
                    backgroundColor: ['rgb(34, 197, 94, 0.75)', 'rgb(239, 68, 68, 0.75)', 'rgb(234, 179, 8, 0.75)'],
                    borderWidth: 1,
                    borderColor: 'rgba(113, 113, 122, 0.75)',
                    hoverOffset: 4,
                }, ],
            },
        });
    </script>
    <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>

<?php /**PATH /home/wimssph/public_html/wimss_prod/resources/views/livewire/grade-status-chart.blade.php ENDPATH**/ ?>