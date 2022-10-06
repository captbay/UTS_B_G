<?php
// untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
// $_POST itu method di formnya
if (isset($_POST['register'])) {
    // untuk mengoneksikan dengan database dengan memanggil file db.php
    include('../db.php');
    // tampung nilai yang ada di from ke variabel
    // sesuaikan variabel name yang ada di registerPage.php disetiap input


    $name = $_POST['nama'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    //counter ga unik
    $gaunik = 0;

    // Ambil Data yang Dikirim dari Form upload
    $nama_file = $_FILES['gambar']['name'];
    // Ambil ukuran files dalam bentuk bytes
    $ukuran_file = $_FILES['gambar']['size'];
    // Ambil tipe gambar berupa JPG / JPEG / PNG
    $tipe_file = $_FILES['gambar']['type'];
    // Ambil url path folder
    $tmp_file = $_FILES['gambar']['tmp_name'];

    // Set path folder tempat menyimpan gambarnya
    $path = "../images/" . $nama_file;

    // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
    if ($tipe_file == "image/jpg" || $tipe_file == "image/jpeg" || $tipe_file == "image/png") {

        // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan tindakan :
        // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
        if ($ukuran_file <= 1000000) {
            // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
            // Proses upload
            if (move_uploaded_file($tmp_file, $path)) {
                // Cek apakah gambar berhasil diupload atau tidak
                // Jika gambar berhasil diupload, Lakukan :  
                // Proses simpan ke Database

                //check email unik
                // Check email
                $query = mysqli_prepare($con, "SELECT COUNT(*) FROM user WHERE email = ?");
                mysqli_stmt_bind_param($query, 's', $email);
                mysqli_stmt_execute($query);
                $result = mysqli_stmt_get_result($query);
                // fetch column
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
                } else {
                    // Melakukan insert ke databse dengan query dibawah ini
                    $query = mysqli_prepare(
                        $con,
                        "INSERT INTO user(nama, email, password, foto)
                    VALUES (?, ?, ?, ?);"
                    )
                        or die(mysqli_error($con)); // try-catching error
                    mysqli_stmt_bind_param($query, 'ssss', $name, $email, $password, $nama_file);
                    mysqli_stmt_execute($query);
                    // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
                    if ($query) {
                        echo
                        '<script>
                    alert("Register Success");
                    window.location = "../page/dashboardPage.php"
                    </script>';
                    } else {
                        echo
                        '<script>
                    alert("Register Failed");
                    window.history.back()
                    </script>';
                    }
                }
            } else {
                // Jika gambar gagal diupload, Lakukan ini
                echo "Maaf, Gambar gagal untuk diupload.";
                echo "<br><a href='form.php'>Kembali Ke Form</a>";
            }
        } else {
            // Jika ukuran file lebih dari 1MB, lakukan :
            echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
            echo "<br><a href='form.php'>Kembali Ke Form</a>";
        }
    } else {
        // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
        echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
        echo "<br><a href='form.php'>Kembali Ke Form</a>";
    }
} else {
    echo
    '<script>
            window.history.back()
            </script>';
}