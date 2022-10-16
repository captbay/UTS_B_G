 <?php
        session_start();
        if(isset($_POST['editProfil'])){

            include('../db.php');
            $id = $_SESSION['user']['id'];
            $name = $_POST['nama'];
            $email = $_POST['email'];
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
        $query = mysqli_prepare($con,"UPDATE user SET nama=?, email=? WHERE id = ?");
        mysqli_stmt_bind_param($query, 'ssi',$name,$email,$id);
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
?>