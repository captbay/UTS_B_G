<?php
    session_start();
    if(isset($_POST['editAnggota'])){
        include ('../db.php');
        
        $id = $_SESSION['user']['id'];
        $id_anggota = $_POST['id_anggota'];
        $nama_anggota = $_POST['nama_anggota'];
        $email = $_POST['email'];

        $query = mysqli_prepare($con,"UPDATE anggota SET nama_anggota=?, email=? WHERE id_anggota = ?");
        mysqli_stmt_bind_param($query, 'ssii',$nama_anggota,$email,$id, $id_anggota);
        mysqli_stmt_execute($query);
        //
        if ($query) {
            echo
                '<script>
            alert("Edit Success");
            window.location = "../page/anggotaPage.php"
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