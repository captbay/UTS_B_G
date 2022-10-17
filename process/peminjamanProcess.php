<?php
    session_start();
    if(isset($_GET['id'])){

        include('../db.php');
        
        $id = $_SESSION['user']['id'];
        $id_buku = $_GET['id'];
        $tanggal_pinjam = $_GET['tanggal_pinjam'];
        $tanggal_kembali = $_GET['tanggal_kembali'];
        
        $query = mysqli_query(
            $con,
            "INSERT INTO peminjaman(id_user, id_buku, tanggal_pinjam, tanggal_kembali, status)
        VALUES ('$id', '$id_buku', '$tanggal_pinjam2', '$tanggal_kembali2', 'dipinjam');"
        )
            or die(mysqli_error($con)); // try-catching error
        
       
        // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
        if ($query) {
            $update = mysqli_query($con,"UPDATE buku SET jumlah_tersedia = jumlah_tersedia-1 WHERE id_buku = ". $_GET['id']);
            echo
            '<script>
            alert("Peminjaman Success");
             window.location = "../page/dashboardPage.php"
            </script>';
        } else {
            echo
            '<script>
        alert("Peminjaman Failed");
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