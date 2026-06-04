/**
 * assets/js/dashboard.js
 * Chart.js charts for the dashboard page.
 */
(function () {
    'use strict';

    /* ── Attendance Bar Chart ─────────────────────────── */
    const attCtx = document.getElementById('attendanceChart');
    if (attCtx) {
        new Chart(attCtx, {
            type: 'bar',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
                datasets: [
                    {
                        label: 'Present',
                        data: [89, 84, 92, 87, 83],
                        backgroundColor: '#2DB596',
                        borderRadius: 5,
                        borderSkipped: false,
                        barPercentage: 0.5,
                    },
                    {
                        label: 'Absent',
                        data: [11, 16, 8, 13, 17],
                        backgroundColor: '#E05252',
                        borderRadius: 5,
                        borderSkipped: false,
                        barPercentage: 0.5,
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    x: { grid: { display: false }, border: { display: false } },
                    y: {
                        min: 0, max: 100,
                        ticks: { stepSize: 25 },
                        grid: { color: '#f3f4f6' },
                        border: { display: false, dash: [4, 4] },
                    },
                },
            },
        });
    }

    /* ── Grade Distribution Donut ─────────────────────── */
    const gradeCtx = document.getElementById('gradeChart');
    if (gradeCtx) {
        new Chart(gradeCtx, {
            type: 'doughnut',
            data: {
                labels: ['A', 'B', 'C', 'D', 'F'],
                datasets: [{
                    data: [30, 35, 20, 10, 5],
                    backgroundColor: ['#2DB596', '#3b82f6', '#f59e0b', '#E05252', '#9ca3af'],
                    borderWidth: 0,
                    hoverOffset: 6,
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '68%',
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            font: { size: 12, family: 'Plus Jakarta Sans' },
                            usePointStyle: true,
                            pointStyleWidth: 8,
                            padding: 16,
                        },
                    },
                },
            },
        });
    }

})();