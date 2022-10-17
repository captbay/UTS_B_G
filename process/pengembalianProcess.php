<?php
    session_start();
    if(isset($_GET['id'])){

        include('../db.php');
        
        $id = $_SESSION['user']['id'];
        $id_buku = $_GET['id'];
        
        $query = mysqli_query("UPDATE buku SET jumlah_tersedia = jumlah_tersedia+1 WHERE id_buku = ". $_GET['id']);

        $query = mysqli_query("UPDATE pengembalian SET status='dikembalikan' WHERE id = ".$_SESSION['user']['id']);
        if ($query) {
            '<script>
                alert("Pengembalian Berhasil");
                window.location = "../page/dashboardPage.php"
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
?>
