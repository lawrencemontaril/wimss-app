<div wire:ignore>
    <canvas id="top-student-chart"></canvas>
</div>

@assets
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endassets

@script
    <script>
        const data = @json($data);

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
@endscript

