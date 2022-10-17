<?php
    session_start();
    if(isset($_POST['editAnggota'])){
        include ('../db.php');
        
        
        $id_anggota = $_POST['id_anggota'];
        $nama_anggota = $_POST['nama_anggota'];
        $email = $_POST['email'];

        $query = mysqli_query($con,"UPDATE anggota SET nama_anggota='$nama_anggota',email=$email WHERE id_anggota = $id_anggota");

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