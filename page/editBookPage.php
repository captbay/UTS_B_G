<?php
include '../component/sidebar.php';

$user = null;
// get user data
$query = "SELECT * FROM buku WHERE id = ?;";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, 'i', $_SESSION['user']["id"]);
mysqli_stmt_execute($stmt);
$user = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
?>
<div class="card card-body shadow"
    style=" *box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Edit Book</h4>
    </div>
    <hr>
    <form method="POST" action="../process/editBukuProcess.php" autocomplete="off">
    <img src="../images/<?php echo $user["foto"];?>" width='70' height='90' />
        <div class="mb-3">
            <label for="in-name" class="form-label">Nama Buku</label>
            <input class="form-control" id="in-name" name="name" value="<?php echo htmlspecialchars($user["nama_buku"]);?>" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputImages" class="form-label">Gambar</label>
            <input class="form-control" id="in-images" name="images" value="<?php echo htmlspecialchars($user["gambar_buku"]);?>" required>
        </div>
        <div class="mb-3">
            <label for="in-jumlah" class="form-label">Jumlah Tersedia</label>
            <input class="form-control" id="in-jumlah" name="jumlah" value="<?php echo htmlspecialchars($user["jumlah_tersedia"]);?>" required>
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-dark w-100" name="tambah" value="add">Save Book</button>
        </div>
    </form>
</div>
</main>
</div>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>