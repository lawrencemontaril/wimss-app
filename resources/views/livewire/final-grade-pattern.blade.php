<div wire:ignore>
    <canvas id="final-grade-pattern"></canvas>
</div>

@assets
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endassets

@script
    <script>
        const ctx = document.getElementById('final-grade-pattern').getContext('2d');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: Array.from({
                    length: @json($data['student_count'])
                }, (_, i) => i + 1),
                datasets: [{
                        label: 'Adviser Rating Pattern',
                        data: @json($data['adviser_rating']),
                        backgroundColor: 'rgba(79, 70, 229, 0.75)',
                        borderWidth: 1,
                        borderColor: 'rgba(79, 70, 229, 0.75)',
                        hoverOffset: 4,
                    },
                  
                  
                ],
            },
        });
    </script>
@endscript

