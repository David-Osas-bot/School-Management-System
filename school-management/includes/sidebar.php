<?php
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
?>

<link rel="stylesheet" href="/SMS/school-management/assets/css/sidebar.css">

<aside class="sidebar" id="sidebar">

    <!-- Logo -->
    <div class="sidebar-brand">
        <div class="brand-icon">
            <img src="/SMS/school-management/assets/images/schoolifyLogo.jpg" alt="Schoolify Logo">
        </div>
        <div class="brand-text">
            <h2>Schoolify</h2>
            <p>School Management</p>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="sidebar-nav">

        <div class="nav-group">
            <span class="nav-label">CORE</span>
            <a href="/SMS/school-management/admin/dashboard.php"
                class="nav-item <?= $currentPage === 'dashboard' ? 'active' : '' ?>">
                <i class="nav-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="7" height="7" rx="1" />
                        <rect x="14" y="3" width="7" height="7" rx="1" />
                        <rect x="3" y="14" width="7" height="7" rx="1" />
                        <rect x="14" y="14" width="7" height="7" rx="1" />
                    </svg>
                </i>
                <span>Dashboard</span>
            </a>
            <a href="/SMS/school-management/admin/students.php"
                class="nav-item <?= $currentPage === 'students' ? 'active' : '' ?>">
                <i class="nav-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>
                </i>
                <span>Students</span>
            </a>
            <a href="/SMS/school-management/admin/teachers.php"
                class="nav-item <?= $currentPage === 'teachers' ? 'active' : '' ?>">
                <i class="nav-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 10v6M2 10l10-5 10 5-10 5z" />
                        <path d="M6 12v5c3 3 9 3 12 0v-5" />
                    </svg>
                </i>
                <span>Teachers</span>
            </a>
            <a href="/SMS/school-management/admin/courses.php"
                class="nav-item <?= $currentPage === 'courses' ? 'active' : '' ?>">
                <i class="nav-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z" />
                    </svg>
                </i>
                <span>Classes</span>
            </a>
        </div>

        <div class="nav-group">
            <span class="nav-label">ACADEMIC</span>
            <a href="/SMS/school-management/admin/attendance.php"
                class="nav-item <?= $currentPage === 'attendance' ? 'active' : '' ?>">
                <i class="nav-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12" />
                    </svg>
                </i>
                <span>Attendance</span>
            </a>
            <a href="/SMS/school-management/admin/results.php"
                class="nav-item <?= $currentPage === 'results' ? 'active' : '' ?>">
                <i class="nav-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9 11 12 14 22 4" />
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11" />
                    </svg>
                </i>
                <span>Results</span>
            </a>
        </div>

        <div class="nav-group">
            <span class="nav-label">EXTENDED</span>
            <a href="/SMS/school-management/admin/fees.php"
                class="nav-item <?= $currentPage === 'fees' ? 'active' : '' ?>">
                <i class="nav-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="12" y1="1" x2="12" y2="23" />
                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                    </svg>
                </i>
                <span>Fee Management</span>
            </a>
            <a href="/SMS/school-management/admin/timetable.php"
                class="nav-item <?= $currentPage === 'timetable' ? 'active' : '' ?>">
                <i class="nav-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                        <line x1="16" y1="2" x2="16" y2="6" />
                        <line x1="8" y1="2" x2="8" y2="6" />
                        <line x1="3" y1="10" x2="21" y2="10" />
                    </svg>
                </i>
                <span>Timetable</span>
            </a>
            <a href="/SMS/school-management/admin/reports.php"
                class="nav-item <?= $currentPage === 'reports' ? 'active' : '' ?>">
                <i class="nav-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="18" y1="20" x2="18" y2="10" />
                        <line x1="12" y1="20" x2="12" y2="4" />
                        <line x1="6" y1="20" x2="6" y2="14" />
                    </svg>
                </i>
                <span>Reports</span>
            </a>
        </div>

        <!-- Logout -->
        <div class="nav-group nav-bottom">
            <a href="/SMS/school-management/auth/logout.php" class="nav-item logout">
                <i class="nav-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                        <polyline points="16 17 21 12 16 7" />
                        <line x1="21" y1="12" x2="9" y2="12" />
                    </svg>
                </i>
                <span>Logout</span>
            </a>
        </div>

    </nav>
</aside>

<!-- Mobile overlay -->
<div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

<script src="/SMS/school-management/assets/js/sidebar.js"></script>