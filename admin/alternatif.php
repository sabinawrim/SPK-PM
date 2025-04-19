<?php
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'hapus') {
        include '../assets/conn/config.php';
        $id_alternatif = $_GET['id_alternatif'];
        mysqli_query($conn, "DELETE FROM tbl_alternatif WHERE id_alternatif='$id_alternatif'");
        header('location:alternatif.php');
    }
}

include 'header.php';
?>

<h2 class="mb-4">Alternatif</h2>
<hr>
<br>

<div class="shadow p-5">
    <a href="alternatif-simpan.php" class="btn btn-primary"><span class="fa fa-plus"></span> Tambah Data</a>
    <br>
    <br>
    <br>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">No.</th>
                <th class="text-center">Nama Alternatif</th>
                <th class="text-center">Opsi</th>
            </tr>
        </thead>

        <?php
        $data = mysqli_query($conn, "SELECT * FROM tbl_alternatif ORDER BY id_alternatif");
        $no = 1;
        while ($a = mysqli_fetch_array($data)) { ?>
            <tbody>
                <tr>
                    <td class="text-center"><?php echo $no++ ?></td>
                    <td class="text-center"><?php echo $a['nama_alternatif'] ?></td>

                    <td class="text-center">
                        <a href="alternatif-ubah.php?id_alternatif=<?= $a['id_alternatif'] ?>" class="btn btn-primary"><span class="fa fa-pencil"></span></a>
                        <a href="alternatif.php?id_alternatif=<?= $a['id_alternatif'] ?>&aksi=hapus" class="btn btn-dark"><span class="fa fa-trash"></span></a>
                    </td>
                </tr>
            </tbody>

        <?php } ?>


    </table>
</div>

</div>
</div>