<div wire:ignore>
    <canvas id="top-department-chart"></canvas>
</div>

@assets
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endassets

@script
    <script>
        const data = @json($data);

        const labels = data.map((department) => department.course_code);
        const absorptionRate = data.map((department) => department.absorption_rate);
        const averageGrade = data.map((department) => department.average_grade);

        const chartData = {
            labels: labels,
            datasets: [{
                    axis: 'x',
                    label: 'Absorption rate',
                    data: absorptionRate,
                    fill: true,
                    backgroundColor: 'rgba(234, 179, 8, 0.75)',
                    borderColor: 'rgba(113, 113, 122, 0.75)',
                    borderWidth: 1,
                },
                {
                    axis: 'x',
                    label: 'Average grade',
                    data: averageGrade,
                    fill: true,
                    backgroundColor: 'rgba(34, 197, 94, 0.75)',
                    borderColor: 'rgba(113, 113, 122, 0.75)',
                    borderWidth: 1,
                },
            ],
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

        new Chart(
            document.getElementById('top-department-chart'),
            config,
        );
    </script>
@endscript

