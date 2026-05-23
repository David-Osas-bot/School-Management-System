<?php
  session_start();
  include '../config/database.php';

  if(isset($_POST['submit'])){
   
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email) || empty($password)){
        echo ' 
            <script>
                alert("All fields are required !!!");
                window.location.href = "../auth/login.php";
            </script>
        ';
    }else{
        echo '
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        title: "Welcome back!",
                        icon: "success",
                        confirmButtonText: "Continue"
                    });
                });
            </script>
        ';
    }

    $email = htmlspecialchars($email);
    $password = htmlspecialchars($password);

    $stmt = $conn->prepare(
       "SELECT * FROM users WHERE email = ? AND password = ?"
    );

    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();

        // if(password_verify($password, $row['password'])){
        //     $_SESSION['user_id'] = $row['id'];
        //     $_SESSION['username'] = $row['name'];
        //     $_SESSION['email'] = $row['email'];

        //     header("Location: ../dashboard.php");
        // } else {
        //     echo '
        //         <script>
        //             alert("Invalid credentials, please try again.");
        //             window.location.href = "../auth/login.php";
        //         </script>
        //      '; 

        // }

        if(password_verify($password, $row['password'])){
          echo'
             Successfully logged in !!!;
          ';
        }else{
          echo '
              <script>
                  alert("Invalid credentials, please try again.");
                  window.location.href = "../auth/login.php";
              </script>
           ';
        }
    }
  }
?>