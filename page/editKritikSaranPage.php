<?php
include '../component/sidebar.php';
include('../db.php');
$query = mysqli_query($con, "SELECT * FROM saran WHERE id = ". $_GET['id']);
$saran = mysqli_fetch_assoc($query);
?>
<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px 
solid #D40013; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 
0.19);">

    
    <div class="body d-flex justify-content-between">
        <h4>Edit Series</h4>
        <a href="../process/KritikSaranProcess.php"> <i style="color: red" class="fa fa-arrow-left fa-2x"></i></a>
    </div>
    <hr>         
    <div class="card-body">
            <form action="../process/editSaranProcess.php?id=<?php echo $saran["id"];?>" method="post">
                <div class="mb-3">
                    <input class="form-control" id=saran" name="saran" aria-describedby="emailHelp" value="<?php echo $saran['saran']?>">
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-dark" name="editSaran" >Save</button>
                </div>
            </form>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>