<?php
include '../component/sidebar.php';

$user = null;
// get user data
$query = "SELECT * FROM user WHERE id = ?;";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, 'i', $_SESSION['user']["id"]);
mysqli_stmt_execute($stmt);
$user = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
?>
<div class="card card-body shadow"
    style=" *box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="mb-0">My Profile</h4>
    </div>
    <hr>
    <form method="POST" action="../process/editProfileProcess.php" name="contact-form" method="post"
        enctype="multipart/form-data">
        <div class="d-flex justify-content-center align-items-center">
            <img src="../images/<?php echo $user["foto"]; ?>" width='150' height='150' class="rounded-circle " />
        </div>
        <div class="mb-4">
            <label for="exampleInputImages" class="form-label">Gambar Profil</label>
            <input class="form-control" type="file" name="foto" value="<?php echo htmlspecialchars($user["foto"]) ?>">
        </div>
        <div class="mb-3">
            <label for="in-name" class="form-label">Username</label>
            <input class="form-control" id="in-name" name="nama" value="<?php echo htmlspecialchars($user["nama"]); ?>"
                required>
        </div>
        <div class="mb-3">
            <label for="in-email" class="form-label">Email</label>
            <input class="form-control" id="in-email" name="email"
                value="<?php echo htmlspecialchars($user["email"]); ?>" required>
        </div>
        <div class="mb-3">
            <label for="in-email" class="form-label">Password</label>
            <input class="form-control" id="in-password" name="password" required>
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-dark w-100" name="editProfil">Save Profile Update</button>
            <input type='hidden' name="id" value="<?php echo $user['id'] ?>" />
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