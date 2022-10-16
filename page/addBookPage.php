<?php
include '../component/sidebar.php';
?>
<div class="card card-body shadow"
    style=" *box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">

    <div class="d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Add Book</h4>
    </div>
    <hr>
    <form method="POST" action="../process/addBookProcess.php" autocomplete="off">
        <div class="mb-4">
            <label for="in-name" class="form-label">Nama Buku</label>
            <input class="form-control" id="in-name" name="name" required>
        </div>
        <div class="mb-4">
            <label for="in-genre" class="form-label">Gambar</label>

        </div>
        <div class="mb-4">
            <label for="in-realese" class="form-label">Jumlah Tersedia</label>
            <input type="number" class="form-control" id="in-realese" name="realese" required>
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-dark w-100" name="tambah" value="add">Save Details</button>
        </div>
    </form>
</div>
</main>
</div>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>