<?php
include '../component/sidebar.php';
$tglPeminjaman = date("Y-m-d");
$date = strtotime("+7 day", strtotime($tglPeminjaman));
$tglPengembalian = date("Y-m-d", $date);


?>
<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
solid  #15282f; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
0.19);">
    <div class="body d-flex justify-content-between">
        <h4>Detile Buku</h4>
        <!-- <a href="./addBookPage.php" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add Book</a> -->
    </div>
    <hr>
    <table class="table ">

        <?php
        $query = mysqli_query($con, "SELECT * FROM buku where id_buku =" . $_GET['id']) or
            die(mysqli_error($con));

        $data = mysqli_fetch_assoc($query);

        ?>

        <tr>
            <td><?php echo $data['nama_buku'] ?></td>
        </tr>
        <tr>
            <td><?php echo $data['gambar_buku'] ?></td>
        </tr>
        <tr>
            <td><?php echo $tglPeminjaman ?></td>
        </tr>
        <tr>
            <td><?php echo $tglPengembalian ?></td>
        </tr>
        <tr>
            <td>
                <a href="<?php echo "../process/peminjamanProcess.php?id=" . $_GET['id'] . "&tanggal_pinjam=" . $tglPeminjaman . "&tanggal_kembali=" . $tglPengembalian ?>"
                    onClick="return confirm ( \'Are you sure want to borrow a book?\')"> <i class="fa fa-book"
                        style="color:green"></i>
                </a>
            </td>
        </tr>




    </table>
</div>
</aside>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>

</html>