<?php
    session_start();
    if(isset($_POST['addAnggota'])){

        include('../db.php');
        
        $id_anggota = $_POST['id_anggota'];
        $nama_anggota = $_POST['nama_anggota'];
        $email = $_POST['email'];

        $query = mysqli_query($con, "INSERT INTO anggota (id_anggota, nama_anggota, email) VALUES 
                ('$id_anggota', '$nama_anggota', '$email')") or die(mysqli_error($con)); 
        // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
        if ($query) {
            echo
            '<script>
                alert("Tambah Anggota Success");
                window.location = "../page/anggotaPage.php"
            </script>';
        } else {
            echo
            '<script>
                alert("Tambah Anggota Failed");
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