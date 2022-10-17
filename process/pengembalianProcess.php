<?php
    session_start();
    if(isset($_POST['pengembalian'])){

        include('../db.php');
        
        $id_buku = $_GET['id_buku'];
        $tanggal_pinjam = $_POST['tanggal_pinjam'];
        $tanggal_kembali = $_POST['tanggal_kembali'];
        $status = 'kembali';
        $jumlah_tersedia = $_SESSION['buku']['jumlah_tersedia'];
        $tambah = 1;
        $jumlah_peminjam = 1;
        $jumlah_buku = $jumlah_tersedia + $tambah;
        
        $query = mysqli_query("UPDATE pengembalian SET tanggal_pinjam='$tanggal_pinjam', tanggal_kembali='$tanggal_kembali', status='$status', 
                jumlah_tersedia='$jumlah_tersedia' WHERE id_buku = '$_GET[id_buku]'");
        if ($query) {
            $update = mysqli_query($con,"UPDATE pengembalian SET jumlah_tersedia = jumlah_tersedia+1 WHERE id_buku = ". $_GET['id']);
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
