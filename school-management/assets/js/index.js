// ── Weekly Attendance Bar Chart ──────────────────────────────
const attendanceCtx = document.getElementById('attendanceChart').getContext('2d');
new Chart(attendanceCtx, {
    type: 'bar',
    data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
        datasets: [{
            label: 'Present',
            data: [92, 88, 95, 90, 85],
            backgroundColor: '#2DB596',
            borderRadius: 4,
            barPercentage: 0.5,
            categoryPercentage: 0.6
        },
        {
            label: 'Absent',
            data: [8, 12, 5, 10, 15],
            backgroundColor: '#E05252',
            borderRadius: 4,
            barPercentage: 0.5,
            categoryPercentage: 0.6
        }
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            x: {
                grid: {
                    display: false
                },
                ticks: {
                    color: '#9ca3af',
                    font: {
                        size: 12
                    }
                },
                border: {
                    display: false
                }
            },
            y: {
                min: 0,
                max: 100,
                grid: {
                    color: 'rgba(0,0,0,0.06)',
                    drawTicks: false
                },
                ticks: {
                    color: '#9ca3af',
                    font: {
                        size: 12
                    },
                    padding: 8,
                    stepSize: 25
                },
                border: {
                    display: false,
                    dash: [4, 4]
                }
            }
        }
    }
});

// ── Grade Distribution Donut Chart ──────────────────────────
const gradeCtx = document.getElementById('gradeChart').getContext('2d');
new Chart(gradeCtx, {
    type: 'doughnut',
    data: {
        labels: ['A', 'B', 'C', 'D', 'F'],
        datasets: [{
            data: [30, 35, 20, 10, 5],
            backgroundColor: ['#22c55e', '#2DB596', '#f59e0b', '#E05252', '#6b7280'],
            borderWidth: 2,
            borderColor: '#ffffff',
            hoverOffset: 6
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        cutout: '65%',
        plugins: {
            legend: {
                position: 'right',
                labels: {
                    color: '#374151',
                    font: {
                        size: 13
                    },
                    padding: 16,
                    usePointStyle: true,
                    pointStyleWidth: 10,
                    generateLabels: function (chart) {
                        const data = chart.data;
                        return data.labels.map((label, i) => ({
                            text: `${label}  ${data.datasets[0].data[i]}%`,
                            fillStyle: data.datasets[0].backgroundColor[i],
                            strokeStyle: data.datasets[0].backgroundColor[i],
                            pointStyle: 'circle',
                            index: i
                        }));
                    }
                }
            },
            tooltip: {
                callbacks: {
                    label: ctx => ` ${ctx.label}: ${ctx.parsed}%`
                }
            }
        }
    }
});