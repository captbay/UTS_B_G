<?php
include '../component/sidebarAdmin.php'
?>
<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
solid  #15282f; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
0.19);">
    <div class="body d-flex justify-content-between">
        <h4>Peminjaman</h4>
        <!-- <a href="./addBookPage.php" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add Book</a> -->
    </div>
    <hr>
    <table class="table ">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul Buku </th>
                <th scope="col">Gambar Buku </th>
                <th scope="col">Nama Users</th>
                <th scope="col">Status</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Pengembalian</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($con, "SELECT peminjaman.id, buku.nama_buku, buku.gambar_buku, user.nama, peminjaman.status, peminjaman.tanggal_pinjam, peminjaman.tanggal_kembali FROM ((peminjaman inner join buku ON peminjaman.id_buku = buku.id_buku) inner join user on peminjaman.id_user=user.id) where peminjaman.status='dipinjam'
            ") or
                die(mysqli_error($con));

            if (mysqli_num_rows($query) == 0) {
                echo '<tr> <td colspan="7"> Tidak ada data </td> </tr>';
            } else {
                $no = 1;
                while ($data = mysqli_fetch_assoc($query)) {
                    echo '
                    <tr>
                        <th scope="row">' . $no . '</th>
                        <td>' . $data['nama_buku'] . '</td>
                        <td><img src="../images/' . $data['gambar_buku'] . '" width="70" height="90"></td>
                        <td>' . $data['nama'] . '</td>
                        <td>' . $data['status'] . '</td>
                        <td>' . $data['tanggal_pinjam'] . '</td>
                        <td>' . $data['tanggal_kembali'] . '</td>
                        <td>
                            <a href="../process/deletePeminjamanProcess.php?id=' . $data['id'] . '"onClick="return confirm ( \'Are you sure want to delete?\')"> <i class="fa fa-trash" style="color:red"></i>
                            </a>
                        </td>
                    </tr>';
                    $no++;
                }
            }
            ?>
        </tbody>
    </table>
</div>
</div>
</aside>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>

</html>