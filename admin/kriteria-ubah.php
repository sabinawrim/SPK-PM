<?php
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'ubah') {
        include '../assets/conn/config.php';
        $id_kriteria = $_POST['id_kriteria'];
        $nama_kriteria = $_POST['nama_kriteria'];
        $tipe_kriteria = $_POST['tipe_kriteria'];
        $bobot_kriteria = $_POST['bobot_kriteria'];

        mysqli_query($conn, "UPDATE tbl_kriteria SET nama_kriteria='$nama_kriteria', tipe_kriteria='$tipe_kriteria', bobot_kriteria='$bobot_kriteria' WHERE id_kriteria='$id_kriteria'");
        header('location:kriteria.php');
    }
}

include 'header.php';
?>

<h2 class="mb-4">Kriteria | Ubah Data</h2>
<hr>
<br>

<div class="shadow p-5">

    <?php
    $data = mysqli_query($conn, "SELECT * FROM tbl_kriteria WHERE id_kriteria='$_GET[id_kriteria]'");
    while ($a = mysqli_fetch_array($data)) {
    ?>
        <form action="kriteria-ubah.php?aksi=ubah" method="POST">

            <input type="hidden" name="id_kriteria" value="<?= $a['id_kriteria'] ?>">

            <div class="form-grup">
                <label>Nama Kriteria</label>
                <input type="text" name="nama_kriteria" class="txt form-control" placeholder="nama kriteria" required
                    autocomplete="off" value="<?= $a['nama_kriteria'] ?>">
            </div>

            <div class="form-grup mt-3">
                <label>Tipe Kriteria</label>
                <select name="tipe_kriteria" class="txt form-control">
                    <option selected><?= $a['tipe_kriteria'] ?></option>
                    <option>Core Factor</option>
                    <option>Secondary Factor</option>
                </select>
            </div>

            <div class="form-grup mt-3">
                <label>Bobot Kriteria</label>
                <input type="number" max="5" name="bobot_kriteria" class="txt form-control" placeholder="0" required
                    autocomplete="off" value="<?= $a['bobot_kriteria'] ?>">
            </div>

            <br>

            <input type="submit" class="btn btn-primary" value="Ubah">
            <a href="kriteria.php" class="btn btn-dark">Batal</a>

        </form>

    <?php } ?>
</div>

</div>
</div>