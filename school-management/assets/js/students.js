/**
 * assets/js/students.js
 */
(function () {
    'use strict';

    const ST_DATA = [
        { id: 'STU001', name: 'Sarah Johnson', cls: '10A', gender: 'Female', email: 'sarah.j@school.com', status: 'active' },
        { id: 'STU002', name: 'James Wilson', cls: '10B', gender: 'Male', email: 'james.w@school.com', status: 'active' },
        { id: 'STU003', name: 'Emily Davis', cls: '9A', gender: 'Female', email: 'emily.d@school.com', status: 'active' },
        { id: 'STU004', name: 'Michael Brown', cls: '11A', gender: 'Male', email: 'michael.b@school.com', status: 'inactive' },
        { id: 'STU005', name: 'Lisa Anderson', cls: '10A', gender: 'Female', email: 'lisa.a@school.com', status: 'active' },
        { id: 'STU006', name: 'David Martinez', cls: '9B', gender: 'Male', email: 'david.m@school.com', status: 'active' },
        { id: 'STU007', name: 'Sophie Taylor', cls: '11B', gender: 'Female', email: 'sophie.t@school.com', status: 'active' },
        { id: 'STU008', name: 'Ryan Thompson', cls: '10B', gender: 'Male', email: 'ryan.t@school.com', status: 'active' },
    ];

    function renderRows(data) {
        const tbody = document.getElementById('stTableBody');
        const count = document.getElementById('stCount');
        if (!tbody) return;
        tbody.innerHTML = data.map(s => `
            <tr>
                <td class="st-id">${s.id}</td>
                <td class="st-name">${s.name}</td>
                <td><span class="st-class-pill">${s.cls}</span></td>
                <td>${s.gender}</td>
                <td>${s.email}</td>
                <td><span class="st-status ${s.status}">${s.status.charAt(0).toUpperCase() + s.status.slice(1)}</span></td>
                <td><button class="st-actions-btn" title="More options" onclick="handleRowAction('${s.id}')">···</button></td>
            </tr>
        `).join('');
        if (count) count.textContent = data.length + ' student' + (data.length !== 1 ? 's' : '');
    }

    window.filterStudents = function (q) {
        const lq = q.toLowerCase();
        renderRows(ST_DATA.filter(s =>
            s.id.toLowerCase().includes(lq) ||
            s.name.toLowerCase().includes(lq) ||
            s.cls.toLowerCase().includes(lq) ||
            s.email.toLowerCase().includes(lq) ||
            s.status.toLowerCase().includes(lq)
        ));
    };

    window.handleAddStudent = function () { alert('Open Add Student modal'); };
    window.handleRowAction = function (id) { alert('Actions for ' + id); };

    renderRows(ST_DATA);
})();