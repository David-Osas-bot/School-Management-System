<?php
include '../config/database.php';

$token = trim($_GET['token'] ?? '');

if (!$token) {
    echo "<script>alert('Invalid link.'); window.location.href='../auth/login.php';</script>";
    exit;
}

// MySQLi prepared statement
$stmt = $conn->prepare("SELECT * FROM users WHERE verification_token = ?");
$stmt->bind_param("s", $token);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

if (!$user) {
    echo "<script>alert('Invalid verification link.'); window.location.href='../auth/login.php';</script>";
    exit;
}

if (strtotime($user['token_expires_at']) < time()) {
    echo "<script>alert('Link has expired. Please register again.'); window.location.href='../auth/login.php';</script>";
    exit;
}

// Activate the account
$stmt2 = $conn->prepare("UPDATE users SET email_verified = 1, verification_token = NULL WHERE id = ?");
$stmt2->bind_param("i", $user['id']);
$stmt2->execute();

echo '
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "Email Verified!",
                text: "Your account is now active.",
                icon: "success",
                confirmButtonText: "Login"
            }).then(() => {
                window.location.href = "../auth/login.php";
            });
        });
    </script>
';