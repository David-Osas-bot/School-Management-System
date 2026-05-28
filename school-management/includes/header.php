<?php
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
$pageTitle = ucfirst($currentPage);

// Replace these with your actual session variables
$userName = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Admin User';
$userEmail = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : 'admin@edumanage.com';
$userInitials = isset($_SESSION['user_name'])
    ? strtoupper(substr(explode(' ', $_SESSION['user_name'])[0], 0, 1) . (isset(explode(' ', $_SESSION['user_name'])[1]) ? explode(' ', $_SESSION['user_name'])[1][0] : ''))
    : 'AD';
?>

<link rel="stylesheet" href="/SMS/school-management/assets/css/header.css">

<header class="hdr-root">

    <!-- Left: Toggle + Breadcrumb -->
    <div class="hdr-left">
        <button class="hdr-toggle" onclick="toggleSidebar()" aria-label="Toggle sidebar">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20">
                <rect x="3" y="3" width="18" height="18" rx="2" />
                <line x1="9" y1="3" x2="9" y2="21" />
            </svg>
        </button>
        <nav class="hdr-breadcrumb" aria-label="Breadcrumb">
            <span class="hdr-bread-home">Schoolify</span>
            <span class="hdr-bread-sep">/</span>
            <span class="hdr-bread-cur"><?= htmlspecialchars($pageTitle) ?></span>
        </nav>
    </div>

    <!-- Right: Actions + Profile -->
    <div class="hdr-right">

        <!-- Search -->
        <button class="hdr-icon-btn" aria-label="Search">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18">
                <circle cx="11" cy="11" r="8" />
                <line x1="21" y1="21" x2="16.65" y2="16.65" />
            </svg>
        </button>

        <!-- Notifications -->
        <button class="hdr-icon-btn" aria-label="Notifications">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18">
                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                <path d="M13.73 21a2 2 0 0 1-3.46 0" />
            </svg>
            <span class="hdr-notif-dot"></span>
        </button>

        <div class="hdr-divider" role="separator"></div>

        <!-- Profile -->
        <div class="hdr-profile" role="button" tabindex="0" aria-label="User menu">
            <div class="hdr-avatar"><?= htmlspecialchars($userInitials) ?></div>
            <div class="hdr-profile-info">
                <span class="hdr-profile-name"><?= htmlspecialchars($userName) ?></span>
                <span class="hdr-profile-role"><?= htmlspecialchars($userEmail) ?></span>
            </div>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14" style="color: inherit; opacity: 0.5; margin-left: 2px;">
                <polyline points="6 9 12 15 18 9" />
            </svg>
        </div>

    </div>
</header>