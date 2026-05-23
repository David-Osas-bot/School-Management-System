<?php
include '../config/database.php';

$name = $email = $password = "";

if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($name) || empty($email) || empty($password)) {
        echo '
                  <script>
                        alert("All fields are required ' . $name . '");
                        window.location.href = "../auth/login.php"
                </script>
            ';
    } else {
        echo '
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
               <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        Swal.fire({
                            title: "You\'re welcome!",
                            icon: "success",
                            confirmButtonText: "Go to Login"
                        }).then((result) => {
                            window.location.href = "../auth/login.php";
                        });
                    });
                </script>
            ';
    };

    $name = htmlspecialchars($name);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '
            <script>
                alert("' . $name . ' your email is not valid !!!");
            </script>
        ';
    }

    if (strlen($password) < 6) {
        echo '
            <script>
                alert("' . $name . ' your password character\'s not save !!!");
                window.location.href = ".../auth/login.php";
            </script>
        ';
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password') ";

    // if ($conn->query($sql) === TRUE) {
    //     echo 'Registration Successfull !!!';
    // } else {
    //     echo 'Error' . $conn->error;
    // }

    $stmt = $conn->prepare(
        "INSERT INTO users (name, email, password) VALUES (?, ?, ?)"
    );
    $stmt->bind_param("sss", $name, $email, $hashed_password);
    $stmt->execute();
}
