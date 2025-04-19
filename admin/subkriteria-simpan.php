<?php
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'simpan') {
        include '../assets/conn/config.php';
        $id_kriteria = $_POST['id_kriteria'];
        $nama_subkriteria = $_POST['nama_subkriteria'];
        $nilai_subkriteria = $_POST['nilai_subkriteria'];
        mysqli_query($conn, "INSERT into tbl_subkriteria(id_kriteria, nama_subkriteria, nilai_subkriteria)VALUES('$id_kriteria', '$nama_subkriteria', '$nilai_subkriteria')");
        header("location:subkriteria.php?id_kriteria=$_POST[id_kriteria]");
    }
}

include 'header.php';
?>

<h2 class="mb-4">subkriteria | Tambah Data</h2>
<hr>
<br>

<div class="shadow p-5">
    <form action="subkriteria-simpan.php?aksi=simpan" method="POST">

        <input type="hidden" name="id_kriteria" value="<?= $_GET['id_kriteria'] ?>">

        <div class="form-grup">
            <label>Nama subkriteria</label>
            <input type="text" name="nama_subkriteria" class="txt form-control" placeholder="nama subkriteria" required
                autocomplete="off">
        </div>

        <div class="form-grup mt-3">
            <label>Nilai subkriteria</label>
            <input type="number" max="5" name="nilai_subkriteria" class="txt form-control" placeholder="0" required
                autocomplete="off">
        </div>
        <hr>
        <input type="submit" class="btn btn-primary" value="Simpan">
        <a href="subkriteria.php?id_kriteria=<?= $_GET['id_kriteria'] ?>" class="btn btn-dark">Batal</a>
    </form>
</div>

</div>
</div>