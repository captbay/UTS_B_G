<?php
session_start();
if (isset($_POST['editAnggota'])) {
    include('../db.php');


    $id_anggota = $_POST['id_anggota'];
    $nama_anggota = $_POST['nama_anggota'];
    $email = $_POST['email'];

    $query = mysqli_query($con, "UPDATE anggota SET anggota.nama_anggota='$nama_anggota',anggota.email='$email' WHERE anggota.id_anggota = '$id_anggota'") or die(mysqli_error($con));

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