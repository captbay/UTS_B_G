<?php
session_start();
if (isset($_GET['id'])) {
    include('../db.php');
    $id_buku = $_GET['id'];

    $queryCek = mysqli_query($con, "SELECT * FROM peminjaman WHERE id =" . $id_buku) or die(mysqli_error($con));
    if (mysqli_num_rows($queryCek) != 0) {
        echo
        '<script> 
                alert("Peminjaman gagal dihapus"); window.location = "../page/dashboardAdminPage.php" 
            </script>';
    } else {
        $sql2 = mysqli_query($con, "SELECT * FROM buku where id_buku='$id_buku'") or die(mysqli_error($con)); //query dua
        $jalankan = mysqli_fetch_array($sql2);
        unlink("../images/$jalankan[gambar_buku]"); //lalu hapus gambarnya, images merupakan letak direktori sedangkan $jalankan[foto] merupakan nama file gambar yang bersangkutan
        $queryDelete = mysqli_query($con, "DELETE FROM peminjaman WHERE id_buku='$id_buku'") or die(mysqli_error($con));


        if ($queryDelete) {
            echo
            '<script> 
                    alert("Delete Success"); window.location = "../page/dashboardAdminPage.php" 
                </script>';
        } else {
            echo
            '<script> 
                    alert("Delete Failed"); window.location = "../page/dashboardAdminPage.php"
                </script>';
        }
    }
} else {
    echo
    '<script> 
                window.history.back() 
            </script>';
}