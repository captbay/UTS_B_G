<?php
include '../component/sidebar.php'
?>
<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
solid  #15282f; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
0.19);">
    <div class="body d-flex justify-content-between">
        <h4>Anggota Kelompok Belajar</h4>
        <a href="./addAnggotaPage.php" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add Anggota</a>
    </div>
    <hr>
    <table class="table ">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID Anggota</th>
                <th scope="col">Nama Anggota</th>
                <th scope="col">Email</th>
                <th scope="col">Edit</th>
                <th scope="col">Hapus</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($con, "SELECT * FROM anggota") or die(mysqli_error($con));

            if (mysqli_num_rows($query) == 0) {
                echo '<tr> <td colspan="7"> Tidak ada data </td> </tr>';
            } else {
                $no = 1;
                while ($data = mysqli_fetch_assoc($query)) {
                    echo '
                    <tr>
                        <th scope="row">' . $no . '</th>
                        <td>' . $data['id_anggota'] . '</td>
                        <td>' . $data['nama_anggota'] . '</td>
                        <td>' . $data['email'] . '</td>
                        <td>
                            <a href="../page/editAnggotaPage.php?id=' . $data['id_anggota'] . '"onClick="return confirm ( \'Are you sure want to edit the book?\')"> <i class="fa fa-pen" style="color:green"></i>
                            </a>
                        </td>
                        <td>
                            <a href="../process/deleteAnggotaProcess.php?id=' . $data['id_anggota'] . '"onClick="return confirm ( \'Are you sure want to delete the book?\')"> <i class="fa fa-trash" style="color:red"></i>
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