<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

document.addEventListener('DOMContentLoaded', function () {
    // Line chart data
    const lineData = {
        labels: ['Entrante virtual', 'Entrante presencial', 'Saliente virtual', 'Saliente presencial'],
        datasets: [{
            label: '2023',
            data: [30, 35, 20, 10],
            borderColor: 'rgba(54, 162, 235, 1)',
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            fill: true,
        },
        {
            label: '2024',
            data: [40, 30, 25, 5],
            borderColor: 'rgba(255, 99, 132, 1)',
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            fill: true,
        }
        ]
    };

    const lineConfig = {
        type: 'line',
        data: lineData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    const lineCtx = document.getElementById('lineChart').getContext('2d');
    new Chart(lineCtx, lineConfig);

    // Pie chart data
    const pieData = {
        labels: ['Entrante virtual', 'Entrante presencial', 'Saliente virtual', 'Saliente presencial'],
        datasets: [{
            data: [52, 12, 8, 8],
            backgroundColor: [
                '#ff6384',
                '#36a2eb',
                '#ffcd56',
                '#4bc0c0'
            ]
        }]
    };

    const pieConfig = {
        type: 'pie',
        data: pieData,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top'
                },
                title: {
                    display: true,
                    text: 'Total de actividades'
                }
            }
        }
    };

    const pieCtx = document.getElementById('pieChart').getContext('2d');
    new Chart(pieCtx, pieConfig);

    // Floating button animation
    const button = document.getElementById('floatingButton');
    button.addEventListener('mouseenter', function () {
        button.style.transform = 'translateY(-5px)';
    });
    button.addEventListener('mouseleave', function () {
        button.style.transform = 'translateY(0)';
    });

    feather.replace(); // Initialize feather icons
});


<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

feather.replace();

