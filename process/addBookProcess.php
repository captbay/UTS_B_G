<?php
    session_start();
    if(isset($_POST['addBook'])){

        include('../db.php');

        $nama_buku = $_POST['nama_buku'];
        $jumlah_tersedia = $_POST['jumlah_tersedia'];

        // Ambil Data yang Dikirim dari Form upload
        $nama_file = $_FILES['gambar_buku']['name'];
        // Ambil ukuran files dalam bentuk bytes
        $ukuran_file = $_FILES['gambar_buku']['size'];
        // Ambil tipe gambar berupa JPG / JPEG / PNG
        $tipe_file = $_FILES['gambar_buku']['type'];
        // Ambil url path folder
        $tmp_file = $_FILES['gambar_buku']['tmp_name'];

        // Set path folder tempat menyimpan gambarnya
        $path = "../images/" . $nama_file;

        // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
    if ($tipe_file == "image/jpg" || $tipe_file == "image/jpeg" || $tipe_file == "image/png") {

        // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan tindakan :
        // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
        if ($ukuran_file <= 1*1024*1024) {
            // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
            // Proses upload
            if (move_uploaded_file($tmp_file, $path)) {
                // Cek apakah gambar berhasil diupload atau tidak
                // Jika gambar berhasil diupload, Lakukan :  
                // Proses simpan ke Database

                // Melakukan insert ke databse dengan query dibawah ini
                $query = mysqli_query($con, "INSERT INTO buku (nama_buku, gambar_buku, jumlah_tersedia) VALUES ('$nama_buku', '$nama_file', '$jumlah_tersedia')") or die(mysqli_error($con)); 
                    // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
                if ($query) {
                    echo
                        '<script>
                            alert("Add Success");
                            window.location = "../page/dashboardAdminPage.php"
                        </script>';
                } else {
                    echo
                    '<script>
                        alert("Add Failed");
                        window.history.back()
                    </script>';
                }    
            } else {
                    // Jika gambar gagal diupload, Lakukan ini
                    echo "Maaf, Gambar gagal untuk diupload.";
                    echo "<br><a href='form.php'>Kembali Ke Form</a>";
                    exit;
                }
        } else {
                // Jika ukuran file lebih dari 1MB, lakukan :
                echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
                echo "<br><a href='form.php'>Kembali Ke Form</a>";
                exit;
            }
    } else {
        // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
        echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
        echo "<br><a href='form.php'>Kembali Ke Form</a>";
        exit;
    }
} else {
    echo
    '<script>
            window.history.back()
            </script>';
    }
?>