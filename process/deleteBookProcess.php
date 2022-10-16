<?php
    session_start();
    if(isset($_GET['id_buku'])){
        include ('../db.php');
        $id_buku = $_GET['id_buku'];

        $queryCek = mysqli_query($con, "SELECT * FROM peminjaman WHERE statsu='dipinjam'") or die(mysqli_error($con));
        if(mysqli_num_rows(queryCek) != 0){
            echo
            '<script> 
                alert("Buku Masih Dipinjam"); window.location = "../page/dashboardPage.php" 
            </script>';
        }else{
        $queryDelete = mysqli_query($con, "DELETE FROM buku WHERE id_buku='$id_buku'") or die(mysqli_error($con));
        if($queryDelete){
            echo
                '<script> 
                    alert("Delete Success"); window.location = "../page/dashboardPage.php" 
                </script>';
        }else{
            echo
                '<script> 
                    alert("Delete Failed"); window.location = "../page/dashboardPage.php"
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