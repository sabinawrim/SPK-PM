<?php
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'simpan') {
        include '../assets/conn/config.php';
        $nama_alternatif = $_POST['nama_alternatif'];

        mysqli_query($conn, "INSERT into tbl_alternatif(nama_alternatif)VALUES('$nama_alternatif')");
        header('location:alternatif.php');
    }
}

include 'header.php';
?>

<h2 class="mb-4">Alternatif | Tambah Data</h2>
<hr>
<br>

<div class="shadow p-5">
    <form action="alternatif-simpan.php?aksi=simpan" method="POST">
        <div class="form-grup">
            <label>Nama Alternatif</label>
            <input type="text" name="nama_alternatif" class="txt form-control" placeholder="nama alternatif" required
                autocomplete="off">
        </div>

        <br>
        <br>

        <input type="submit" class="btn btn-primary" value="Simpan">
        <a href="alternatif.php" class="btn btn-dark">Batal</a>

    </form>
</div>

</div>
</div>