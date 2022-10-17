<?php
include '../component/sidebar.php';
    include('../db.php');

    $id=$_GET['id'];
    $query = mysqli_query($con, "SELECT * FROM buku WHERE id_buku = '$id'") or
        die(mysqli_error($con));
        $buku = mysqli_fetch_assoc($query);
?>
<div class="card card-body shadow"
    style=" *box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Edit Book</h4>
    </div>
    <hr>
    <form method="POST" action="../process/editBukuProcess.php" enctype="multipart/form-data">
    <img src="../images/<?php echo $buku['gambar_buku'];?>" width='70' height='90' />
        <div class="mb-3">
            <label for="in-name" class="form-label">Nama Buku</label>
            <input type="text" name="nama_buku" value="<?php echo $buku['nama_buku']?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputImages" class="form-label">Gambar</label>
            <input type="file" name="gambar_buku" id="gambar_buku" value="<?php echo $buku['gambar_buku']?>">
        </div>
        <div class="mb-3">
            <label for="in-jumlah" class="form-label">Jumlah Tersedia</label>
            <input type="number" name="jumlah_tersedia" value="<?php echo $buku['jumlah_tersedia']?>"/>
        </div>
        <div class="mt-4">
            <input type="submit" value="edit" name="editBook" />
            <input type='hidden' name="id_buku" value="<?php echo $buku['id_buku']?>" />
        </div>
    </form>
</div>
</main>
</div>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>