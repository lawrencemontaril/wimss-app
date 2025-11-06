<div wire:ignore>
    <canvas id="top-hei-chart"></canvas>
</div>

    <?php
        $__assetKey = '2344728140-0';

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
        $__scriptKey = '2344728140-1';
        ob_start();
    ?>
    <script>
        const data = <?php echo json_encode($data, 15, 512) ?>;

        const labels = data.map(hei => hei.name);
        const averageGrades = data.map((hei) => hei.absorption_rate);
        const totalStudents = data.map((hei) => hei.total_students);

        const tailwindColors = [
            'rgba(234, 179, 8, 0.75)',
            'rgba(113, 113, 122, 0.75)',
            'rgba(124, 45, 18, 0.75)',
            'rgba(173, 173, 173, 0.75)',
            'rgba(173, 173, 173, 0.75)',
            'rgba(173, 173, 173, 0.75)',
            'rgba(173, 173, 173, 0.75)',
            'rgba(173, 173, 173, 0.75)',
            'rgba(173, 173, 173, 0.75)',
            'rgba(173, 173, 173, 0.75)',
        ];

        const chartData = {
            labels: labels,
            datasets: [{
                axis: 'x',
                label: 'Absorption rate',
                data: averageGrades,
                fill: true,
                backgroundColor: tailwindColors,
                borderColor: 'rgba(113, 113, 122, 0.75)',
                borderWidth: 1,
            }, ],
        };

        const config = {
            type: 'bar',
            data: chartData,
            options: {
                indexAxis: 'x',
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100, // Sets the maximum value of the y-axis to 100
                        grid: {
                            color: 'rgba(113, 113, 122, 0.75)', // Custom color for x-axis grid lines
                        },
                    },
                    x: {
                        beginAtZero: true,
                        max: 100, // Sets the maximum value of the y-axis to 100
                        grid: {
                            color: 'rgba(113, 113, 122, 0.75)', // Custom color for x-axis grid lines
                        },
                    },
                },
            },
        };

        new Chart(document.getElementById('top-hei-chart'), config);
    </script>
    <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>

<?php /**PATH /home/wimssph/public_html/wimss_prod/resources/views/livewire/top-hei-chart.blade.php ENDPATH**/ ?>