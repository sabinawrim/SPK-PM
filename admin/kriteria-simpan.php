<?php
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'simpan') {
        include '../assets/conn/config.php';
        $nama_kriteria = $_POST['nama_kriteria'];
        $tipe_kriteria = $_POST['tipe_kriteria'];
        $bobot_kriteria = $_POST['bobot_kriteria'];

        mysqli_query($conn, "INSERT into tbl_kriteria(nama_kriteria, tipe_kriteria, bobot_kriteria)VALUES('$nama_kriteria', '$tipe_kriteria', '$bobot_kriteria')");
        header('location:kriteria.php');
    }
}

include 'header.php';
?>

<h2 class="mb-4">Kriteria | Tambah Data</h2>
<hr>
<br>

<div class="shadow p-5">
    <form action="kriteria-simpan.php?aksi=simpan" method="POST">
        <div class="form-grup">
            <label>Nama Kriteria</label>
            <input type="text" name="nama_kriteria" class="txt form-control" placeholder="nama kriteria" required
                autocomplete="off">
        </div>

        <div class="form-grup mt-3">
            <label>Tipe Kriteria</label>
            <select name="tipe_kriteria" class="txt form-control">
                <option selected disable>-pilih-</option>
                <option>Core Factor</option>
                <option>Secondary Factor</option>
            </select>
        </div>

        <div class="form-grup mt-3">
            <label>Bobot Kriteria</label>
            <input type="number" max="5" name="bobot_kriteria" class="txt form-control" placeholder="0" required
                autocomplete="off">
        </div>

        <br>

        <input type="submit" class="btn btn-primary" value="Simpan">
        <a href="kriteria.php" class="btn btn-dark">Batal</a>

    </form>
</div>

</div>
</div>