<?php
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'hapus') {
        include '../assets/conn/config.php';
        $id_kriteria = $_GET['id_kriteria'];
        mysqli_query($conn, "DELETE FROM tbl_kriteria WHERE id_kriteria='$id_kriteria'");
        mysqli_query($conn, "DELETE FROM tbl_subkriteria WHERE id_kriteria='$id_kriteria'");
        header('location:kriteria.php');
    }
}

include 'header.php';
?>

<h2 class="mb-4">Kriteria</h2>
<hr>
<br>

<div class="shadow p-5">
    <a href="kriteria-simpan.php" class="btn btn-primary"><span class="fa fa-plus"></span> Tambah Data</a>
    <br>
    <br>
    <br>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">No.</th>
                <th class="text-center">Kriteria</th>
                <th class="text-center">Tipe</th>
                <th class="text-center">Bobot</th>
                <th class="text-center">Sub Kriteria</th>
                <th class="text-center">Opsi</th>
            </tr>
        </thead>

        <?php
        $data = mysqli_query($conn, "SELECT * FROM tbl_kriteria ORDER BY id_kriteria");
        $no = 1;
        while ($a = mysqli_fetch_array($data)) { ?>
            <tbody>
                <tr>
                    <td class="text-center"><?php echo $no++ ?></td>
                    <td class="text-center"><?php echo $a['nama_kriteria'] ?></td>
                    <td class="text-center"><?php echo $a['tipe_kriteria'] ?></td>
                    <td class="text-center"><?php echo $a['bobot_kriteria'] ?></td>
                    <td class="text-center">
                        <a href="subkriteria.php?id_kriteria=<?= $a['id_kriteria'] ?>" class="btn btn-warning"><span class="fa fa-plus"></span></a>
                        <a href="subkriteria.php?id_kriteria=<?= $a['id_kriteria'] ?>" class="btn btn-info"><span class="fa fa-eye"></span></a>


                    </td>

                    <td class="text-center">
                        <a href="kriteria-ubah.php?id_kriteria=<?= $a['id_kriteria'] ?>" class="btn btn-primary"><span class="fa fa-pencil"></span></a>
                        <a href="kriteria.php?id_kriteria=<?= $a['id_kriteria'] ?>&aksi=hapus" class="btn btn-dark"><span class="fa fa-trash"></span></a>
                    </td>
                </tr>
            </tbody>

        <?php } ?>


    </table>
</div>

</div>
</div>