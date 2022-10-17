<?php
session_start();
if (isset($_POST['editProfil'])) {

    include('../db.php');
    $id = $_SESSION['user']['id'];
    $name = $_POST['nama'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $gaunik = 0;
    // Check email
    $query = mysqli_prepare($con, "SELECT COUNT(*) FROM user WHERE email = ?");
    mysqli_stmt_bind_param($query, 's', $email);
    mysqli_stmt_execute($query);
    $result = mysqli_stmt_get_result($query);
    $cekEmail = mysqli_fetch_row($result)[0];

    if ($cekEmail > 0) {
        $gaunik++;
        echo
        '<script>
        alert("Email sudah di regis!");
        </script>';
    }

    if ($gaunik > 0) {
        echo
        '<script>
        window.history.back()
        </script>';
        exit;
    }


    //Ambil Data yang Dikirim dari Form upload
    $nama_file = $_FILES['foto']['name'];
    // Ambil ukuran files dalam bentuk bytes
    $ukuran_file = $_FILES['foto']['size'];
    // Ambil tipe gambar berupa JPG / JPEG / PNG
    $tipe_file = $_FILES['foto']['type'];
    // Ambil url path folder
    $tmp_file = $_FILES['foto']['tmp_name'];

    // Set path folder tempat menyimpan gambarnya
    $path = "../images/" . $nama_file;

    // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
    if ($tipe_file == "image/jpg" || $tipe_file == "image/jpeg" || $tipe_file == "image/png") {

        // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan tindakan :
        // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
        if ($ukuran_file <= 1 * 1024 * 1024) {
            // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
            // Proses upload
            if (move_uploaded_file($tmp_file, $path)) {
                // Cek apakah gambar berhasil diupload atau tidak
                // Jika gambar berhasil diupload, Lakukan :  
                // Proses simpan ke Database

                // fetch column
                $sql = "SELECT foto FROM user where id = ?";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("i", $_SESSION['user']['id']);
                $stmt->execute();
                $result = $stmt->get_result();
                $old_foto = $result->fetch_column();
                if ($old_foto) {
                    unlink("../images/$old_foto");
                }
            } else {
                // Jika gambar gagal diupload, Lakukan ini
                '<script>
            alert("gambar gagal diupload");
            window.history.back()
            </script>';
            }
        } else {
            // Jika ukuran file lebih dari 1MB, lakukan :
            '<script>
            alert("ukuran file gambar lebih dari 1MB");
            window.history.back()
            </script>';
        }
    } else {
        // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
        '<script>
            alert("file gambar yang diupload bukan JPG / JPEG / PNG");
            window.history.back()
            </script>';
    }


    $query = mysqli_prepare($con, "UPDATE user SET nama=?,  email=?, foto=?, password=? WHERE id = ?");
    mysqli_stmt_bind_param($query, 'ssssi', $name, $email, $nama_file, $password, $id);
    mysqli_stmt_execute($query);
    // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
    if ($query) {
        echo
        '<script>
            alert("Edit Success");
            window.location = "../page/ProfilePage.php"
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