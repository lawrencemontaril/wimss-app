<div wire:ignore>
    <canvas id="absorption-pattern"></canvas>
</div>

@assets
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endassets

@script
    <script>
        const ctx = document.getElementById('absorption-pattern').getContext('2d');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: Array.from({
                    length: @json($data['student_count'])
                }, (_, i) => i + 1),
                datasets: [{
                        label: 'SIP',
                        data: @json($data['per']),
                        backgroundColor: 'rgba(79, 70, 229, 0.75)',
                        borderWidth: 1,
                        borderColor: 'rgba(79, 70, 229, 0.75)',
                        hoverOffset: 4,
                    },
                    {
                        label: 'TKS',
                        data: @json($data['tech']),
                        backgroundColor: 'rgba(249, 115, 22, 0.75)',
                        borderWidth: 1,
                        borderColor: 'rgba(249, 115, 22, 0.75)',
                        hoverOffset: 4,
                    },
                    {
                        label: 'OWM',
                        data: @json($data['office']),
                        backgroundColor: 'rgba(16, 185, 129, 0.75)',
                        borderWidth: 1,
                        borderColor: 'rgba(16, 185, 129, 0.75)',
                        hoverOffset: 4,
                    },
                ],
            },
        });
    </script>
@endscript

