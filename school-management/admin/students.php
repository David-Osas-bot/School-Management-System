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
        <span class="st-badge" id="stCount">0 students</span>
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
            </tbody>
        </table>
    </div>
</div>

<div id="studentModal" class="student-modal" style="display: none; position: fixed; z-index: 999; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); justify-content: center; align-items: center;">
    <div class="modal-content" style="background: #fff; padding: 24px; border-radius: 8px; width: 100%; max-width: 450px; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="margin: 0; font-size: 1.25rem;">Register New Student</h3>
            <button onclick="closeModal()" style="background: none; border: none; font-size: 1.5rem; cursor: pointer; color: #666;">&times;</button>
        </div>

        <form id="addStudentForm" onsubmit="submitStudentForm(event)">
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Admission Number / ID</label>
                <input type="text" id="m_id" required placeholder="e.g. STU009" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Full Name</label>
                <input type="text" id="m_name" required placeholder="e.g. Sarah Johnson" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Class Assignment</label>
                <input type="text" id="m_cls" required placeholder="e.g. 10A" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Gender</label>
                <select id="m_gender" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Email Address</label>
                <input type="email" id="m_email" required placeholder="e.g. sarah.j@school.com" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
            </div>
            <div style="display: flex; justify-content: flex-end; gap: 10px;">
                <button type="button" onclick="closeModal()" style="padding: 8px 16px; background: #eee; border: none; border-radius: 4px; cursor: pointer;">Cancel</button>
                <button type="submit" style="padding: 8px 16px; background: #0f172a; color: #fff; border: none; border-radius: 4px; cursor: pointer;">Save Student</button>
            </div>
        </form>
    </div>
</div>

<?php require_once '../includes/layout_end.php'; ?>