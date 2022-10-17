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
        <h4>Detail Buku</h4>
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
            <td>
                <p>nama buku :</p><?php echo $data['nama_buku'] ?>
            </td>
        </tr>
        <tr>
            <td>
                <p>gambar buku :</p><img src="../images/<?php $data['gambar_buku']; ?>" width='70' height='90' />
            </td>
        </tr>
        <tr>
            <td>
                <p>tanggl pinjam :</p><?php echo $tglPeminjaman ?>
            </td>
        </tr>
        <tr>
            <td>
                <p>tanggal kembali :</p><?php echo $tglPengembalian ?>
            </td>
        </tr>
        <tr>
            <td>
                <a href="<?php echo "../process/peminjamanProcess.php?id=" . $_GET['id'] . "&tanggal_pinjam=" . $tglPeminjaman . "&tanggal_kembali=" . $tglPengembalian ?>"
                    onClick="return confirm ( 'Are you sure want to borrow a book?')"> <i class="fa fa-book"
                        style="color:green"> Pinjam</i>
                </a>
            </td>
        </tr>




    </table>
</div>
</div>
</aside>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>

</html>