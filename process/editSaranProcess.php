<?php
    session_start();
    if(isset($_POST['editSaran'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');

        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $id = $_SESSION['user']['id'];
        $saran = $_POST['saran'];

        $query = mysqli_query($con,"UPDATE saran SET saran='$saran' WHERE id_user = ". $id);

        if($query){
            echo
                '<script>
                alert("Edit Success"); 
                window.location = "../page/kritikSaranPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Edit Failed");
                window.location = "../page/kritikSaranPage.php"
                </script>';
        }
        
        }else{
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>