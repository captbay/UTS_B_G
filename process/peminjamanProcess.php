<?php
    session_start();
    if(isset($_POST['peminjaman'])){

        include('../db.php');
        
        $id = $_GET['id'];
        $id_buku = $_GET['id_buku'];
        $tanggal_pinjam = $_POST['tanggal_pinjam'];
        $tanggal_kembali = $_POST['tanggal_kembali'];
        $status = 'dipinjam';
        $kurang = 1;
        $jumlah_tersedia = $_SESSION['buku']['jumlah_tersedia'];
        $jumlah = $jumlah_tersedia - $kurang;
        //$tgl=date('d-m-Y');
        
        $query = mysqli_prepare(
            $con,
            "INSERT INTO peminjaman(id_user, id_buku, tanggal_pinjam, tanggal_kembali, status)
        VALUES (?, ?, ?, ?, ?);"
        )
            or die(mysqli_error($con)); // try-catching error
        mysqli_stmt_bind_param($query, 'iidds', $id, $id_buku, $tanggal_pinjam, $tanggal_kembali, $status);
        mysqli_stmt_execute($query);
        // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
        if ($query) {
            $update = mysqli_prepare($con,"UPDATE buku SET jumlah_tersedia = ? WHERE id_buku = ?");
            mysqli_stmt_bind_param($query, 'ii',$jumlah, $id_buku);
            mysqli_stmt_execute($update);

            $stat = mysqli_prepare($con,"UPDATE buku SET status = ? WHERE id_buku = ?");
            mysqli_stmt_bind_param($query, 'si',$status, $id_buku);
            mysqli_stmt_execute($stat);
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