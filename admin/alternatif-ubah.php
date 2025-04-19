<?php
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'ubah') {
        include '../assets/conn/config.php';
        $id_alternatif = $_POST['id_alternatif'];
        $nama_alternatif = $_POST['nama_alternatif'];

        mysqli_query($conn, "UPDATE tbl_alternatif set nama_alternatif='$nama_alternatif' WHERE id_alternatif='$id_alternatif'");
        header('location:alternatif.php');
    }
}

include 'header.php';
?>

<h2 class="mb-4">Alternatif | Tambah Data</h2>
<hr>
<br>

<div class="shadow p-5">

    <?php
    $data = mysqli_query($conn, "SELECT * FROM tbl_alternatif WHERE id_alternatif='$_GET[id_alternatif]'");
    while ($a = mysqli_fetch_array($data)) { ?>

        <form action="alternatif-ubah.php?aksi=ubah" method="POST">
            <input type="hidden" name="id_alternatif" value="<?= $a['id_alternatif'] ?>">
            <div class="form-grup">
                <label>Nama Alternatif</label>
                <input type="text" name="nama_alternatif" class="txt form-control" placeholder="nama alternatif" required
                    autocomplete="off" value="<?= $a['nama_alternatif'] ?>">
            </div>

            <br>
            <br>

            <input type="submit" class="btn btn-primary" value="Simpan">
            <a href="alternatif.php" class="btn btn-dark">Batal</a>

        </form>

    <?php } ?>
</div>

</div>
</div>