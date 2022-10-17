<?php
session_start();
if (isset($_GET['id'])) {
    include('../db.php');
    $id_peminjaman = $_GET['id'];

    $queryDelete = mysqli_query($con, "DELETE FROM peminjaman WHERE peminjaman.id='$id_peminjaman'") or die(mysqli_error($con));


    if ($queryDelete) {
        echo
        '<script> 
                    alert("Delete Success"); window.location = "../page/peminjamanAdminPage.php" 
                </script>';
    } else {
        echo
        '<script> 
            alert("Delete Success"); window.location = "../page/peminjamanAdminPage.php" 
                    
                </script>';
    }
} else {
    echo
    '<script> 
                window.history.back() 
            </script>';
}