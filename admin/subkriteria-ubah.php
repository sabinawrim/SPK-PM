<?php
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'ubah') {
        include '../assets/conn/config.php';
        $id_subkriteria = $_POST['id_subkriteria'];
        $id_kriteria = $_POST['id_kriteria'];
        $nama_subkriteria = $_POST['nama_subkriteria'];
        $nilai_subkriteria = $_POST['nilai_subkriteria'];
        mysqli_query($conn, "UPDATE tbl_subkriteria SET nama_subkriteria='$nama_subkriteria', nilai_subkriteria='$nilai_subkriteria' WHERE id_subkriteria='$id_subkriteria'");
        header("location:subkriteria.php?id_kriteria=$_POST[id_kriteria]");
    }
}

include 'header.php';
?>

<h2 class="mb-4">subkriteria | Ubah Data</h2>
<hr>
<br>

<div class="shadow p-5">

    <?php
    $data = mysqli_query($conn, "SELECT * FROM tbl_subkriteria WHERE id_subkriteria='$_GET[id_subkriteria]'");
    while ($a = mysqli_fetch_array($data)) {
    ?>

        <form action="subkriteria-ubah.php?aksi=ubah" method="POST">
            <input type="hidden" name="id_subkriteria" value="<?= $a['id_subkriteria'] ?>">
            <input type="hidden" name="id_kriteria" value="<?= $_GET['id_kriteria'] ?>">

            <div class="form-grup">
                <label>Nama subkriteria</label>
                <input type="text" name="nama_subkriteria" class="txt form-control" placeholder="nama subkriteria" required
                    autocomplete="off" value="<?= $a['nama_subkriteria'] ?>">
            </div>

            <div class="form-grup mt-3">
                <label>Nilai subkriteria</label>
                <input type="number" max="5" name="nilai_subkriteria" class="txt form-control" placeholder="0" required
                    autocomplete="off" value="<?= $a['nilai_subkriteria'] ?>">
            </div>
            <hr>
            <input type="submit" class="btn btn-primary" value="Ubah">
            <a href="subkriteria.php?id_kriteria=<?= $_GET['id_kriteria'] ?>" class="btn btn-dark">Batal</a>
        </form>

    <?php } ?>
</div>

</div>
</div>