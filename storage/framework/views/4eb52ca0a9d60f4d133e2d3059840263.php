<div wire:ignore>
    <canvas id="top-student-chart"></canvas>
</div>

    <?php
        $__assetKey = '1193651466-0';

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
        $__scriptKey = '1193651466-1';
        ob_start();
    ?>
    <script>
        const data = <?php echo json_encode($data, 15, 512) ?>;

        const labels = data.map((student) => student.full_name);
        const students = data.map((student) => student.final_grade);

        const finalGradeColors = [
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
                label: 'Final grade',
                data: students,
                fill: true,
                backgroundColor: finalGradeColors,
                borderColor: 'rgba(113, 113, 122, 0.75)',
                borderWidth: 1,
                max: 100,
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

        new Chart(document.getElementById('top-student-chart'), config);
    </script>
    <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>

<?php /**PATH /home/wimssph/public_html/wimss_prod/resources/views/livewire/top-student-chart.blade.php ENDPATH**/ ?>