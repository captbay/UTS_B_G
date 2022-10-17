<?php
include '../component/sidebar.php';

$query = mysqli_query($con, "SELECT * FROM anggota WHERE id_anggota = ". $_GET['id']);
$anggota = mysqli_fetch_assoc($query);

?>

<div class="card card-body shadow"
    style=" *box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">

    <div class="d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Edit Anggota</h4>
    </div>
    <hr>
    <form action="../process/addAnggotaProcess.php" name="contact-form" method="post" enctype="multipart/form-data">
        <div class="mb-4">
            <label for="in-name" class="form-label">Nama Anggota</label>
            <input class="form-control" id="in-name" name="nama_anggota" value="<?php echo $anggota['nama_anggota']?>">
        </div>
        <div class="mb-4">
            <label for="exampleInputImages" class="form-label">Email</label>
            <input class="form-control" type="in-name" name="email" value="<?php echo $anggota['email']?>">
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-dark w-100" name="editAnggota">Save Anggota</button>
            <input type='hidden' name="id_anggota" value="<?php echo $anggota['id_anggota']?>" />
        </div>
    </form>
</div>
</div>
</aside>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>

</html>