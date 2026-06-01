/**
 * assets/js/students.js
 */
(function () {
    'use strict';

    // Holds our active tracking data fetched from the DB
    let LIVE_ST_DATA = [];

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

    // Modern background live fetch implementation
    async function fetchStudentsFromDatabase() {
        try {
            const response = await fetch('../handlers/get_students.php');
            if (!response.ok) throw new Error("Network issues fetching students.");

            LIVE_ST_DATA = await response.json();
            renderRows(LIVE_ST_DATA);
        } catch (error) {
            console.error("Error loading active directory data:", error);
        }
    }

    window.filterStudents = function (q) {
        const lq = q.toLowerCase();
        renderRows(LIVE_ST_DATA.filter(s =>
            s.id.toLowerCase().includes(lq) ||
            s.name.toLowerCase().includes(lq) ||
            s.cls.toLowerCase().includes(lq) ||
            s.email.toLowerCase().includes(lq) ||
            s.status.toLowerCase().includes(lq)
        ));
    };

    // Modal view handlers
    window.handleAddStudent = function () {
        document.getElementById('studentModal').style.display = 'flex';
    };

    window.closeModal = function () {
        document.getElementById('studentModal').style.display = 'none';
        document.getElementById('addStudentForm').reset();
    };

    // Submitting live forms to the MVC handlers directory
    window.submitStudentForm = async function (event) {
        event.preventDefault();

        const payload = {
            id: document.getElementById('m_id').value.trim(),
            name: document.getElementById('m_name').value.trim(),
            cls: document.getElementById('m_cls').value.trim(),
            gender: document.getElementById('m_gender').value,
            email: document.getElementById('m_email').value.trim()
        };

        try {
            const response = await fetch('../handlers/add_students.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            });

            const result = await response.json();

            if (result.status === 'success') {
                closeModal();
                // Re-sync with database to display updated table state natively
                fetchStudentsFromDatabase();
            } else {
                alert("Error saving record: " + result.message);
            }
        } catch (error) {
            console.error("Submission failed:", error);
            alert("Could not process registration request.");
        }
    };

    window.handleRowAction = function (id) { alert('Actions for ' + id); };

    // Self-starting active runtime trigger
    fetchStudentsFromDatabase();
})();