<?php
include '../component/sidebar.php';
?>
<div class="card card-body shadow"
    style=" *box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">

    <div class="d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Tambah Kritik & Saran</h4>
    </div>
    <hr>
    <form action="../process/addSaranProcess.php" name="contact-form" method="post" enctype="multipart/form-data">
        <div class="mb-4">
            <input class="form-control" id="in-name" name="saran" required>
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-dark w-100" value="Tambah" name="addsaran">Save</button>
        </div>
    </form>
</div>
</main>
</div>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>