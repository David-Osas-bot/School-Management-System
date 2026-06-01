<?php

/**
 * includes/layout.php
 * ─────────────────────────────────────────────────────────────
 * The ONE shared shell for every admin page.
 *
 * HOW TO USE in any page (e.g. admin/students.php):
 *
 *   <?php
 *   session_start();
 *   $pageTitle = 'Students';          // shown in <title> and breadcrumb
 *   $currentPage = 'students';        // must match the nav-item key below
 *   $pageCss = 'students';            // loads assets/css/students.css (optional)
 *   require_once '../includes/layout.php';
 *   ?>
 *
 *   <!-- YOUR PAGE HTML HERE -->
 *
 *   <?php require_once '../includes/layout_end.php'; ?>
 *
 * ─────────────────────────────────────────────────────────────
 */

// ── Guard: make sure the caller set required vars ─────────────
$pageTitle   = $pageTitle   ?? 'Dashboard';
$currentPage = $currentPage ?? 'index';
$pageCss     = $pageCss     ?? null;

// ── User info from session ────────────────────────────────────
$userName     = $_SESSION['user']['name']  ?? 'Admin User';
$userEmail    = $_SESSION['user']['email'] ?? 'admin@schoolify.com';
$parts        = explode(' ', $userName);
$userInitials = strtoupper(
    substr($parts[0], 0, 1) .
        (isset($parts[1]) ? substr($parts[1], 0, 1) : '')
);

// ── Nav definition ────────────────────────────────────────────
// Each entry: [ key, label, href, icon_svg_path ]
$navGroups = [
    'CORE' => [
        ['index',      'Dashboard',     '/SMS/school-management/admin/index.php',      '<rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/>'],
        ['students',   'Students',      '/SMS/school-management/admin/students.php',   '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>'],
        ['teachers',   'Teachers',      '/SMS/school-management/admin/teachers.php',   '<path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/>'],
        ['courses',    'Classes',       '/SMS/school-management/admin/courses.php',    '<path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>'],
    ],
    'ACADEMIC' => [
        ['attendance', 'Attendance',    '/SMS/school-management/admin/attendance.php', '<polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>'],
        ['results',    'Results',       '/SMS/school-management/admin/results.php',    '<polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>'],
    ],
    'EXTENDED' => [
        ['fees',       'Fee Management', '/SMS/school-management/admin/fees.php',       '<line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>'],
        ['timetable',  'Timetable',     '/SMS/school-management/admin/timetable.php',  '<rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>'],
        ['reports',    'Reports',       '/SMS/school-management/admin/reports.php',    '<line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/>'],
    ],
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schoolify — <?= htmlspecialchars($pageTitle) ?></title>

    <!-- Core layout styles (always loaded) -->
    <link rel="stylesheet" href="/SMS/school-management/assets/css/layout_start.css">

    <!-- Page-specific styles (loaded only when $pageCss is set) -->
    <?php if ($pageCss): ?>
        <link rel="stylesheet" href="/SMS/school-management/assets/css/<?= htmlspecialchars($pageCss) ?>.css">
    <?php endif; ?>
</head>

<body>

    <!-- ══════════════════════════════════════════════════
     LOADING BAR
     A thin progress bar that plays on every page load.
     Pure CSS — no JS dependency.
══════════════════════════════════════════════════ -->
    <div class="page-loader" id="pageLoader"></div>

    <!-- Mobile overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>

    <!-- ══════════════════════════════════════════════════
     SIDEBAR
══════════════════════════════════════════════════ -->
    <aside class="sidebar" id="sidebar">

        <div class="sidebar-brand">
            <div class="brand-icon">
                <img src="/SMS/school-management/assets/images/schoolifyLogo.jpg" alt="Schoolify Logo">
            </div>
            <div class="brand-text">
                <h2>Schoolify</h2>
                <p>School Management</p>
            </div>
        </div>

        <nav class="sidebar-nav">
            <?php foreach ($navGroups as $groupLabel => $items): ?>
                <div class="nav-group">
                    <span class="nav-label"><?= $groupLabel ?></span>
                    <?php foreach ($items as [$key, $label, $href, $svgPaths]): ?>
                        <a href="<?= $href ?>"
                            class="nav-item <?= $currentPage === $key ? 'active' : '' ?>"
                            data-page="<?= $key ?>">
                            <i class="nav-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <?= $svgPaths ?>
                                </svg>
                            </i>
                            <span><?= $label ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>

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

    <!-- ══════════════════════════════════════════════════
     MAIN WRAPPER  (header + page content live here)
══════════════════════════════════════════════════ -->
    <div class="main-wrapper">

        <!-- HEADER -->
        <header class="hdr-root">
            <div class="hdr-left">
                <button class="hdr-toggle" onclick="toggleSidebar()" aria-label="Toggle sidebar">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20">
                        <line x1="3" y1="6" x2="21" y2="6" />
                        <line x1="3" y1="12" x2="21" y2="12" />
                        <line x1="3" y1="18" x2="21" y2="18" />
                    </svg>
                </button>
                <nav class="hdr-breadcrumb" aria-label="Breadcrumb">
                    <span class="hdr-bread-home">Schoolify</span>
                    <span class="hdr-bread-sep">/</span>
                    <span class="hdr-bread-cur"><?= htmlspecialchars($pageTitle) ?></span>
                </nav>
            </div>

            <div class="hdr-right">
                <button class="hdr-icon-btn" aria-label="Notifications">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                        <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                    </svg>
                    <span class="hdr-notif-dot"></span>
                </button>
                <div class="hdr-divider"></div>
                <div class="hdr-profile">
                    <div class="hdr-avatar"><?= htmlspecialchars($userInitials) ?></div>
                    <div class="hdr-profile-info">
                        <span class="hdr-profile-name"><?= htmlspecialchars($userName) ?></span>
                        <span class="hdr-profile-role"><?= htmlspecialchars($userEmail) ?></span>
                    </div>
                </div>
            </div>
        </header>

        <!-- PAGE CONTENT — injected by each page, closed by layout_end.php -->
        <main class="page-content" id="pageContent">
