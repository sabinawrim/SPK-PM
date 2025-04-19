<?php
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'hapus') {
        include '../assets/conn/config.php';
        $id_subkriteria = $_GET['id_subkriteria'];
        $id_kriteria = $_GET['id_kriteria'];
        mysqli_query($conn, "DELETE FROM tbl_subkriteria WHERE id_subkriteria='$id_subkriteria'");
        header("location:subkriteria.php?id_kriteria=$_POST[id_kriteria]");
    }
}

include 'header.php';
$kriteria = mysqli_query($conn, "SELECT * FROM tbl_kriteria WHERE id_kriteria='$_GET[id_kriteria]'");
$ket = mysqli_fetch_array($kriteria);
$nama_kriteria = $ket['nama_kriteria'];
?>

<h2 class="mb-4">Subkriteria | <a href="kriteria.php"><?= $nama_kriteria ?></a></h2>
<hr>
<br>

<div class="shadow p-5">
    <a href="subkriteria-simpan.php?id_kriteria=<?= $_GET['id_kriteria'] ?>" class="btn btn-primary"><span class="fa fa-plus"></span> Tambah Data</a>
    <br>
    <br>
    <br>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">No.</th>
                <th class="text-center">Subkriteria</th>
                <th class="text-center">Nilai</th>
                <th class="text-center">Opsi</th>
            </tr>
        </thead>

        <?php
        $data = mysqli_query($conn, "SELECT * FROM tbl_subkriteria WHERE id_kriteria='$_GET[id_kriteria]' ORDER BY id_subkriteria");
        $no = 1;
        while ($a = mysqli_fetch_array($data)) { ?>
            <tbody>
                <tr>
                    <td class="text-center"><?php echo $no++ ?></td>
                    <td class="text-center"><?php echo $a['nama_subkriteria'] ?></td>
                    <td class="text-center"><?php echo $a['nilai_subkriteria'] ?></td>

                    <td class="text-center">
                        <a href="subkriteria-ubah.php?id_subkriteria=<?= $a['id_subkriteria'] ?>&id_kriteria=<?= $_GET['id_kriteria'] ?>" class="btn btn-primary"><span class="fa fa-pencil"></span></a>
                        <a href="subkriteria.php?id_subkriteria=<?= $a['id_subkriteria'] ?>&id_kriteria=<?= $_GET['id_kriteria'] ?>&aksi=hapus" class="btn btn-dark"><span class="fa fa-trash"></span></a>
                    </td>
                </tr>
            </tbody>

        <?php } ?>


    </table>
</div>

</div>
</div>