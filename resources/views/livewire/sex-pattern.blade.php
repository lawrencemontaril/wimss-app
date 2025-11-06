<div wire:ignore>
    <canvas id="sex-pattern"></canvas>
</div>

@assets
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endassets

@script
    <script>
        const data = @json($data)

        const labels = data.map((student) => student.sex);
        const total_students = data.map((student) => student.total_students)
        
        const tailwindColors = [
            'rgba(19, 3, 62, 0.75)',
            'rgba(210, 12, 197, 0.75)',
            
        ];
        const chartData = {
            labels: labels,
            datasets: [{
                    axis: 'x',
                    label: '',
                    data: total_students,
                    fill: true,
                    backgroundColor: tailwindColors,
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
                        max: 40, // Sets the maximum value of the y-axis to 100
                        grid: {
                            color: 'rgba(113, 113, 122, 0.75)', // Custom color for x-axis grid lines
                        },
                    },
                    x: {
                        beginAtZero: true,
                        max: 40, // Sets the maximum value of the y-axis to 100
                        grid: {
                            color: 'rgba(113, 113, 122, 0.75)', // Custom color for x-axis grid lines
                        },
                    },
                },
            },
        };
        new Chart(
            document.getElementById('sex-pattern'),
            config,
        );
    </script>
@endscript

