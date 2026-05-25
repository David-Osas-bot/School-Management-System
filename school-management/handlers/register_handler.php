<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include '../config/database.php';
require_once '../functions/helper.php';

if (isset($_POST['submit'])) {
    $name     = trim($_POST['name']);
    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);

    $safeName = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');

    // --- Validation ---
    if (empty($name) || empty($email) || empty($password)) {
        echo "<script>alert('All fields are required'); window.location.href='../auth/register.php';</script>";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('{$safeName}, your email is not valid!'); window.location.href='../auth/register.php';</script>";
        exit;
    }

    if (strlen($password) < 6) {
        echo "<script>alert('{$safeName}, password must be at least 6 characters.'); window.location.href='../auth/register.php';</script>";
        exit;
    }

    // --- Check duplicate email BEFORE inserting ---
    $checkStmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        echo '
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: "Email already registered!",
                    text: "An account with this email already exists. Please login or use a different email.",
                    icon: "warning",
                    confirmButtonText: "Go to Login",
                    showCancelButton: true,
                    cancelButtonText: "Try another email"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "../auth/login.php";
                    } else {
                        window.location.href = "../auth/register.php";
                    }
                });
            });
        </script>';
        exit;
    }

    // --- Insert user ---
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $hashed_password);

    if (!$stmt->execute()) {
        echo "<script>alert('Registration failed. Try again.'); window.location.href='../auth/register.php';</script>";
        exit;
    }

    $userId = $conn->insert_id;

    // --- Generate token and save to DB ---
    $token   = bin2hex(random_bytes(32));
    $expires = date('Y-m-d H:i:s', strtotime('+24 hours'));

    $stmt2 = $conn->prepare("UPDATE users SET verification_token = ?, token_expires_at = ? WHERE id = ?");
    $stmt2->bind_param("ssi", $token, $expires, $userId);
    $stmt2->execute();

    // --- Send email ---
    $sent = sendVerificationEmail($email, $name, $token);

    if ($sent) {
        echo '
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        title: "Check your email!",
                        text: "We sent you a verification link.",
                        icon: "success",
                        confirmButtonText: "Go to Login"
                    }).then(() => {
                        window.location.href = "../auth/login.php";
                    });
                });
            </script>
        ';
    } else {
        echo "<script>alert('Account created but email failed to send. Contact support.'); window.location.href='../auth/login.php';</script>";
    }
}
