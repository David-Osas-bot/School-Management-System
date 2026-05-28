<?php
session_start();
$currentPage = 'dashboard';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — Schoolify</title>
    <link rel="stylesheet" href="/SMS/school-management/assets/css/sidebar.css">
    <link rel="stylesheet" href="/SMS/school-management/assets/css/header.css">
    <link rel="stylesheet" href="/SMS/school-management/assets/css/dashboard.css">
</head>

<body>

    <?php include '../includes/sidebar.php'; ?>
    <?php include '../includes/header.php'; ?>

    <div class="content-wrapper">
        <main class="dash-main">

            <!-- Page Title -->
            <div class="dash-title">
                <h1>Dashboard</h1>
                <p>Welcome back! Here's an overview of your school.</p>
            </div>

            <!-- Stat Cards -->
            <div class="dash-cards">

                <div class="stat-card stat-blue">
                    <div class="stat-card-body">
                        <div class="stat-info">
                            <span class="stat-label">Total Students</span>
                            <span class="stat-value">1,247</span>
                            <span class="stat-change positive">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="13" height="13">
                                    <polyline points="18 15 12 9 6 15" />
                                </svg>
                                +12% vs last month
                            </span>
                        </div>
                        <div class="stat-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" width="26" height="26">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="stat-card stat-teal">
                    <div class="stat-card-body">
                        <div class="stat-info">
                            <span class="stat-label">Total Teachers</span>
                            <span class="stat-value">84</span>
                            <span class="stat-change positive">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="13" height="13">
                                    <polyline points="18 15 12 9 6 15" />
                                </svg>
                                +3% vs last month
                            </span>
                        </div>
                        <div class="stat-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" width="26" height="26">
                                <path d="M22 10v6M2 10l10-5 10 5-10 5z" />
                                <path d="M6 12v5c3 3 9 3 12 0v-5" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="stat-card stat-amber">
                    <div class="stat-card-body">
                        <div class="stat-info">
                            <span class="stat-label">Active Classes</span>
                            <span class="stat-value">36</span>
                            <span class="stat-change neutral">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="13" height="13">
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                </svg>
                                0% vs last month
                            </span>
                        </div>
                        <div class="stat-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" width="26" height="26">
                                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="stat-card stat-red">
                    <div class="stat-card-body">
                        <div class="stat-info">
                            <span class="stat-label">Fee Collection</span>
                            <span class="stat-value">$142,500</span>
                            <span class="stat-change negative">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="13" height="13">
                                    <polyline points="6 9 12 15 18 9" />
                                </svg>
                                -5% vs last month
                            </span>
                        </div>
                        <div class="stat-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" width="26" height="26">
                                <line x1="12" y1="1" x2="12" y2="23" />
                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                            </svg>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Charts Row -->
            <div class="dash-charts">

                <!-- Weekly Attendance Bar Chart -->
                <div class="chart-card chart-wide">
                    <h2 class="chart-title">Weekly Attendance</h2>
                    <div class="chart-legend">
                        <span class="legend-dot" style="background:#2DB596;"></span> Present
                        <span class="legend-dot" style="background:#E05252; margin-left:16px;"></span> Absent
                    </div>
                    <div class="chart-wrap">
                        <canvas id="attendanceChart"></canvas>
                    </div>
                </div>

                <!-- Grade Distribution Donut Chart -->
                <div class="chart-card chart-narrow">
                    <h2 class="chart-title">Grade Distribution</h2>
                    <div class="chart-wrap chart-donut-wrap">
                        <canvas id="gradeChart"></canvas>
                    </div>
                </div>

            </div>

        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script src="/SMS/school-management/assets/js/sidebar.js"></script>
    <script>
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
                            generateLabels: function(chart) {
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
    </script>
</body>

</html>