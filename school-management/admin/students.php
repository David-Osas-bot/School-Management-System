<!-- ============================================================
     STUDENTS COMPONENT
     Paste the <style> block into your <head> (or existing CSS file)
     and the <section> block wherever you want it in dashboard.php
     ============================================================ -->

<link rel="stylesheet" href="/SMS/school-management/assets/css/students.css">

<?php include '../includes/sidebar.php'; ?>
<?php include '../includes/header.php'; ?>
<?php include '../includes/students.php'; ?>

<!-- ── PAGE HEADER ── -->
<div class="st-page-header">
    <div>
        <h1>Students</h1>
        <p>Manage student registrations and profiles</p>
    </div>
    <button class="st-btn-add" onclick="handleAddStudent()">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
            stroke-linejoin="round">
            <line x1="12" y1="5" x2="12" y2="19" />
            <line x1="5" y1="12" x2="19" y2="12" />
        </svg>
        Add Student
    </button>
</div>

<!-- ── STUDENTS CARD ── -->
<div class="st-card">

    <!-- Toolbar -->
    <div class="st-toolbar">
        <div class="st-search-wrap">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <circle cx="11" cy="11" r="8" />
                <line x1="21" y1="21" x2="16.65" y2="16.65" />
            </svg>
            <input class="st-search" type="text" id="stSearch"
                placeholder="Search students..."
                oninput="filterStudents(this.value)" />
        </div>
        <span class="st-badge" id="stCount">8 students</span>
    </div>

    <!-- Table -->
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
                <!-- Rows injected by JS below -->
            </tbody>
        </table>
    </div>
</div>

<!-- ── DATA + LOGIC ── -->
<script>
    const ST_DATA = [{
            id: 'STU001',
            name: 'Sarah Johnson',
            cls: '10A',
            gender: 'Female',
            email: 'sarah.j@school.com',
            status: 'active'
        },
        {
            id: 'STU002',
            name: 'James Wilson',
            cls: '10B',
            gender: 'Male',
            email: 'james.w@school.com',
            status: 'active'
        },
        {
            id: 'STU003',
            name: 'Emily Davis',
            cls: '9A',
            gender: 'Female',
            email: 'emily.d@school.com',
            status: 'active'
        },
        {
            id: 'STU004',
            name: 'Michael Brown',
            cls: '11A',
            gender: 'Male',
            email: 'michael.b@school.com',
            status: 'inactive'
        },
        {
            id: 'STU005',
            name: 'Lisa Anderson',
            cls: '10A',
            gender: 'Female',
            email: 'lisa.a@school.com',
            status: 'active'
        },
        {
            id: 'STU006',
            name: 'David Martinez',
            cls: '9B',
            gender: 'Male',
            email: 'david.m@school.com',
            status: 'active'
        },
        {
            id: 'STU007',
            name: 'Sophie Taylor',
            cls: '11B',
            gender: 'Female',
            email: 'sophie.t@school.com',
            status: 'active'
        },
        {
            id: 'STU008',
            name: 'Ryan Thompson',
            cls: '10B',
            gender: 'Male',
            email: 'ryan.t@school.com',
            status: 'active'
        },
    ];

    function renderRows(data) {
        const tbody = document.getElementById('stTableBody');
        const count = document.getElementById('stCount');
        tbody.innerHTML = data.map(s => `
      <tr>
        <td class="st-id">${s.id}</td>
        <td class="st-name">${s.name}</td>
        <td><span class="st-class-pill">${s.cls}</span></td>
        <td>${s.gender}</td>
        <td>${s.email}</td>
        <td><span class="st-status ${s.status}">${s.status.charAt(0).toUpperCase()+s.status.slice(1)}</span></td>
        <td><button class="st-actions-btn" title="More options" onclick="handleRowAction('${s.id}')">···</button></td>
      </tr>
    `).join('');
        count.textContent = data.length + ' student' + (data.length !== 1 ? 's' : '');
    }

    function filterStudents(q) {
        const lq = q.toLowerCase();
        renderRows(ST_DATA.filter(s =>
            s.id.toLowerCase().includes(lq) ||
            s.name.toLowerCase().includes(lq) ||
            s.cls.toLowerCase().includes(lq) ||
            s.email.toLowerCase().includes(lq) ||
            s.status.toLowerCase().includes(lq)
        ));
    }

    /* ── Wire these to your own modals / routes ── */
    function handleAddStudent() {
        alert('Open Add Student modal');
    }

    function handleRowAction(id) {
        alert('Actions for ' + id);
    }

    /* Initial render */
    renderRows(ST_DATA);
</script>
<!-- ============================================================
     END STUDENTS COMPONENT
     ============================================================ -->