<div wire:ignore>
    <canvas id="grade-status-chart"></canvas>
</div>

@assets
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endassets

@script
    <script>
        const ctx = document.getElementById('grade-status-chart').getContext('2d');

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: @json($labels),
                datasets: [{
                    data: @json($data),
                    backgroundColor: ['rgb(34, 197, 94, 0.75)', 'rgb(239, 68, 68, 0.75)', 'rgb(234, 179, 8, 0.75)'],
                    borderWidth: 1,
                    borderColor: 'rgba(113, 113, 122, 0.75)',
                    hoverOffset: 4,
                }, ],
            },
        });
    </script>
@endscript

