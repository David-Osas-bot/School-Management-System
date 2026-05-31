<?php
session_start();
$currentPage = 'index';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — Schoolify</title>
    
    <link rel="stylesheet" href="/SMS/school-management/assets/css/students.css">
</head>

<body>

    <?php include '../includes/layout_start.php'; ?>



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

            <div class="ra-card">
                <div class="ra-header">
                    <h2>Recent Activity</h2>
                </div>
                <ul class="ra-list">
                    <li class="ra-item">
                        <div class="ra-left">
                            <span class="ra-dot"></span>
                            <span class="ra-text">New student registration: Sarah Johnson</span>
                        </div>
                        <span class="ra-time">2 min ago</span>
                    </li>
                    <li class="ra-item">
                        <div class="ra-left">
                            <span class="ra-dot"></span>
                            <span class="ra-text">Grade posted for Class 10A Mathematics</span>
                        </div>
                        <span class="ra-time">15 min ago</span>
                    </li>
                    <li class="ra-item">
                        <div class="ra-left">
                            <span class="ra-dot"></span>
                            <span class="ra-text">Fee payment received from Mark Wilson</span>
                        </div>
                        <span class="ra-time">1 hour ago</span>
                    </li>
                    <li class="ra-item">
                        <div class="ra-left">
                            <span class="ra-dot"></span>
                            <span class="ra-text">Teacher leave approved: Mr. David Chen</span>
                        </div>
                        <span class="ra-time">2 hours ago</span>
                    </li>
                    <li class="ra-item">
                        <div class="ra-left">
                            <span class="ra-dot"></span>
                            <span class="ra-text">Timetable updated for Term 2</span>
                        </div>
                        <span class="ra-time">3 hours ago</span>
                    </li>
                </ul>
            </div>
            <!-- ============================================================
     END RECENT ACTIVITY COMPONENT
     ============================================================ -->

        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script src="/SMS/school-management/assets/js/sidebar.js"></script>
    <script src="/SMS/school-management/assets/js/index.js"></script>
</body>

</html>