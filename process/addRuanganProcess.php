<?php
    session_start();
    if(isset($_POST['addRuangan'])){

        include('../db.php');
        
        $id = $_GET['id'];
        $id_ruangan = $_POST['id_ruangan'];
        $nama_ruangan = $_POST['nama_ruangan'];
        $kapasitas = $_POST['kapasitas'];
        $status = $_POST['status'];
        
        //$tgl=date('d-m-Y');
        
        $query = mysqli_prepare(
            $con,
            "INSERT INTO ruangan(id_ruangan, id_user, nama_ruangan, kapasitas, status)
        VALUES (?, ?, ?, ?, ?);"
        )
            or die(mysqli_error($con)); // try-catching error
        mysqli_stmt_bind_param($query, 'iisis', $id_ruangan, $id, $nama_ruangan, $kapasitas, $status);
        mysqli_stmt_execute($query);
        // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
        if ($query) {
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