<?php
    session_start();
    if(isset($_POST['addsaran'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');

        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $id = $_SESSION['user']['id'];
        $saran = $_POST['saran'];

        $query = mysqli_query($con,"INSERT INTO saran(id_user,saran) 
            VALUES
        ('$id', '$saran')")
        or die(mysqli_error($con));
          
        if($query){
            echo
                '<script>
                alert("Add Kritik & Saran Success"); 
                window.location = "../page/KritikSaranPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert(""Add Kritik & Saran Failed");
                window.location = "../page/KritikSaranPage.php"
                </script>';
        }
        
        }else{
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>