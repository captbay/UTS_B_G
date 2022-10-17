<?php
session_start();
if (isset($_POST['editProfil'])) {

    include('../db.php');

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $query = mysqli_query($con,"UPDATE user SET password='$password' WHERE id = 1");
    // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
    if ($query) {
        echo
        '<script>
            alert("Edit Success");
            window.location = "../page/ProfileAdminPage.php"
            </script>';
    } else {
        echo
        '<script>
            alert("Edit Failed");
            window.history.back()
            </script>';
    }
} else {
    echo
    '<script>
    window.history.back()
    </script>';
}