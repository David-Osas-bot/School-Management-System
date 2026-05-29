<?php
session_start();
include '../config/database.php';

if (isset($_POST['submit'])) {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {

        echo '
        <script>
            alert("All fields are required!");
            window.location.href="../auth/login.php";
        </script>
        ';

        exit;
    }

    // Check user by email only
    $stmt = $conn->prepare(
        "SELECT * FROM users WHERE email = ?"
    );

    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

        // Verify hashed password
        if (password_verify($password, $row['password'])) {

            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['name'];
            $_SESSION['email'] = $row['email'];

            echo '
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        title: "Login Successful !!!",
                        icon: "success",
                        confirmButtonText: "Home"
                    }).then(() => {
                        window.location.href = "/SMS/school-management/includes/layout_start.php";
                    });
                });
            </script>
            ';
        } else {

            echo '
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        Swal.fire({
                            title: "Invalid password!",
                            text: "The password you entered is incorrect. Please try again.",
                            icon: "warning",
                            confirmButtonText: "Login",
                            showCancelButton: true,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "../auth/login.php";
                            } else {
                                window.location.href = "../auth/register.php";
                            }
                        });
                    });
                </script>
            ';
        }
    } else {

        echo '
         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        Swal.fire({
                            title: "Email not found!",
                            text: "The email you entered is not registered. Please try again or register a new account.",
                            icon: "warning",
                            confirmButtonText: "Login",
                            showCancelButton: true,
                            cancelButtonText: "Register new account"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "../auth/login.php";
                            } else {
                                window.location.href = "../auth/register.php";
                            }
                        });
                    });
            </script>
        ';
    }
}
