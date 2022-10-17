<?php
    session_start();
    if(isset($_GET['id'])){
        include ('../db.php');
        $id_buku = $_GET['id'];

        $queryCek = mysqli_query($con, "SELECT * FROM peminjaman WHERE status='dipinjam' and id_buku =".$id_buku) or die(mysqli_error($con));
        if(mysqli_num_rows($queryCek) != 0){
            echo
            '<script> 
                alert("Buku Masih Dipinjam"); window.location = "../page/dashboardAdminPage.php" 
            </script>';
        }else{
        $queryDelete = mysqli_query($con, "DELETE FROM buku WHERE id_buku='$id_buku'") or die(mysqli_error($con));
        if($queryDelete){
            echo
                '<script> 
                    alert("Delete Success"); window.location = "../page/dashboardAdminPage.php" 
                </script>';
        }else{
            echo
                '<script> 
                    alert("Delete Failed"); window.location = "../page/dashboardAdminPage.php"
                </script>';
        }
    }
    }else{
        echo 
            '<script> 
                window.history.back() 
            </script>';
    }
?>