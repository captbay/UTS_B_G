<?php
include '../component/sidebarAdmin.php'
?>
<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
solid  #15282f; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
0.19);">
    <div class="body d-flex justify-content-between">
        <h4>Main Menu</h4>
        <a href="./addBookPage.php" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add Book</a>
    </div>
    <hr>
    <table class="table ">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Buku</th>
                <th scope="col">Gambar</th>
                <th scope="col">Jumlah Tersedia</th>
                <th scope="col">Edit</th>
                <th scope="col">Hapus</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($con, "SELECT * FROM buku") or
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
                        <td>' . $data['jumlah_tersedia'] . '</td>
                        <td>
                            <a href="../page/editBookPage.php?id=' . $data['id_buku'] . '"onClick="return confirm ( \'Are you sure want to edit the book?\')"> <i class="fa fa-pen" style="color:green"></i>
                            </a>
                        </td>
                        <td>
                            <a href="../process/deleteBookProcess.php?id=' . $data['id_buku'] . '"onClick="return confirm ( \'Are you sure want to delete the book?\')"> <i class="fa fa-trash" style="color:red"></i>
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