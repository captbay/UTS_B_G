<?php
    session_start();
    if(isset($_GET['id'])){

        include('../db.php');
        
        $id = $_SESSION['user']['id'];
        $id_buku = $_GET['id'];

        $query2 = mysqli_query($con,"UPDATE peminjaman SET status='dikembalikan' WHERE id_user = ".$id. " and id_buku = ". $id_buku);
        $query = mysqli_query($con,"UPDATE buku SET jumlah_tersedia = jumlah_tersedia+1 WHERE id_buku = ". $id_buku);
       
        if ($query && $query2) {
            echo
            '<script>
                alert("Pengembalian Berhasil");
                window.location = "../page/peminjamanPage.php"
            </script>';
        } else {
            echo
            '<script>
                alert("Pengembalian Gagal");
                window.history.back()
            </script>';
        }

    } else {
        echo
        '<script>
            window.history.back()
        </script>';
    }