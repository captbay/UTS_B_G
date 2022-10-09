<?php 
    session_start();
    include('../db.php');
 
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    $data = mysqli_query($con, "SELECT * FROM admin WHERE username='$username' and password='$password'");
    
    $cek = mysqli_num_rows($data);
 
    if($cek > 0){
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        echo
            '<script>
                alert("Login Success"); window.location = "../page/dashboardPage.php"
            </script>';
    }
    else{
        echo
            '<script>
                alert("Username or Password Invalid"); window.location = "../index.php"
            </script>';
    }
?>
