<?php
session_start();
include '../config/database.php';

if(isset($_POST['submit'])){

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if(empty($email) || empty($password)){

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

    if($result->num_rows > 0){

        $row = $result->fetch_assoc();

        // Verify hashed password
        if(password_verify($password, $row['password'])){

            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['name'];
            $_SESSION['email'] = $row['email'];

            echo '
            <script>
                alert("Login successful!");
                window.location.href="../dashboard.php";
            </script>
            ';

        } else {

            echo '
            <script>
                alert("Invalid password!");
                window.location.href="../auth/login.php";
            </script>
            ';
        }

    } else {

        echo '
        <script>
            alert("Email not found!");
            window.location.href="../auth/login.php";
        </script>
        ';
    }
}
?>