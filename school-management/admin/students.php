<?php

/**
 * admin/students.php — Students
 */
session_start();

$pageTitle   = 'Students';
$currentPage = 'students';
$pageCss     = 'students';
$pageScripts = [
    '/SMS/school-management/assets/js/students.js',
];

require_once '../includes/layout_start.php';
?>

<!-- ══════════════════════════════════════════════════
     STUDENTS PAGE CONTENT
═════════════════════════════════════════════════ -->

<div class="st-page-header">
    <div>
        <h1>Students</h1>
        <p>Manage student registrations and profiles</p>
    </div>
    <button class="st-btn-add" onclick="handleAddStudent()">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2.5"
            stroke-linecap="round" stroke-linejoin="round">
            <line x1="12" y1="5" x2="12" y2="19" />
            <line x1="5" y1="12" x2="19" y2="12" />
        </svg>
        Add Student
    </button>
</div>

<div class="st-card">
    <div class="st-toolbar">
        <div class="st-search-wrap">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8" />
                <line x1="21" y1="21" x2="16.65" y2="16.65" />
            </svg>
            <input class="st-search" type="text" id="stSearch"
                placeholder="Search students…"
                oninput="filterStudents(this.value)">
        </div>
        <span class="st-badge" id="stCount">8 students</span>
    </div>

    <div class="st-table-wrap">
        <table class="st-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="stTableBody">
                <!-- Populated by students.js -->
            </tbody>
        </table>
    </div>
</div>

<?php require_once '../includes/layout_end.php'; ?>