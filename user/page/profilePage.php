<?php
include '../component/sidebar.php';
include('../db.php');
$query = mysqli_query($con, "SELECT * FROM user WHERE id = ". $_SESSION['user']['id']);
$user = mysqli_fetch_assoc($query);
?>
<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px 
solid #D40013; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 
0.19);">

    
    <div class="body d-flex justify-content-between">
        <h4>My Profile</h4>
        <a href="../page/editProfileProcess.php"> <i style="color: red" class="fa fa-arrow-left fa-2x"></i></a>
    </div>
    <hr>         
    <div class="card-body">
            <form action="../process/editProfileProcess.php" method="post">
            <img src="img/<?php echo $user[foto]; ?>" width='70' height='90' />
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                    <input class="form-control" id="name" name="name" aria-describedby="emailHelp" value="<?php echo $user['nama']?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?php echo $user['email']?>" disabled>
                </div>
                
            </form>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>