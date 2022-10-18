<?php
    session_start();
    if(isset($_GET['id'])){
        include ('../db.php');
        $id_anggota = $_GET['id'];

        // $id = $_SESSION['user']['id'];
        // $nama_anggota = $_GET['nama_anggota'];
        // $email = $_GET['email'];
        
        $queryDelete = mysqli_query($con, "DELETE FROM anggota WHERE id_anggota='$id_anggota'") or die(mysqli_error($con));
        if($queryDelete){
            echo
                '<script> 
                    alert("Delete Success"); window.location = "../page/anggotaPage.php" 
                </script>';
        }else{
            echo
                '<script> 
                    alert("Delete Failed"); window.location = "../page/anggotaPage.php"
                </script>';
        }
    }else{
        echo 
            '<script> 
                window.history.back() 
            </script>';
    }