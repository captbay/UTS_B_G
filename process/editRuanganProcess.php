<?php
    session_start();
    if(isset($_POST['addRuangan'])){

        include('../db.php');
        
        $id_ruangan = $_GET['id_ruangan'];
        $nama_ruangan = $_POST['nama_ruangan'];
        $kapasitas = $_POST['kapasitas'];
        $status = $_POST['status'];
        
        $query = mysqli_prepare($con,"UPDATE ruangan SET nama_ruangan=?, kapasitas=?, status=? WHERE id_ruangan = ?");
       mysqli_stmt_bind_param($query, 'sisi',$nama_ruangan,$kapasitas,$status, $id_ruangan);
       mysqli_stmt_execute($query);
        // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
        if ($query) {
            '<script>
        alert("Edit Success");
        window.location = "../page/dashboardPage.php"
        </script>';
        } else {
            echo
            '<script>
        alert("Edit Failed");
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